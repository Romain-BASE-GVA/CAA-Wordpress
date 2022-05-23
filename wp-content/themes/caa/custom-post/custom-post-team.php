<?php

// Enregistrement d'un type de contenu supplémentaire
function caa_custom_post_types_team() {

	$labels = array(
		'name'              => 'Team',
		'singular_name'     => 'Team Member',
		'add_new'      => 'Add a Member',
		'menu_name'			=> 'Team'
	);

	$args = array(
		'public' => true,
		'show_in_rest' => true,
		'labels'  => $labels,
		'menu_icon' => 'dashicons-universal-access-alt',
		'has_archive' => false,
		'supports' => array( 'title', 'editor', 'thumbnail'),
		'publicly_queryable'  => false
	);

	// Ajout du CPT
	register_post_type( 'team', $args );
}

add_action( 'init', 'caa_custom_post_types_team' );

?>