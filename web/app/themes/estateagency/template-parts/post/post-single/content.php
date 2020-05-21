<?php

/**
 * Display the content of the single post
 */

?>


<div class="row">
    <div class="col-lg-1 offset-lg-1">
        <div class="blog-details-social">
            <h6><?= __("Share:", "estateagency"); ?></h6>
            <div class="social-list">
                <?php get_template_part("template-parts/post/post-share"); ?>
            </div>
        </div>
    </div>

    <div class="col-lg-12 blog-details-content">
        <?= the_content(); ?>
    </div>
</div>