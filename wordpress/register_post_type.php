<?php

/**
 * Boilerplate to register a WordPress Post Type
 */

if ( !post_type_exists('new_type') ) {
  function register_new_post_type() {
    // Edit these!
    $label_singular = 'New Type';
    $label_plural   = 'New Types';

    register_post_type(
      'new_post_type',
      array(
        'label'           => $label_plural,
        'description'     => '',
        'public'          => true,
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'hierarchical'    => false,
        'query_var'       => true,
        'has_archive'     => true,
        'menu_icon'       => 'dashicons-awards',
        'rewrite' => array(
          'slug'       => 'type',
          'with_front' => false,
        ),
        'supports' => array(
          'title',
          'editor',
          'revisions',
          'thumbnail',
        ),
        'labels' => array (
          'name'               => $label_plural,
          'singular_name'      => $label_singular,
          'menu_name'          => $label_plural,
          'add_new'            => 'Add New',
          'add_new_item'       => 'Add New ' . $label_singular,
          'edit'               => 'Edit',
          'edit_item'          => 'Edit ' . $label_singular,
          'new_item'           => 'New ' . $label_singular,
          'view'               => 'View ' . $label_singular,
          'view_item'          => 'View ' . $label_singular,
          'search_items'       => 'Search ' . $label_plural,
          'not_found'          => 'No ' . $label_plural . ' Found',
          'not_found_in_trash' => 'No ' . $label_plural . ' Found in Trash',
          'parent'             => 'Parent ' . $label_singular,
          'featured_image'     => $label_singular . ' Image',
          'set_featured_image' => 'Set ' . $label_singular . ' Image',
          'remove_featured_image' => 'Remove ' . $label_singular . ' Image',
          'use_featured_image' => 'Use as ' . $label_singular . ' Image'
        )
      )
    );
  }
  add_action('init', 'register_new_post_type');
}
