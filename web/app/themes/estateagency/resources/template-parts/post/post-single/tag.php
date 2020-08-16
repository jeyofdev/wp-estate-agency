<?php

/**
 * Display the tag and the share button of the single post
 */

?>


<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="tag-share-option">
            <div class="tags">
                <?php foreach (get_the_tags() as $tag) : ?>
                    <a href="<?= get_tag_link($tag); ?>"><?= $tag->name; ?></a>
                <?php endforeach; ?>
            </div>
            <div class="social-share">
                <span><?= __("Share:", "estateagency"); ?></span>
                <?php get_template_part("template-parts/post/post-share"); ?>
            </div>
        </div>
    </div>
</div>