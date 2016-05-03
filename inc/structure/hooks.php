<?php
/**
 * Description
 */

/**
 * Default
 */
add_action( 'after_setup_theme',			'theme_setup' );
//add_action( 'widgets_init',					'storefront_widgets_init' );
add_action( 'wp_enqueue_scripts',			'aloha_scripts',				10 );
//add_action( 'wp_enqueue_scripts',			'storefront_child_scripts',			30 ); // After WooCommerce
//add_action( 'storefront_before_content',	'storefront_header_widget_region',	10 );
//add_action( 'storefront_sidebar',			'storefront_get_sidebar',			10 );