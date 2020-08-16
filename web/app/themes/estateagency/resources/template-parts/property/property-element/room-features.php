<?php

/**
 * Display the rooms features 
 */

?>

<ul class="room-features">
    <li>
        <i class="fas fa-arrows-alt"></i>
        <p><?= get_field("total_area") . __(" sqft", "estateagency"); ?></p>
    </li>
    <li>
        <i class="fas fa-bed"></i>
        <p><?= sprintf(_n("%d Bedroom", __("%d Bedrooms", "estateagency"), get_field("bedrooms"), "estateagency"), get_field("bedrooms")); ?></p>
    </li>
    <li>
        <i class="fas fa-bath"></i>
        <p><?= sprintf(_n("%d Bathroom", __("%d Bathrooms", "estateagency"), get_field("bathrooms"), "estateagency"), get_field("bathrooms")); ?></p>
    </li>
    <li>
        <i class="fas fa-car"></i>
        <p>
            <?php if (get_sub_field("garage") !== "no") : ?>
                <?= sprintf(_n("%d Garage", __("%d Garages", "estateagency"), get_field("number_of_garages"), "estateagency"), get_field("number_of_garages")); ?>
            <?php else : ?>
                <?= __("0 garage", "estateagency"); ?>
            <?php endif; ?>
        </p>
    </li>
</ul>