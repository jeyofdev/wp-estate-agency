<?php get_header(); ?>


<!-- breadcrumb -->
<?php get_template_part("template-parts/breadcrumb"); ?>


<?php
    $args = [
        "post_type" => "property",
        "tax_query" => [
            [
                "taxonomy" => "property_agent",
                "field"    => "slug",
                "terms"    => $wp_query->query_vars["agent"],
            ],
        ],
        "posts_per_page" => 4,
    ];

    $query = new WP_Query($args);
?>


<!-- Property list -->
<section class="property-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <h4 class="property-title"><?= __("Property", "estateagency"); ?></h4>
                <?php if ($query->have_posts()) : ?>
                    <div class="property-list">
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="single-property-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="property-pic">
                                            <?= estateagency_post_thumbnail($post, "property_thumbnail", 262, 280, "properties"); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="property-text">
                                            <div class="s-text"><?= sprintf(__("For %s", $value, "estateagency"), get_the_terms($post->ID, "property_contract_type")[0]->name); ?></div>
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
                                            <?php get_template_part("template-parts/property/room-features"); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- Property list end -->


<?php get_footer(); ?>