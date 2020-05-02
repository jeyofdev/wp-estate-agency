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

    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>