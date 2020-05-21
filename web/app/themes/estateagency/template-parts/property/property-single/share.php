<?php

/**
 * Display the share buttons
 */

?>


<div class="pd-details-social">
    <?php if (function_exists("sharing_display")) : ?>
        <?php sharing_display('', true); ?>
    <?php endif; ?>
</div>