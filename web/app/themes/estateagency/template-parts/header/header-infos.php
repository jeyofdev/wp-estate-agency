<?php

/**
 * Display the header infos
 */

?>

<div class="nav-logo-right">
    <ul>
        <li>
            <i class="icon_phone"></i>
            <div class="info-text">
                <span><?= __("Phone:", "estateagency"); ?></span>
                <p><?= EstateAgencyFormatHelpers::format_phone_number(); ?></p>
            </div>
        </li>
        <li>
            <i class="icon_map"></i>
            <div class="info-text">
                <span><?= __("Address:", "estateagency"); ?></span>
                <p><?= EstateAgencyFormatHelpers::format_address(); ?></p>
            </div>
        </li>
        <li>
            <i class="icon_mail"></i>
            <div class="info-text">
                <span><?= __("Email:", "estateagency"); ?></span>
                <p><?= get_option(EstateagencyOptionAgency::EMAIL); ?></p>
            </div>
        </li>
    </ul>
</div>