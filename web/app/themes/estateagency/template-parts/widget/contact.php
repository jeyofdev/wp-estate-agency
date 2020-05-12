<?php

/**
 * Display agency contact details
 */

?>


<ul class="contact-option">
    <li><i class="fa fa-map-marker"></i> <?= EstateAgencyFormatHelpers::format_address(); ?></li>
    <li><i class="fa fa-phone"></i> <?= EstateAgencyFormatHelpers::format_phone_number(); ?></li>
    <li><i class="fa fa-envelope"></i> <?= get_option(EstateagencyOptionAgency::EMAIL); ?></li>
    <li><i class="fa fa-clock-o"></i> <?= EstateAgencyFormatHelpers::format_opening_hours(); ?></li>
</ul>