<?php

/**
 * Display the list of cities where the properties are located
 */

?>

<?php if (count(get_terms("property_city")) <= 4) : ?>
    <?= estateagency_list_terms(get_terms("property_city"), "property_city", "fa fa-caret-right"); ?>
<?php else : ?>
    <?php $citiesOne = array_slice(get_terms("property_city"), 0, 4); ?>
    <?php $citiesTwo = array_slice(get_terms("property_city"), 4); ?>

    <?= estateagency_list_terms($citiesOne , "property_city", "fa fa-caret-right"); ?>
    <?= estateagency_list_terms($citiesTwo, "property_city", "fa fa-caret-right"); ?>
<?php endif; ?>