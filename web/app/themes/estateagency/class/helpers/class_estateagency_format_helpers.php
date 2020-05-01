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
}