<?php

/**
 * Create custom post types
 */
function estateagency_add_post_type () : void
{
    register_post_type("property", [
        "label" => __("Property", "estateagency"),
        "labels" => [
            "name"                     => __("Properties", "estateagency"),
            "singular_name"            => __("Property", "estateagency"),
            "edit_item"                => __("Edit property", "estateagency"),
            "new_item"                 => __("New property", "estateagency"),
            "view_item"                => __("View property", "estateagency"),
            "view_items"               => __("View properties", "estateagency"),
            "search_items"             => __("Search properties", "estateagency"),
            "not_found"                => __("No properties found.", "estateagency"),
            "not_found_in_trash"       => __("No properties found in Trash", "estateagency"),
            "all_items"                => __("All properties", "estateagency"),
            "archives"                 => __("Property archive", "estateagency"),
            "attributes"               => __("Property attributes", "estateagency"),
            "insert_into_item"         => __("Insert into property", "estateagency"),
            "uploaded_to_this_item"    => __("Uploaded to this property", "estateagency"),
            "filter_items_list"        => __("Filter properties list", "estateagency"),
            "items_list_navigation"    => __("Properties list navigation", "estateagency"),
            "items_list"               => __("Properties list", "estateagency"),
            "item_published"           => __("Property published.", "estateagency"),
            "item_published_privately" => __("Property published privately.", "estateagency"),
            "item_reverted_to_draft"   => __("Property reverted to draft.", "estateagency"),
            "item_scheduled"           => __("Property scheduled.", "estateagency"),
            "item_updated"             => __("Property updated.", "estateagency"),
        ],
        "public" => true,
        "hierarchical" => false,
        "exclude_from_search" => true,
        "menu_position" => 3,
        "menu_icon" => "dashicons-admin-multisite",
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_rest" => false,
        "taxonomies" => ["property_contract_type", "property_type", "property_agent"],
        "has_archive" => true,
    ]);



    register_post_type("agent", [
        "label" => __("Agent", "estateagency"),
        "labels" => [
            "name"                     => __("Agents", "estateagency"),
            "singular_name"            => __("Agent", "estateagency"),
            "edit_item"                => __("Edit agent", "estateagency"),
            "new_item"                 => __("New agent", "estateagency"),
            "view_item"                => __("View agent", "estateagency"),
            "view_items"               => __("View agents", "estateagency"),
            "search_items"             => __("Search agents", "estateagency"),
            "not_found"                => __("No agents found.", "estateagency"),
            "not_found_in_trash"       => __("No agents found in Trash", "estateagency"),
            "all_items"                => __("All agents", "estateagency"),
            "archives"                 => __("Agent archive", "estateagency"),
            "attributes"               => __("Agent attributes", "estateagency"),
            "insert_into_item"         => __("Insert into agent", "estateagency"),
            "uploaded_to_this_item"    => __("Uploaded to this agent", "estateagency"),
            "filter_items_list"        => __("Filter agents list", "estateagency"),
            "items_list_navigation"    => __("Agents list navigation", "estateagency"),
            "items_list"               => __("Agents list", "estateagency"),
            "item_published"           => __("Agent published.", "estateagency"),
            "item_published_privately" => __("Agent published privately.", "estateagency"),
            "item_reverted_to_draft"   => __("Agent reverted to draft.", "estateagency"),
            "item_scheduled"           => __("Agent scheduled.", "estateagency"),
            "item_updated"             => __("Agent updated.", "estateagency"),
        ],
        "public" => true,
        "hierarchical" => false,
        "exclude_from_search" => true,
        "menu_position" => 30,
        "menu_icon" => "dashicons-buddicons-buddypress-logo",
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_rest" => false,
        "taxonomies" => [],
        "has_archive" => true,
    ]);



    register_post_type("partner", [
        "label" => __("Agent", "estateagency"),
        "labels" => [
            "name"                     => __("Partners", "estateagency"),
            "singular_name"            => __("Partner", "estateagency"),
            "edit_item"                => __("Edit partner", "estateagency"),
            "new_item"                 => __("New partner", "estateagency"),
            "view_item"                => __("View partner", "estateagency"),
            "view_items"               => __("View partners", "estateagency"),
            "search_items"             => __("Search partners", "estateagency"),
            "not_found"                => __("No partners found.", "estateagency"),
            "not_found_in_trash"       => __("No partners found in Trash", "estateagency"),
            "all_items"                => __("All partners", "estateagency"),
            "archives"                 => __("Partner archive", "estateagency"),
            "attributes"               => __("Partner attributes", "estateagency"),
            "insert_into_item"         => __("Insert into partner", "estateagency"),
            "uploaded_to_this_item"    => __("Uploaded to this partner", "estateagency"),
            "filter_items_list"        => __("Filter partners list", "estateagency"),
            "items_list_navigation"    => __("Partners list navigation", "estateagency"),
            "items_list"               => __("Partners list", "estateagency"),
            "item_published"           => __("Partner published.", "estateagency"),
            "item_published_privately" => __("Partner published privately.", "estateagency"),
            "item_reverted_to_draft"   => __("Partner reverted to draft.", "estateagency"),
            "item_scheduled"           => __("Partner scheduled.", "estateagency"),
            "item_updated"             => __("Partner updated.", "estateagency"),
        ],
        "public" => true,
        "hierarchical" => false,
        "exclude_from_search" => true,
        "menu_position" => 40,
        "menu_icon" => "dashicons-portfolio",
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_rest" => false,
        "taxonomies" => [],
        "has_archive" => true,
    ]);


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
            "separate_items_with_commas" => __( "Separate Contract types with commas", "estateagency"),
            "add_or_remove_items"        => __( "Add or remove Contract types", "estateagency"),
            "choose_from_most_used"      => __( "Choose from the most used Contract types", "estateagency"),
            "not_found"                  => __( "No Contract types found.", "estateagency"),
            "no_terms"                   => __( "No Contract types", "estateagency"),
            "items_list_navigation"      => __( "Contract types list navigation", "estateagency"),
            "items_list"                 => __( "Contract types list", "estateagency"),
            "back_to_items"              => __( "&larr; Back to Contract types", "estateagency"),
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
            "new_item_name"              => __( "New Type Name", "estateagency"),
            "separate_items_with_commas" => __( "Separate Types with commas", "estateagency"),
            "add_or_remove_items"        => __( "Add or remove Types", "estateagency"),
            "choose_from_most_used"      => __( "Choose from the most used Types", "estateagency"),
            "not_found"                  => __( "No Types found.", "estateagency"),
            "no_terms"                   => __( "No Types", "estateagency"),
            "items_list_navigation"      => __( "Types list navigation", "estateagency"),
            "items_list"                 => __( "Types list", "estateagency"),
            "back_to_items"              => __( "&larr; Back to Types", "estateagency"),
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
            "new_item_name"              => __( "New Agent Name", "estateagency"),
            "separate_items_with_commas" => __( "Separate Agents with commas", "estateagency"),
            "add_or_remove_items"        => __( "Add or remove Agents", "estateagency"),
            "choose_from_most_used"      => __( "Choose from the most used Agents", "estateagency"),
            "not_found"                  => __( "No Agents found.", "estateagency"),
            "no_terms"                   => __( "No Agents", "estateagency"),
            "items_list_navigation"      => __( "Agents list navigation", "estateagency"),
            "items_list"                 => __( "Agents list", "estateagency"),
            "back_to_items"              => __( "&larr; Back to Agents", "estateagency"),
        ],
        "hierarchical" => true,
        "meta_box_cb" => "post_categories_meta_box"
    ]);
}



add_action("init", "estateagency_add_post_type");