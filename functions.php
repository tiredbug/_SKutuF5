<?php
/**
 * _SKutu Foundation functions and definitions
 *
 * @package _SKutu Foundation
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( '_skutuf_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _skutuf_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _SKutu Foundation, use a find and replace
	 * to change '_skutuf' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '_skutuf', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', '_skutuf' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( '_skutuf_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // _skutuf_setup
add_action( 'after_setup_theme', '_skutuf_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function _skutuf_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', '_skutuf' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar Off-Canvas', '_skutuf' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', '_skutuf_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _skutuf_scripts() {
	wp_enqueue_style( '_skutuf-style', get_stylesheet_uri() );

	/* Add Foundation CSS */
	wp_enqueue_style( 'foundation-normalize', get_stylesheet_directory_uri() . '/foundation/css/normalize.css' );
	wp_enqueue_style( 'foundation', get_stylesheet_directory_uri() . '/foundation/css/foundation.css' );

  	/* Add Foundation Icons */
  	wp_enqueue_style( 'foundation-icons', get_stylesheet_directory_uri() . '/foundation-icons/foundation-icons.css', array(), '1' );
  
	/* Add Custom CSS */
	wp_enqueue_style( '_skutuf-custom-style', get_stylesheet_directory_uri() . '/custom.css', array(), '1' );

	/* Add Foundation JS */
	wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/foundation/js/foundation.min.js', array( 'jquery' ), '1', true );
	wp_enqueue_script( 'foundation-modernizr-js', get_template_directory_uri() . '/foundation/js/vendor/modernizr.js', array( 'jquery' ), '1', true );

	/* Foundation Init JS */
	wp_enqueue_script( 'foundation-init-js', get_template_directory_uri() . '/foundation.js', array( 'jquery' ), '1', true );

	wp_enqueue_script( '_skutuf-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( '_skutuf-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_skutuf_scripts' );

/**
* Foundation Custom menu
*/
function _skutuf_nav_menu($menu){
 
	$menu = str_replace('menu-item-has-children', 'menu-item-has-children has-dropdown', $menu);
	$menu = str_replace('sub-menu', 'sub-menu dropdown', $menu);
	return $menu;
 
}
add_filter('wp_nav_menu','_skutuf_nav_menu'); 

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
