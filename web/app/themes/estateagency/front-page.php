<?php get_header(); ?>


<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <!-- Hero Section Begin -->
        <section class="hero-section">
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
                                                    <h2><?= the_title(); ?></h2>
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
        <!-- Hero Section End -->


        <!-- How It Works Section -->
        <section class="howit-works spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if (have_rows("how_it_work")) : ?>
                            <?php while (have_rows("how_it_work")) : the_row() ?>
                                <?php get_template_part("template-parts/section/section-title"); ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <?php 
                    $query = new WP_Query([
                        "post_type" => "skill"
                    ]);
                ?>

                <div class="row">
                    <?php if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="col-lg-4">
                                <div class="single-howit-works">
                                    <?= estateagency_post_thumbnail($post, "skill_thumbnail", 100, 100); ?>
                                    <h4><?= the_title(); ?></h4>
                                    <p><?= the_content(); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- How It Works Section End -->


        <!-- Feature property section  -->
        <section class="feature-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if (have_rows("featured_properties")) : ?>
                            <?php while (have_rows("featured_properties")) : the_row() ?>
                                <?php get_template_part("template-parts/section/section-title"); ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
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
                                            <div class="s-text"><?= get_the_terms($post->ID, "property_contract_type")[0]->name; ?></div>
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
                                                <h4><?= the_title(); ?></h4>
                                                <?php if (have_rows("overview")) : ?>
                                                    <?php while (have_rows("overview")) : the_row() ?>
                                                        <ul>
                                                            <li><i class="fa fa-map-marker"></i> 
                                                                <?php if (strlen(get_sub_field("address")) > 28) : ?>
                                                                    <?= substr(get_sub_field("address"), 0, 28) . "..."; ?></li>
                                                                <?php else : ?>
                                                                    <?= get_sub_field("address"); ?></li>
                                                                <?php endif; ?>
                                                            <li><i class="fa fa-tag"></i><?= get_the_terms($post->ID, "property_type")[0]->name; ?></li>
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
                                                <?php if (have_rows("surface")) : ?>
                                                    <?php while (have_rows("surface")) : the_row() ?>
                                                        <li>
                                                            <i class="fa fa-arrows"></i>
                                                            <p><?= get_sub_field("total_area") . __(" sqft", "estateagency"); ?></p>
                                                        </li>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                                <?php if (have_rows("rooms")) : ?>
                                                    <?php while (have_rows("specifications")) : the_row() ?>
                                                        <li>
                                                            <i class="fa fa-bed"></i>
                                                            <p><?= get_sub_field("bedrooms"); ?></p>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-bath"></i>
                                                            <p><?= get_sub_field("bathrooms"); ?></p>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-car"></i>
                                                            <p>
                                                                <?php if (get_sub_field("garage") !== "no") : ?>
                                                                    <?= get_sub_field("number_of_garages"); ?>
                                                                <?php else : ?>
                                                                    <?= 0; ?>
                                                                <?php endif; ?>
                                                            </p>
                                                        </li>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
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
        <!-- Feature property section end -->


        <!-- Top properties section  -->
        <div class="top-properties-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="properties-title">
                            <?php if (have_rows("top_properties")) : ?>
                                <?php while (have_rows("top_properties")) : the_row() ?>
                                    <?php get_template_part("template-parts/section/section-title"); ?>
                                    <a href="<?= home_url('/property'); ?>" class="top-property-all"><?= get_sub_field("button_label"); ?></a>
                                <?php endwhile; ?>
                            <?php endif; ?>
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
                                            <div class="s-text"><?= sprintf(__("For %s", $value, "estateagency"), get_the_terms($post->ID, "property_contract_type")[0]->name); ?></div>
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
        <!-- Top properties section End -->


        <!-- Agent section-->
        <section class="agent-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if (have_rows("agents")) : ?>
                            <?php while (have_rows("agents")) : the_row() ?>
                                <?php get_template_part("template-parts/section/section-title"); ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <?php 
                    $query = new WP_Query([
                        "post_type" => "agent"
                    ]);
                ?>

                <div class="row">
                    <div class="agent-carousel owl-carousel">
                        <?php if ($query->have_posts()) : ?>
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="col-lg-3">
                                    <div class="single-agent">
                                        <div class="sa-pic">
                                            <?= estateagency_post_thumbnail($post, "agent_slider_thumbnail", 200, 200); ?>
                                            <div class="hover-social">
                                                <?php if (have_rows("social_media")) : ?>
                                                    <?php while (have_rows("social_media")) : the_row() ?>
                                                        <a class="facebook" href="https://www.facebook.com/<?= get_sub_field("facebook"); ?>/"><i class="fa fa-facebook"></i></a>
                                                        <a class="twitter"href="https://twitter.com/<?= get_sub_field("twitter"); ?>/"><i class="fa fa-twitter"></i></a>
                                                        <a class="instagram" href="https://www.instagram.com/<?= get_sub_field("instagram"); ?>/"><i class="fa fa-instagram"></i></a>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <h5><?= the_title(); ?> <span><?= get_field("job"); ?></span></h5>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Agent section end -->


        <!-- Latest posts section -->
        <section class="blog-section latest-blog spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php if (have_rows("lasts_posts")) : ?>
                            <?php while (have_rows("lasts_posts")) : the_row() ?>
                                <?php get_template_part("template-parts/section/section-title"); ?>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <?php
                        $query = new WP_Query([
                            "post_type" => "post",
                            "posts_per_page" => 3
                        ]);
                    ?>

                    <?php if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="col-lg-4">
                                <?php get_template_part("template-parts/posts/post-card"); ?>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- Latest posts section End -->
    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>