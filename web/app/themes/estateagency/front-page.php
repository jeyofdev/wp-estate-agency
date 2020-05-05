<?php get_header(); ?>


<!-- Agent Section-->
<section class="agent-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <?php if (have_rows("agents")) : ?>
                        <?php while (have_rows("agents")) : the_row() ?>
                            <span><?= get_sub_field("subtitle"); ?></span>
                            <h2><?= get_sub_field("title"); ?></h2>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <?php 
            $query = new WP_Query([
                "post_type" => "agent"
            ]);
        ?>

        <div class="row">
            <div class="agent-carousel owl-carousel">
                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="col-lg-3">
                            <div class="single-agent">
                                <div class="sa-pic">
                                    <?= estateagency_post_thumbnail("agent_slider_thumbnail", 200, 200); ?>
                                    <div class="hover-social">
                                        <?php if (have_rows("social_media")) : ?>
                                            <?php while (have_rows("social_media")) : the_row() ?>
                                                <a class="facebook" href="https://www.facebook.com/<?= get_sub_field("facebook"); ?>/"><i class="fa fa-facebook"></i></a>
                                                <a class="twitter"href="https://twitter.com/<?= get_sub_field("twitter"); ?>/"><i class="fa fa-twitter"></i></a>
                                                <a class="instagram" href="https://www.instagram.com/<?= get_sub_field("instagram"); ?>/"><i class="fa fa-instagram"></i></a>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <h5><?= the_title(); ?> <span><?= get_field("job"); ?></span></h5>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- Agent Section End -->


<?php get_footer(); ?>