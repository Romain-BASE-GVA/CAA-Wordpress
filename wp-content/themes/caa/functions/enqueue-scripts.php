<?php
function enqueue_scripts() {

    // jQuery
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, '3.3.1', true);
    wp_enqueue_script('jquery');

    // Modernizr
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/static/js/modernizr.js', null, '3.6.0', false );

    // Main
    wp_enqueue_script( 'main', get_template_directory_uri() . '/static/js/scripts.js', array('jquery'), false, true );

}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );