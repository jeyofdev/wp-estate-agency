<?php

require_once "inc/supports.php";
require_once "inc/assets.php";
require_once "inc/menus.php";
require_once "inc/images.php";
require_once "inc/text.php";
require_once "inc/post-types.php";
require_once "inc/forms.php";
require_once "inc/comments.php";
require_once "inc/customize.php";
require_once "inc/admin.php";

require_once "class/helpers/class_estateagency_format_helpers.php";
require_once "class/options/class_estateagency_option_agency.php";
require_once "class/class_estateagency_title.php";
require_once "class/walkers/class_estateagency_comment_walker.php";
require_once "class/walkers/class_estateagency_contract_types_radio_walker.php";

EstateAgencyOptionAgency::register();



/**
 * Check if a specification of the property exists
 */
function estateagency_check_specification_exist (?string $fieldToCheck, string $fieldToReturn) : string
{
    $unit = null;

    if ($fieldToReturn === "garage_size") {
        $unit = __(" sqft", "estateagency");
    }
    if (get_sub_field($fieldToCheck) !== "no") {
        $value = '<td class="p-value">' . get_sub_field($fieldToReturn) . $unit . '</td>';
    } else {
        $value = '<td class="p-value">0</td>';
    }

    return $value;
}



/**
 * Display the title and the sub-title of a section
 *
 * @param string $fieldTitle name of the field title
 * @param string $fieldSubtitle name of the field subtitle
 * 
 * @return string
 */
function get_title_section (string $fieldTitle, string $fieldSubtitle) : string
{
    $output = '<div class="section-title">';
    $output .= '<span>' . get_field($fieldSubtitle) . '</span>';
    $output .= '<h2>' . get_field($fieldTitle) . '</h2>';
    $output .= '</div>';

    return $output;
}