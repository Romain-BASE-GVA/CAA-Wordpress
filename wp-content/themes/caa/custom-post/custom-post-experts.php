<?php

// Enregistrement d'un type de contenu supplémentaire
function caa_custom_post_types_experts() {

	$labels = array(
		'name'              => 'Experts',
		'singular_name'     => 'Expert',
		'add_new'      => 'Add an Expert',
		'menu_name'			=> 'Experts'
	);

	$args = array(
		'public' => true,
		'show_in_rest' => true,
		'labels'  => $labels,
		'rewrite' => array(
			'slug' => 'experts',
			'with_front' => false
		),
		'menu_icon' => 'dashicons-businessperson',
		'has_archive' => false,
		'supports' => array( 'title', 'editor', 'thumbnail', 'revisions')
		//'publicly_queryable'  => false
	);

	// Ajout du CPT
	register_post_type( 'experts', $args );
}

add_action( 'init', 'caa_custom_post_types_experts' );

?>