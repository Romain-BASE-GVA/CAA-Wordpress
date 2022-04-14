<?php

// Enregistrement d'un type de contenu supplémentaire
function caa_custom_post_types_partners() {

	$labels = array(
		'name'              => 'Partners',
		'singular_name'     => 'Partner',
		'add_new'      => 'Add a Partner',
		'menu_name'			=> 'Partners'
	);

	$args = array(
		'public' => true,
		'labels'  => $labels,
		'rewrite' => array(
			'slug' => 'partners',
			'with_front' => false
		),
		'menu_icon' => 'dashicons-groups',
        'has_archive' => false,
		'supports' => array( 'title', 'editor', 'thumbnail')
	);

	// Ajout du CPT
	register_post_type( 'partners', $args );
}

add_action( 'init', 'caa_custom_post_types_partners' );

?>