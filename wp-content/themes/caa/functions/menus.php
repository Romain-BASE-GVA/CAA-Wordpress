<?php

// Ajout du menu principal
function caa_register_my_menu() {
	register_nav_menus( array(
		'primary'	=> __( 'Main nav', 'caa' ),
		'footer'	=> __( 'Footer nav', 'caa' ),
		// 'showroom'	=> __( 'Menu footer Showroom', 't-ing' ),
		// 'legal'	=> __( 'Menu mentions légales', 't-ing' ),
		// 'decouvrir'	=> __( 'Menu footer Decouvrir', 't-ing' )
	));
}
add_action( 'after_setup_theme', 'caa_register_my_menu' );
