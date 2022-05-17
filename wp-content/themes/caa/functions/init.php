<?php
// // Définition du textdomain
	// load_theme_textdomain( 'caa' );

// Gestion du <title> par WP
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
// // Définition des ID de pages pour un accès plus facile

	// define('ID_RES', 220);

	// define('ID_HOME', 6);
	// define('ID_NEWS', 17);
	// define('ID_PORTFOLIO', 155);

// 	define('ID_SERVICES', 9);
// 	define('ID_SERVICES_REPARATION', 11);
// 	define('ID_SERVICES_REMPLACEMENT', 13);
// 	define('ID_SERVICES_TEINTAGE', 15);
// 	define('ID_SERVICES_DECOUPAGE', 17);

// 	define('ID_ASSURANCES', 21);
	
// 	define('ID_CONTACT', 23);
// 	define('ID_CONTACT_PETANGE', 25);
// 	define('ID_CONTACT_MERTZIG', 27);
// 	define('ID_CONTACT_BASTOGNE', 29);

// 	define('ID_DEVIS', 31);
// 	define('ID_LEGAL', 3);
// 	define('ID_CONDITIONS', 33);

// // Ajout de formats d'image
// 	// add_image_size( 'actus-thumb', 451, 400, true );

// // Suppression de l'éditeur et des vignettes pour les Pages
// 	function autovitres_remove_post_type_support() {
// 		remove_post_type_support( 'page', 'editor' );
// 		remove_post_type_support( 'post', 'editor' );
// 		remove_post_type_support( 'page', 'thumbnail' );
// 	}
// 	add_action( 'init', 'autovitres_remove_post_type_support', 10 );

// // Suppression de l'utilisation des étiquettes / tags de WP
	// function caa_unregister_tags() {
	// 	unregister_taxonomy_for_object_type( 'post_tag', 'post' );
	// 	unregister_taxonomy_for_object_type( 'post_category', 'post' );
	// }
	// add_action( 'init', 'caa_unregister_tags' );

// // Résolution d'un soucis avec la mise à jour de Contact Form 4.9
// // https://wordpress.org/support/topic/contact-form-7-version-4-8-sending-does-not-work/page/3/
// 	add_filter('wpcf7_load_js', '__return_false', 20);

// Add SVG support

/* Autoriser les fichiers SVG */
function wpc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');

// ACF - Activation des Options Page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Options du thème',
		'menu_title'	=> 'Theme options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

function prefix_reset_metabox_positions(){
	delete_user_meta( wp_get_current_user()->ID, 'meta-box-order_post' );
	delete_user_meta( wp_get_current_user()->ID, 'meta-box-order_page' );
	delete_user_meta( wp_get_current_user()->ID, 'meta-box-order_custom_post_type' );
  }
  add_action( 'admin_init', 'prefix_reset_metabox_positions' );

//   add_action('save_post', 'heap_child_check_thumbnail');
// add_action('admin_notices', 'heap_child_thumbnail_error');


// function heap_child_check_thumbnail($post_id) {

//   // change to any custom post type
//   if (get_post_type($post_id) != 'post') {
//     return;
//   }


//   if (!has_post_thumbnail($post_id)) {
//     // set a transient to show the users an admin message
//     set_transient("has_post_thumbnail", "no");
//     // unhook this function so it doesn't loop infinitely
//     remove_action('save_post', 'heap_child_check_thumbnail');
//     // update the post set it to draft
//     wp_update_post(array('ID' => $post_id, 'post_status' => 'draft'));
//     add_action('save_post', 'heap_child_check_thumbnail');
//   }
//   else {
//     delete_transient("has_post_thumbnail");
//   }

// }

// function heap_child_thumbnail_error() {
//   if (get_transient("has_post_thumbnail") == "no") {
//     echo "<div id='message' class='error'><p><strong>Vous devez sélectionner une Image mise en avant. Votre article est sauvegardé mais ne peut être publié.</strong></p></div>";
//     delete_transient("has_post_thumbnail");
//   }
// }