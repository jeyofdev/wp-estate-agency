<?php get_header(); ?>


<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <!-- Single post header -->
        <section class="blog-details-hero set-bg" data-setbg="<?= estateagency_post_thumbnail_background("post_single_thumbnail"); ?>">
            <div class="mask"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bd-hero-text">
                            <?php foreach (get_the_category() as $category) : ?>
                                <a href="<?= get_category_link($category); ?>">
                                    <span><?= $category->name; ?></span>
                                </a>
                            <?php endforeach; ?>
                            <h2><?= the_title() ?></h2>
                            <ul>
                                <li><i class="fa fa-user"></i> <?= get_the_author(); ?></li>
                                <li><i class="fa fa-clock-o"></i> <?= EstateAgencyFormatHelpers::format_date(); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  Single post header end -->

        <!-- Single post content -->
        <section class="blog-details-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 offset-lg-1">
                        <div class="blog-details-social">
                            <h6><?= __("Share:", "estateagency"); ?></h6>
                            <div class="social-list">
                                <?php get_template_part("template-parts/posts/post-share"); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 blog-details-content">
                        <?= the_content(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="tag-share-option">
                            <div class="tags">
                                <?php foreach (get_the_tags() as $tag) : ?>
                                    <a href="<?= get_tag_link($tag); ?>"><?= $tag->name; ?></a>
                                <?php endforeach; ?>
                            </div>
                            <div class="social-share">
                                <span><?= __("Share:", "estateagency"); ?></span>
                                <?php get_template_part("template-parts/posts/post-share"); ?>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Single post comment -->
                <?php if (comments_open() || absint(get_comments_number())) : ?>
                    <?php comments_template(); ?>
                <?php endif; ?>
                <!-- Single post comment end -->

                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2><?= __("You May Also Like", "estateagency"); ?></h2>
                        </div>
                    </div>
                    <?php
                        $args = [
                            "post_type" => "post",
                            "posts_per_page" => 2,
                            "post__not_in" => [$post->ID]
                        ];

                        $query = new WP_Query($args);
                    ?>

                    <?php if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="col-lg-6">
                                <?php get_template_part("template-parts/posts/post-card"); ?>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- Single post content End -->

    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>