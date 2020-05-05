<?php

/**
 * Set thumbnail size
 */
function estateagency_image_size () : void
{
    set_post_thumbnail_size(360, 253, true);
    add_image_size("post_single_thumbnail", 1920, 400, true);
    add_image_size("post_thumbnail_featured_image", 555, 253, true);
    add_image_size("property_thumbnail_admin", 100, 100, true);
    add_image_size("property_thumbnail", 262, 280, true);
    add_image_size("top_property_home_thumbnail", 555, 380, true);
    add_image_size("property_single_thumbnail", 1920, 500, true);
    add_image_size("property_single_agent", 336, 224);
    add_image_size("agent_slider_thumbnail", 200, 200, true);
    add_image_size("partner_thumbnail", 65, 65, true);
    add_image_size("property_feature_thumbnail", 360, 220, true);
    add_image_size("property_feature_agent_thumbnail", 36, 36, true);
    add_image_size("skill_thumbnail", 100, 100, true);
    add_image_size("property_home_hero_large_thumbnail", 1920, 750, true);
    add_image_size("property_home_hero_thumbnail", 164, 94, true);
}



add_action("after_setup_theme", "estateagency_image_size");



/**
 * Set the thumbnails size to use for posts
 */
function estateagency_post_thumbnail (WP_POST $post, string $size = "post-thumbnail", int $width, int $height, ?string $imageDefaultFolder = "blog") : string
{
    if (has_post_thumbnail($post->ID)) {
        $postThumbnail = get_the_post_thumbnail($post->ID, $size);
    } else {
        $postThumbnail = '<img width="' . $width . '" height="' . $height . '" src="' . get_template_directory_uri() . '/assets/images/' . $imageDefaultFolder . '/default.jpg">';
    }


    return $postThumbnail;
}



/**
 * Set the thumbnail for single post & property
 */
function estateagency_post_thumbnail_background (WP_POST $post, ?string $size = "post_single_thumbnail", ?string $imageDefaultFolder = "blog") : ?string
{
    if (has_post_thumbnail()) {
        $thumbnail = get_the_post_thumbnail_url($post->ID, $size);
    } else {
        $thumbnail = get_template_directory_uri() . "/assets/images/" . $imageDefaultFolder . "/default.jpg";
    }

    return $thumbnail;
}