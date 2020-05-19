<?php

/**
 * Register navigation menus
 */
function estateagency_menus() : void
{
    register_nav_menu("header-menu", __("main navigation", "estateagency"));
}



/**
 * Add the class 'active' on the active menu link
 */
function estateagency_menu_link_active (array $classes, $item)
{
    $newClass = [];

    if (is_singular("property") || is_post_type_archive("property") || is_singular("agent")) {
        if ($item->title === "Property") {
            $newClass[] = "active";
        }
    } else if (is_category() || is_tag() || is_archive() || is_singular("post")) {
        
        if ($item->title === "News") {
            $newClass[] = "active";
        }
    } else {
        foreach ($classes as $class) {
            if ($class === "current-menu-item") {
                $newClass[] = "active";
            }
        }
    }

    $classes = $newClass;

    return $classes;
}



add_action("init", "estateagency_menus");
add_filter("nav_menu_css_class", "estateagency_menu_link_active", 10, 2);