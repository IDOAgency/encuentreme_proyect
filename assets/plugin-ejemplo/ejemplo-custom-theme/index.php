<?php

/*
Plugin Name: EM Custom Theme
Plugin URI: http://www.idoagency.com/wp/plugins/em-custom-theme
Description: Encuentrame.com Custom Theme - Upload and Activate.
Author: Ivan Guevara
Version: 1.0
Author URI: http://idoagency.com
*/

function em_custom_theme_style() {
	wp_enqueue_style('em-custom',plugins_url('css/em-custom.css', __FILE__));
	
	// <!-- bootstrap -->
	wp_enqueue_style('bootstrap', plugins_url('css/bootstrap/bootstrap.css', __FILE__));
	wp_enqueue_style('bootstrap-responsive', plugins_url('css/bootstrap/bootstrap-responsive.css', __FILE__));
	wp_enqueue_style('bootstrap-overrides', plugins_url('css/bootstrap/bootstrap-overrides.css', __FILE__));
	
	// <!-- global styles -->
	wp_enqueue_style('layout', plugins_url('css/layout.css', __FILE__));
	wp_enqueue_style('elements', plugins_url('css/elements.css', __FILE__));
	wp_enqueue_style('icons', plugins_url('css/icons.css', __FILE__));
	
	// <!-- libraries -->
	wp_enqueue_style('awesome', plugins_url('css/lib/font-awesome.css', __FILE__));

    // <!-- this page specific styles -->
	wp_enqueue_style('signin', plugins_url('css/compiled/signin.css', __FILE__));

    // <!-- open sans font -->
    wp_enqueue_style('google-fonts', "http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,600,700,800");
	
	
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	
	echo '<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->';
	
	wp_enqueue_script('signin', plugins_url('js/bootstrap.min.js', __FILE__));
	wp_enqueue_script('signin', plugins_url('js/theme.js', __FILE__));
}

function custom_login_head() {
	
	wp_enqueue_style('em-custom',plugins_url('css/em-custom.css', __FILE__));
	
	// <!-- bootstrap -->
	wp_enqueue_style('bootstrap', plugins_url('css/bootstrap/bootstrap.css', __FILE__));
	wp_enqueue_style('bootstrap-responsive', plugins_url('css/bootstrap/bootstrap-responsive.css', __FILE__));
	wp_enqueue_style('bootstrap-overrides', plugins_url('css/bootstrap/bootstrap-overrides.css', __FILE__));
	
	// <!-- global styles -->
	wp_enqueue_style('layout', plugins_url('css/layout.css', __FILE__));
	wp_enqueue_style('elements', plugins_url('css/elements.css', __FILE__));
	wp_enqueue_style('icons', plugins_url('css/icons.css', __FILE__));
	
	// <!-- libraries -->
	wp_enqueue_style('awesome', plugins_url('css/lib/font-awesome.css', __FILE__));

    // <!-- this page specific styles -->
	wp_enqueue_style('signin', plugins_url('css/compiled/signin.css', __FILE__));

    // <!-- open sans font -->
    wp_enqueue_style('google-fonts', "http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,800italic,400,300,600,700,800");
	
	
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	
	echo '<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->';
	
	wp_enqueue_script('signin', plugins_url('js/bootstrap.min.js', __FILE__));
	wp_enqueue_script('signin', plugins_url('js/theme.js', __FILE__));
}


//add_action('login_head', 'custom_head');
add_action('admin_enqueue_scripts', 'em_custom_theme_style');
add_action('login_head', 'custom_login_head');

?>