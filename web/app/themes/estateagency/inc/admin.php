<?php

/**
 * Add custom columns in the properties list of the administration
 */
function estateagency_add_custom_columns_property ($columns) : array
{
    return [
        "cb" => $columns["cb"],
        "thumbnail" => __("Thumbnail", "estateagency"),
        "title" => $columns["title"],
        "agent" => __("Agent", "estateagency"),
        "contract_type" => __("Contract type", "estateagency"),
        "date" => $columns["date"],
    ];
}



/**
 * Set the content of custom columns in the properties list of the administration
 */
function estateagency_add_custom_columns_property_content ($column, $postId) : void
{
    if ($column === "thumbnail") {
        the_post_thumbnail("property_thumbnail_admin", $postId);
    }
    elseif ($column === "agent") {
        $terms = get_the_terms($postId, "property_agent");
        foreach ($terms as $term) {
            echo $term->name;
        }
    }
    elseif ($column === "contract_type") {
        $terms = get_the_terms($postId, "property_contract_type");
        foreach ($terms as $term) {
            echo $term->name;
        }
    }
}



/**
 * Add custom columns in the properties list of the administration
 */
function estateagency_add_custom_columns_agent ($columns) : array
{
	return [
        "cb" => $columns["cb"],
        "thumbnail" => __("Thumbnail", "estateagency"),
		"title" => $columns["title"],
		"date" => $columns["date"],
    ];
}



/**
 * Set the content of custom columns in the agent list of the administration
 */
function estateagency_add_custom_columns_agent_content ($column, $postId) : void
{
    if ($column === "thumbnail") {
        the_post_thumbnail("property_thumbnail_admin", $postId);
    }
}



/**
 * Transform the checkbox by radio buttons from taxonomies
 */
function estateagency_term_radio_checklist ($args) : array
{
    if ((!empty( $args["taxonomy"])) && ($args["taxonomy"] === "property_contract_type" || $args["taxonomy"] === "property_type")) {
        if (empty($args["walker"]) || is_a($args["walker"], "Walker") ) {
            $args['walker'] = new EstateAgencyTaxonomyRadioChecklistWalker();
        }
    }

    return $args;
}



/**
 * Remove the 'most used' panel from taxonomies
 *
 * @since 2.6.0
 *
 * @todo Create taxonomy-agnostic wrapper for this.
 *
 * @param WP_Post $post Post object.
 * @param array   $box {
 *     Categories meta box arguments.
 *
 *     @type string   $id       Meta box 'id' attribute.
 *     @type string   $title    Meta box title.
 *     @type callable $callback Meta box display callback.
 *     @type array    $args {
 *         Extra meta box arguments.
 *
 *         @type string $taxonomy Taxonomy. Default 'category'.
 *     }
 * }
 */
function estateagency_remove_most_used_meta_box( $post, $box) {
    $defaults = ['taxonomy' => substr($box["id"], 0, -3)];

	if ( ! isset( $box['args'] ) || ! is_array( $box['args'] ) ) {
		$args = array();
	} else {
		$args = $box['args'];
    }

	$parsed_args = wp_parse_args( $args, $defaults );
	$tax_name    = esc_attr( $parsed_args['taxonomy'] );
    $taxonomy    = get_taxonomy( $parsed_args['taxonomy'] );
    ?>

	<div id="taxonomy-<?php echo $tax_name; ?>" class="categorydiv">
		<ul id="<?php echo $tax_name; ?>checklist" data-wp-lists="list:<?php echo $tax_name; ?>" class="categorychecklist form-no-clear">
            <?php
            wp_terms_checklist($post->ID, [
                'taxonomy' => $tax_name
            ]);
            ?>
        </ul>
	<?php if ( current_user_can( $taxonomy->cap->edit_terms ) ) : ?>
			<div id="<?php echo $tax_name; ?>-adder" class="wp-hidden-children">
				<a id="<?php echo $tax_name; ?>-add-toggle" href="#<?php echo $tax_name; ?>-add" class="hide-if-no-js taxonomy-add-new">
					<?php
						/* translators: %s: Add New taxonomy label. */
						printf( __( '+ %s' ), $taxonomy->labels->add_new_item );
					?>
				</a>
				<p id="<?php echo $tax_name; ?>-add" class="category-add wp-hidden-child">
					<label class="screen-reader-text" for="new<?php echo $tax_name; ?>"><?php echo $taxonomy->labels->add_new_item; ?></label>
					<input type="text" name="new<?php echo $tax_name; ?>" id="new<?php echo $tax_name; ?>" class="form-required form-input-tip" value="<?php echo esc_attr( $taxonomy->labels->new_item_name ); ?>" aria-required="true"/>
					<label class="screen-reader-text" for="new<?php echo $tax_name; ?>_parent">
						<?php echo $taxonomy->labels->parent_item_colon; ?>
					</label>
					<?php
					$parent_dropdown_args = array(
						'taxonomy'         => $tax_name,
						'hide_empty'       => 0,
						'name'             => 'new' . $tax_name . '_parent',
						'orderby'          => 'name',
						'hierarchical'     => 1,
						'show_option_none' => '&mdash; ' . $taxonomy->labels->parent_item . ' &mdash;',
					);

					/**
					 * Filters the arguments for the taxonomy parent dropdown on the Post Edit page.
					 *
					 * @since 4.4.0
					 *
					 * @param array $parent_dropdown_args {
					 *     Optional. Array of arguments to generate parent dropdown.
					 *
					 *     @type string   $taxonomy         Name of the taxonomy to retrieve.
					 *     @type bool     $hide_if_empty    True to skip generating markup if no
					 *                                      categories are found. Default 0.
					 *     @type string   $name             Value for the 'name' attribute
					 *                                      of the select element.
					 *                                      Default "new{$tax_name}_parent".
					 *     @type string   $orderby          Which column to use for ordering
					 *                                      terms. Default 'name'.
					 *     @type bool|int $hierarchical     Whether to traverse the taxonomy
					 *                                      hierarchy. Default 1.
					 *     @type string   $show_option_none Text to display for the "none" option.
					 *                                      Default "&mdash; {$parent} &mdash;",
					 *                                      where `$parent` is 'parent_item'
					 *                                      taxonomy label.
					 * }
					 */
					$parent_dropdown_args = apply_filters( 'post_edit_category_parent_dropdown_args', $parent_dropdown_args );

					wp_dropdown_categories( $parent_dropdown_args );
					?>
					<input type="button" id="<?php echo $tax_name; ?>-add-submit" data-wp-lists="add:<?php echo $tax_name; ?>checklist:<?php echo $tax_name; ?>-add" class="button category-add-submit" value="<?php echo esc_attr( $taxonomy->labels->add_new_item ); ?>" />
					<?php wp_nonce_field( 'add-' . $tax_name, '_ajax_nonce-add-' . $tax_name, false ); ?>
					<span id="<?php echo $tax_name; ?>-ajax-response"></span>
				</p>
			</div>
		<?php endif; ?>
	</div>
	<?php
}



/**
 * Redefine the metaboxes of taxonomies
 */
function estateagency_init_meta_box () : void
{  
	remove_meta_box('property_contract_typediv', 'property', 'normal');  
	add_meta_box( "property_contract_typediv", "Contract types", "estateagency_remove_most_used_meta_box", "property" , "side");  
	
	remove_meta_box('property_typediv', 'property', 'normal'); 
	add_meta_box( "property_typediv", "Types", "estateagency_remove_most_used_meta_box", "property" , "side");   
}



add_filter("manage_property_posts_columns", "estateagency_add_custom_columns_property");
add_filter("manage_property_posts_custom_column", "estateagency_add_custom_columns_property_content", 10, 2);
add_filter("manage_agent_posts_columns", "estateagency_add_custom_columns_agent");
add_filter("manage_agent_posts_custom_column", "estateagency_add_custom_columns_agent_content", 10, 2);
add_filter("wp_terms_checklist_args", "estateagency_term_radio_checklist");
add_action("admin_menu", "estateagency_init_meta_box");