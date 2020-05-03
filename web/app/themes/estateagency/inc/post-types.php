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
        "taxonomies" => [],
        "has_archive" => true,
    ]);
}



add_action("init", "estateagency_add_post_type");