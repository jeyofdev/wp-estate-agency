<?php get_header(); ?>


<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>


        <!-- Hero section -->
        <?php get_template_part("template-parts/section/property-hero"); ?>


        <!-- Search form section -->
        <?php get_template_part("template-parts/section/search"); ?>

        <!-- How It Works Section -->
        <?php get_template_part("template-parts/section/how-it-works"); ?>


        <!-- Feature property section  -->
        <?php get_template_part("template-parts/section/featured-properties"); ?>


        <!-- Video section -->
        <?php get_template_part("template-parts/section/video"); ?>


        <!-- Top properties section  -->
        <?php get_template_part("template-parts/section/top-properties"); ?>


        <!-- Agent section-->
        <section class="agent-section spad secondary">
            <?php get_template_part("template-parts/section/agents"); ?>
        </section>


        <!-- Latest posts section -->
        <?php get_template_part("template-parts/section/posts"); ?>


    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>