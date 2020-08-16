<?php get_header(); ?>


<!-- breadcrumb -->
<?php get_template_part("template-parts/section/breadcrumb"); ?>


<!-- Property list -->
<section class="property-section spad">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="property-sidebar">
                    <?php get_sidebar("property"); ?>
                </div>
            </div>
            <!-- Sidebar end -->


            <!-- Properties list -->
            <div class="col-lg-9">
                <h4 class="property-title"><?= __("Property", "estateagency"); ?></h4>
                <?php if (have_posts()) : ?>
                    <?php get_template_part("template-parts/property/list"); ?>
                <?php else : ?>
                    <p class="alert alert-danger"><?= __("There are no real estate listings online for the city of " . ucfirst(str_replace("-", " ", $wp_query->query_vars["property_city"])), "estateagency"); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- Property list end -->


<?php get_footer(); ?>