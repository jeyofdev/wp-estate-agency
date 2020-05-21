<?php

/**
 * Display the property content
 */

?>


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