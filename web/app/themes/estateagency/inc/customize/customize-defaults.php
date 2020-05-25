<?php

/**
 * Set the default values ​​of the customizer
 */
function estateagency_options (string $control)
{
	$defaults = array(
        "background_color_primary" => "#fff",
        "background_color_secondary" => "#f2f4f5",
		"color_primary" => "#2cbdb8",
		"color_headings" => "#19191a",
		"color_secondary_headings" => "#fff",
		"color_content" => "#707079"
	);

	// merge defaults and options
	$defaults = wp_parse_args(get_option("estateagency_options"), $defaults);

	return $defaults[$control];
}