<?php

/**
 * Set thumbnail size
 */
function estateagency_image_size () : void
{
    set_post_thumbnail_size(360, 253, true);
}

add_action("after_setup_theme", "estateagency_image_size");