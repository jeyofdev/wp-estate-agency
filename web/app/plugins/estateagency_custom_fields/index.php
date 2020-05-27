<?php

/**
 * Custom fields for theme 'estateagency'
 *
 * Plugin Name:  estateagency_custom_fields
 * Requires PHP: 7.1
 *
 */

use WordPlate\Acf\ConditionalLogic;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Location;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Number;
use WordPlate\Acf\Fields\Radio;
use WordPlate\Acf\Fields\Range;
use WordPlate\Acf\Fields\Select;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\Url;
use WordPlate\Acf\Fields\Wysiwyg;


defined("ABSPATH") or die("unauthorized");

if (!function_exists("register_extended_field_group")) {
    return;
}



/**
 * How It Work Section
 */
register_extended_field_group([
    "title" => "How It Work Section",
    "fields" => [
        Text::make(__("Title", "estateagency"), "work_title")->required(),
        Text::make(__("Subtitle", "estateagency"), "work_subtitle")->required()
    ],
    "location" => [
        Location::if("page_type", "==", "front_page")
    ],
    "menu_order" => 1,
	"position" => "normal",
	"style" => "default",
	"label_placement" => "left",
	"instruction_placement" => "label",
	"active" => true,
]);



/**
 * Featured Properties Section
 */
register_extended_field_group([
    "title" => "Featured Properties Section",
    "fields" => [
        Text::make(__("Title", "estateagency"), "featured_properties_title")->required(),
        Text::make(__("Subtitle", "estateagency"), "featured_properties_subtitle")->required(),
    ],
    "location" => [
        Location::if("page_type", "==", "front_page")
    ],
    "menu_order" => 2,
	"position" => "normal",
	"style" => "default",
	"label_placement" => "left",
	"instruction_placement" => "label",
	"active" => true,
]);



/**
 * Video Section
 */
register_extended_field_group([
    "title" => "Video Section",
    "fields" => [
        Text::make(__("Title", "estateagency"), "video_title")->required(),
        Text::make(__("Subtitle", "estateagency"), "video_subtitle")->required(),
        Image::make(__("Background", "estateagency"), "background_video")
            ->required()
            ->returnFormat("array")
            ->previewSize("testimonial_video_background")
            ->library("all"),
        Url::make(__("Video", "estateagency"), "video_url")->required()
    ],
    "location" => [
        Location::if("page_type", "==", "front_page"),
        Location::if("page_template", "==", "templates/template-about.php")
    ],
    "menu_order" => 0,
	"position" => "normal",
	"style" => "default",
	"label_placement" => "left",
	"instruction_placement" => "label",
	"active" => true,
]);



/**
 * Top Properties Section
 */
register_extended_field_group([
    "title" => "Top Properties Section",
    "fields" => [
        Text::make(__("Title", "estateagency"), "top_properties_title")->required(),
        Text::make(__("Subtitle", "estateagency"), "top_properties_subtitle")->required(),
        Text::make(__("Button label", "estateagency"), "top_properties_button_label")->required()
    ],
    "location" => [
        Location::if("page_type", "==", "front_page")
    ],
    "menu_order" => 4,
	"position" => "normal",
	"style" => "default",
	"label_placement" => "left",
	"instruction_placement" => "label",
	"active" => true,
]);



/**
 * Agents Section
 */
register_extended_field_group([
    "title" => "Agents Section",
    "fields" => [
        Text::make(__("Title", "estateagency"), "agents_title")->required(),
        Text::make(__("Subtitle", "estateagency"), "agents_subtitle")->required(),
    ],
    "location" => [
        Location::if("page_type", "==", "front_page"),
        Location::if("page_template", "==", "templates/template-about.php")
    ],
    "menu_order" => 5,
	"position" => "normal",
	"style" => "default",
	"label_placement" => "left",
	"instruction_placement" => "label",
	"active" => true,
]);



/**
 * Latest Posts Section
 */
register_extended_field_group([
    "title" => "Latest Posts Section",
    "fields" => [
        Text::make(__("Title", "estateagency"), "latest_posts_title")->required(),
        Text::make(__("Subtitle", "estateagency"), "latest_posts_subtitle")->required()
    ],
    "location" => [
        Location::if("page_type", "==", "front_page")
    ],
    "menu_order" => 6,
	"position" => "normal",
	"style" => "default",
	"label_placement" => "left",
	"instruction_placement" => "label",
	"active" => true,
]);



/**
 * Footer
 */
register_extended_field_group([
    "title" => "Footer",
    "fields" => [
        Text::make(__("Credit", "estateagency"), "credit")->required(),
        Image::make(__("Background", "estateagency"), "background-footer")
            ->required()
            ->returnFormat("array")
            ->previewSize("medium")
            ->library("all")
    ],
    "location" => [
        Location::if("page_type", "==", "front_page")
    ],
    "menu_order" => 10,
	"position" => "normal",
	"style" => "default",
	"label_placement" => "left",
	"instruction_placement" => "label",
	"active" => true,
]);



//------------------------
//------------------------



/**
 * About section
 */
register_extended_field_group([
    "title" => "About section",
    "fields" => [
        Text::make(__("Title", "estateagency"), "about_title")->required(),
        Text::make(__("Subtitle", "estateagency"), "about_subtitle")->required(),
        Group::make(__("Story", "estateagency"), "story")
            ->required()
            ->layout("row")
            ->fields([
                Text::make(__("Title", "estateagency"), "title")->required(),
                Textarea::make(__("Content", "estateagency"), "content")->required(),
            ]),
        Group::make(__("Vision", "estateagency"), "vision")
            ->required()
            ->layout("row")
            ->fields([
                Text::make(__("Title", "estateagency"), "title")->required(),
                Textarea::make(__("Content", "estateagency"), "content")->required(),
            ])
    ],
    "location" => [
        Location::if("page_template", "==", "templates/template-about.php")
    ],
    "menu_order" => 0,
	"position" => "normal",
	"style" => "default",
	"label_placement" => "left",
	"instruction_placement" => "label",
	"active" => true,
]);



/**
 * Testimonial infos
 */
register_extended_field_group([
    "title" => "Testimonial infos",
    "fields" => [
        Text::make(__("Name", "estateagency"), "testimonial_name")->required(),
        Text::make(__("Job", "estateagency"), "testimonial_job")->required(),
    ],
    "location" => [
        Location::if("post_type", "==", "testimonial")
    ],
    "menu_order" => 0,
	"position" => "normal",
	"style" => "default",
	"label_placement" => "top",
	"instruction_placement" => "label",
	"active" => true,
]);



/**
 * Testimonial section
 */
register_extended_field_group([
    "title" => "Testimonial section",
    "fields" => [
        Text::make(__("Title", "estateagency"), "testimonial_title")->required(),
        Image::make(__("Background", "estateagency"), "testimonial_background")
            ->required()
            ->returnFormat("url")
            ->previewSize("testimonial_background")
            ->library("all")
    ],
    "location" => [
        Location::if("page_template", "==", "templates/template-about.php")
    ],
    "menu_order" => 0,
	"position" => "normal",
	"style" => "default",
	"label_placement" => "left",
	"instruction_placement" => "label",
	"active" => true,
]);



//------------------------
//------------------------



/**
 * Agent info
 */
register_extended_field_group([
    "title" => "Agent info",
    "fields" => [
        Select::make(__("Job", "estateagency"), "job")
            ->required()
            ->choices([
                "founder_ceo" => "Founder & Ceo",
				"saler_marketing" => "Saler Marketing",
				"marketing_manager" => "Marketing Manager",
				"company_agents" => "Company Agents"
            ])
            ->defaultValue([])
            ->returnFormat("label"),
        Group::make(__("social media", "estateagency"), "social_media")
            ->required()
            ->layout("row")
            ->fields([
                Text::make(__("Facebook", "estateagency"), "facebook"),
                Text::make(__("Twitter", "estateagency"), "twitter"),
                Text::make(__("Instagram", "estateagency"), "instagram"),
                Text::make(__("Email", "estateagency"), "email"),
            ])
    ],
    "location" => [
        Location::if("post_type", "==", "agent")
    ],
    "menu_order" => 5,
	"position" => "normal",
	"style" => "default",
	"label_placement" => "top",
	"instruction_placement" => "label",
	"active" => true,
]);



//------------------------
//------------------------



/**
 * Property informations
 */
register_extended_field_group([
    "title" => "Property informations",
    "fields" => [
        Group::make(__("Overview", "estateagency"), "overview")
            ->required()
            ->layout("row")
            ->fields([
                Number::make(__("Reference", "estateagency"), "reference")
                    ->required()
                    ->prepend("#"),
                Text::make(__("Address", "estateagency"), "address")->required(),
                Number::make(__("Year Built'", "estateagency"), "year_built")->required(),
                Wysiwyg::make(__("Amenities", "estateagency"), "amenities")->mediaUpload(false)->tabs("visual")->toolbar("basic")->required()
            ]),
        Number::make(__("Price", "estateagency"), "price")->required(),
        Range::make(__("Total rooms", "estateagency"), "total_rooms")
            ->required()
            ->min(2)
            ->max(100)
            ->step(1),
        Range::make(__("Bedrooms", "estateagency"), "bedrooms")
            ->required()
            ->min(1)
            ->max(10)
            ->step(1),
        Range::make(__("Bathrooms", "estateagency"), "bathrooms")
            ->required()
            ->min(1)
            ->max(10)
            ->step(1),
        Radio::make(__("Garage", "estateagency"), "garage")
            ->required()
            ->choices([
                "no" => __("No", "estateagency"),
				"yes" => __("Yes", "estateagency")
            ])
            ->returnFormat("value"),
        Range::make(__("Number of garages", "estateagency"), "number_of_garages")
            ->required()
            ->min(0)
            ->max(10)
            ->step(1)
            ->conditionalLogic([
                ConditionalLogic::if("garage")->equals(__("Yes", "estateagency"))
            ]),
        Radio::make(__("Parking", "estateagency"), "parking")
            ->required()
            ->choices([
                "no" => __("No", "estateagency"),
				"yes" => __("Yes", "estateagency")
            ])
            ->returnFormat("value"),
        Range::make(__("Number of parkings", "estateagency"), "number_of_parkings")
            ->required()
            ->min(0)
            ->max(10)
            ->step(1)
            ->conditionalLogic([
                ConditionalLogic::if("parking")->equals(__("Yes", "estateagency"))
            ]),
        Text::make(__("Total area", "estateagency"), "total_area")->required()->append("m²"),
        Text::make(__("Home area", "estateagency"), "home_area")->required()->append("m²"),
        Text::make(__("Garage_size", "estateagency"), "garage_size")->required()->append("m²"),
        Group::make(__("Gallery", "estateagency"), "property_gallery")
            ->layout("row")
            ->fields([
                Image::make(__("Image_1", "estateagency"), "image_1")
                    ->returnFormat("array")
                    ->previewSize("medium")
                    ->library("all"),
                Image::make(__("Image_2", "estateagency"), "image_2")
                    ->returnFormat("array")
                    ->previewSize("medium")
                    ->library("all"),
                Image::make(__("Image_3", "estateagency"), "image_3")
                    ->returnFormat("array")
                    ->previewSize("medium")
                    ->library("all"),
                Image::make(__("Image_4", "estateagency"), "image_4")
                    ->returnFormat("array")
                    ->previewSize("medium")
                    ->library("all"),
                Image::make(__("Image_5", "estateagency"), "image_5")
                    ->returnFormat("array")
                    ->previewSize("medium")
                    ->library("all"),
            ])
    ],
    "location" => [
        Location::if("post_type", "==", "property")
    ],
    "menu_order" => 0,
	"position" => "normal",
	"style" => "default",
	"label_placement" => "left",
	"instruction_placement" => "label",
	"active" => true,
]);



//------------------------
//------------------------



/**
 * Contact
 */
register_extended_field_group([
    "title" => "Contact",
    "fields" => [
        Text::make(__("Title", "estateagency"), "contact_title")->required(),
        Text::make(__("Subtitle", "estateagency"), "contact_subtitle")->required()
    ],
    "location" => [
        Location::if("page_template", "==", "templates/template-contact.php")
    ],
    "menu_order" => 0,
	"position" => "normal",
	"style" => "default",
	"label_placement" => "left",
	"instruction_placement" => "label",
	"active" => true,
]);