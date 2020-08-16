<?php

/**
 * Display the works section
 */

?>


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
