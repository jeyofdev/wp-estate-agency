<?php

/**
 * Display the top properties
 */

?>

<div class="top-properties-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="properties-title">
                    <?= get_title_section("top_properties_title", "top_properties_subtitle"); ?>
                    <a href="<?= get_post_type_archive_link("property"); ?>" class="top-property-all"><?= get_field("top_properties_button_label"); ?></a>
                </div>
            </div>
        </div>
    </div>

    <?php
        $args = [
            "post_type" => "property",
            "posts_per_page" => 5,
            "tax_query" => [
                [
                    "taxonomy" => "property_contract_type",
                    "field"    => "slug",
                    "terms"    => "sale",
                ]
            ]
        ];

        $query = new WP_Query($args);
    ?>

    <div class="container">
        <div class="top-properties-carousel owl-carousel">
            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="single-top-properties">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="stp-pic">
                                    <?= estateagency_post_thumbnail($post, "top_property_home_thumbnail", 262, 280, "properties"); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="stp-text">
                                    <div class="s-text">
                                        <?php $contract_type = get_the_terms($post->ID, "property_contract_type")[0]; ?>
                                        <a href="<?= get_post_type_archive_link("property") . '?property_contract_type=' . $contract_type->slug; ?>">
                                            <?= sprintf(__("For %s", $contract_type->name, "estateagency"), $contract_type->name); ?>
                                        </a>
                                    </div>
                                    <a href="<?= the_permalink(); ?>">
                                        <h2 class="r-title"><?= the_title(); ?></h2>
                                    </a>
                                    <?php if (have_rows("overview")) : ?>
                                        <?php while (have_rows("overview")) : the_row() ?>
                                            <div class="room-price">
                                                <?php get_template_part("template-parts/property/price"); ?>
                                            </div>
                                            <div class="properties-location"><i class="icon_pin"></i> <?= get_sub_field("address"); ?></div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <p><?= the_excerpt(); ?></p>
                                    <?php get_template_part("template-parts/property/room-features"); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>