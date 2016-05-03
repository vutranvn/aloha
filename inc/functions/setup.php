<?php
/**
 * Setup functions
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1170; /* pixels */
}

$theme 					= wp_get_theme( 'aloha' );
$theme_version 	= $theme['Version'];

if ( ! function_exists( 'theme_setup' ) ) :

	function theme_setup()
	{
		// wp-content/languages/themes/storefront-it_IT.mo
		load_theme_textdomain( 'aloha', trailingslashit( WP_LANG_DIR ) . 'themes/' );

		// wp-content/themes/child-theme-name/languages/it_IT.mo
		load_theme_textdomain( 'aloha', get_stylesheet_directory() . '/languages' );

		// wp-content/themes/storefront/languages/it_IT.mo
		load_theme_textdomain( 'aloha', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary'		=> __( 'Primary Menu', 'aloha' ),
			'secondary'		=> __( 'Secondary Menu', 'aloha' ),
			'handheld'		=> __( 'Handheld Menu', 'aloha' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'widgets',
		) );

		// Setup the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'theme_custom_background_args', array(
			'default-color' => apply_filters( 'theme_default_background_color', 'fcfcfc' ),
			'default-image' => '',
		) ) );

		// Add support for the Site Logo plugin and the site logo functionality in JetPack
		// https://github.com/automattic/site-logo
		// http://jetpack.me/
		add_theme_support( 'site-logo', array( 'size' => 'full' ) );

		// Declare WooCommerce support
		// add_theme_support( 'woocommerce' );

		// Declare support for title theme feature
		add_theme_support( 'title-tag' );

		add_action( 'get_header', 'theme_head_styles' );
		add_action( 'get_footer', 'theme_head_scripts' );
	}
endif; // theme_setup

function theme_head_styles()
{
	global $theme_version;

	wp_enqueue_style( 'aloha-style', get_template_directory_uri() . '/style.css', '', $theme_version );
}

function theme_head_scripts()
{
	// code
}

function aloha_scripts()
{
	global $theme_version;

	$query_agrs = array(
		'family'	=> 'Open+Sans:300,300italic,400,400italic,700',
		'subset'	=> 'vietnamese',
	);

	wp_enqueue_style( 'google-fonts', add_query_arg($query_agrs, '//fonts.googleapis.com/css') , array(), '' );
	wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() . '/css//bootstrap.min.css', '', $theme_version );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', '', $theme_version );
	wp_enqueue_style( 'calendar', get_template_directory_uri() . '/css/calendar.css', '', $theme_version );
	wp_enqueue_style( 'activity', get_template_directory_uri() . '/css/activity.css', '', $theme_version );
	wp_enqueue_style( 'octicons-min', '//cdnjs.cloudflare.com/ajax/libs/octicons/2.0.2/octicons.min.css', array(), '' );
	wp_enqueue_style( 'aloha-style', get_template_directory_uri() . '/style.css', '', $theme_version );


	// wp_enqueue_script( 'aloha-navigation', get_template_directory_uri() . '/js/navigation.min.js', array( 'jquery' ), '20160501', true );
}