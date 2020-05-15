<?php get_header(); ?>


<?php
    $isRent = get_query_var("property_contract_type", "sale") === _x("rent", "URL", "estateagency");
    $types = get_terms([
        "taxonomy" => "property_type"
    ]);
    $cities = get_terms([
        "taxonomy" => "property_city"
    ]);

    $currentType = get_query_var("property_type");
    $currentCity = get_query_var("property_city");
    $currentBedrooms = get_query_var("bedrooms");
    $currentBathrooms = get_query_var("bathrooms");
    $currentGarages = get_query_var("garages");
    $currentParkings = get_query_var("parkings");
?>


<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <!-- Hero section -->
        <section class="hero-section">
            <?php
                $args = [
                    "post_type" => "property",
                    "posts_per_page" => 3,
                    "meta_query" => [
                        ["key" => "_thumbnail_id"]
                    ]
                ];

                $query = new WP_Query($args);
            ?>

            <?php if ($query->have_posts()) : ?>
                <div class="hero-items owl-carousel">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="single-hero-item set-bg" data-setbg="<?= estateagency_post_thumbnail_background($post, 'property_home_hero_large_thumbnail', 'properties'); ?>">
                            <div class="mask"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2">
                                        <div class="hero-text">
                                            <?php if (have_rows("overview")) : ?>
                                                <?php while (have_rows("overview")) : the_row() ?>
                                                    <p class="room-location"><i class="icon_pin"></i> <?= get_sub_field("address"); ?></p>
                                                    <h2><?= the_title(); ?></h2>
                                                    <div class="room-price">
                                                        <span><?= __("Start From:", "estateagency"); ?></span>
                                                        <p>
                                                            <?php foreach (get_the_terms($post->ID, "property_contract_type") as $term) : ?>
                                                                <?php if ($term->slug === "sale") : ?>
                                                                    <?= sprintf(__("$%s", EstateAgencyFormatHelpers::format_price(), "estateagency"), EstateAgencyFormatHelpers::format_price()); ?>
                                                                <?php elseif ($term->slug === "rent") : ?>
                                                                    <?= sprintf(__("$%s / month", EstateAgencyFormatHelpers::format_price(), "estateagency"), EstateAgencyFormatHelpers::format_price()); ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </p>
                                                    </div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                            <?php get_template_part("template-parts/property/room-features"); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </div>

                <div class="thumbnail-pic">
                    <div class="thumbs owl-carousel">
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="item">
                                <?= estateagency_post_thumbnail($post, "property_home_hero_thumbnail", 164, 94, "properties"); ?>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </section>
        <!-- Hero section end -->

        <!-- Search form section -->
        <div class="search-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="search-form-text">
                            <div class="search-text">
                                <i class="fa fa-search"></i>
                                Find Your Home
                            </div>
                            <div class="home-text">
                                <i class="fa fa-home"></i>
                                House For Sell
                            </div>
                        </div>
                        <form action="<?= get_post_type_archive_link("property"); ?>" class="filter-form">
                            <div class="first-row row">
                                <div class="sidebar-btn">
                                    <div class="bt-item">
                                        <input type="radio" name="property_contract_type" id="sale" value="sale" <?php checked(!$isRent); ?>>
                                        <label for="sale"><?= __("Sale", "estateagency"); ?></label>
                                    </div>
                                    <div class="bt-item">
                                        <input type="radio" name="property_contract_type" id="rent" value="rent" <?php checked($isRent); ?>>
                                        <label for="rent"><?= __("Rent", "estateagency"); ?></label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <select name="property_type" id="type">
                                        <option value=""><?= __('All types', 'estateagency'); ?></option>
                                        <?php foreach ($types as $type) : ?>
                                            <option value="<?= $type->slug; ?>" <?php selected($type->slug, $currentType); ?>><?= $type->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="type"><?= __("Types", "estateagency"); ?></label>
                                </div>

                                <div class="form-group">
                                    <select name="property_city" id="city">
                                        <option value=""><?= __('All cities', 'estateagency'); ?></option>
                                        <?php foreach ($cities as $city) : ?>
                                            <option value="<?= $city->slug; ?>" <?php selected($city->slug, $currentCity); ?>><?= $city->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="city"><?= __("City", "estateagency"); ?></label>
                                </div>

                                <div class="form-group">
                                    <input type="number" name="bedrooms" id="bedrooms" placeholder="2" value="<?= esc_attr($currentBedrooms); ?>">
                                    <label for="bedrooms"><?= __("Bedroom", "estateagency"); ?></label>
                                </div>
                            </div>

                            <div class="second-row row">
                                <div class="form-group">
                                    <input type="number" name="bathrooms" id="bathrooms" placeholder="1" value="<?= esc_attr($currentBathrooms); ?>">
                                    <label for="bathrooms"><?= __("Bathroom", "estateagency"); ?></label>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="garages" id="garages" placeholder="1" value="<?= esc_attr($currentGarages); ?>">
                                    <label for="garages"><?= __("Garage", "estateagency"); ?></label>
                                </div>

                                <div class="form-group">
                                    <input type="number" name="parkings" id="parkings" placeholder="1" value="<?= esc_attr($currentParkings); ?>">
                                    <label for="parkings"><?= __("Parkings", "estateagency"); ?></label>
                                </div>
                                <button type="submit" class="search-btn">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search form section End -->


        <!-- How It Works Section -->
        <section class="howit-works spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?= get_title_section("work_title", "work_subtitle"); ?>
                    </div>
                </div>

                <?php 
                    $query = new WP_Query([
                        "post_type" => "skill"
                    ]);
                ?>

                <div class="row">
                    <?php if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="col-lg-4">
                                <div class="single-howit-works">
                                    <?= estateagency_post_thumbnail($post, "skill_thumbnail", 100, 100); ?>
                                    <h4><?= the_title(); ?></h4>
                                    <p><?= the_content(); ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- How It Works Section End -->


        <!-- Feature property section  -->
        <section class="feature-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?= get_title_section("featured_properties_title", "featured_properties_subtitle"); ?>
                    </div>
                </div>

                <?php
                    $queryAgent = new WP_Query([
                        "post_type" => "agent"
                    ]);
        
                    $args = [
                        "post_type" => "property",
                        "posts_per_page" => 5,
                    ];

                    $queryProperty = new WP_Query($args);
                ?>

                <div class="row">
                    <div class="feature-carousel owl-carousel">
                        <?php if ($queryProperty->have_posts()) : ?>
                            <?php while ($queryProperty->have_posts()) : $queryProperty->the_post(); ?>
                                <div class="col-lg-4">
                                    <div class="feature-item">
                                        <div class="fi-pic set-bg" data-setbg="<?= estateagency_post_thumbnail_background($post, 'property_feature_thumbnail', 'properties'); ?>">
                                            <div class="pic-tag">
                                            <div class="f-text"><?= __("feature", "estateagency"); ?></div>
                                            <div class="s-text">
                                                <?php $contract_type = get_the_terms($post->ID, "property_contract_type")[0]; ?>
                                                <a href="<?= get_post_type_archive_link("property") . '?property_contract_type=' . $contract_type->slug; ?>">
                                                    <?= sprintf(__("For %s", $contract_type->name, "estateagency"), $contract_type->name); ?>
                                                </a>
                                            </div>
                                            </div>
                                            <div class="feature-author">
                                                <div class="fa-pic">
                                                    <?php foreach ($queryAgent->posts as $postAgent) : ?>
                                                        <?php if ($postAgent->post_name === get_the_terms($post->ID, "property_agent")[0]->slug) : ?>
                                                            <?= estateagency_post_thumbnail($postAgent, "property_feature_agent_thumbnail", 36, 36); ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </div>
                                                <div class="fa-text">
                                                    <?php if (has_post_thumbnail($post)) : ?>
                                                        <span><?= get_the_terms($post->ID, "property_agent")[0]->name; ?></span>
                                                    <?php else : ?>
                                                        <span class="dark"><?= get_the_terms($post->ID, "property_agent")[0]->name; ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fi-text">
                                            <div class="inside-text">
                                                <a href="<?= the_permalink(); ?>">
                                                    <h4><?= the_title(); ?></h4>
                                                </a>
                                                <?php if (have_rows("overview")) : ?>
                                                    <?php while (have_rows("overview")) : the_row() ?>
                                                        <ul>
                                                            <li><i class="fas fa-map-marker-alt"></i> 
                                                                <?php if (strlen(get_sub_field("address")) > 28) : ?>
                                                                    <?= substr(get_sub_field("address"), 0, 28) . "..."; ?></li>
                                                                <?php else : ?>
                                                                    <?= get_sub_field("address"); ?></li>
                                                                <?php endif; ?>
                                                            <li><i class="fas fa-tag"></i><?= get_the_terms($post->ID, "property_type")[0]->name; ?></li>
                                                        </ul>
                                                        <h5 class="price">
                                                            <?php foreach (get_the_terms($post->ID, "property_contract_type") as $term) : ?>
                                                                <?php if ($term->slug === "sale") : ?>
                                                                    <?= sprintf(__("$%s", EstateAgencyFormatHelpers::format_price(), "estateagency"), EstateAgencyFormatHelpers::format_price()); ?>
                                                                <?php elseif ($term->slug === "rent") : ?>
                                                                    <?= sprintf(__("month", "estateagency") . "%s<span>/" . __("month", "estateagency") . "</span>", EstateAgencyFormatHelpers::format_price()); ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </h5>

                                                        
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </div>
                                            <ul class="room-features">
                                                <li>
                                                    <i class="fas fa-arrows-alt"></i>
                                                    <p><?= get_field("total_area") . __(" sqft", "estateagency"); ?></p>
                                                </li>
                                                <li>
                                                    <i class="fas fa-bed"></i>
                                                    <p><?= get_field("bedrooms"); ?></p>
                                                </li>
                                                <li>
                                                    <i class="fas fa-bath"></i>
                                                    <p><?= get_field("bathrooms"); ?></p>
                                                </li>
                                                <li>
                                                    <i class="fas fa-car"></i>
                                                    <p>
                                                        <?php if (get_field("garage") !== "no") : ?>
                                                            <?= get_field("number_of_garages"); ?>
                                                        <?php else : ?>
                                                            <?= 0; ?>
                                                        <?php endif; ?>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- Feature property section end -->


        <!-- Video section -->
        <?php if (!is_null(get_field("background_video")["sizes"]["home_testimonial_video_background"])) : ?>
            <div class="video-section  set-bg" data-setbg="<?= get_field("background_video")["sizes"]["home_testimonial_video_background"]; ?>">
        <?php else : ?>
            <div class="video-section set-bg empty" data-setbg="">
        <?php endif; ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="video-text">
                            <a href="<?= the_field("video_url"); ?>" class="play-btn video-popup">
                                <i class="fas fa-play"></i>
                            </a>
                            <h4><?= the_field("video_title"); ?></h4>
                            <h2><?= the_field("video_subtitle"); ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video section end -->


        <!-- Top properties section  -->
        <div class="top-properties-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="properties-title">
                            <?= get_title_section("top_properties_title", "top_properties_subtitle"); ?>
                            <a href="<?= home_url('/property'); ?>" class="top-property-all"><?= get_field("button_label"); ?></a>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                $args = [
                    "post_type" => "property",
                    "posts_per_page" => 5,
                    "tax_query" => [
                        [
                            "taxonomy" => "property_contract_type",
                            "field"    => "slug",
                            "terms"    => "sale",
                        ]
                    ]
                ];

                $query = new WP_Query($args);
            ?>

            <div class="container">
                <div class="top-properties-carousel owl-carousel">
                    <?php if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="single-top-properties">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="stp-pic">
                                            <?= estateagency_post_thumbnail($post, "top_property_home_thumbnail", 262, 280, "properties"); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="stp-text">
                                            <div class="s-text">
                                                <?php $contract_type = get_the_terms($post->ID, "property_contract_type")[0]; ?>
                                                <a href="<?= get_post_type_archive_link("property") . '?property_contract_type=' . $contract_type->slug; ?>">
                                                    <?= sprintf(__("For %s", $contract_type->name, "estateagency"), $contract_type->name); ?>
                                                </a>
                                            </div>
                                            <a href="<?= the_permalink(); ?>">
                                                <h2 class="r-title"><?= the_title(); ?></h2>
                                            </a>
                                            <?php if (have_rows("overview")) : ?>
                                                <?php while (have_rows("overview")) : the_row() ?>
                                                    <div class="room-price">
                                                        <?php get_template_part("template-parts/property/price"); ?>
                                                    </div>
                                                    <div class="properties-location"><i class="icon_pin"></i> <?= get_sub_field("address"); ?></div>
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                            <p><?= the_excerpt(); ?></p>
                                            <?php get_template_part("template-parts/property/room-features"); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- Top properties section End -->


        <!-- Agent section-->
        <section class="agent-section spad">
            <?php get_template_part("template-parts/section/section-agents"); ?>
        </section>

        <!-- Latest posts section -->
        <?php
            $query = new WP_Query([
                "post_type" => "post",
                "posts_per_page" => 3
            ]);
        ?>
        <?php if ($query->have_posts()) : ?>
            <section class="blog-section latest-blog spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <?= get_title_section("latest_posts_title", "latest_posts_subtitle"); ?>
                        </div>
                    </div>
                    <div class="row">
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="col-lg-4">
                                <?php get_template_part("template-parts/posts/post-card"); ?>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- Latest posts section End -->
    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>