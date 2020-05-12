<?php
/**
 * The sidebar containing the footer widget areas
 */
?>

<?php if (!dynamic_sidebar("footer")) : ?>
    <?= the_widget("EstateagencyContactWidget", [], [
        "before_widget" => '',
        "after_widget" => '',
        "before_title" => '<h4>',
        "after_title" => '</h4>'
    ]); ?>
<?php endif; ?>