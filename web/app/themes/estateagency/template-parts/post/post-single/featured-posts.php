<?php

/**
 * Display the featured posts
 */

?>


<?php
    $args = [
        "post_type" => "post",
        "posts_per_page" => 2,
        "post__not_in" => [$post->ID]
    ];
    $query = new WP_Query($args);
?>


<?php if ($query->have_posts() && $query->post_count === 2) : ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2><?= __("You May Also Like", "estateagency"); ?></h2>
            </div>
        </div>
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <div class="col-lg-6">
                <?php get_template_part("template-parts/post/post-card"); ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>
<?php endif; ?>