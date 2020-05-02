<?php get_header(); ?>


<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <!-- Single post header -->
        <?php if (has_post_thumbnail()) : ?>
            <?php $postThumbnail = get_the_post_thumbnail_url($post->ID, "post_single_thumbnail"); ?>
        <?php endif; ?>
        <section class="blog-details-hero set-bg" data-setbg="<?= $postThumbnail; ?>">
            <div class="mask"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bd-hero-text">
                            <?php foreach (get_the_category() as $category) : ?>
                                <span><?= $category->name; ?></span>
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
                                <?php get_template_part("template-parts/single-post/share"); ?>
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
                                    <a href="#"><?= $tag->name; ?></a>
                                <?php endforeach; ?>
                            </div>
                            <div class="social-share">
                                <span><?= __("Share:", "estateagency"); ?></span>
                                <?php get_template_part("template-parts/single-post/share"); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Single post content End -->

    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>