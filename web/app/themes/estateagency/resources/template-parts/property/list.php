<?php

/**
 * Display the properties list
 */

?>

<div class="property-list">
    <?php while (have_posts()) : the_post(); ?>
        <div class="single-property-item">
            <div class="row">
                <div class="col-md-4">
                    <div class="property-pic">
                        <?= estateagency_post_thumbnail($post, "property_thumbnail", 262, 280, "properties"); ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="property-text">
                        <div class="s-text">
                            <?php $contract_type = get_the_terms($post->ID, "property_contract_type")[0]; ?>
                            <a href="<?= get_post_type_archive_link("property") . '?property_contract_type=' . $contract_type->slug; ?>">
                                <?= sprintf(__("For %s", $contract_type->name, "estateagency"), $contract_type->name); ?>
                            </a>
                        </div>
                        <a href="<?= the_permalink(); ?>">
                            <h5 class="r-title"><?= the_title(); ?></h5>
                        </a>
                        <?php get_template_part("template-parts/property/price"); ?>
                        <?php if (have_rows("overview")) : ?>
                            <?php while (have_rows("overview")) : the_row() ?>
                                <div class="properties-location"><i class="icon_pin"></i> <?= get_sub_field("address"); ?></div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <p><?= the_excerpt(); ?></p>
                        <?php get_template_part("template-parts/property/property-element/room-features"); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
</div>


<!-- pagination -->
<?= estateagency_property_pagination(); ?>