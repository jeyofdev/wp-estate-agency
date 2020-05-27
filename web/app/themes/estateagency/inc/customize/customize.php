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



/**
 * Customize the colors
 */
function estateagency_customize_colors (WP_Customize_Manager $manager) : void
{
    // sections
    $manager->add_section("estateagency_colors_general", [
        "title" => __("Colors", "estateagency"),
        "priority" => 30
    ]);


    // background color primary
    add_setting_and_control($manager, "background_color_primary", [], [
        "section" => "estateagency_colors_general",
        "label" => __("Background color", "estateagency")
    ]);


    // background color secondary
    add_setting_and_control($manager, "background_color_secondary", [], [
        "section" => "estateagency_colors_general",
        "label" => __("Background color secondary", "estateagency")
    ]);


    // primary color
    add_setting_and_control($manager, "color_primary", [], [
        "section" => "estateagency_colors_general",
        "label" => __("Primary color", "estateagency")
    ]);


    // secondary color
    add_setting_and_control($manager, "color_secondary", [], [
        "section" => "estateagency_colors_general",
        "label" => __("Secondary color", "estateagency")
    ]);


    // headings color
    add_setting_and_control($manager, "color_headings", [], [
        "section" => "estateagency_colors_general",
        "label" => __("Headings color", "estateagency")
    ]);


    // headings color secondary
    add_setting_and_control($manager, "color_secondary_headings", [], [
        "section" => "estateagency_colors_general",
        "label" => __("Headings color secondary", "estateagency")
    ]);


    // text color
    add_setting_and_control($manager, "color_content", [], [
        "section" => "estateagency_colors_general",
        "label" => __("Text color", "estateagency")
    ]);
}



/**
 * Add a customize setting and control
 *
 */
function add_setting_and_control (WP_Customize_Manager $manager, string $option, array $settingArgs = [], array $controlArgs = []) : void
{
    $settingsDefault = [
        "default" => estateagency_options($option),
        "transport" => "postMessage",
        "sanitise_callback" => "sanitize_hex_color"
    ];

    $settingArgs = array_merge($settingsDefault, $settingArgs);

    $manager->add_setting($option, $settingArgs);
    $manager->add_control(new WP_Customize_Color_Control($manager, $option, $controlArgs));
}



add_action("customize_register", "estateagency_customize_header_logo");
add_action("customize_register", "estateagency_customize_footer_logo");
add_action("customize_register", "estateagency_customize_colors");
