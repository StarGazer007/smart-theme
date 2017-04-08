<?php
/**
 * @package Taoist WordPress Theme
 * @subpackage taoist
 * @author WDThemes - www.wdthemes.com
 *
 * Layout Hooks:
 *
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
  */

  /* post formats */
  add_theme_support( 'post-formats', array( 'aside', 'quote' ) );
  
  /* post thumbnails */
  add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

  /* HTML5 */
  add_theme_support( 'html5' );

/* Remove WordPress Version Number */
function taoist_remove_version() {
return '';
}
add_filter('the_generator', 'taoist_remove_version');
remove_action('wp_head', 'wp_generator');


// HTML5 Blank navigation
function taoist_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}




/************************************************************************
Register Menu 
************************************************************************/
function register_taoist_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'taoist'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'taoist'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'taoist') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Sidebar', 'taoist'),
        'description' => __('Description for this widget-area...', 'taoist'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    // Define Sidebar Footer
    register_sidebar(array(
        'name' => __('Footer 1', 'taoist'),
        'description' => __('Description for this widget-area...', 'taoist'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
        // Define Sidebar Footer
    register_sidebar(array(
        'name' => __('Footer 2', 'taoist'),
        'description' => __('Description for this widget-area...', 'taoist'),
        'id' => 'widget-area-3',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

function setup_stylesheets(){

	// Mobile First bigger than 400px
	wp_register_style( 'theme_css', get_template_directory_uri(). '/style.css' );

	// Load the defined Stylesheets */
	wp_enqueue_style( 'theme_css' );

	

}

add_action( 'wp_enqueue_scripts', 'setup_stylesheets' );



/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/
// Add Actions


if ( ! function_exists('custom_post_type') ) {

// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Villas', 'Post Type General Name', 'taoist' ),
		'singular_name'         => _x( 'Villas', 'Post Type Singular Name', 'taoist' ),
		'menu_name'             => __( 'Villas', 'taoist' ),
		'name_admin_bar'        => __( 'Villas', 'taoist' ),
		'archives'              => __( 'Item Archives', 'taoist' ),
		'attributes'            => __( 'Item Attributes', 'taoist' ),
		'parent_item_colon'     => __( 'Parent Item:', 'taoist' ),
		'all_items'             => __( 'All Villas', 'taoist' ),
		'add_new_item'          => __( 'Add New Item', 'taoist' ),
		'add_new'               => __( 'Add New', 'taoist' ),
		'new_item'              => __( 'New Item', 'taoist' ),
		'edit_item'             => __( 'Edit Item', 'taoist' ),
		'update_item'           => __( 'Update Item', 'taoist' ),
		'view_item'             => __( 'View Item', 'taoist' ),
		'view_items'            => __( 'View Items', 'taoist' ),
		'search_items'          => __( 'Search Item', 'taoist' ),
		'not_found'             => __( 'Villa Not found', 'taoist' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'taoist' ),
		'featured_image'        => __( 'Featured Image', 'taoist' ),
		'set_featured_image'    => __( 'Set featured image', 'taoist' ),
		'remove_featured_image' => __( 'Remove featured image', 'taoist' ),
		'use_featured_image'    => __( 'Use as featured image', 'taoist' ),
		'insert_into_item'      => __( 'Insert into item', 'taoist' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'taoist' ),
		'items_list'            => __( 'Items list', 'taoist' ),
		'items_list_navigation' => __( 'Items list navigation', 'taoist' ),
		'filter_items_list'     => __( 'Filter items list', 'taoist' ),
	);
	$args = array(
		'label'                 => __( 'Villa', 'taoist' ),
		'description'           => __( 'Describe the villa', 'taoist' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'excerpt', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'villa', $args );

}
add_action( 'init', 'custom_post_type', 0 );

}