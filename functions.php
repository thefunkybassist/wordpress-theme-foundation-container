<?php

function theme_scripts() {
	/*//wp_enqueue_style( 'style-name', get_stylesheet_uri() );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/javascripts/vendor/custom.modernizr.js', array(), '1.0.0', false );
	//wp_enqueue_script( 'jquery-110', get_template_directory_uri() . '/javascripts/vendor/jquery.js', array(), '1.10.0', false );
	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/javascripts/foundation/foundation.js', array(), '1.0.0', true );
	wp_enqueue_script( 'clearing', get_template_directory_uri() . '/javascripts/foundation/foundation.clearing.js', array(), '1.0.0', true );
	//wp_enqueue_script( 'topbar', get_template_directory_uri() . '/javascripts/foundation/foundation.topbar.js', array(), '1.0.0', true );
	wp_enqueue_script( 'cookie', get_template_directory_uri() . '/javascripts/foundation/foundation.cookie.js', array(), '1.0.0', true );
	wp_enqueue_script( 'gridalicious', get_template_directory_uri() . '/javascripts/jquery.grid-a-licious.fixed.js', array(), '1.0.0', true );
	wp_enqueue_script( 'infinite-scroll', get_template_directory_uri() . '/javascripts/jquery.infinitescroll.js', array(), '1.0.0', true );
	//wp_enqueue_script( 'pace', get_template_directory_uri() . '/javascripts/pace.js', array(), '1.0.0', true );
	wp_enqueue_script( 'tooltipbar', get_template_directory_uri() . '/javascripts/jquery.toolbar.js', array(), '1.0.0', true );
	wp_enqueue_style( 'tooltipbar', get_template_directory_uri() . '/javascripts/jquery.toolbars.css' );
	wp_enqueue_script( 'init', get_template_directory_uri() . '/javascripts/init.js', array(), '1.0.0', true );*/
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


function unregister_widgets() {
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
}
add_action( 'widgets_init', 'unregister_widgets' );

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 400, 400 );

add_image_size( "thumb", 300, 300, true );



