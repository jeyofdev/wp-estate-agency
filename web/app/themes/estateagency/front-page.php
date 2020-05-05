<?php get_header(); ?>


<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <!-- Top Properties Section Begin -->
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
                                                    <?php get_template_part("template-parts/property/price"); ?>
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
        <!-- Top Properties Section End -->

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