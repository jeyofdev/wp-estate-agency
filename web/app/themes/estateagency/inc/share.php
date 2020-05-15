<?php

/**
 * Delete display of social networks on default locations
 */
function estateagency_remove_share () : void
{
    remove_filter("the_content", "sharing_display", 19);
    remove_filter("the_excerpt", "sharing_display", 19);
}



/**
 * Filter the sharing buttons headline structure
 */
function estateagency_jetpackcom_custom_heading($headline) : string
{
    $headline = "<span>%s</span>";

    return $headline;
}



/**
 * Change the share links icon
 */
function estateagency_jetpack_developer_custom_sharing_link ($classes) : array
{
    $socialName = str_replace("share-", "", $classes[0]);

    if (strpos($socialName, "custom") !== false) {
        $socialName = str_replace("custom custom-", "", $socialName);
    }

    $particularCase = [
        "facebook",
        "pinterest"
    ];
    
    if (in_array($socialName, $particularCase)) {
        $firstLetter = substr($socialName, 0, 1);
        $classes[] = "fab fa-{$socialName}-{$firstLetter}";
    } else if ($socialName === "print") {
        $classes[] = "fas fa-{$socialName}";
    } else {
        $classes[] = "fab fa-{$socialName}";
    }

    return $classes;
}



/**
 * Change the structure of share links
 */
function estateagency_jetpack_structure_sharing_link ($sharing_content) {
    $parts = explode(">", $sharing_content);

    $sharing_content = [];
    foreach ($parts as $part) {
        if (strpos($part, "<a rel") !== false) {
            $sharing_content[] = $part . "></a>";
        }
    }

    return implode("", $sharing_content);
}



add_action("loop_start", "estateagency_remove_share");
add_filter("jetpack_sharing_headline_html", "estateagency_jetpackcom_custom_heading", 10, 3 );
add_filter("jetpack_sharing_display_classes", "estateagency_jetpack_developer_custom_sharing_link", 20, 4 );
add_filter("jetpack_sharing_display_markup", "estateagency_jetpack_structure_sharing_link");