<?php

/**
 * Create custom post types
 */
function estateagency_add_taxonomy () : void
{
    register_taxonomy("property_contract_type", "property", [
        "labels" => [
            "name"                       => __( "Contract types", "estateagency"),
            "singular_name"              => __( "Contract type", "estateagency"),
            "search_items"               => __( "Search Contract types", "estateagency"),
            "popular_items"              => __( "Popular Contract types", "estateagency"),
            "all_items"                  => __( "All Contract types", "estateagency"),
            "edit_item"                  => __( "Edit Contract type", "estateagency"),
            "view_item"                  => __( "View Contract type", "estateagency"),
            "update_item"                => __( "Update Contract type", "estateagency"),
            "add_new_item"               => __( "Add New Contract type", "estateagency"), 
            "new_item_name"              => __( "New Contract type Name", "estateagency"),
            "not_found"                  => __( "No Contract types found.", "estateagency"),
            "no_terms"                   => __( "No Contract types", "estateagency"),
            "back_to_items"              => __( "&larr; Back to Contract types", "estateagency")
        ],
        "hierarchical" => true,
        "meta_box_cb" => "post_categories_meta_box"
    ]);


    register_taxonomy("property_type", "property", [
        "labels" => [
            "name"                       => __( "Types", "estateagency"),
            "singular_name"              => __( "Type", "estateagency"),
            "search_items"               => __( "Search Types", "estateagency"),
            "popular_items"              => __( "Popular Types", "estateagency"),
            "all_items"                  => __( "All Types", "estateagency"),
            "edit_item"                  => __( "Edit Type", "estateagency"),
            "view_item"                  => __( "View Type", "estateagency"),
            "update_item"                => __( "Update Type", "estateagency"),
            "add_new_item"               => __( "Add New Type", "estateagency"),
            "not_found"                  => __( "No Types found.", "estateagency"),
            "no_terms"                   => __( "No Types", "estateagency"),
            "back_to_items"              => __( "&larr; Back to Types", "estateagency")
        ],
        "hierarchical" => true,
        "meta_box_cb" => "post_categories_meta_box"
    ]);


    register_taxonomy("property_agent", "property", [
        "labels" => [
            "name"                       => __( "Agents", "estateagency"),
            "singular_name"              => __( "Agent", "estateagency"),
            "search_items"               => __( "Search Agents", "estateagency"),
            "popular_items"              => __( "Popular Agents", "estateagency"),
            "all_items"                  => __( "All Agents", "estateagency"),
            "edit_item"                  => __( "Edit Agent", "estateagency"),
            "view_item"                  => __( "View Agent", "estateagency"),
            "update_item"                => __( "Update Agent", "estateagency"),
            "add_new_item"               => __( "Add New Agent", "estateagency"),
            "not_found"                  => __( "No Agents found.", "estateagency"),
            "no_terms"                   => __( "No Agents", "estateagency"),
            "back_to_items"              => __( "&larr; Back to Agents", "estateagency")
        ],
        "hierarchical" => true,
        "meta_box_cb" => "post_categories_meta_box"
    ]);


    register_taxonomy("property_city", "property", [
        "labels" => [
            "name"                       => __( "Cities", "estateagency"),
            "singular_name"              => __( "Cities", "estateagency"),
            "search_items"               => __( "Search Cities", "estateagency"),
            "popular_items"              => __( "Popular Cities", "estateagency"),
            "all_items"                  => __( "All Cities", "estateagency"),
            "edit_item"                  => __( "Edit City", "estateagency"),
            "view_item"                  => __( "View City", "estateagency"),
            "update_item"                => __( "Update City", "estateagency"),
            "add_new_item"               => __( "Add New City", "estateagency"),
            "not_found"                  => __( "No Cities found.", "estateagency"),
            "no_terms"                   => __( "No Cities", "estateagency"),
            "back_to_items"              => __( "&larr; Back to Cities", "estateagency")
        ],
        "hierarchical" => true,
        "meta_box_cb" => "post_categories_meta_box",
        "has_archive" => true,
        "rewrite" => [
            "slug" => _x("city", "URL", "estateagency")
        ],
    ]);
}



add_action("init", "estateagency_add_taxonomy");