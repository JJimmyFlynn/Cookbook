<?php

/**
 * Updates the admin messages displayed when
 * performing CRUD operations on a post type
 */

/**
 * Update Products Post Type Admin Messages
 */
function post_type_updated_messages( $messages ) {
    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );
    /**
     * Edit these
     */
    $post_type_slug = 'post_type';
    $label_singular = 'Post Type';

    $messages[$post_type_slug] = array(
        0  => '',
        1  => $label_singular . ' updated.',
        2  => 'Custom field updated.',
        3  => 'Custom field deleted.',
        4  => $label_singular . ' updated.',
        5  => isset( $_GET['revision'] ) ? sprintf( $label_singular . ' restored to revision from %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => $label_singular . ' published.',
        7  => $label_singular . ' saved.',
        8  => $label_singular . ' submitted.',
        9  => sprintf($label_singular . ' scheduled for: <strong>%1$s</strong>.', date_i18n( 'M j, Y @ G:i', strtotime( $post->post_date ) )),
        10 => $label_singular . ' draft updated.'
    );
    if ( $post_type_object->publicly_queryable & $post->post_type == $post_type_slug ) {
        $permalink = get_permalink( $post->ID );
        $view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), 'View ' . $label_singular );
        $messages[ $post_type ][1] .= $view_link;
        $messages[ $post_type ][6] .= $view_link;
        $messages[ $post_type ][9] .= $view_link;
        $preview_permalink = add_query_arg( 'preview', 'true', $permalink );
        $preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), 'Preview ' . $label_singular );
        $messages[ $post_type ][8]  .= $preview_link;
        $messages[ $post_type ][10] .= $preview_link;
    }
    return $messages;
}
add_filter('post_updated_messages', 'post_type_updated_messages');