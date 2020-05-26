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
            "not_found_in_trash"       => __("No properties found in trash.", "estateagency"),
            "all_items"                => __("All properties", "estateagency")
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
            "not_found_in_trash"       => __("No agents found in trash.", "estateagency"),
            "all_items"                => __("All agents", "estateagency")
        ],
        "public" => true,
        "hierarchical" => false,
        "exclude_from_search" => true,
        "menu_position" => 30,
        "menu_icon" => "dashicons-buddicons-buddypress-logo",
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_rest" => false,
        "taxonomies" => [],
        "has_archive" => false,
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
            "not_found_in_trash"       => __("No partners found in trash.", "estateagency"),
            "all_items"                => __("All partners", "estateagency")
        ],
        "public" => true,
        "hierarchical" => false,
        "exclude_from_search" => true,
        "menu_position" => 40,
        "menu_icon" => "dashicons-portfolio",
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_rest" => false,
        "taxonomies" => [],
        "has_archive" => false,
    ]);



    register_post_type("skill", [
        "label" => __("Skill", "estateagency"),
        "labels" => [
            "name"                     => __("Skills", "estateagency"),
            "singular_name"            => __("Skill", "estateagency"),
            "edit_item"                => __("Edit skill", "estateagency"),
            "new_item"                 => __("New skill", "estateagency"),
            "view_item"                => __("View skill", "estateagency"),
            "view_items"               => __("View skills", "estateagency"),
            "search_items"             => __("Search skills", "estateagency"),
            "not_found"                => __("No skills found.", "estateagency"),
            "not_found_in_trash"       => __("No skills found in Trash.", "estateagency"),
            "all_items"                => __("All skills", "estateagency")
        ],
        "public" => true,
        "hierarchical" => false,
        "exclude_from_search" => true,
        "menu_position" => 41,
        "menu_icon" => "dashicons-lightbulb",
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_rest" => false,
        "taxonomies" => [],
        "has_archive" => false,
    ]);



    register_post_type("testimonial", [
        "label" => __("Testimonial", "estateagency"),
        "labels" => [
            "name"                     => __("Testimonials", "estateagency"),
            "singular_name"            => __("Testimonial", "estateagency"),
            "edit_item"                => __("Edit testimonial", "estateagency"),
            "new_item"                 => __("New testimonial", "estateagency"),
            "view_item"                => __("View testimonial", "estateagency"),
            "view_items"               => __("View testimonials", "estateagency"),
            "search_items"             => __("Search testimonials", "estateagency"),
            "not_found"                => __("No testimonials found.", "estateagency"),
            "not_found_in_trash"       => __("No testimonials found in Trash.", "estateagency"),
            "all_items"                => __("All testimonials", "estateagency")
        ],
        "public" => true,
        "hierarchical" => false,
        "exclude_from_search" => true,
        "menu_position" => 42,
        "menu_icon" => "dashicons-format-status",
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_rest" => false,
        "taxonomies" => [],
        "has_archive" => false,
    ]);
}



add_action("init", "estateagency_add_post_type");