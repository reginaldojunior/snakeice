<?php
/**
 * snakeice functions and definitions
 *
 * @package snakeice
 */


if ( ! function_exists( 'snakeice_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function snakeice_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on snakeice, use a find and replace
	 * to change 'snakeice' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'snakeice', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Set the content width based on the theme's design and stylesheet.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1140; /* pixels */
	}	

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('project-image', 350, 250, true);
	add_image_size('snakeice-thumb', 750);
	add_image_size('snakeice-news-thumb', 400);
	add_image_size('snakeice-employees-thumb', 430);
	add_image_size('snakeice-clients-thumb', 150);
	add_image_size('snakeice-testimonials-thumb', 100);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'snakeice' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'snakeice_custom_background_args', array(
		'default-color' => 'f5f5f5',
		'default-image' => '',
	) ) );
}
endif; // snakeice_setup
add_action( 'after_setup_theme', 'snakeice_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function snakeice_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'snakeice' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer A', 'snakeice' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );	
	register_sidebar( array(
		'name'          => __( 'Footer B', 'snakeice' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );	
	register_sidebar( array(
		'name'          => __( 'Footer C', 'snakeice' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'snakeice_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function snakeice_scripts() {

	wp_enqueue_style( 'snakeice-bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', array(), true );
	
	wp_enqueue_style( 'snakeice-style', get_stylesheet_uri() );


	if ( ! function_exists('snakeice_fonts_extended') ) { //Check that the snakeice Fonts extension is not active
	//Load the fonts
		$headings_font = esc_html(get_theme_mod('headings_fonts'));
		$body_font = esc_html(get_theme_mod('body_fonts'));
		if( $headings_font ) {
			wp_enqueue_style( 'snakeice-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );	
		} else {
			wp_enqueue_style( 'snakeice-roboto-condensed', '//fonts.googleapis.com/css?family=Roboto+Condensed:700');
		}	
		if( $body_font ) {
			wp_enqueue_style( 'snakeice-body-fonts', '//fonts.googleapis.com/css?family='. $body_font );	
		} else {
			wp_enqueue_style( 'snakeice-roboto', '//fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic');
		}
	}

	wp_enqueue_style( 'snakeice-font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );

	wp_enqueue_script( 'snakeice-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'snakeice-waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array('jquery'), true );

	if ( get_theme_mod('snakeice_scroller') != 1 )  {
		
		wp_enqueue_script( 'snakeice-nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array('jquery'), true );	

		wp_enqueue_script( 'snakeice-nicescroll-init', get_template_directory_uri() . '/js/nicescroll-init.js', array('jquery'), true );

	}	

	if ( is_page_template('page_front-page.php') ) {
	
		wp_enqueue_script( 'snakeice-carousel', get_template_directory_uri() .  '/js/slick.min.js', array( 'jquery' ), true );
					
		wp_enqueue_script( 'snakeice-carousel-init', get_template_directory_uri() .  '/js/carousel-init.js', array(), true );

		wp_enqueue_style( 'snakeice-pretty-photo', get_template_directory_uri() . '/inc/prettyphoto/css/prettyPhoto.min.css' );

		wp_enqueue_script( 'snakeice-pretty-photo-js', get_template_directory_uri() .  '/inc/prettyphoto/js/jquery.prettyPhoto.min.js', array(), true );	

		wp_enqueue_script( 'snakeice-pretty-photo-init', get_template_directory_uri() .  '/inc/prettyphoto/js/prettyphoto-init.js', array(), true );

	}

	if ( get_theme_mod('snakeice_animate') != true ) {
		
		wp_enqueue_script( 'snakeice-wow', get_template_directory_uri() .  '/js/wow.min.js', array( 'jquery' ), true );

		wp_enqueue_style( 'snakeice-animations', get_template_directory_uri() . '/css/animate/animate.min.css' );

		wp_enqueue_script( 'snakeice-wow-init', get_template_directory_uri() .  '/js/wow-init.js', array( 'jquery' ), true );

	}

	wp_enqueue_script( 'snakeice-sticky', get_template_directory_uri() .  '/js/jquery.sticky.js', array(), true );

	wp_enqueue_script( 'snakeice-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), true );

	wp_enqueue_script( 'snakeice-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), true );	

	wp_enqueue_script( 'snakeice-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_home() && get_theme_mod('blog_layout') == 'masonry' ) {

		wp_enqueue_script( 'jquery-masonry');

		wp_enqueue_script( 'snakeice-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), true );

		wp_enqueue_script( 'snakeice-masonry-init', get_template_directory_uri() . '/js/masonry-init.js', array(), true );		
	}

}
add_action( 'wp_enqueue_scripts', 'snakeice_scripts' );

/**
 * Enqueues the necessary script for image uploading in widgets
 */
add_action('admin_enqueue_scripts', 'snakeice_image_upload');
function snakeice_image_upload($post) {
    if( 'post.php' != $post )
        return;	
    wp_enqueue_script('snakeice-image-upload', get_template_directory_uri() . '/js/image-uploader.js', array('jquery'), true );
	if ( did_action( 'wp_enqueue_media' ) )
		return;    
    wp_enqueue_media();    
}

/**
 * Load html5shiv
 */
function snakeice_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'snakeice_html5shiv' ); 

/**
 * Change the excerpt length
 */
function snakeice_excerpt_length( $length ) {
	
	$excerpt = get_theme_mod('exc_lenght', '30');
	return $excerpt;

}
add_filter( 'excerpt_length', 'snakeice_excerpt_length', 999 );

/**
 * Nav bar
 */
if ( ! function_exists( 'snakeice_nav_bar' ) ) {
function snakeice_nav_bar() {
	echo '<div class="top-bar">
			<div class="container">
				<div class="site-branding col-md-4">';
				if ( get_theme_mod('site_logo') ) :
					echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="';
						bloginfo('name');
					echo '"><img class="site-logo" src="' . esc_url(get_theme_mod('site_logo')) . '" alt="';
						bloginfo('name');
					echo '" /></a>';
				else :
					echo '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">';
						bloginfo( 'name' );
					echo '</a></h1>';
					echo '<h2 class="site-description">';
						bloginfo( 'description' );
					echo '</h2>';
				endif;
			echo '</div>';
			echo '<button class="menu-toggle btn"><i class="fa fa-bars"></i></button>
				<nav id="site-navigation" class="main-navigation col-md-8" role="navigation">';
				wp_nav_menu( array( 'theme_location' => 'primary' ) );
			echo '</nav>';
			
			if ( get_theme_mod('toggle_search', 0) ) :
				echo '<span class="nav-search"><i class="fa fa-search"></i></span>';
				echo '<span class="nav-deco"></span>';
				echo '<div class="nav-search-box">';
					get_search_form();
				echo '</div>';
			endif;
		echo '</div>';
	echo '</div>';
}
}
if (get_theme_mod('snakeice_menu_top', 0) == 0) {
	add_action('tha_header_after', 'snakeice_nav_bar');
} else {
	add_action('tha_header_before', 'snakeice_nav_bar');
}

/**
 * Get image IDs
 */
function snakeice_get_image_id($photo) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $photo )); 
    return $attachment[0]; 
}

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
/**
 * Dynamic styles
 */
require get_template_directory() . '/styles.php';
/**
 * Page builder styles
 */
require get_template_directory() . '/inc/rows.php';
/**
 * Theme Hook Alliance
 */
require get_template_directory() . '/inc/tha-theme-hooks.php';

/**
 *TGM Plugin activation.
 */
require_once dirname( __FILE__ ) . '/plugins/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'snakeice_recommend_plugin' );
function snakeice_recommend_plugin() {
 
    $plugins = array(
        array(
            'name'               => 'Page Builder by SiteOrigin',
            'slug'               => 'siteorigin-panels',
            'required'           => false,
        ),
        array(
            'name'               => 'Types - Custom Fields and Custom Post Types Management',
            'slug'               => 'types',
            'required'           => false,
        ),          
    );
 
    tgmpa( $plugins);
 
}