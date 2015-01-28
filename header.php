<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _SKutu Foundation
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Foundation .off-canvas-wrap start -->

<div class="off-canvas-wrap fixed" data-offcanvas>
  <div class="inner-wrap">
    <div class="fixed"><!-- Foundation .fixed start (sticky nav bar menu) -->
    <nav class="tab-bar hide-for-medium-up">
      <section class="left-small">
        <a class="left-off-canvas-toggle menu-icon" ><span></span></a>
      </section>
      <h1 id="site-title" class="text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
      <section class="right-small">
        <a class="right-off-canvas-toggle menu-icon" ><span></span></a>
      </section>
    </nav>
    </div><!-- Foundation .fixed end -->

  <!-- Off Canvas Menu -->
  <aside class="left-off-canvas-menu">
    <ul>
    <?php wp_nav_menu( array( 
      'theme_location' => 'primary', 
      'menu_id' => 'top-nav',
    ) ); ?>
    </ul>
  </aside>

  <aside class="right-off-canvas-menu">
    <ul>
      <?php dynamic_sidebar('sidebar-2'); ?>
    </ul>
  </aside>

<!-- Foundation .off-canvas-wrap end -->

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_skutuf' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

    	<!-- Foundation top-bar navigation start -->
    	<nav id="site-navigation" class="main-navigation" role="navigation">
      		<div class="row show-for-medium-up header-padding">
        		<div class="small-12 columns">
          		<h1 class="left"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          		<nav class="top-bar hide-for-small right" data-topbar>
            			<section class="top-bar-section right">
              			<?php wp_nav_menu( array( 
                		'theme_location' => 'primary', 
                		'menu_id' => 'top-nav',
              			) ); ?>
            			</section>
          		</nav><!-- #site-navigation -->
        		</div>
      		</div>
    	</nav><!-- .row -->
    	<!-- Foundation top-bar navigation end -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
