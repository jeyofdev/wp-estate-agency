<?php

/**
 * Display the Price of properties
 */

?>

<div class="room-price">
    <span><?= __("Start From :", "estateagency"); ?></span>
    <?php foreach (get_the_terms($post->ID, "property_contract_type") as $term) : ?>
        <?php if (is_single()) : ?>
            <?php $tag = "p"; ?>
        <?php elseif (is_front_page()) : ?>
            <?php $tag = "h4"; ?>
        <?php else : ?>
            <?php $tag = "h5"; ?>
        <?php endif; ?>

        <?php if ($term->slug === "sale") : ?>
            <<?= $tag; ?>><?= sprintf(__("$%s", "estateagency"), EstateAgencyFormatHelpers::format_price()); ?></<?= $tag; ?>>
        <?php elseif ($term->slug === "rent") : ?>
            <<?= $tag; ?>><?= sprintf(__("$%s / month", "estateagency"), EstateAgencyFormatHelpers::format_price()); ?></<?= $tag; ?>>
        <?php endif; ?>
    <?php endforeach; ?>
</div>