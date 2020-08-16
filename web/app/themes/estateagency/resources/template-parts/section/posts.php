<?php

/**
 * Display the latest posts
 */

?>

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
                        <?php get_template_part("template-parts/post/post-card"); ?>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>