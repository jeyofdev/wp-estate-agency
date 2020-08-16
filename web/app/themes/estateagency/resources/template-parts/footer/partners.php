<?php

/**
 * Display the partners in the footer
 */

?>


<div class="partner-section">
    <div class="container">
        <div class="partner-carousel owl-carousel">
            <?php
                $query = new WP_Query([
                    "post_type" => "partner"
                ]);
            ?>

            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <a href="#" class="partner-logo">
                        <div class="partner-logo-tablecell">
                            <?= estateagency_post_thumbnail($post, "partner_thumbnail", 65, 65); ?>
                        </div>
                    </a>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>