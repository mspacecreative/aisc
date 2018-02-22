<?php
/*
 * Plugin Name: Matt's Shortcodes
 * Plugin URI: http://mspacecreative.com
 * Description: Shortcodes for various funtionality
 * Version: 1.0
 * Author: Matt Cyr
 * Author URI: http://mspacecreative.com
 */

function members_css() {
	wp_enqueue_style( 'members', plugin_dir_url( __FILE__ ) . 'css/members.css', array(), null );
	wp_enqueue_script( 'members-script', plugin_dir_url( __FILE__ ) . 'js/members.js', array( 'jquery' ), '1.0', true );
}

function members_dropdown() {
    ob_start();
    	include(plugin_dir_path( __FILE__ ) . 'includes/members-dropdown-php.php');
    return ob_get_clean();
} 
add_shortcode( 'members_dropdown', 'members_dropdown' );
add_action( 'wp_footer', 'members_dropdown' );
add_action( 'wp_enqueue_scripts', 'members_css' );