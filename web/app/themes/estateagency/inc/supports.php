<?php

defined("ABSPATH") or die();



/**
 * Sets up theme supports
 */
function estateagency_theme_support () : void
{
    add_theme_support("title-tag");
    add_theme_support("html5");
    add_theme_support("menus");
    add_theme_support("post-thumbnails", ["post", "property", "agent", "partner", "skill"]);
}



/**
 * Load the translation files
 *
 * @return void
 */
function estateagency_load_textdomain() : void
{
    load_theme_textdomain("estateagency", get_template_directory() . '/languages');
}



add_action("after_setup_theme", "estateagency_theme_support");
add_action("after_setup_theme", "estateagency_load_textdomain");