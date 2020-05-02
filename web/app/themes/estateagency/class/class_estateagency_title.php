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
        } else {
            self::$pageTitle = get_the_title();
        }
    }
}
