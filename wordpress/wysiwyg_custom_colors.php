<?php

/**
 * Replaces the default text color choices in the WordPress
 * WYSIWYG editor with a custom set of colors
 */

/**
 * Restrict colors available in the WYSIWYG color picker
 */
function wysiwyg_custom_colors($init) {
  // Define allowed colors
  $default_colors = '
    "000000", "Black",
    "0CA9D1", "Teal",
    "5175FB", "Blue",
    "FC4BBA", "Pink",
    "8357FB", "Purple",
    "FC506B", "Orange"';

  // Replace default textcolor map with allowed colors
  $init['textcolor_map'] = '['.$default_colors.']';

  return $init;
}
add_filter('tiny_mce_before_init', __NAMESPACE__ . '\\wysiwyg_custom_colors');