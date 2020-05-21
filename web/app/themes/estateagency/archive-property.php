<?php get_header(); ?>


<!-- Property list -->
<section class="property-section spad">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <?php get_template_part("template-parts/property/sidebar"); ?>


            <!-- Properties list -->
            <div class="col-lg-9">
                <h4 class="property-title"><?= __("Property", "estateagency"); ?></h4>
                <?php if (have_posts()) : ?>

                    <!-- list -->
                    <?php get_template_part("template-parts/property/list"); ?>

                    <!-- pagination -->
                    <?= estateagency_property_pagination(); ?>

                <?php elseif (
                    get_query_var("property_contract_type") !== '' ||
                    get_query_var("property_type") !== '' ||
                    get_query_var("property_city") !== '' ||
                    get_query_var("bedrooms") !== '' ||
                    get_query_var("bathrooms") !== '' ||
                    get_query_var("garages") !== '' ||
                    get_query_var("parkings") !== ''
                ) : ?>
                    <p class="alert alert-danger"><?= __("There are no properties that match your search criteria.", "estateagency"); ?></p>
                <?php else : ?>
                    <p class="alert alert-danger"><?= __("There are no property listings online yet", "estateagency"); ?></p>
                <?php endif; ?>
            </div>
            <!-- Properties list end -->
        </div>
    </div>
</section>
<!-- Property list end -->


<?php get_footer(); ?>