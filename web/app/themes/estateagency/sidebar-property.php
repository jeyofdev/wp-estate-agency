<?php
/**
 * The sidebar containing the property widget areas
 */
?>

<?php if (!dynamic_sidebar("property")) : ?>
    <h4>Search Property</h4>
    <?= the_widget('EstateagencySearchPropertyWidget'); ?>

    <div class="best-agents">
        <h4>Best Agents</h4>
        <?= the_widget('EstateagencyBestAgentsWidget'); ?>
    </div>
<?php endif; ?>