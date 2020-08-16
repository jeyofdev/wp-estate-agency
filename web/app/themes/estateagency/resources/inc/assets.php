<?php

/**
 * Register and enqueue styles & scripts
 */
function estateagency_assets () : void
{
    global $wp_query;

    wp_register_script("estateagency_script", dirname(get_template_directory_uri()) . "/assets/scripts/app.js", [], false, true);

    wp_localize_script("estateagency_script", "estateagency_loadmore_params", array(
        "ajaxurl" => site_url() . "/wp-admin/admin-ajax.php", // WordPress AJAX
        "posts" => json_encode($wp_query->query_vars),
        "current_page" => get_query_var("paged") ? get_query_var("paged") : 1,
        "max_page" => $wp_query->max_num_pages
    ));

    wp_enqueue_style("estateagency_styles", dirname(get_template_directory_uri()) . "/assets/styles/app.css");
    wp_enqueue_script("estateagency_script");
}



/**
 * Register and enqueue styles & scripts for administation
 */
function estateagency_assets_admin () : void
{
    wp_enqueue_style("estateagency_admin_styles", dirname(get_template_directory_uri()) . "/assets/styles/admin.css");
}



/**
 * Register and enqueue scripts for the customizer
 */
function estateagency_customize () {
    wp_enqueue_script("estateagency_apparence", get_template_directory_uri() . "/inc/customize/js/customize-preview.js", ["jquery", "customize-preview"], '', true);
}



add_action("wp_enqueue_scripts", "estateagency_assets");
add_action("admin_enqueue_scripts", "estateagency_assets_admin");
add_action("customize_preview_init", "estateagency_customize");

