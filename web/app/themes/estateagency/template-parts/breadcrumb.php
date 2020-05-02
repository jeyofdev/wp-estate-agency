<?php

/**
 * Display the breadcrumb
 */

?>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h2><?= EstateAgencyTitle::get_page_title(); ?></h2>
                    <div class="breadcrumb-option">
                        <a href="<?= home_url('/'); ?>"><i class="fa fa-home"></i> <?= __("Home", "estateagency"); ?></a>
                        <span><?= EstateAgencyTitle::get_page_breadcrumb(); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section Begin -->