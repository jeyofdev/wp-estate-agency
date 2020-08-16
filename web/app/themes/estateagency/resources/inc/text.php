<?php

/**
 * Set the length of the excerpt
 * 
 * @return void|int
 */
function estateagency_excerpt_length (int $length)
{
    if (is_post_type_archive("property")) {
        return 20;
    }

    return 30;
}




add_filter("excerpt_length", "estateagency_excerpt_length");