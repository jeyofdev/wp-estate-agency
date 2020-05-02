<?php

/**
 * Set thumbnail size
 */
function estateagency_image_size () : void
{
    set_post_thumbnail_size(360, 253, true);
    add_image_size("post_single_thumbnail", 1920, 400, true);
    add_image_size("post_thumbnail_featured_image", 555, 253, true);
}

add_action("after_setup_theme", "estateagency_image_size");



/**
 * Set the thumbnails size to use for posts
 */
function estateagency_post_thumbnail (string $size = "post-thumbnail", int $width, int $height) : string
{
    global $post;

    if (has_post_thumbnail()) {
        $postThumbnail = get_the_post_thumbnail($post->ID, $size);
    } else {
        $postThumbnail = '<img width="' . $width . '" height="' . $height . '" src="' . get_template_directory_uri() . '/assets/images/blog/default.jpg">';
    }


    return $postThumbnail;
}