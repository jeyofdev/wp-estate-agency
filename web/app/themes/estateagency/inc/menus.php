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
function estateagency_menu_link_active (array $classes)
{
    $newClass = [];

    foreach ($classes as $class) {
        if ($class === "current-menu-item") {
            $newClass[] = "active";
        }
    }

    $classes = $newClass;

    return $classes;
}



add_action("init", "estateagency_menus");
add_filter("nav_menu_css_class", "estateagency_menu_link_active");