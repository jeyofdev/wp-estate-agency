<?php

/**
 * Customize the header logo
 */
function estateagency_customize_header_logo (WP_Customize_Manager $manager) : void
{
    $manager->add_section("estateagency_apparence", [
        "title" => __("Theme appearance", "estateagency")
    ]);

    $manager->add_setting("logo_header", [
        "sanitise_callback" => "esc_url_raw"
    ]);

    $manager->add_control(new WP_Customize_Image_Control($manager, "logo_header", [
        "section" => "estateagency_apparence",
        "label" => __("Upload a logo for header", "estateagency")
    ]));
}



/**
 * Customize the footer logo
 */
function estateagency_customize_footer_logo (WP_Customize_Manager $manager) : void
{
    $manager->add_section("estateagency_apparence", [
        "title" => __("Theme appearance", "estateagency")
    ]);

    $manager->add_setting("logo_footer", [
        "sanitise_callback" => "esc_url_raw"
    ]);

    $manager->add_control(new WP_Customize_Image_Control($manager, "logo_footer", [
        "section" => "estateagency_apparence",
        "label" => __("Upload a logo for footer", "estateagency")
    ]));
}



add_action("customize_register", "estateagency_customize_header_logo");
add_action("customize_register", "estateagency_customize_footer_logo");