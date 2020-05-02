<?php

defined("ABSPATH") or die();



/**
 * Sets up theme supports
 */
function estateagency_theme_support () : void
{
    add_theme_support("menus");
    add_theme_support("post-thumbnails", "post");
}



add_action("after_setup_theme", "estateagency_theme_support");