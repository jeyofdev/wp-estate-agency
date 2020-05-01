<?php

/**
 * Register and enqueue styles & scripts
 */
function estateagency_assets () : void
{
    wp_enqueue_style("estateagency_styles", get_template_directory_uri() . "/assets/styles/app.css");
    wp_enqueue_script("estateagency_script", get_template_directory_uri() . "/assets/scripts/app.js", [], false, true);
}



add_action("wp_enqueue_scripts", "estateagency_assets");
