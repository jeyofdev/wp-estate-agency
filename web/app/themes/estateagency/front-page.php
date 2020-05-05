<?php get_header(); ?>


<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <!-- Agent section-->
        <section class="agent-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <?php if (have_rows("agents")) : ?>
                                <?php while (have_rows("agents")) : the_row() ?>
                                    <span><?= get_sub_field("subtitle"); ?></span>
                                    <h2><?= get_sub_field("title"); ?></h2>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
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
                        <div class="section-title">
                            <?php if (have_rows("lasts_posts")) : ?>
                                <?php while (have_rows("lasts_posts")) : the_row() ?>
                                    <span><?= get_sub_field("subtitle"); ?></span>
                                    <h2><?= get_sub_field("title"); ?></h2>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
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