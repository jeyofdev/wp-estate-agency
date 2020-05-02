<!-- list of comments -->
<?php if (absint(get_comments_number()) !== 0) : ?>
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="comment-option">
                <h4><?= comments_number(false, "Comment", "Comments") ?></h4>
                <?php wp_list_comments([
                    "style" => "div",
                    "walker" => new EstateAgencyCommentWalker()
                ]); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- list of comments end -->


<!-- Comment form -->
<div class="row">
    <div class="col-lg-10 offset-lg-1">
        <?php if (comments_open()) : ?>
            <?php comment_form(); ?>
        <?php endif; ?>
    </div>
</div>
<!-- Comment form end -->