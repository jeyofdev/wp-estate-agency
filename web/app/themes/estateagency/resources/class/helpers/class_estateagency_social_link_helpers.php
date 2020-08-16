<?php

/**
 * Class that manages the social links
 */
class EstateAgencySocialLinkHelpers 
{
    CONST SOCIAL_URLS = [
        "facebook" => "https://www.facebook.com/",
        "twitter" => "https://twitter.com/",
        "instagram" => "https://www.instagram.com/"
    ];



    /**
     * Format social link
     */
    public static function get_social_link (string $rsName) : string
    {
        $socialPseudos = [
            "facebook" => get_option(EstateagencyOptionAgency::FACEBOOK),
            "twitter" => get_option(EstateagencyOptionAgency::TWITTER),
            "instagram" => get_option(EstateagencyOptionAgency::INSTAGRAM)
        ];

        $socialLink = "";

        foreach (self::SOCIAL_URLS as $k => $v) {
            if ($rsName === $k) {
                $socialLink .= $v;
            }
        }

        foreach ($socialPseudos as $k => $v) {
            if (substr($v, -1) === "/") {
                $v = substr($v, 0, -1);
            }

            if ($rsName === $k) {
                $pos = strrpos($v, "/", 0);
                $pseudo = substr($v, $pos + 1);
                $socialLink .= $pseudo;
            }
        }

        return $socialLink;
    }
}