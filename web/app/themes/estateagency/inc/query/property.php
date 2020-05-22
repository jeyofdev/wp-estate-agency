<?php

/**
 * List of url parameters
 */
$propertyContractType = [];



/**
 * Add parameters to the query_vars array
 */
function estateagency_add_query_vars (array $params) : array 
{
    $params[] = "property_contract_type";
    $params[] = "property_type";
    $params[] = "property_city";
    $params[] = "bedrooms";
    $params[] = "bathrooms";
    $params[] = "garages";
    $params[] = "parkings";

    return $params;
}


add_filter("query_vars", "estateagency_add_query_vars");



/**
 * Set the url parameters
 */
add_action("pre_get_posts", function (WP_Query $query) use (&$propertyContractType) {
    if (
        is_admin() || 
        !$query->is_main_query() || 
        !is_post_type_archive("property") &&
        !is_tax("property_city"))
    {
        return;
    }

    $query->set("post_type", "property");

    if (is_tax("property_city")) {
        $tax_query = [
            [
                "taxonomy" => "property_city",
                "field"    => "slug",
                "terms"    => $query->query_vars["property_city"]
            ]
        ];
        $query->set("tax_query", $tax_query);
        $query->set("posts_per_page", 1);
    } else {
        $contract_types = array_keys($propertyContractType);
        if ($contract_types) {
            $meta_query = $query->get("meta_query", []);
            $meta_query[] = [
                "taxonomy" => "property_contract_type",
                "terms" => $contract_types,
                "field" => "slug"
            ];
            $query->set("meta_query", $meta_query);
        }
    
        $types = get_query_var("property_type");
        if ($types) {
            $meta_query = $query->get("meta_query", []);
            $meta_query[] = [
                "taxonomy" => "property_type",
                "terms" => $types,
                "field" => "slug"
            ];
            $query->set("meta_query", $meta_query);
        }
    
        $cities = get_query_var("property_city");
        if ($cities) {
            $meta_query = $query->get("meta_query", []);
            $meta_query[] = [
                "taxonomy" => "property_city",
                "terms" => $cities,
                "field" => "slug"
            ];
            $query->set("meta_query", $meta_query);
        }
    
        $bedrooms = (int)get_query_var("bedrooms");
        if ($bedrooms) {
            $meta_query = $query->get("meta_query", []);
            $meta_query[] = [
                "key" => "bedrooms",
                "value" => $bedrooms,
                "compare" => "=",
                "type" => "NUMERIC"
            ];
            $query->set("meta_query", $meta_query);
        }
    
        $bathrooms = (int)get_query_var("bathrooms");
        if ($bathrooms) {
            $meta_query = $query->get("meta_query", []);
            $meta_query[] = [
                "key" => "bathrooms",
                "value" => $bathrooms,
                "compare" => "=",
                "type" => "NUMERIC"
            ];
            $query->set("meta_query", $meta_query);
        }
    
        $garages = (int)get_query_var("garages");
        if ($garages) {
            $meta_query = $query->get("meta_query", []);
            $meta_query[] = [
                "key" => "number_of_garages",
                "value" => $garages,
                "compare" => "=",
                "type" => "NUMERIC"
            ];
            $query->set("meta_query", $meta_query);
        }
    
        $parkings = (int)get_query_var("parkings");
        if ($parkings) {
            $meta_query = $query->get("meta_query", []);
            $meta_query[] = [
                "key" => "number_of_parkings",
                "value" => $parkings,
                "compare" => "=",
                "type" => "NUMERIC"
            ];
            $query->set("meta_query", $meta_query);
        }
    
        $query->set("posts_per_page", 4);
    }
});



/**
 * Url rewrite
 */
add_action("init", function () use (&$propertyContractType) {
    $propertyContractType = [
        _x("sale", "URL", "estateagency") => "sale",
        _x("rent", "URL", "estateagency") => "rent"
    ];

    add_rewrite_rule(
        _x("property", "URL", "estateagency") . '/(' . implode('|', array_keys($propertyContractType)) . ')/?$',
        'index.php?post_type=property&property_contract_type=$matches[1]',
        'top'
    );
});