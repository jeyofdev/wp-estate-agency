<?php

/**
 * Register a sidebar
 */
function estateagency_sidebar () : void
{
    register_widget(EstateagencyBestAgentsWidget::class);
    register_widget(EstateagencySearchPropertyWidget::class);

    register_sidebar([
        "id" => "property",
        "name" => __("Property sidebar", "estateagency"),
        "before_widget" => '<div class="sidebar__widget %2$s best-agents" id="%1$s">',
        "after_widget" => '</div>',
        "before_title" => '<h4>',
        "after_title" => '</h4>'
    ]);
}



add_action("widgets_init", "estateagency_sidebar");