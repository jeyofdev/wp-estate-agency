<?php get_header(); ?>


<?php
    $args = [
        "post_type" => "property",
        "posts_per_page" => 3
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
                                            <?= estateagency_post_thumbnail("property_thumbnail", 262, 280, "properties"); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="property-text">
                                            <div class="s-text"><?= sprintf(__("For %s", $value, "estateagency"), get_the_terms($post->ID, "property_contract_type")[0]->name); ?></div>
                                            <a href="<?= the_permalink(); ?>">
                                                <h5 class="r-title"><?= the_title(); ?></h5>
                                            </a>

                                            <?php if (have_rows("overview")) : ?>
                                                <?php while (have_rows("overview")) : the_row() ?>
                                                    <div class="room-price">
                                                    <span><?= __("Start From:", "estateagency"); ?></span>
                                                        <?php foreach (get_the_terms($post->ID, "property_contract_type") as $term) : ?>
                                                            <?php if ($term->slug === "sale") : ?>
                                                                <h5><?= sprintf(__("$%s", EstateAgencyFormatHelpers::format_price(), "estateagency"), EstateAgencyFormatHelpers::format_price()); ?></h5>
                                                            <?php elseif ($term->slug === "rent") : ?>
                                                                <h5><?= sprintf(__("$%s / month", EstateAgencyFormatHelpers::format_price(), "estateagency"), EstateAgencyFormatHelpers::format_price()); ?></h5>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                    <div class="properties-location"><i class="icon_pin"></i> <?= get_sub_field("address"); ?></div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                            <p><?= the_excerpt(); ?></p>
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