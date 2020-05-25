<?php

/**
 * Display video of the agency
 */

?>


<?php if (!is_null(get_field("background_video")["sizes"]["home_testimonial_video_background"])) : ?>
    <div class="video-section  set-bg" data-setbg="<?= get_field("background_video")["sizes"]["home_testimonial_video_background"]; ?>">
<?php else : ?>
    <div class="video-section set-bg empty" data-setbg="">
<?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="video-text">
                    <a href="<?= the_field("video_url"); ?>" class="play-btn video-popup">
                        <i class="fas fa-play"></i>
                    </a>
                    <h4 class="secondary"><?= the_field("video_title"); ?></h4>
                    <h2 class="secondary"><?= the_field("video_subtitle"); ?></h2>
                </div>
            </div>
        </div>
    </div>
</div>