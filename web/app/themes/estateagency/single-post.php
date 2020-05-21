<?php get_header(); ?>


<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

        <!-- Single post header -->
        <?php get_template_part("template-parts/post/post-single/header"); ?>


        <!-- Single post content -->
        <section class="blog-details-section">
            <div class="container">
                <!-- the content -->
                <?php get_template_part("template-parts/post/post-single/content"); ?>


                <!-- the tag and share buttons -->
                <?php get_template_part("template-parts/post/post-single/tag"); ?>


                <!-- Single post comment -->
                <?php if (comments_open() || absint(get_comments_number())) : ?>
                    <?php comments_template(); ?>
                <?php endif; ?>


                <!-- featured posts -->
                <?php get_template_part("template-parts/post/post-single/featured-posts"); ?>
            </div>
        </section>
        <!-- Single post content End -->


    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>