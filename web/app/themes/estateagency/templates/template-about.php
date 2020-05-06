<?php
/**
 * Template Name: Page about
 * Template Post Type: page
 */
?>

<?php get_header(); ?>


<!-- breadcrumb -->
<?php get_template_part("template-parts/breadcrumb"); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <!-- About section -->
        <section class="about-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <span><?= the_field("about_subtitle"); ?></span>
                            <h2><?= the_field("about_title"); ?><span>.</span></h2>
                            <?= the_content(); ?>
                        </div>

                        <?php if (!is_null(get_field("background_video")["sizes"]["testimonial_video_background"])) : ?>
                            <div class="video-text set-bg" data-setbg="<?= get_field("background_video")["sizes"]["testimonial_video_background"]; ?>">
                        <?php else : ?>
                            <div class="video-text set-bg empty" data-setbg="">
                        <?php endif; ?>
                            <div class="mask"></div>
                            <a href="<?= the_field("video_url"); ?>" class="play-btn video-popup">
                                <i class="fa fa-play"></i>
                            </a>
                            <h4><?= the_field("video_title"); ?></h4>
                            <h2><?= the_field("video_subtitle"); ?></h2>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <?php if (have_rows("story")) : ?>
                                    <?php while (have_rows("story")) : the_row() ?>
                                        <div class="about-text">
                                            <h4><?= the_sub_field("title"); ?></h4>
                                            <p><?= the_sub_field("content"); ?></p>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6">
                                <?php if (have_rows("vision")) : ?>
                                    <?php while (have_rows("vision")) : the_row() ?>
                                        <div class="about-text">
                                            <h4><?= the_sub_field("title"); ?></h4>
                                            <p><?= the_sub_field("content"); ?></p>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About section End -->


        <!-- Testimonial section -->
        <section class="testimonial-section set-bg spad" data-setbg="<?= the_field("testimonial_background"); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2><?= the_field("testimonial_title"); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="testimonial-slider owl-carousel">
                            <?php
                                $query = new WP_Query([
                                    "post_type" => "testimonial",
                                    "posts_per_page" => 3
                                ]);
                            ?>
                            <?php if ($query->have_posts()) : ?>
                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                    <div class="ts-item">
                                        <?= the_content(); ?>
                                        <div class="ti-author">
                                            <h5><?= the_field("testimonial_name"); ?></h5>
                                            <span><?= the_field("testimonial_job"); ?></span>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial section end -->


        <!-- Agent section-->
        <section class="agent-section about-page spad">
            <?php get_template_part("template-parts/section/section-agents"); ?>
        </section>
    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>