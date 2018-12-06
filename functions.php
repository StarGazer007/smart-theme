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

if( ! function_exists( 'st_enqueue_styles' ) ) {
  add_action( 'wp_enqueue_scripts', 'st_enqueue_styles', 10000 );


  function st_enqueue_styles() {
    $version = st_get_theme_info( 'Version' );
    $minified = st_get_opt( 'minified_css' ) ? '.min' : '';
    $is_rtl = is_rtl() ? '-rtl' : '';
    $style_url = ST_THEME_DIR . '/style' . $minified . '.css';

    // Custom CSS generated from the dashboard

    $file = get_option('st-generated-css-file');
    if( ! empty( $file ) && ! empty( $file['url'] ) ) {
      $style_url = $file['url'];
    }



}
?>
