<?php

/**
 * Customize the logo
 */
function estateagency_customize_logo (WP_Customize_Manager $manager) : void
{
    $manager->add_section("estateagency_apparence", [
        "title" => __("Theme appearance", "estateagency")
    ]);

    $manager->add_setting("logo", [
        "sanitise_callback" => "esc_url_raw"
    ]);

    $manager->add_control(new WP_Customize_Image_Control($manager, "logo", [
        "section" => "estateagency_apparence",
        "label" => __("Upload a logo", "estateagency")
    ]));
}



add_action("customize_register", "estateagency_customize_logo");