<?php

/**
 * Display the featured properties
 */

?>


<section class="feature-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?= get_title_section("featured_properties_title", "featured_properties_subtitle"); ?>
            </div>
        </div>


        <?php
            $queryAgent = new WP_Query([
                "post_type" => "agent"
            ]);

            $args = [
                "post_type" => "property",
                "posts_per_page" => 5,
            ];

            $queryProperty = new WP_Query($args);
        ?>


        <div class="row">
            <div class="feature-carousel owl-carousel">
                <?php if ($queryProperty->have_posts()) : ?>
                    <?php while ($queryProperty->have_posts()) : $queryProperty->the_post(); ?>
                        <div class="col-lg-4">
                            <div class="feature-item">
                                <div class="fi-pic set-bg" data-setbg="<?= estateagency_post_thumbnail_background($post, 'property_feature_thumbnail', 'properties'); ?>">
                                    <div class="pic-tag">
                                        <div class="f-text"><?= __("feature", "estateagency"); ?></div>
                                        <div class="s-text">
                                            <?php $contract_type = get_the_terms($post->ID, "property_contract_type")[0]; ?>
                                            <a href="<?= get_post_type_archive_link("property") . '?property_contract_type=' . $contract_type->slug; ?>">
                                                <?= sprintf(__("For %s", $contract_type->name, "estateagency"), $contract_type->name); ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="feature-author">
                                        <div class="fa-pic">
                                            <?php foreach ($queryAgent->posts as $postAgent) : ?>
                                                <?php if ($postAgent->post_name === get_the_terms($post->ID, "property_agent")[0]->slug) : ?>
                                                    <?= estateagency_post_thumbnail($postAgent, "property_feature_agent_thumbnail", 36, 36); ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="fa-text">
                                            <?php if (has_post_thumbnail($post)) : ?>
                                                <span><?= get_the_terms($post->ID, "property_agent")[0]->name; ?></span>
                                            <?php else : ?>
                                                <span class="dark"><?= get_the_terms($post->ID, "property_agent")[0]->name; ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="fi-text">
                                    <div class="inside-text">
                                        <a href="<?= the_permalink(); ?>">
                                            <h4><?= the_title(); ?></h4>
                                        </a>
                                        <?php if (have_rows("overview")) : ?>
                                            <?php while (have_rows("overview")) : the_row() ?>
                                                <ul>
                                                    <li><i class="fas fa-map-marker-alt"></i>
                                                        <?php if (strlen(get_sub_field("address")) > 28) : ?>
                                                            <?= substr(get_sub_field("address"), 0, 28) . "..."; ?></li>
                                                <?php else : ?>
                                                    <?= get_sub_field("address"); ?></li>
                                                <?php endif; ?>
                                                <li><i class="fas fa-tag"></i><?= get_the_terms($post->ID, "property_type")[0]->name; ?></li>
                                                </ul>
                                                <h5 class="price">
                                                    <?php foreach (get_the_terms($post->ID, "property_contract_type") as $term) : ?>
                                                        <?php if ($term->slug === "sale") : ?>
                                                            <?= sprintf(__("$%s", EstateAgencyFormatHelpers::format_price(), "estateagency"), EstateAgencyFormatHelpers::format_price()); ?>
                                                        <?php elseif ($term->slug === "rent") : ?>
                                                            <?= sprintf(__("month", "estateagency") . "%s<span>/" . __("month", "estateagency") . "</span>", EstateAgencyFormatHelpers::format_price()); ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </h5>


                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                    <ul class="room-features">
                                        <li>
                                            <i class="fas fa-arrows-alt"></i>
                                            <p><?= get_field("total_area") . __(" sqft", "estateagency"); ?></p>
                                        </li>
                                        <li>
                                            <i class="fas fa-bed"></i>
                                            <p><?= get_field("bedrooms"); ?></p>
                                        </li>
                                        <li>
                                            <i class="fas fa-bath"></i>
                                            <p><?= get_field("bathrooms"); ?></p>
                                        </li>
                                        <li>
                                            <i class="fas fa-car"></i>
                                            <p>
                                                <?php if (get_field("garage") !== "no") : ?>
                                                    <?= get_field("number_of_garages"); ?>
                                                <?php else : ?>
                                                    <?= 0; ?>
                                                <?php endif; ?>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>