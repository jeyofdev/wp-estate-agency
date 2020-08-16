<?php

/**
 * Widget_Search_Property class
 */

class EstateagencySearchPropertyWidget extends WP_Widget
{
    public $fields = [];


    public function __construct()
    {
        parent::__construct("estateagency_search_property_widget", __("Search Property", "estateagency"), [
            "classname" => "search_property",
			"description" => __("Search properties according to one or more filters.", "estateagency"),
			"customize_selective_refresh" => true,
        ]);

        $this->fields = [
            "title" => __("Title", "estateagency"),
        ];
    }



    public function widget ($args, $instance)
    {
        echo $args["before_widget"];

        // title
        $title = !empty($instance["title"]) ? apply_filters("widget_title", $instance["title"]) : __("Search Property", "estateagency");
        echo $args["before_title"] . $title . $args["after_title"];

        $template = locate_template("template-parts/widget/search-property.php");
        if (!empty($template)) {
            include($template);
        }

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