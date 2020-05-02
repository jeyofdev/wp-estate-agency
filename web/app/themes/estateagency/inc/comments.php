<?php

/**
 * Set the reply link class of a comment
 */
function estateagency_comment_reply_class (string $class) : string
{
    $class = str_replace("comment-reply-link", "comment-btn", $class);
    return $class;
}



/**
 * Set the edit link class of a comment
 */
function estateagency_comment_edit_class (string $class) : string
{
    $class = str_replace("comment-edit-link", "comment-btn", $class);
    return $class;
}



/**
 * Set the comment form fields
 */
function estateagency_comment_form_fields (array $fields) : array
{
    $authorLabel = __("Name", "estateagency");
    $emailLabel = __("Email", "estateagency");
    $urlLabel = __("Website", "estateagency");

    $fields['author'] = 
        '<div class="form-group">
            <input type="text" class="form-control" id="author" name="author" placeholder="' . $authorLabel . '" required>
        </div>'
    ;
    
    $fields['email'] = 
        '<div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="' . $emailLabel . '" required>
        </div>'
    ;

    $fields['url'] = '<input type="url" class="form-control full" id="url" name="url" placeholder="' . $urlLabel . '">';

    return $fields;
}



/**
 * Set the comment form arguments
 */
function estateagency_comment_form (array $fields) : array
{
    $commentLabel = _x("Comment", "noun");

    $user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

    $fields["title_reply_before"] = '<h4 id="reply-title" class="comment-reply-title">';
    $fields["title_reply_after"] = "</h4>";
    $fields["label_submit"] = __("Send Message", "estateagency");
    $fields["submit_button"] = '<input name="%1$s" type="submit" id="%2$s" class="site-btn" value="%4$s" />';
    $fields["title_reply"] = __("Leave A Comment", "estateagency");
    $fields["class_form"] = "comment-form";
    $fields["class_submit"] = "site-btn";
    $fields["comment_notes_before"] = str_replace("comment-notes", "comment-notes full", $fields["comment_notes_before"]);
    $fields["logged_in_as"] = str_replace("logged-in-as", "logged-in-as full", $fields["logged_in_as"]);
    $fields["comment_field"] = '<textarea class="form-control full" id="comment" name="comment" cols="45" rows="5" maxlength="65525" placeholder="' . $commentLabel . '" required></textarea>';

    return $fields;
}



/**
 * Set the order of the comment form fields
 */
function no_comment_fields_custom_order($fields) {
    $commentFields = array_shift($fields);
    $newFields = [];

    foreach ($fields as $k => $v) {
        if ($k !== "cookies") {
            $newFields[$k] = $v;
        }
    }

    $newFields["comment"] = $commentFields;

    return $newFields;
}



add_filter("comment_reply_link", "estateagency_comment_reply_class");
add_filter("edit_comment_link", "estateagency_comment_edit_class");
add_filter("comment_form_default_fields", "estateagency_comment_form_fields");
add_filter("comment_form_defaults", "estateagency_comment_form");
add_filter("comment_form_fields", "no_comment_fields_custom_order");