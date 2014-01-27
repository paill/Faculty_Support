<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package Academic Technology Services
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--
  This will show only in text-only browsers and allows the user
  to skip the primary navigation and go directly to the main content of the page
-->
<div id="navskip"><a href="#main_section" title="<?php esc_attr_e( 'Skip to content', 'ats' ); ?>"><?php _e( 'Skip to content', 'ats' ); ?></a></div>

<?php do_action( 'before' ); ?>

<!-- ******************** Header ******************** -->
<div id="header">
  <div class="outer_wrap">
      <div class="inner_wrap">
          <div id="header_content">
              <div id="ucdavis_logo"><a href="http://www.ucdavis.edu/"><img alt="UC Davis home page" src="<?php echo get_template_directory_uri()  ?>/img/ucdavis_logo_hdr_blue.png" /></a></div>
          </div>
      </div>
  </div>
</div>
<!-- ******************** End header ******************** -->


<!-- ******************** Site identification ******************** -->
<div id="site_title">
  <div class="outer_wrap">
      <div class="inner_wrap">
          <div id="title_area_content" role="banner">
              <div class="logo" id="title"><h1>
				<?php $header_image = get_header_image();
					if ( ! empty( $header_image ) ) { ?> 
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
						</a>
						
					<?php } else{ ?> <!--- If no header image, display site name -->
					  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
					  </a>
					 <?php } ?></h1>
					  
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2></div>
	      
				        <div id="title_area_links">
					  <div id="title_area_links_inner_wrap">
					    <?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
					  </div>
					</div>
              <div class="clearer"><!-- Needs to be here to prevent title area collapsing --></div>
          </div>
      </div>
  </div>
</div>
<!-- ******************** End site identification ******************** -->

<!-- ******************** Primary navigation ******************** -->
<div id="nav" role="navigation">
  <div id="_nav_dropdown"><div class="nav_background bar_1"><div class="outer_wrap"><div class="inner_wrap"><div class="nav_content">
	<?php
	$menu = wp_nav_menu(
	    array(
	            'theme_location'=>'primary',
	            'echo'=>0
	        )
	);
	$menu = str_replace("\n", "", $menu);
	$menu = str_replace("\r", "", $menu);
	echo $menu;
	?>
</div></div></div></div></div>
</div>
<!-- ******************** End primary navigation ******************** -->

<!-- ******************** Breadcrumb navigation ******************** -->
<div id="breadcrumbs_container">
  <div class="outer_wrap">
      <div class="inner_wrap">
          <div id="breadcrumbs_content">
              <div id="breadcrumbs" role="navigation">
					<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- ******************** End breadcrumb navigation ******************** -->

 <!-- ******************** Pre-main-columns region ******************** -->
 
 <!-- ******************** End pre-main-columns region ******************** -->

 <!-- ******************** Main page columns ******************** -->
	<div id="main" class="site-content">