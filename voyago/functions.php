<?php
/**
 * Voyago functions and definitions
 *
 * @package Voyago
 * @since 1.0.0
 */

if ( ! defined( 'VOYAGO_VERSION' ) ) {
    define( 'VOYAGO_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function voyago_setup() {
    // Load theme text domain.
    load_theme_textdomain( 'voyago', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1170, 600, true );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Add support for core custom logo.
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 180,
            'width'       => 60,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );

    // Add theme support for wide and full alignment.
    add_theme_support( 'align-wide' );

    // Add support for responsive embeds.
    add_theme_support( 'responsive-embeds' );

    // Add support for editor styles.
    add_theme_support( 'wp-block-styles' );

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus(
        array(
            'primary' => esc_html__( 'Primary Menu', 'voyago' ),
            'footer'  => esc_html__( 'Footer Menu', 'voyago' ),
        )
    );
}
add_action( 'after_setup_theme', 'voyago_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function voyago_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'voyago_content_width', 1140 );
}
add_action( 'after_setup_theme', 'voyago_content_width', 0 );

/**
 * Register widget area.
 */
function voyago_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'voyago' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'voyago' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'voyago_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function voyago_scripts() {
    // Theme stylesheet.
    wp_enqueue_style( 'voyago-style', get_stylesheet_uri(), array(), VOYAGO_VERSION );

    // Main stylesheet.
    wp_enqueue_style( 'voyago-main', get_template_directory_uri() . '/assets/css/main.css', array( 'voyago-style' ), VOYAGO_VERSION );

    // Main JavaScript.
    wp_enqueue_script( 'voyago-main', get_template_directory_uri() . '/assets/js/main.js', array(), VOYAGO_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'voyago_scripts' );

/**
 * Register Tour custom post type.
 */
function voyago_register_tour_cpt() {
    $labels = array(
        'name'                  => esc_html_x( 'Tours', 'Post Type General Name', 'voyago' ),
        'singular_name'         => esc_html_x( 'Tour', 'Post Type Singular Name', 'voyago' ),
        'menu_name'             => esc_html__( 'Tours', 'voyago' ),
        'name_admin_bar'        => esc_html__( 'Tour', 'voyago' ),
        'archives'              => esc_html__( 'Tour Archives', 'voyago' ),
        'attributes'            => esc_html__( 'Tour Attributes', 'voyago' ),
        'parent_item_colon'     => esc_html__( 'Parent Tour:', 'voyago' ),
        'all_items'             => esc_html__( 'All Tours', 'voyago' ),
        'add_new_item'          => esc_html__( 'Add New Tour', 'voyago' ),
        'add_new'               => esc_html__( 'Add New', 'voyago' ),
        'new_item'              => esc_html__( 'New Tour', 'voyago' ),
        'edit_item'             => esc_html__( 'Edit Tour', 'voyago' ),
        'update_item'           => esc_html__( 'Update Tour', 'voyago' ),
        'view_item'             => esc_html__( 'View Tour', 'voyago' ),
        'view_items'            => esc_html__( 'View Tours', 'voyago' ),
        'search_items'          => esc_html__( 'Search Tour', 'voyago' ),
        'not_found'             => esc_html__( 'Not found', 'voyago' ),
        'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'voyago' ),
        'featured_image'        => esc_html__( 'Featured Image', 'voyago' ),
        'set_featured_image'    => esc_html__( 'Set featured image', 'voyago' ),
        'remove_featured_image' => esc_html__( 'Remove featured image', 'voyago' ),
        'use_featured_image'    => esc_html__( 'Use as featured image', 'voyago' ),
        'insert_into_item'      => esc_html__( 'Insert into tour', 'voyago' ),
        'uploaded_to_this_item' => esc_html__( 'Uploaded to this tour', 'voyago' ),
        'items_list'            => esc_html__( 'Tours list', 'voyago' ),
        'items_list_navigation' => esc_html__( 'Tours list navigation', 'voyago' ),
        'filter_items_list'     => esc_html__( 'Filter tours list', 'voyago' ),
    );

    $args = array(
        'label'               => esc_html__( 'Tour', 'voyago' ),
        'description'         => esc_html__( 'Travel tours and packages', 'voyago' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-location-alt',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'archive_slug'        => 'tours',
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite'             => array(
            'slug'       => 'tour',
            'with_front' => false,
        ),
        'capability_type'     => 'post',
        'show_in_rest'        => true,
    );

    register_post_type( 'tour', $args );
}
add_action( 'init', 'voyago_register_tour_cpt' );

// Include customizer.
if ( file_exists( get_template_directory() . '/inc/customizer.php' ) ) {
    require_once get_template_directory() . '/inc/customizer.php';
}

// Include template tags.
if ( file_exists( get_template_directory() . '/inc/template-tags.php' ) ) {
    require_once get_template_directory() . '/inc/template-tags.php';
}
