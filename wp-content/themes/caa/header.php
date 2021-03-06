<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.min.css">
    <?php wp_head(); ?>
  </head>
  <?php 
    $lightMode = isset($_COOKIE['lightMode']) ? $_COOKIE['lightMode'] : 'light';
    $lightModeClass = $lightMode == 'dark' ? 'dark-mode' : '';
  ?>
  <body <?php body_class($lightModeClass); ?> data-lang="<?php echo apply_filters( 'wpml_current_language', null ); ?>">
  
  <?php wp_body_open(); ?>
    <?php get_template_part( 'template-parts/topbar' ); ?>

