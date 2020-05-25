<?php

/**
 * Display the hero section
 */

?>


<?php
    $args = [
        "post_type" => "property",
        "posts_per_page" => 3,
        "meta_query" => [
            ["key" => "_thumbnail_id"]
        ]
    ];

    $query = new WP_Query($args);
?>


<section class="hero-section">
    <?php if ($query->have_posts()) : ?>
        <div class="hero-items owl-carousel">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="single-hero-item set-bg" data-setbg="<?= estateagency_post_thumbnail_background($post, 'property_home_hero_large_thumbnail', 'properties'); ?>">
                    <div class="mask"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <div class="hero-text">
                                    <?php if (have_rows("overview")) : ?>
                                        <?php while (have_rows("overview")) : the_row() ?>
                                            <p class="room-location"><i class="icon_pin"></i> <?= get_sub_field("address"); ?></p>
                                            <h2 class="secondary"><?= the_title(); ?></h2>
                                            <div class="room-price">
                                                <span><?= __("Start From:", "estateagency"); ?></span>
                                                <p>
                                                    <?php foreach (get_the_terms($post->ID, "property_contract_type") as $term) : ?>
                                                        <?php if ($term->slug === "sale") : ?>
                                                            <?= sprintf(__("$%s", EstateAgencyFormatHelpers::format_price(), "estateagency"), EstateAgencyFormatHelpers::format_price()); ?>
                                                        <?php elseif ($term->slug === "rent") : ?>
                                                            <?= sprintf(__("$%s / month", EstateAgencyFormatHelpers::format_price(), "estateagency"), EstateAgencyFormatHelpers::format_price()); ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </p>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <?php get_template_part("template-parts/property/room-features"); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>

        <div class="thumbnail-pic">
            <div class="thumbs owl-carousel">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="item">
                        <?= estateagency_post_thumbnail($post, "property_home_hero_thumbnail", 164, 94, "properties"); ?>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    <?php endif; ?>
</section>