<?php

/**
 * Widget_Social_links class
 */

class EstateagencySocialLinksWidget extends WP_Widget
{
    public $fields = [];


    public function __construct()
    {
        parent::__construct("estateagency_social_links_widget", __("Social links", "estateagency"), [
            "classname" => "social_links",
			"description" => __("Display the links to the agency's social networks."),
			"customize_selective_refresh" => true,
        ]);

        $this->fields = [
            "title" => __("Title", "estateagency"),
        ];
    }



    public function widget ($args, $instance)
    {
        echo $args["before_widget"];
        ?>

        <div class="col-lg-2">
            <div class="footer-widget">
                <?php
                    // title
                    $title = !empty($instance["title"]) ? apply_filters("widget_title", $instance["title"]) : __("Social", "estateagency");
                    echo $args["before_title"] . $title . $args["after_title"];

                    $template = locate_template("template-parts/widget/social-links.php");
                    if (!empty($template)) {
                        include($template);
                    }
                ?>
            </div>
        </div>

        <?php

        echo $args["after_widget"];
    }



    public function form ($instance)
    {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';

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
        <?php
    }



    public function update ($newInstance, $oldInstance)
    {
        $output = $oldInstance;
		$output['title'] = sanitize_text_field( $newInstance['title'] );
        
        return $output;
    }
}