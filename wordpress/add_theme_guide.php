<?php

/**
 * Adds a 'Theme Guide' link to the admin menu for theme documentation. Assumes
 * an ACF field called 'theme_guide_file' attached to an options page.
 */

function add_theme_guide_link() {
  global $submenu;
  $theme_guide_url = get_field('theme_guide_file', 'option');
  if ($theme_guide_url) {
    $submenu['index.php'][500] = [ 'Theme Guide', 'edit_posts' , $theme_guide_url ]; 
    $submenu['tools.php'][500] = [ 'Theme Guide', 'edit_posts' , $theme_guide_url ];
  }
}
add_action( 'admin_menu', 'add_theme_guide_link' );