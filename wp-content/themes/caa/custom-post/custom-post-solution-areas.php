<?php

// Enregistrement d'un type de contenu supplémentaire
function caa_custom_post_types_solution_areas() {

	$labels = array(
		'name'              => 'Solution Areas',
		'singular_name'     => 'Solution Area',
		'add_new'			=> 'Add an Area',
		'menu_name'			=> 'Solution Areas'
	);

	$args = array(
		'public' => true,
		'labels'  => $labels,
		'rewrite' => array(
			'slug' => 'solution-areas',
			'with_front' => false
		),
		'hierarchical' => true,
		'menu_icon' => 'dashicons-admin-site-alt3',
        'has_archive' => false,
		'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'revisions')
	);

	// Ajout du CPT
	register_post_type( 'areas', $args );
}

add_action( 'init', 'caa_custom_post_types_solution_areas' );

?>