<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <!-- Single property header -->
        <section class="pd-hero-section set-bg" data-setbg="<?= estateagency_post_thumbnail_background($post, 'property_single_thumbnail', 'properties'); ?>">
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
        <!-- Single property header end -->

        <!-- Single property content -->
        <section class="property-details-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="pd-details-text">
                            <div class="pd-details-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-send"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-print"></i></a>
                                <a href="#"><i class="fa fa-cloud-download"></i></a>
                            </div>
                            <div class="pd-desc">
                                <h4><?= __("Description", "estateagency"); ?></h4>
                                <p><?= the_content(); ?>
                            </div>
                            <div class="pd-details-tab">
                                <div class="tab-item">
                                    <ul class="nav" role="tablist">
                                        <li>
                                            <a class="active" data-toggle="tab" href="#tab-1" role="tab"><?= __("Overview", "estateagency"); ?></a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab-2" role="tab"><?= __("Description", "estateagency"); ?></a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#tab-3" role="tab"><?= __("Amenities", "estateagency"); ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-item-content">
                                    <div class="tab-content">
                                        <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                            <div class="property-more-table">
                                                <table class="left-table">
                                                    <tbody>
                                                        <?php if (have_rows("overview")) : ?>
                                                            <?php while (have_rows("overview")) : the_row() ?>
                                                                <tr>
                                                                    <td class="pt-name"><?= __("Price", "estateagency"); ?></td>
                                                                    <td class="p-value">
                                                                        <?php $term = get_the_terms($post->ID, "property_contract_type")[0]->slug; ?>
                                                                        <?php if ($term === "sale") : ?>
                                                                            <?= sprintf(__("$%s", EstateAgencyFormatHelpers::format_price(), "estateagency"), EstateAgencyFormatHelpers::format_price()); ?>
                                                                        <?php elseif ($term === "rent") : ?>
                                                                            <?= sprintf(__("$%s / month", EstateAgencyFormatHelpers::format_price(), "estateagency"), EstateAgencyFormatHelpers::format_price()); ?>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-name"><?= __("Property Type", "estateagency"); ?></td>
                                                                    <td class="p-value"><?= get_the_terms($post->ID, "property_type")[0]->name; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-name"><?= __("Year Built", "estateagency"); ?></td>
                                                                    <td class="p-value"><?= get_sub_field("year_built"); ?></td>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                        <?php endif; ?>
                                                        <tr>
                                                            <td class="pt-name"><?= __("Bathrooms", "estateagency"); ?></td>
                                                            <td class="p-value"><?= get_field("bathrooms"); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-name"><?= __("Rooms", "estateagency"); ?></td>
                                                            <td class="p-value"><?= get_field("total_rooms"); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-name"><?= __("Parking lots", "estateagency"); ?></td>
                                                            <?= estateagency_check_specification_exist("parking", "number_of_parkings"); ?>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-name"><?= __("Lot area", "estateagency"); ?></td>
                                                            <td class="p-value"><?= __(get_field("total_area") . " sqft", "estateagency"); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table class="right-table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="pt-name"><?= __("Agent", "estateagency"); ?></td>
                                                            <td class="p-value"><?= get_the_terms($post->ID, "property_agent")[0]->name; ?></td>
                                                        </tr>
                                                        <?php if (have_rows("overview")) : ?>
                                                            <?php while (have_rows("overview")) : the_row() ?>
                                                                <tr>
                                                                    <td class="pt-name"><?= __("Reference", "estateagency"); ?></td>
                                                                    <td class="p-value">#<?= get_sub_field("reference"); ?></td>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                        <?php endif; ?>
                                                        <tr>
                                                            <td class="pt-name"><?= __("Contract type", "estateagency"); ?></td>
                                                            <td class="p-value"><?= get_the_terms($post->ID, "property_contract_type")[0]->name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-name"><?= __("Beds", "estateagency"); ?></td>
                                                            <td class="p-value"><?= get_field("bedrooms"); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-name"><?= __("Garages", "estateagency"); ?></td>
                                                            <?= estateagency_check_specification_exist("garage", "number_of_garages"); ?>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-name"><?= __("Home area", "estateagency"); ?></td>
                                                            <td class="p-value"><?= __(get_field("home_area") . " sqft", "estateagency"); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pt-name"><?= __("Gara Size", "estateagency"); ?></td>
                                                            <?= estateagency_check_specification_exist("garage", "garage_size"); ?>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                            <div class="pd-table-desc"><?= the_content(); ?></div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                            <div class="pd-table-amenities">
                                                <?php if (have_rows("overview")) : ?>
                                                    <?php while (have_rows("overview")) : the_row() ?>
                                                        <?= get_sub_field("amenities"); ?>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Agent contact -->
                            <div class="property-contactus">
                                <h4><?= __("Contact Us", "estateagency"); ?></h4>
                                <div class="row">
                                    <?php 
                                        $propertyCurrentAgent = get_the_terms($post->ID, "property_agent")[0]->slug;
                                        $queryAgent = new WP_Query([
                                            "post_type" => "agent",
                                            "post_name__in" => [$propertyCurrentAgent]
                                        ]);
                                    ?>
                                    <?php if ($queryAgent->have_posts()) : ?>
                                        <?php while ($queryAgent->have_posts()) : $queryAgent->the_post(); ?>
                                            <div class="col-lg-5">
                                                <div class="agent-desc">
                                                    <?= estateagency_post_thumbnail($post, "property_single_agent", 336, 224); ?>
                                                    <div class="agent-title">
                                                        <h5><?= the_title(); ?></h5>
                                                        <span><?= get_field("job"); ?></span>
                                                    </div>
                                                    <div class="agent-social">
                                                        <?php if (have_rows("social_media")) : ?>
                                                            <?php while (have_rows("social_media")) : the_row() ?>
                                                                <a href="https://www.facebook.com/<?= get_sub_field("facebook"); ?>/"><i class="fa fa-facebook"></i></a>
                                                                <a href="https://twitter.com/<?= get_sub_field("twitter"); ?>/"><i class="fa fa-twitter"></i></a>
                                                                <a href="https://www.instagram.com/<?= get_sub_field("instagram"); ?>/"><i class="fa fa-instagram"></i></a>
                                                                <a href="<?= get_sub_field("email"); ?>"><i class="fa fa-envelope"></i></a>
                                                            <?php endwhile; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                    <p><?= the_content(); ?></p>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                                    <?php endif; ?>

                                    <!-- Form -->
                                    <div class="col-lg-6 offset-lg-1">
                                        <?= do_shortcode('[contact-form-7 id="133" title="agent" html_class="agent-contact-form"]'); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- Agent contact end -->
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-3">
                        <div class="property-sidebar">
                            <?php get_sidebar("property"); ?>
                        </div>
                    </div>
                    <!-- Sidebar end -->
                </div>
            </div>
        </section>
        <!-- Single property content end -->
    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>