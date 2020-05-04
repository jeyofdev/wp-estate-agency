<?php get_header(); ?>


<!-- Property Details Hero Section Begin -->
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <section class="pd-hero-section set-bg" data-setbg="<?= estateagency_post_thumbnail_background('property_single_thumbnail', 'properties'); ?>">
            <div class="mask"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="pd-hero-text">
                            <?php if (have_rows("overview")) : ?>
                                <?php while (have_rows("overview")) : the_row() ?>
                                    <p class="room-location"><i class="icon_pin"></i> <?= get_sub_field("address"); ?></p>
                                    <h2><?= the_title(); ?></h2>
                                    <?php get_template_part("template-parts/property/price"); ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <?php get_template_part("template-parts/property/room-features"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<!-- Property Details Hero Section Begin -->


<?php get_footer(); ?>