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
                    <div class="col-lg-4 col-md-6">
                        <?php get_template_part("template-parts/posts/post-card"); ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
