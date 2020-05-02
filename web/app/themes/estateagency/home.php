<?php get_header(); ?>


<!-- breadcrumb -->
<?php get_template_part("template-parts/breadcrumb"); ?>




    <!-- Blog list -->
    <section class="blog-section blog-page spad">
        <div class="container">
            <div class="row">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog-item">
                                <div class="sb-pic">
                                    <a href="<?= the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail(); ?>
                                        <?php else : ?>
                                            <img width="360" height="253" src="<?= get_template_directory_uri(); ?>/assets/images/blog/default.jpg">
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="sb-text">
                                    <ul>
                                        <li><i class="fa fa-user"></i> <?= get_the_author(); ?></li>
                                        <li><i class="fa fa-clock-o"></i> <?= EstateAgencyFormatHelpers::format_date(); ?></li>
                                    </ul>
                                    <h4><a href="<?= the_permalink(); ?>"><?= the_title() ?></a></h4>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Blog list end -->


<?php get_footer(); ?>