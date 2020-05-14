<?php

/**
 * Pagination of type post 'property'
 */
function estateagency_property_pagination () {
    global $query;

    $big = 999999999;

    $args = [
        "type" => "array",
        "base" => str_replace($big, "%#%", get_pagenum_link($big)),
        "format" => "?paged=%#%",
        "current" => max(1, get_query_var("paged")),
    ];

    if (is_single() || is_tax("property_city")) {
        $args["total"] = $query->max_num_pages;
    }

    $pages = paginate_links($args);

    if ($pages === null) {
        return;
    }

    $output = '<div class="property-pagination">';

    foreach ($pages as $key => $value) {
        if (strpos($value, "next") !== false || strpos($value, "prev") !== false) {
            unset($pages[$key]);
        } else {
            if (strpos($value, "current") === false) {
                $output .= str_replace('class="page-numbers" ', '', $value);
            } else {
                $output .= $value;
            }
        }
    }

    $output .= '</div>';

	return $output;
}



/**
 * Pagination of posts 
 */
function estateagency_loadmore_ajax_handler () : void
{
    $args = json_decode(stripslashes($_POST["query"]), true);
    $args["paged"] = $_POST["page"] + 1;
    $args["post_status"] = "publish";

    query_posts($args);

    if (have_posts()) :
        while (have_posts()) : the_post();
            get_template_part("template-parts/posts/post-card");
        endwhile;
    endif;
    die; // here we exit the script and even no wp_reset_query() required!
}



add_action("wp_ajax_loadmore", "estateagency_loadmore_ajax_handler");
add_action("wp_ajax_nopriv_loadmore", "estateagency_loadmore_ajax_handler");