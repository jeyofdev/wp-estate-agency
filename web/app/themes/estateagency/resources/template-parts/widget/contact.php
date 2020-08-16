<?php

/**
 * Display agency contact details
 */

?>


<ul class="contact-option">
    <li><i class="fas fa-map-marker-alt"></i> <?= EstateAgencyFormatHelpers::format_address(); ?></li>
    <li><i class="fas fa-phone-alt"></i> <?= EstateAgencyFormatHelpers::format_phone_number(); ?></li>
    <li><i class="fas fa-envelope"></i> <?= get_option(EstateagencyOptionAgency::EMAIL); ?></li>
    <li><i class="far fa-clock"></i> <?= EstateAgencyFormatHelpers::format_opening_hours(); ?></li>
</ul>