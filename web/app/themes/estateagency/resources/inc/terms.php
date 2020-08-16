<?php

/**
 * Display terms as a list
 */
function estateagency_list_terms (array $terms, string $taxonomy, ?string $classIcon = null) : string
{
    $output = '<ul>';

    foreach ($terms as $term) {
        $icon = !is_null($classIcon) ? '<i class="' . $classIcon . '"></i>' : '';
        $output .= '<li>' .  $icon . ' <a href="' . get_term_link($term->slug, $taxonomy) . '">' . $term->name . '</a></li>';
    }

    $output .= '</ul>';

    return $output;
}