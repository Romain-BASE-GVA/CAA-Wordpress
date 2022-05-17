<?php
/*=============================================
=            BREADCRUMBS			            =
=============================================*/

$whitelist = ['127.0.0.1', '::1', 'localhost', '', 'caa']; 
$isLocalHost = in_array($_SERVER['REMOTE_ADDR'], $whitelist);

$aIndex = $isLocalHost ? 'CAA-test' : 'climat_action_accelerator_en';

//  to include in functions.php
function the_breadcrumb() {
    global $aIndex;

    $sep = ' > ';

    if (!is_front_page()) {
	
	// Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;
	
	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        // if (is_category() || is_single() ){
        //     the_category('title_li=');
        // } elseif (is_archive() || is_single()){
        //     if ( is_day() ) {
        //         printf( __( '%s', 'text_domain' ), get_the_date() );
        //     } elseif ( is_month() ) {
        //         printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
        //     } elseif ( is_year() ) {
        //         printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
        //     } else {
        //         _e( 'Blog Archives', 'text_domain' );
        //     }
        // }
	
	// If the current page is a single post, show its title with the separator
        if (is_single()) {
            global $post;
            $post_type = get_post_type_object($post->post_type);
            echo '<a href="'. get_permalink( get_page_by_title( 'Resources' ) ) .'?'. $aIndex .'[refinementList][postType][0]='. $post_type->labels->name .'" title="">';
            echo $post_type->labels->name;
            echo '</a>';
            echo $sep;
            echo '<strong>';
            the_title();
            echo '</strong>';
        }
	
	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }
	
	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_post($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }

        echo '</div>';
    }
}
/*
* Credit: http://www.thatweblook.co.uk/blog/tutorials/tutorial-wordpress-breadcrumb-function/
*/
?>