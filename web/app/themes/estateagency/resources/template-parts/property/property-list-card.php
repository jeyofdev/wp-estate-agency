<?php

/**
 * Display the card of property
 */

?>


<div class="s-text"><?= sprintf(__("For %s", $value, "estateagency"), get_the_terms($post->ID, "property_contract_type")[0]->name); ?></div>
<a href="<?= the_permalink(); ?>">
    <h5 class="r-title"><?= the_title(); ?></h5>
</a>

<?php if (have_rows("overview")) : ?>
    <?php while (have_rows("overview")) : the_row() ?>
        <?php get_template_part("template-parts/property/price"); ?>
        <div class="properties-location"><i class="icon_pin"></i> <?= get_sub_field("address"); ?></div>
    <?php endwhile; ?>
<?php endif; ?>
<p><?= the_excerpt(); ?></p>
<?php get_template_part("template-parts/property/room-features"); ?>