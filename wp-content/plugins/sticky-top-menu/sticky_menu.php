<?php
/*
 * Plugin Name: Matt's Sticky Top Menu
 * Plugin URI: http://mspacecreative.com
 * Description: Sticky top menu, appears after scroll
 * Version: 1.0
 * Author: Matt Cyr
 * Author URI: http://mspacecreative.com
 */
 
 function sticky_menu() {
 	wp_enqueue_style( 'sticky-css', plugin_dir_url( __FILE__ ) . 'css/sticky.css', array(), null );
 	wp_enqueue_script( 'sticky-script', plugin_dir_url( __FILE__ ) . 'js/mobile.js', array( 'jquery' ), '1.0', true );
 }
 
 function stickymenuPlugin() {
 	ob_start(); ?>
 <div class="stickymenu">
 	<?php wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
 </div>
 <?php echo ob_get_clean();
 }
 
 add_action( 'wp_head', 'stickymenuPlugin' );
 add_action( 'wp_enqueue_scripts', 'sticky_menu' );
 ?>