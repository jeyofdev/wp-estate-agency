<?php

/**
 * Widget_City_Property class
 */

class EstateagencyCityPropertyWidget extends WP_Widget
{
    public $fields = [];


    public function __construct()
    {
        parent::__construct("estateagency_city_property_widget", __("City Property", "estateagency"), [
            "classname" => "city_property",
			"description" => __("Display the list of cities where the properties are located."),
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

        <div class="col-lg-3 offset-lg-1">
            <div class="footer-widget">
                <?php
                    // title
                    $title = !empty($instance["title"]) ? apply_filters("widget_title", $instance["title"]) : __("Property City", "estateagency");
                    echo $args["before_title"] . $title . $args["after_title"];

                    $template = locate_template("template-parts/widget/city-property.php");
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