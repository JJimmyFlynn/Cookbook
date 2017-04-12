<?php
/**
 * Use this filter to enable the 'Field Label Visibility' dropdown on a 
 * form fields appearance tab. You can then style the 'hidden_label'
 * CSS class Gravity Forms applies to the field's label
 */

add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );