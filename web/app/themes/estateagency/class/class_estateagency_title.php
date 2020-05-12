<?php

/**
 * Class that manages the title of the pages
 */
class EstateAgencyTitle {
    /**
     * @var string
     */
    private static $pageTitle;



    /**
     * Get the page title
     */
    public static function get_page_title () : ?string
    {
        self::set_page_title();
        return self::$pageTitle;
    }



    /**
     * Get the breadcrumb title
     */
    public static function get_page_breadcrumb () : ?string
    {
        self::set_page_breadcrumb();
        return self::$pageTitle;
    }



    /**
     * Get the page title
     */
    private static function set_page_title () : void
    {
        if (is_home()) {
            self::$pageTitle = single_post_title();
        } elseif (is_category()) {
            self::$pageTitle = single_cat_title(__("Articles of the category : ", "estateagency"));
        } elseif (is_tag()) {
            self::$pageTitle = single_tag_title(__("Articles of the tag : ", "estateagency"));
        } elseif (is_singular("agent")) {
            self::$pageTitle = single_post_title(__("Properties managed by the agent : ", "estateagency"));
        } else {
            self::$pageTitle = get_the_title();
        }
    }



    /**
     * Set the breadcrumb title
     */
    private static function set_page_breadcrumb () : void
    {
        if (is_front_page()) {
            self::$pageTitle = null;
        } else if (is_home()) {
            self::$pageTitle = __("Blog Default", "estateagency");
        } else if (is_category()) {
            self::$pageTitle = self::AddBreadcrumbMultiple ("News", "Category", "category_name");
        } else if (is_tag()) {
            self::$pageTitle = self::AddBreadcrumbMultiple ("News", "Tag", "tag");
        } elseif (is_singular("agent")) {
            self::$pageTitle = self::AddBreadcrumbMultiple ("Agent", null, "agent");
        }else {
            self::$pageTitle = get_the_title();
        }
    }



    /**
     * Set breadcrumb on multiple levels
     *
     * @param string $page the name of the page
     * @param string $levelTitleOne The term type
     * @param string $key the url parameter key to retrieve
     * 
     * @return string
     */
    private static function AddBreadcrumbMultiple (string $page, ?string $levelTitleOne, string $key) : string
    {
        global $wp_query;

        $title = '<a href="' . get_page_link(get_option("page_for_posts")) . '">' . $page . '</a>';
        $title .= '</span>';

        if (!is_null($levelTitleOne)) {
            $title .= "<span>" . __("{$levelTitleOne} ", "estateagency") . "</span>";
        }

        $title .= " <span>" . ucfirst(str_replace("-", " ", $wp_query->query_vars[$key]));

        return $title;
    }
}
