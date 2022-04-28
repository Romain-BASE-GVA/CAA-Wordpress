<?php

// Add Shortcode
function quote_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'the_quote' => 'The quote',
			'the_caption' => 'the quote caption',
		),
		$atts
	);

	// Return custom embed code
	return '<div class="quote">
	            <blockquote class="quote__blockquote">
	                <p class="quote__content">' . $atts['the_quote'] . ' <span class="quote__caption">' . $atts['the_caption'] . '</span></p>
	            </blockquote>
	        </div>';

}

// hooks your functions into the correct filters
function wdm_add_mce_button() {
    // check user permissions
    if ( !current_user_can( 'edit_posts' ) &&  !current_user_can( 'edit_pages' ) ) {
               return;
       }
   // check if WYSIWYG is enabled
   if ( 'true' == get_user_option( 'rich_editing' ) ) {
       add_filter( 'mce_external_plugins', 'wdm_add_tinymce_plugin' );
       add_filter( 'mce_buttons', 'wdm_register_mce_button' );
       }
}
add_action('admin_init', 'wdm_add_mce_button');

// register new button in the editor
function wdm_register_mce_button( $buttons ) {
    array_push( $buttons, 'wdm_mce_button' );
    return $buttons;
}


// declare a script for the new button
// the script will insert the shortcode on the click event
function wdm_add_tinymce_plugin( $plugin_array ) {
  $plugin_array['wdm_mce_button'] = get_template_directory_uri() .'/assets/js/wdm-mce-button.js';
  return $plugin_array;
}

add_shortcode( 'quote', 'quote_shortcode' );