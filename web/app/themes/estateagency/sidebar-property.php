<?php if (!dynamic_sidebar("property")) : ?>
    <div class="best-agents">
        <h4>Best Agents</h4>
        <?= the_widget( 'EstateagencyBestAgentsWidget' ); ?>
    </div>
<?php endif; ?>