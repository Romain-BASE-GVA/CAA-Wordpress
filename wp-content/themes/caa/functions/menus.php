<?php

// Ajout du menu principal
function caa_register_my_menu() {
	register_nav_menus( array(
		'solutions'	=> __( 'Solutions Navigation', 'caa' ),
		'community'	=> __( 'Community Navigation', 'caa' ),
		'showroom'	=> __( 'Footer Navigation', 'caa' ),
		// 'legal'	=> __( 'Menu mentions légales', 't-ing' ),
		// 'decouvrir'	=> __( 'Menu footer Decouvrir', 't-ing' )
	));
}
add_action( 'after_setup_theme', 'caa_register_my_menu' );
