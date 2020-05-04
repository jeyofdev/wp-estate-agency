<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <!-- Single property header -->
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
                                                        <?php if (have_rows("specifications")) : ?>
                                                            <?php while (have_rows("specifications")) : the_row() ?>
                                                                <tr>
                                                                    <td class="pt-name"><?= __("Bathrooms", "estateagency"); ?></td>
                                                                    <td class="p-value"><?= get_sub_field("bathrooms"); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-name"><?= __("Rooms", "estateagency"); ?></td>
                                                                    <td class="p-value"><?= get_sub_field("total_rooms"); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-name"><?= __("Parking lots", "estateagency"); ?></td>
                                                                    <?= estateagency_check_specification_exist("parking", "number_of_parkings"); ?>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                        <?php endif; ?>
                                                        <?php if (have_rows("surface")) : ?>
                                                            <?php while (have_rows("surface")) : the_row() ?>
                                                                <tr>
                                                                    <td class="pt-name"><?= __("Lot area", "estateagency"); ?></td>
                                                                    <td class="p-value"><?= __(get_sub_field("total_area") . " sqft", "estateagency"); ?></td>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                        <?php endif; ?>
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
                                                        <?php if (have_rows("specifications")) : ?>
                                                            <?php while (have_rows("specifications")) : the_row() ?>
                                                                <tr>
                                                                    <td class="pt-name"><?= __("Beds", "estateagency"); ?></td>
                                                                    <td class="p-value"><?= get_sub_field("bedrooms"); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-name"><?= __("Garages", "estateagency"); ?></td>
                                                                    <?= estateagency_check_specification_exist("garage", "number_of_garages"); ?>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                        <?php endif; ?>
                                                        <?php if (have_rows("surface")) : ?>
                                                            <?php while (have_rows("surface")) : the_row() ?>
                                                                <tr>
                                                                    <td class="pt-name"><?= __("Home area", "estateagency"); ?></td>
                                                                    <td class="p-value"><?= __(get_sub_field("home_area") . " sqft", "estateagency"); ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pt-name"><?= __("Gara Size", "estateagency"); ?></td>
                                                                    <?= estateagency_check_specification_exist("garage", "garage_size"); ?>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                            <div class="pd-table-desc"><?= the_content(); ?></div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                            <div class="pd-table-amenities">
                                                <?php if (have_rows("surface")) : ?>
                                                    <?php while (have_rows("overview")) : the_row() ?>
                                                        <?= get_sub_field("amenities"); ?>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Single property content end -->
    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>