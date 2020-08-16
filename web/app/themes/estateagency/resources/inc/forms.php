<?php

/**
 * Contact form 7 remove span
 */
function estateagency_contact_form_remove_span (string $content) : string
{
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    $content = str_replace('<br />', '', $content);
    $content = str_replace('<p>', '', $content);
    $content = str_replace('</p>', '', $content);

    return $content;
}



add_filter("wpcf7_form_elements", "estateagency_contact_form_remove_span");