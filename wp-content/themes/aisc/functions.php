<?php

/* MAIN STYLESHEET */
function my_theme_enqueue_styles() {

	$parent_style = 'parent-style';
	
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ));
	
	wp_register_style('slick-css', get_stylesheet_directory_uri() . '/css/slick.css', array(), '1.0', 'all');
	wp_enqueue_style('slick-css');
	
	wp_register_style('slick-theme-css', get_stylesheet_directory_uri() . '/css/slick-theme.css', array(), '1.0', 'all');
	wp_enqueue_style('slick-theme-css');
	
	//wp_register_style('para-styles', get_stylesheet_directory_uri() . '/js/dzsparallaxer/dzsparallaxer.css', array(), '1.0', 'all');
	//wp_enqueue_style('para-styles');
}

/* FOOTER SCRIPTS */
function footer_scripts() {
	
	wp_register_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
	wp_enqueue_script('scripts');
	
	wp_register_script('fontawesome', 'https://use.fontawesome.com/6ccd600e51.js', array('jquery'), null, true);
	wp_enqueue_script('fontawesome');
	
	wp_register_script('slick', get_stylesheet_directory_uri() . '/js/slick.min.js', array('jquery'), null, true);
	wp_enqueue_script('slick');
	
	wp_register_script('scrollreveal', 'https://unpkg.com/scrollreveal/dist/scrollreveal.min.js', array('jquery'), null, true);
	wp_enqueue_script('scrollreveal');
	
	wp_register_script('masonry-js', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array('jquery'), null, true);
	wp_enqueue_script('masonry-js');
	
	wp_register_script('images-loaded', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', array('jquery'), null, true);
	wp_enqueue_script('images-loaded');
	
	wp_register_script('object-fit', get_stylesheet_directory_uri() . 'js/object-fit-videos.min.js', array('jquery'), null, true);
	wp_enqueue_script('object-fit');
}

function remove_some_widgets(){

	unregister_sidebar( 'sidebar-5' );
}

function mytheme_et_project_posttype_args( $args ) {
	return array_merge( $args, array(
		'public'              => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => false,
		'show_in_nav_menus'   => false,
		'show_ui'             => false
	));
}

/* CUSTOM EXCERPT */

function custom_length_excerpt($word_count_limit) {
    $content = wp_strip_all_tags(get_the_content() , true );
    echo wp_trim_words($content, $word_count_limit);
}


/* ARTICLE META DATA */
function post_meta() {
	echo '<p class="post-meta">';
		echo _e('Posted '); the_time('d/m/Y'); _e(' &nbsp;|&nbsp;  '); the_category(', ');
	echo '</p>';
}

/* SHOW INDUSTRY NEWS IN CATEGORIES */
function themeprefix_show_cpt_archives( $query ) {
 if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
 $query->set( 'post_type', array(
 'post', 'nav_menu_item', 'industry_news'
 ));
 return $query;
 }
}
add_filter( 'pre_get_posts', 'themeprefix_show_cpt_archives' );

// ACTIONS & FILTERS
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
add_action('init', 'footer_scripts');
add_action( 'widgets_init', 'remove_some_widgets', 11 );
add_filter( 'et_project_posttype_args', 'mytheme_et_project_posttype_args', 10, 1 );