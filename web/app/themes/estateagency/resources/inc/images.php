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
    add_image_size("testimonial_background", 1920, 540, true);
    add_image_size("testimonial_video_background", 1140, 500, true);
    add_image_size("home_testimonial_video_background", 1920, 500, true);
    add_image_size("property_agent_sidebar", 100, 80, true);
    add_image_size("footer_background", 1920, 400, true);
    add_image_size("property_gallery_large", 850, 405, true);
    add_image_size("property_gallery_thumbnail", 162, 113, true);
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



/**
 * Display the gallery of the single property
 */
function estateagency_property_single_slider () : ?string
{
    $output = '<div class="property-more-pic">';
        $output .= '<div class="product-pic-zoom">';
            $output .= '<img class="product-big-img" src="' . get_sub_field("image_1")["sizes"]["property_gallery_large"] . '" alt="">';
        $output .= '</div>';
        $output .= '<div class="product-thumbs">';
            $output .= '<div class="product-thumbs-track ps-slider owl-carousel">';

    $num = 0;
    $thumbs = [];
    
    foreach (get_row() as $row) {
        $num += 1;

        if ($row !== '') {
            $thumbs[$num] = '<div class="pt" data-imgbigurl="' . get_sub_field("image_" . $num)["sizes"]["property_gallery_large"] . '">';
            $thumbs[$num] .= '<img src="' . get_sub_field("image_" . $num)["sizes"]["property_gallery_thumbnail"] . '" alt="">';
            $thumbs[$num] .= '</div>';
        }
    }

    $output .= implode('', $thumbs);
    $output .= '</div>';
    $output .= '</div>';
    $output .= '</div>';

    return $output;
}