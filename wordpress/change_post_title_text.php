<?php

/**
 * Changes the default 'Enter Title Here'
 * text on the post edit screen to a
 * phrase of your choosing
 */

 function post_type_change_title_text( $title ){
    $screen = get_current_screen();
      
     // Edit here!
    if  ( 'post_type' == $screen->post_type ) {
      $title = 'Product Title';
    }
 
    return $title;
}
 
add_filter( 'enter_title_here', 'post_type_change_title_text' );