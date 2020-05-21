<?php

/**
 * Display the properties search form
 */

?>


<?php
    $isRent = get_query_var("property_contract_type", "sale") === _x("rent", "URL", "estateagency");
    $types = get_terms([
        "taxonomy" => "property_type"
    ]);
    $cities = get_terms([
        "taxonomy" => "property_city"
    ]);

    $currentType = get_query_var("property_type");
    $currentCity = get_query_var("property_city");
    $currentBedrooms = get_query_var("bedrooms");
    $currentBathrooms = get_query_var("bathrooms");
    $currentGarages = get_query_var("garages");
    $currentParkings = get_query_var("parkings");
?>


<div class="search-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="search-form-text">
                    <div class="search-text">
                        <i class="fa fa-search"></i>
                        Find Your Home
                    </div>
                    <div class="home-text">
                        <i class="fa fa-home"></i>
                        House For Sell
                    </div>
                </div>
                <form action="<?= get_post_type_archive_link("property"); ?>" class="filter-form">
                    <div class="row">
                        <div class="sidebar-btn">
                            <div class="bt-item">
                                <input type="radio" name="property_contract_type" id="sale" value="sale" <?php checked(!$isRent); ?>>
                                <label for="sale"><?= __("Sale", "estateagency"); ?></label>
                            </div>
                            <div class="bt-item">
                                <input type="radio" name="property_contract_type" id="rent" value="rent" <?php checked($isRent); ?>>
                                <label for="rent"><?= __("Rent", "estateagency"); ?></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <select name="property_type" id="type">
                                <option value=""><?= __('All types', 'estateagency'); ?></option>
                                <?php foreach ($types as $type) : ?>
                                    <option value="<?= $type->slug; ?>" <?php selected($type->slug, $currentType); ?>><?= $type->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="type"><?= __("Types", "estateagency"); ?></label>
                        </div>

                        <div class="form-group">
                            <select name="property_city" id="city">
                                <option value=""><?= __('All cities', 'estateagency'); ?></option>
                                <?php foreach ($cities as $city) : ?>
                                    <option value="<?= $city->slug; ?>" <?php selected($city->slug, $currentCity); ?>><?= $city->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="city"><?= __("City", "estateagency"); ?></label>
                        </div>

                        <div class="form-group">
                            <input type="number" name="bedrooms" id="bedrooms" placeholder="2" value="<?= esc_attr($currentBedrooms); ?>">
                            <label for="bedrooms"><?= __("Bedroom", "estateagency"); ?></label>
                        </div>

                        <div class="form-group">
                            <input type="number" name="bathrooms" id="bathrooms" placeholder="1" value="<?= esc_attr($currentBathrooms); ?>">
                            <label for="bathrooms"><?= __("Bathroom", "estateagency"); ?></label>
                        </div>
                        <div class="form-group">
                            <input type="number" name="garages" id="garages" placeholder="1" value="<?= esc_attr($currentGarages); ?>">
                            <label for="garages"><?= __("Garage", "estateagency"); ?></label>
                        </div>

                        <div class="form-group">
                            <input type="number" name="parkings" id="parkings" placeholder="1" value="<?= esc_attr($currentParkings); ?>">
                            <label for="parkings"><?= __("Parkings", "estateagency"); ?></label>
                        </div>

                        <button type="submit" class="search-btn">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>