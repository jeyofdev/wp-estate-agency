<?php

/**
 * Display the single post header
 */

?>


<section class="blog-details-hero set-bg" data-setbg="<?= estateagency_post_thumbnail_background($post, "post_single_thumbnail"); ?>">
    <div class="mask"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bd-hero-text">
                    <?php foreach (get_the_category() as $category) : ?>
                        <a href="<?= get_category_link($category); ?>">
                            <span><?= $category->name; ?></span>
                        </a>
                    <?php endforeach; ?>
                    <h2><?= the_title() ?></h2>
                    <ul>
                        <li><i class="fas fa-user"></i> <?= get_the_author(); ?></li>
                        <li><i class="far fa-clock"></i> <?= EstateAgencyFormatHelpers::format_date(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>