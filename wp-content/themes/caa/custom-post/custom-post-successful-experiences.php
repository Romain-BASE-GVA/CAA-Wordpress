<?php

// Enregistrement d'un type de contenu supplémentaire
function caa_custom_post_types_successful_experiences() {

	$labels = array(
		'name'              => 'Successful Experiences',
		'singular_name'     => 'Successful Experience',
		'add_new'      => 'Add an Experience',
		'menu_name'			=> 'Successful Experiences'
	);

	$args = array(
		'public' => true,
		'labels'  => $labels,
		'rewrite' => array(
			'slug' => 'successful-experiences',
			'with_front' => false
		),
		'menu_icon' => 'dashicons-star-filled',
        'has_archive' => false,
		'supports' => array( 'title', 'editor', 'thumbnail', 'revisions')
	);

	// Ajout du CPT
	register_post_type( 'experiences', $args );
}

add_action( 'init', 'caa_custom_post_types_successful_experiences' );

?>