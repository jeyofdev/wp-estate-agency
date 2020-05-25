(function ($) {

    /**
     * Generate css styles
     * 
     * @param {string}        option 
     * @param {string|array}  selectors 
     * @param {string}        propertyCss 
     */
    let customize = (option, propertyCss, selectors) => {
        wp.customize(option, (value) => {
            value.bind( (val) => {
                const searchTerm = [":after", ":before", ":hover"];

                let pseudoElement = [];

                searchTerm.forEach(element => {
                    selectors.forEach(item => {
                        if (item.indexOf(element) !== -1) {
                            pseudoElement.push(item)
                        }
                    })
                })

                let selectorsList = Array.isArray(selectors) ? selectors.join(", ") : selectors;
                $(selectorsList).css(propertyCss, val);

                let selectorsWithPseudoElementList = pseudoElement.join(", ");
                $('<style>' + selectorsWithPseudoElementList + ' { ' + propertyCss + ': ' + val + ' }</style>').appendTo('head');
            });
        });
    }


    // background color primary
    customize("background_color_primary", "background-color", "body")


    // background color secondary
    customize("background_color_secondary", "background-color", [
        "section.secondary"
    ])


    // primary color
    customize("color_primary", "background-color", [
        ".top-nav .top-right .property-sub",
        ".search-form-text .search-text",
        ".filter-form .sidebar-btn .bt-item input[type=radio]:not(:checked) + label",
        ".filter-form .row button.search-btn",
        ".section-title h2:after",
        ".feature-carousel .feature-item .fi-pic .s-text a",
        ".feature-carousel.owl-carousel .owl-dots button.owl-dot.active",
        ".video-text .play-btn",
        ".top-properties-carousel .single-top-properties .stp-text .s-text a",
        ".testimonial-slider.owl-carousel .owl-dots button.owl-dot.active",
        ".site-btn",
        ".pd-details-text .property-contactus .agent-contact-form input[type=submit]",
        ".primary-btn",
        ".bd-hero-text span",
        ".blog-details-social .social-list a:hover",
        ".blog-details-content .wp-block-quote:before",
        ".tag-share-option .tags a",
        ".comment-option .single-comment-item .sc-text .comment-btn:hover",
        ".property-sidebar .sidebar-btn .bt-item input[type=radio]:not(:checked) + label",
        ".property-sidebar .sidebar-search button.search-btn",
        ".property-list .single-property-item .property-text .s-text a",
        ".property-pagination a:hover",
        ".property-pagination span.current",
        ".pd-details-text .pd-details-social a:hover",
        ".pd-details-text .pd-details-tab .tab-item ul li a.active"
    ])

    customize("color_primary", "color", [
        ".nav-logo .nav-logo-right ul li i",
        ".single-hero-item .hero-text .room-location i",
        ".feature-carousel .feature-item .fi-text .inside-text ul li i",
        ".feature-carousel .feature-item .fi-text .room-features li i",
        ".top-properties-section .top-property-all",
        ".top-properties-carousel .single-top-properties .stp-text .properties-location i",
        ".top-properties-carousel .single-top-properties .stp-text .room-features li i",
        ".single-blog-item .sb-text ul li i",
        ".footer-text .footer-widget ul:not(.social) li i",
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
    ])

    customize("color_primary", "border-color", [
        ".filter-form .row button.search-btn",
        ".feature-carousel.owl-carousel .owl-dots button.owl-dot.active",
        ".top-properties-section .top-property-all",
        ".site-btn",
        ".contact-text form.contact-form input[type=submit]",
        ".pd-details-text .property-contactus .agent-contact-form input[type=submit]",
        ".comment-option .single-comment-item .sc-text .comment-btn:hover",
        ".property-sidebar .sidebar-search button.search-btn",
        ".pd-details-text .pd-details-social a:hover"
    ])


    // headings color
    customize("color_headings", "color", [
        "h1", "h2", "h3", "h4", "h5", "h6",
        ".contact-section .section-title h2",
        ".blog-details-section .section-title h2",
        ".about-section .section-title h2",
        ".about-section .about-text h4",
        ".section-title h2",
        ".top-properties-carousel .single-top-properties .stp-text h2"
    ])


    // headings color secondary
    customize("color_secondary_headings", "color", [
        "h1.secondary",
        "h2.secondary",
        "h3.secondary",
        "h4.secondary",
        "h5.secondary",
        "h6.secondary",
        ".footer-text .footer-widget h4",
        ".testimonial-section .section-title h2",
        ".about-section .video-text h4",
        ".single-hero-item .hero-text h2"
    ])


    // Text color
    customize("color_content", "color", [
        ".single-howit-works p",
        ".single-top-properties p",
        ".property-section p",
        ".property-details-section p",
        ".about-section p",
        ".testimonial-slider .ts-item p",
        ".blog-details-section p",
        ".blog-details-content .wp-block-quote p"
    ])
})(jQuery);