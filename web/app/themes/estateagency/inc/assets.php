<?php

/**
 * Register and enqueue styles & scripts
 */
function estateagency_assets () : void
{
    wp_enqueue_style("estateagency_styles", get_template_directory_uri() . "/assets/styles/app.css");
    wp_enqueue_script("estateagency_script", get_template_directory_uri() . "/assets/scripts/app.js", [], false, true);
}



/**
 * Register and enqueue styles & scripts for administation
 */
function estateagency_assets_admin () : void
{
    wp_enqueue_style("estateagency_admin_styles", get_template_directory_uri() . "/assets/styles/admin.css");
}



add_action("wp_enqueue_scripts", "estateagency_assets");
add_action('admin_enqueue_scripts', 'estateagency_assets_admin');
