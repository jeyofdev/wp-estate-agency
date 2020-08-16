<?php

/**
 * Class that manages the display format
 */
class EstateAgencyFormatHelpers 
{
    /**
     * Format address
     */
    public static function format_address () : string
    {
        $address = get_option(EstateagencyOptionAgency::ADDRESS);

        $address = str_replace(",", null, $address);
    
        $parts = explode(" ", $address);
    
        $city = array_pop($parts);
        $newAddress = implode(" ", $parts);
    
        return "{$newAddress}, <span>{$city}</span>";
    }



    /**
     * Format phone number
     */
    public static function format_phone_number () : string
    {
        $phoneNumber = get_option(EstateagencyOptionAgency::PHONE);
        $prefix = 33;
    
        $parts = explode(" ", $phoneNumber);
        $firstNum = array_shift($parts);
    
        $firstNum = substr($firstNum, 1);
        $othersNum = implode(" ", $parts);
    
        return "(+{$prefix}) {$firstNum} {$othersNum}";
    }



    /**
     * Format date
     */
    public static function format_date () : string
    {
        return sprintf("%s", get_the_date("jS M, Y"));
    }



    /**
     * Format Price
     *
     * @return string|null
     */
    public static function format_price(): ?string
    {
        $price = number_format_i18n(get_field("price"));
        return $price;
    }



    /**
     * Format opening hours
     */
    public static function format_opening_hours () : string
    {
        $openingHours = get_option(EstateagencyOptionAgency::OPENING_HOURS);
        $characterToDelete = ["-", "_"];

        $parts = explode(" ", $openingHours);
        foreach ($parts as $k => $v) {
            if (in_array($v, $characterToDelete)) {
                unset($parts[$k]);
            } else {
                $newParts[] = $v;
            }
        }
        
        $dayFirst = substr($newParts[0], 0, 3);
        $daySecond = substr($newParts[1], 0, 3);

        if (get_locale() === "en_US" || get_locale() === "en_EN") {
            $openingHours = $dayFirst . " - " . $daySecond . ", " . $newParts[2] . " " . strtoupper($newParts[3]) . " - " . strtoupper($newParts[4]) . " " . strtoupper($newParts[5]);
        } else {
            $openingHours = $dayFirst . " - " . $daySecond . ", " . $newParts[2] . "h - " . $newParts[4] . "h";
        }
        

        return $openingHours;
    }
}