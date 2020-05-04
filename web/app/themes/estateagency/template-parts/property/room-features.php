<?php

/**
 * Display the rooms features 
 */

?>

<ul class="room-features">
    <?php if (have_rows("surface")) : ?>
        <?php while (have_rows("surface")) : the_row() ?>
            <li>
                <i class="fa fa-arrows"></i>
                <p><?= __(get_sub_field("total_area") . " sqft", "estateagency"); ?></p>
            </li>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php if (have_rows("rooms")) : ?>
        <?php while (have_rows("specifications")) : the_row() ?>
            <li>
                <i class="fa fa-bed"></i>
                <p><?= sprintf(_n("%d Bedroom", "%d Bedrooms", get_sub_field("bedrooms"), "estateagency"), get_sub_field("bedrooms")); ?></p>
            </li>
            <li>
                <i class="fa fa-bath"></i>
                <p><?= sprintf(_n("%d Bathroom", "%d Bathrooms", get_sub_field("bathrooms"), "estateagency"), get_sub_field("bathrooms")); ?></p>
            </li>
            <li>
                <i class="fa fa-car"></i>
                <p>
                    <?php if (get_sub_field("garage") !== "no") : ?>
                        <?= sprintf(_n("%d Garage", "%d Garages", get_sub_field("number_of_garages"), "estateagency"), get_sub_field("number_of_garages")); ?>
                    <?php else : ?>
                        <?= __("0 garage", "estateagency"); ?>
                    <?php endif; ?>
                </p>
            </li>
        <?php endwhile; ?>
    <?php endif; ?>
</ul>