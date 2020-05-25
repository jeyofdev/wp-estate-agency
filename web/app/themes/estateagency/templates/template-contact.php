<?php
/**
 * Template Name: Page contact
 * Template Post Type: page
 */
?>

<?php get_header(); ?>


<!-- breadcrumb -->
<?php get_template_part("template-parts/section/breadcrumb"); ?>


<!-- Contact section  -->
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <section class="contact-section secondary">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-7 offset-lg-1">
                                <div class="contact-text">
                                    <div class="section-title">
                                        <span><?= the_field("contact_subtitle"); ?></span>
                                        <h2><?= the_field("contact_title"); ?></h2>
                                    </div>
                                    <?= do_shortcode('[contact-form-7 id="387" title="contact" html_class="contact-form"]'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<!-- Contact section end -->


<?php get_footer(); ?>