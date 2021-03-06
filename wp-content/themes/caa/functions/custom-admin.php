<?php

// Modification du logo de la page de login

	function caa_custom_login_image() {
		echo "
		<style>
		body.login #login h1 a {
			background: url('" . get_bloginfo('template_url') . "/assets/img/logo-caa.svg') center center no-repeat transparent;
		    background-size: contain;
		    width: auto;
			//height: 320px;
		}

		#loginform {
			border: none;
			border-radius: 10px;
		}
		</style>";
	}
	add_action("login_head", "caa_custom_login_image");

// Suppression de certaines entrées du menu Admin

	function caa_remove_menus(){
	  
	  // remove_menu_page( 'index.php' );                  //Dashboard
	  // remove_menu_page( 'edit.php' );                   //Posts
	  // remove_menu_page( 'upload.php' );                 //Media
	  // remove_menu_page( 'edit.php?post_type=page' );    //Pages
	  remove_menu_page( 'edit-comments.php' );          //Comments
	  // remove_menu_page( 'themes.php' );                 //Appearance
	  // remove_menu_page( 'plugins.php' );                //Plugins
	  // remove_menu_page( 'users.php' );                  //Users
	  // remove_menu_page( 'tools.php' );                  //Tools
	  // remove_menu_page( 'options-general.php' );        //Settings
	  
	}
	add_action( 'admin_menu', 'caa_remove_menus' );

// Afficher Yoast en bas de page

function caa_yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'caa_yoasttobottom');