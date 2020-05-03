<?php

/**
 * Add custom columns in the properties list of the administration
 */
function estateagency_add_custom_columns_property ($columns) : array
{
    return [
        "cb" => $columns["cb"],
        "thumbnail" => __("Thumbnail", "estateagency"),
        "title" => $columns["title"],
        "agent" => __("Agent", "estateagency"),
        "contract_type" => __("Contract type", "estateagency"),
        "date" => $columns["date"],
    ];
}



/**
 * Set the content of custom columns in the properties list of the administration
 */
function estateagency_add_custom_columns_property_content ($column, $postId) : void
{
    if ($column === "thumbnail") {
        the_post_thumbnail("property_thumbnail_admin", $postId);
    }
    elseif ($column === "agent") {
        $terms = get_the_terms($postId, "property_agent");
        foreach ($terms as $term) {
            echo $term->name;
        }
    }
    elseif ($column === "contract_type") {
        $terms = get_the_terms($postId, "property_contract_type");
        foreach ($terms as $term) {
            echo $term->name;
        }
    }
}



add_filter("manage_property_posts_columns", "estateagency_add_custom_columns_property");
add_filter("manage_property_posts_custom_column", "estateagency_add_custom_columns_property_content", 10, 2);