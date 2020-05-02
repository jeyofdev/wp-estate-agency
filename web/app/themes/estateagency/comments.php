<!-- Comment form -->
<div class="row">
    <div class="col-lg-10 offset-lg-1">
        <?php if (comments_open()) : ?>
            <?php comment_form(); ?>
        <?php endif; ?>
    </div>
</div>