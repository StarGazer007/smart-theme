<?php
/**
 * @package Smart Theme WordPress Theme
 * @subpackage Smart Theme
 * @author WDThemes - www.wdthemes.com
 *
 * Layout Hooks:
 *
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
  */


/**
  * ----------------------------------------------------------------------------
  * Define constants.
  * ----------------------------------------------------------------------------
*/

  define( 'ST_THEME_DIR', 	get_template_directory_uri() );
  define( 'ST_THEMEROOT', 	get_template_directory() );
  define( 'ST_IMAGES', 			ST_THEME_DIR . '/images' );
  define( 'ST_SCRIPTS', 		ST_THEME_DIR . '/js' );
  define( 'ST_STYLES', 			ST_THEME_DIR . '/css' );
  define( 'ST_CLASSES', 		ST_THEMEROOT . '/inc/classes' );
  define( 'ST_CONFIGS', 		ST_THEMEROOT . '/inc/configs' );


  /**
   * ---------------------------------------------------------------------------
   * Enqueue styles
   * ---------------------------------------------------------------------------
 */
 function st_enqueue_stylesheets() {
     // Load main stylesheet
     wp_enqueue_style( 'SmartStyle', get_stylesheet_uri() );
     // Load other stylesheets
    // wp_enqueue_style( 'FrameWork',  ST_STYLES . '/foundation.min.css' );
     wp_enqueue_style( 'FrameWork', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' );

 }

add_action( 'wp_enqueue_scripts', 'st_enqueue_stylesheets' );


/**
 * ---------------------------------------------------------------------------
 * Register custom navigation menus
 * ---------------------------------------------------------------------------
*/

function create_smarttheme_me() {

	$locations = array(
		'main_menu' => __( 'Main navigation', 'smarttheme' ),
		'top_menu' => __( 'Top menu', 'smarttheme' ),
		'footer_menu' => __( 'Footer Menu', 'smarttheme' ),
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'create_smarttheme_me' );
