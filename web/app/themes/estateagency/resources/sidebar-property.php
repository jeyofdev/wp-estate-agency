<?php
/**
 * The sidebar containing the property widget areas
 */
?>

<?php if (!dynamic_sidebar("property")) : ?>
    <?= the_widget("EstateagencySearchPropertyWidget", [], [
        "before_widget" => '',
        "after_widget" => '',
        "before_title" => '<h4>',
        "after_title" => '</h4>'
    ]); ?>

    <div class="best-agents">
        <?= the_widget("EstateagencyBestAgentsWidget", [], [
            "before_widget" => '',
            "after_widget" => '',
            "before_title" => '<h4>',
            "after_title" => '</h4>'
        ]); ?>
    </div>
<?php endif; ?>