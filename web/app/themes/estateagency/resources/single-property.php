<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>


        <!-- Single property header -->
        <?php get_template_part("template-parts/property/property-single/header"); ?>


        <!-- Single property content -->
        <section class="property-details-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="pd-details-text">
                            <!-- share -->
                            <?php get_template_part("template-parts/property/property-single/share"); ?>


                            <!-- slider -->
                            <?php get_template_part("template-parts/property/property-single/slider"); ?>


                            <!-- content -->
                            <?php get_template_part("template-parts/property/property-single/details"); ?>
                            

                            <!-- Agent contact -->
                            <?php get_template_part("template-parts/property/property-single/contact"); ?>
                        </div>
                    </div>


                    <!-- Sidebar -->
                    <?php get_template_part("template-parts/property/sidebar"); ?>
                </div>
            </div>
        </section>
        <!-- Single property content end -->


    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>