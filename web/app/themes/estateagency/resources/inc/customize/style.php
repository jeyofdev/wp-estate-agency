<?php

function estateagency_custom_styles (string $custom)
{
    $custom = '';

    // background color primary
    $custom .= estateagency_generate_styles("background_color_primary", "background-color", "body");

    // background color secondary
    $custom .= estateagency_generate_styles("background_color_secondary", "background-color", [
        "section.secondary"
    ]);

    // primary color
    $custom .= estateagency_generate_styles("color_primary", "background-color", [
        ".top-nav .top-right .property-sub",
        ".search-form-text .search-text",
        ".filter-form .sidebar-btn label",
        ".filter-form .row button.search-btn",
        ".section-title h2:after",
        ".feature-carousel .feature-item .fi-pic .s-text a",
        ".feature-carousel.owl-carousel .owl-dots button.owl-dot.active",
        ".video-text .play-btn",
        ".top-properties-carousel .single-top-properties .stp-text .s-text a",
        ".testimonial-slider.owl-carousel .owl-dots button.owl-dot.active",
        ".site-btn",
        ".primary-btn",
        ".pd-details-text .property-contactus .agent-contact-form input[type=submit]",
        ".bd-hero-text span",
        ".blog-details-social .social-list a:hover",
        ".blog-details-content .wp-block-quote:before",
        ".tag-share-option .tags a",
        ".comment-option .single-comment-item .sc-text .comment-btn:hover",
        ".property-sidebar .sidebar-btn label",
        ".property-sidebar .sidebar-search button.search-btn",
        ".property-list .single-property-item .property-text .s-text a",
        ".property-pagination a:hover",
        ".property-pagination span.current",
        ".pd-details-text .pd-details-social a:hover",
        ".pd-details-text .pd-details-tab .tab-item ul li a.active"
    ]);

    $custom .= estateagency_generate_styles("color_primary", "color", [
        "a",
        ".nav-logo .nav-logo-right ul li i",
        ".single-hero-item .hero-text .room-location i",
        ".feature-carousel .feature-item .fi-text .inside-text ul li i",
        ".feature-carousel .feature-item .fi-text .room-features li i",
        ".top-properties-section .top-property-all",
        ".top-properties-carousel .single-top-properties .stp-text .properties-location i",
        ".top-properties-carousel .single-top-properties .stp-text .room-features li i",
        ".single-blog-item .sb-text ul li i",
        ".footer-text .footer-widget ul li i",
        ".breadcrumb-text .breadcrumb-option a i",
        ".testimonial-slider .ts-item .ti-author h5",
        ".bd-hero-text ul li i",
        ".tag-share-option .social-share a:hover",
        ".comment-option .single-comment-item .sc-text span",
        ".comment-respond .comment-form a:hover",
        ".blog-details-section .single-blog-item:hover .sb-text h4 a",
        ".property-sidebar .best-agents .ba-item .ba-text p",
        ".property-list .single-property-item .property-text .properties-location i",
        ".pd-hero-text .room-location i",
        ".pd-hero-text .room-features li i",
        ".copyright-text p a",
        ".top-nav .main-menu ul li a:hover",
        ".top-nav .main-menu ul li.active a"
    ]);

    $custom .= estateagency_generate_styles("color_primary", "border-color", [
        ".filter-form .row button.search-btn",
        ".feature-carousel.owl-carousel .owl-dots button.owl-dot.active",
        ".top-properties-section .top-property-all",
        ".site-btn",
        ".contact-text form.contact-form input[type=submit]",
        ".comment-option .single-comment-item .sc-text .comment-btn:hover",
        ".property-sidebar .sidebar-search button.search-btn",
        ".pd-details-text .pd-details-social a:hover"
    ]);

    // color secondary
    $custom .= estateagency_generate_styles("color_secondary", "background-color", [
        ".feature-carousel .feature-item .fi-pic .f-text"
    ]);

    // headings color
    $custom .= estateagency_generate_styles("color_headings", "color", [
        "h1", "h2", "h3", "h4", "h5", "h6",
        ".contact-section .section-title h2",
        ".blog-details-section .section-title h2",
        ".about-section .section-title h2",
        ".about-section .about-text h4",
        ".section-title h2",
        ".top-properties-carousel .single-top-properties .stp-text h2"
    ]);

    // headings color secondary
    $custom .= estateagency_generate_styles("color_secondary_headings", "color", [
        "h1.secondary",
        "h2.secondary",
        "h3.secondary",
        "h4.secondary",
        "h5.secondary",
        "h6.secondary",
        ".footer-text .footer-widget h4",
        ".testimonial-section .section-title h2",
        ".about-section .video-text h4",
        ".single-hero-item .hero-text h2",
        ".testimonial-slider .ts-item p",
    ]);

    // Text color
    $custom .= estateagency_generate_styles("color_content", "color", [
        ".single-howit-works p",
        ".single-top-properties p",
        ".property-section .property-list p",
        ".property-details-section p",
        ".about-section p",
        ".blog-details-section p",
        ".blog-details-content .wp-block-quote p"
    ]);


	//Output all the styles
	wp_add_inline_style("estateagency_styles", $custom);
}



/**
 * Generate css styles
 *
 * @param string        $option
 * @param string|array  $selectors
 * 
 * @return string
 */
function estateagency_generate_styles (string $option, string $propertyCss, $selectors) : string
{
    $customize = get_theme_mod($option, estateagency_options($option));

    $selectorsList = is_array($selectors) ? implode(", ", $selectors) : $selectors;
    $styles = $selectorsList . " { " . $propertyCss . ": " . esc_attr($customize) . " }" . "\n";

    return $styles;
}



add_action("wp_enqueue_scripts", "estateagency_custom_styles");
