<?php

/**
 * Display the single property contact
 */

?>


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
                            <a href="<?= the_permalink(); ?>">
                                <h5><?= the_title(); ?></h5>
                            </a>
                            <span><?= get_field("job"); ?></span>
                        </div>
                        <div class="agent-social">
                            <?php if (have_rows("social_media")) : ?>
                                <?php while (have_rows("social_media")) : the_row() ?>
                                    <a href="https://www.facebook.com/<?= get_sub_field("facebook"); ?>/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://twitter.com/<?= get_sub_field("twitter"); ?>/"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.instagram.com/<?= get_sub_field("instagram"); ?>/"><i class="fab fa-instagram"></i></a>
                                    <a href="<?= get_sub_field("email"); ?>"><i class="fas fa-envelope"></i></a>
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