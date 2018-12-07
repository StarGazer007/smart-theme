<?php
/**
 * The Header for our theme.
 *
 * @package Smart Theme
 * @subpackage smarttheme
 * @author WDThemes - www.wdthemes.com
 */
?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes();?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes();?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes();?>> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes();?>> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!--><html <?php language_attributes();?>> <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

<title><?php wp_title('&raquo;','true','right'); ?><?php bloginfo('name'); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11">

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!--[if lt IE 9]>
	<script src="<?php //echo get_template_directory_uri(); ?>/js/html5.js"></script>
<![endif]-->


<!-- Mobile Specific Metas
================================================== -->

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<?php
	//do_action('skeleton_header');
?>


<a class="navbar-brand mr-auto mr-lg-0" href="#">Offcanvas navbar</a>
<button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
       <span class="navbar-toggler-icon"></span>
  </button>

   <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
  <?php
	//do_action('skeleton_navbar');
  wp_nav_menu( array(
    'theme_location' => 'main_menu',
    'container_class' => 'navbar navbar-expand-lg fixed-top navbar-dark bg-dark' )
  );

   ?>
</div>
