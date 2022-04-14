<?php

// Enregistrement d'un type de contenu supplémentaire
function caa_custom_post_types_solutions() {

	$labels = array(
		'name'              => 'Solutions',
		'singular_name'     => 'Solution',
		'add_new'			=> 'Add a Solution',
		'menu_name'			=> 'Solutions'
	);

	$args = array(
		'public' => true,
		'labels'  => $labels,
		'rewrite' => array(
			'slug' => 'solutions',
			'with_front' => false
		),
		'menu_icon' => 'dashicons-admin-page',
        'has_archive' => false,
		'supports' => array( 'title', 'editor', 'thumbnail')
	);

	// Ajout du CPT
	register_post_type( 'solutions', $args );
}

add_action( 'init', 'caa_custom_post_types_solutions' );

?>