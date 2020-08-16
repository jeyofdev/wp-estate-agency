<?php

/**
 * Display post comments
 */

?>


<?php if (absint(get_comments_number()) !== 0) : ?>
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="comment-option">
                <h4><?= comments_number(false, __("Comment", "estateagency"), __("Comments", "estateagency")) ?></h4>
                <?php wp_list_comments([
                    "style" => "div",
                    "walker" => new EstateAgencyCommentWalker()
                ]); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
