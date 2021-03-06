<?php
/**
 * The sidebar containing the footer widget areas
 */
?>

<?php if (!dynamic_sidebar("footer")) : ?>
    <?= the_widget("EstateagencyCityPropertyWidget", [], [
        "before_widget" => '',
        "after_widget" => '',
        "before_title" => '<h4 class="secondary">',
        "after_title" => '</h4>'
    ]); ?>


    <?= the_widget("EstateagencySocialLinksWidget", [], [
        "before_widget" => '',
        "after_widget" => '',
        "before_title" => '<h4 class="secondary">',
        "after_title" => '</h4>'
    ]); ?>


    <?= the_widget("EstateagencyContactWidget", [], [
        "before_widget" => '',
        "after_widget" => '',
        "before_title" => '<h4 class="secondary">',
        "after_title" => '</h4>'
    ]); ?>
<?php endif; ?>