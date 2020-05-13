<?php

/**
 * Widget_Best_Agents class
 */

class EstateagencyBestAgentsWidget extends WP_Widget
{
    public $fields = [];


    public function __construct()
    {
        parent::__construct("estateagency_best_agents_widget", __("Best agents", "estateagency"), [
            "classname" => "best_agents",
			"description" => __("A list of the best real estate agents."),
			"customize_selective_refresh" => true,
        ]);

        $this->fields = [
            "title" => __("Title", "estateagency"),
            "number" => __("Number of agents to show:", "estateagency")
        ];
    }



    public function widget ($args, $instance)
    {
        echo $args["before_widget"];

        // title
        $title = !empty($instance["title"]) ? apply_filters("widget_title", $instance["title"]) : __("Best Agents", "estateagency");
        echo $args["before_title"] . $title . $args["after_title"];

        // get number agents to display
        $number = (!empty($instance["number"])) ? absint($instance["number"]) : 3;

        // list of agents
        $agents = new WP_Query(apply_filters(
            "widget_posts_args", [
                "post_type" => "agent",
                "posts_per_page" => $number,
                "post_status" => "publish",
                "order"   => "ASC",
            ],
            $instance
        ));

        if (!$agents->have_posts()) {
			return;
        }

        ?>
        
        <!-- display the query results -->
        <ul>
            <?php
			foreach ($agents->posts as $agent) {
                $propertiesByAgent = new WP_Query([
                    "post_type" => "property",
                    "tax_query" => [
                        [
                            "taxonomy" => "property_agent",
                            "field"    => "slug",
                            "terms"    => $agent->post_name,
                        ],
                    ],
                ]);
                ?>

                <a href="<?= the_permalink($agent); ?>" class="ba-item">
                    <div class="ba-pic">
                        <?= estateagency_post_thumbnail($agent, "property_agent_sidebar", 100, 80); ?>
                    </div>
                    <div class="ba-text">
                        <h5><?= get_the_title($agent->ID); ?></h5>
                        <span><?= get_field("job", $agent->ID); ?></span>
                        <p class="property-items">
                            <?php if ($propertiesByAgent->post_count !== 0) : ?>
                                <?= sprintf(_n("%d property", "%d properties", $propertiesByAgent->post_count, "estateagency"), $propertiesByAgent->post_count); ?>
                            <?php else : ?>
                                <?= __("0 property", "estateagency"); ?>
                            <?php endif; ?>
                        </p>
                    </div>
                </a>
            <?php
            }
            ?>
        </ul>

        <?php

        echo $args["after_widget"];
    }



    public function form ($instance)
    {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
        ?>
            <p>
                <label for="<?= $this->get_field_id('title'); ?>"><?= $this->fields["title"]; ?></label>
                <input
                    type="text"
                    class="widefat"
                    id="<?= $this->get_field_id('title'); ?>"
                    name="<?= $this->get_field_name('title'); ?>"
                    value="<?= $title; ?>" />
            </p>
            
            <p>
                <label for="<?= $this->get_field_id('number'); ?>"><?= $this->fields["number"] ?></label>
                <input 
                    class="tiny-text"
                    id="<?= $this->get_field_id('number'); ?>"
                    name="<?= $this->get_field_name('number'); ?>"
                    type="number"
                    step="1"
                    min="1"
                    value="<?= $number; ?>"
                    size="3" />
            </p>
        <?php
    }



    public function update ($newInstance, $oldInstance)
    {
        $output = $oldInstance;

		$output['title']     = sanitize_text_field( $newInstance['title'] );
        $output['number']    = (int) $newInstance['number'];
        
        return $output;
    }
}