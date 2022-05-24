<?php

// Enregistrement d'un type de contenu supplémentaire
function caa_custom_post_types_events() {

	$labels = array(
		'name'              => 'Events',
		'singular_name'     => 'Event',
		'add_new'      => 'Add an Event',
		'menu_name'			=> 'Events'
	);

	$args = array(
		'public' => true,
		'show_in_rest' => true,
		'labels'  => $labels,
		'rewrite' => array(
			'slug' => 'events',
			'with_front' => false
		),
		'menu_icon' => 'dashicons-calendar-alt',
		'has_archive' => false,
		'supports' => array( 'title', 'editor', 'thumbnail', 'revisions')
		//'publicly_queryable'  => false
	);

	// Ajout du CPT
	register_post_type( 'events', $args );
}

add_action( 'init', 'caa_custom_post_types_events' );

?>