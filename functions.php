<?php

// globals
$GLOBALS['sumatra_global'] = array();

// disable editor on pages
function disable_editor_pages() {
	$post_types = array(
		'page',
	);

	foreach( $post_types as $post_type ) :
		remove_post_type_support( $post_type, 'editor' );
	endforeach;
}
add_action( 'init', 'disable_editor_pages' );

// disable admin bar
show_admin_bar( false );

// add menu
add_theme_support( 'menus' );

// post thumbnail
add_theme_support( 'post-thumbnails' );

// get css and js
function get_scripts() {
	$dir = get_template_directory_uri();
	wp_enqueue_style( 'style', $dir . '/style.css' );
	wp_enqueue_script( 'main', $dir . '/dist/js/main.bundle.js', '', false, true );
}

add_action( 'wp_enqueue_scripts', 'get_scripts' );

// ACF
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
}

function get_current_template() {
	global $template;
	return basename($template, '.php');
}

function render_img( $obj, $classes = '', $size = 'medium_large') {
	$url = $obj[ 'sizes' ][ $size ];
	echo '<img
		class="' . $classes . '"	
		src="' . $url . '"	
		alt="' . $obj['alt'] . '"	
	>';
}

function get_menu( $id, $post = '', $classes = '' ) {
	wp_nav_menu( array(
		'menu' => $id,
		'menu_class' => 'flex'
		) );
}

function clog( $data ) {
	echo '<pre>';
	var_dump( $data );
	echo '</pre>';
}

// update admin style
add_action('admin_head', 'my_custom_css');

function my_custom_css() {
	/* #menu-posts, */
	echo '<style>
		#menu-comments {
			display: none
		}
	</style>';
}

// limit excerpt length
function custom_excerpt_length( $length ) {
	return 20;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function wpdocs_excerpt_more( $more ) {
	return '...';
}

add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

// add custom shortcode
function make_button( $atts ) {
	$a = shortcode_atts( array(
		'text' => 'Default text',
		'href' => 'Default URL',
		'style' => 'primary',
		'align' => 'left'
	 ), $atts );

	return '
	<div class="button-wrapper" style="text-align: '. $a['align'] .'">
		<a class="button '. $a['style'] .'" href="'. $a['href'] .'">
			<span class="text">'. $a['text'] .'</span>
		</a>
	</div>';
}

add_shortcode( 'button', 'make_button' );

// Clean up unused script tags
function smartwp_remove_wp_block_library_css(){
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-blocks-style' );
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100  );

function my_deregister_scripts(){
	wp_dequeue_script( 'wp-embed'  );
}
add_action( 'wp_footer', 'my_deregister_scripts'  );

remove_action( 'wp_head', 'print_emoji_detection_script', 7  );
remove_action( 'wp_print_styles', 'print_emoji_styles'  );

// Force Gravity Forms to init scripts in the footer and ensure that the DOM is loaded before scripts are executed
//add_filter( 'gform_init_scripts_footer', '__return_true' );

remove_action( 'wp_head', 'wp_generator'  );
remove_action( 'wp_head', 'rsd_link'  );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10  );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10  );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0  );
remove_action( 'wp_head', 'wlwmanifest_link'  );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );

function force_gform_inline_scripts() {
	return true;
}
add_filter("gform_init_scripts_footer", "force_gform_inline_scripts");

function strip_inline_gform_scripts( $form_string, $form ) {
	return $form_string = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $form_string);
}
add_filter("gform_get_form_filter", "strip_inline_gform_scripts", 10, 2);
