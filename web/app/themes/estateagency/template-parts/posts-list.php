<?php

/**
 * Display the posts list
 */

?>


<div class="single-blog-item">
    <div class="sb-pic">
        <a href="<?= the_permalink(); ?>">
            <?php if (is_home()) : ?>
                <?= estateagency_post_thumbnail("post-thumbnail", 360, 253); ?>
            <?php else : ?>
                <?= estateagency_post_thumbnail("post_thumbnail_featured_image", 555, 253); ?>
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