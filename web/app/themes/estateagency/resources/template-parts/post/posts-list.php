<?php

/**
 * Display the list of posts
 */

?>

<section class="blog-section blog-page spad">
    <div class="container">
        <div class="row">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part("template-parts/post/post-card"); ?>
                <?php endwhile; ?>

                <!-- pagination -->
                <?php if ($wp_query->max_num_pages > 1) : ?>
                    <div class="col-lg-12 loadmore">
                        <div class="primary-btn load">Load More</div>
                    </div>
                <?php endif; ?>
            <?php else : ?>
                <p class="alert alert-danger text-center w-100"><?= __("There are no articles online yet.", "estateagency"); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
