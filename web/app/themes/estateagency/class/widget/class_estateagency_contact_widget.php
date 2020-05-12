<?php

class EstateagencyContactWidget extends WP_Widget
{
    public $fields = [];


    public function __construct()
    {
        parent::__construct("estateagency_contact_widget", __("Contact", "estateagency"), [
            "classname" => "contact",
			"description" => __("Display contact modes."),
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

        <div class="col-lg-3">
            <div class="footer-widget">
                <?php
                    // title
                    $title = !empty($instance["title"]) ? apply_filters("widget_title", $instance["title"]) : __("Contact Us", "estateagency");
                    echo $args["before_title"] . $title . $args["after_title"];

                    $template = locate_template("template-parts/widget/contact.php");
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