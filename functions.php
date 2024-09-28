<?php
/**
 * CT Custom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CT_Custom
 */

if ( ! function_exists( 'ct_custom_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ct_custom_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CT Custom, use a find and replace
		 * to change 'ct-custom' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ct-custom', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ct-custom' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ct_custom_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ct_custom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ct_custom_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ct_custom_content_width', 640 );
}
add_action( 'after_setup_theme', 'ct_custom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ct_custom_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ct-custom' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ct-custom' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ct_custom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ct_custom_scripts() {
	wp_enqueue_style( 'ct-custom-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ct-custom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ct-custom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ct_custom_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


// CUSTOM FUNCTIONS

function mytheme_customize_register( $wp_customize ) {
    // Logo Upload
    $wp_customize->add_setting( 'mytheme_logo' );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mytheme_logo', array(
        'label'    => __( 'Logo', 'mytheme' ),
        'section'  => 'title_tagline',
        'settings' => 'mytheme_logo',
    ) ) );

    // Phone Number
    $wp_customize->add_setting( 'mytheme_phone_number', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'mytheme_phone_number', array(
        'label'    => __( 'Phone Number', 'mytheme' ),
        'section'  => 'title_tagline',
        'type'     => 'text',
    ) );

    // Address1
    $wp_customize->add_setting( 'mytheme_address_1', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'mytheme_address_1', array(
        'label'    => __( 'Address line 1', 'mytheme' ),
        'section'  => 'title_tagline',
        'type'     => 'text',
    ) );

	 // Address2
	 $wp_customize->add_setting( 'mytheme_address_2', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'mytheme_address_2', array(
        'label'    => __( 'Address line 2', 'mytheme' ),
        'section'  => 'title_tagline',
        'type'     => 'text',
    ) );

	// Address3
	$wp_customize->add_setting( 'mytheme_address_3', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'mytheme_address_3', array(
        'label'    => __( 'Address line 3', 'mytheme' ),
        'section'  => 'title_tagline',
        'type'     => 'text',
    ) );

    // Fax Number
    $wp_customize->add_setting( 'mytheme_fax', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'mytheme_fax', array(
        'label'    => __( 'Fax Number', 'mytheme' ),
        'section'  => 'title_tagline',
        'type'     => 'text',
    ) );

    // Social Media Links
    $wp_customize->add_setting( 'mytheme_facebook', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'mytheme_facebook', array(
        'label'    => __( 'Facebook URL', 'mytheme' ),
        'section'  => 'title_tagline',
        'type'     => 'url',
    ) );

    $wp_customize->add_setting( 'mytheme_twitter', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'mytheme_twitter', array(
        'label'    => __( 'Twitter URL', 'mytheme' ),
        'section'  => 'title_tagline',
        'type'     => 'url',
    ) );

    $wp_customize->add_setting( 'mytheme_linkedin', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'mytheme_linkedin', array(
        'label'    => __( 'LinkedIn URL', 'mytheme' ),
        'section'  => 'title_tagline',
        'type'     => 'url',
    ) );

    $wp_customize->add_setting( 'mytheme_pinterest', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'mytheme_pinterest', array(
        'label'    => __( 'Pinterest URL', 'mytheme' ),
        'section'  => 'title_tagline',
        'type'     => 'url',
    ) );
}

add_action( 'customize_register', 'mytheme_customize_register' );

function load_font_awesome() {
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css' );
}
add_action( 'wp_enqueue_scripts', 'load_font_awesome' );

function mytheme_enqueue_scripts() {
    wp_enqueue_script( 'mytheme-navigation', get_template_directory_uri() . '/js/main.js', array(), false, true );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_scripts' );

function mytheme_enqueue_fonts() {
    wp_enqueue_style( 'preconnect-googleapis', 'https://fonts.googleapis.com', array(), null );
    wp_enqueue_style( 'preconnect-gstatic', 'https://fonts.gstatic.com', array(), null, 'crossorigin' );

    // Ubuntu
    wp_enqueue_style( 'ubuntu-font', 'https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap', array(), null );
    
    // Bebas Neue 
    wp_enqueue_style( 'bebas-ubuntu-font', 'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap', array(), null );

    // Bebas Neue, Open Sans, and Ubuntu fonts
    wp_enqueue_style( 'bebas-open-sans-ubuntu-font', 'https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap', array(), null );
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_fonts' );

