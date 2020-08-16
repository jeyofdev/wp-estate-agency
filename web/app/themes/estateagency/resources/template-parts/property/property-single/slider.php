<?php

/**
 * Display the property slider
 */

?>


<?php if (have_rows("property_gallery")) : ?>
    <?php while (have_rows("property_gallery")) : the_row() ?>
        <?= estateagency_property_single_slider(); ?>
    <?php endwhile; ?>
<?php endif; ?>