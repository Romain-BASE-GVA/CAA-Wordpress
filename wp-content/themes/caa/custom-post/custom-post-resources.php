<?php

// Enregistrement d'un type de contenu supplémentaire
function caa_custom_post_types_resources() {

	$labels = array(
		'name'              => 'Resources',
		'singular_name'     => 'Resource',
		'add_new'      => 'Add a Resource',
		'menu_name'			=> 'Resources'
	);

	$args = array(
		'public' => true,
		'show_in_rest' => true,
		'labels'  => $labels,
		'rewrite' => array(
			'slug' => 'resources',
			'with_front' => false
		),
		'menu_icon' => 'dashicons-portfolio',
		'has_archive' => false,
		'supports' => array( 'title', 'editor', 'thumbnail')
		//'publicly_queryable'  => false
	);

	// Ajout du CPT
	register_post_type( 'resources', $args );
}

add_action( 'init', 'caa_custom_post_types_resources' );

?>