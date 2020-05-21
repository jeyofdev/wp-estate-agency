<?php

/**
 * Display the rooms features 
 */

?>

<ul class="room-features">
    <li>
        <i class="fas fa-arrows-alt"></i>
        <p><?= __(get_field("total_area") . " sqft", "estateagency"); ?></p>
    </li>
    <li>
        <i class="fas fa-bed"></i>
        <p><?= sprintf(_n("%d Bedroom", "%d Bedrooms", get_field("bedrooms"), "estateagency"), get_field("bedrooms")); ?></p>
    </li>
    <li>
        <i class="fas fa-bath"></i>
        <p><?= sprintf(_n("%d Bathroom", "%d Bathrooms", get_field("bathrooms"), "estateagency"), get_field("bathrooms")); ?></p>
    </li>
    <li>
        <i class="fas fa-car"></i>
        <p>
            <?php if (get_sub_field("garage") !== "no") : ?>
                <?= sprintf(_n("%d Garage", "%d Garages", get_field("number_of_garages"), "estateagency"), get_field("number_of_garages")); ?>
            <?php else : ?>
                <?= __("0 garage", "estateagency"); ?>
            <?php endif; ?>
        </p>
    </li>
</ul>