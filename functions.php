<?php
/**
 * ScotSAC Theme Functions
 *
 * WordPress theme for the Scottish Sub Aqua Club.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// ============================================================
// Theme Setup
// ============================================================

function scotsac_setup() {
    // Make theme available for translation
    load_theme_textdomain( 'scotsac', get_template_directory() . '/languages' );

    // Add title tag support
    add_theme_support( 'title-tag' );

    // Add post thumbnail support
    add_theme_support( 'post-thumbnails' );

    // Register nav menus
    register_nav_menus( [
        'primary'       => __( 'Primary Navigation', 'scotsac' ),
        'footer-col-1'  => __( 'Footer: ScotSAC Links', 'scotsac' ),
        'footer-col-2'  => __( 'Footer: Getting Started', 'scotsac' ),
    ] );

    // Add HTML5 support
    add_theme_support( 'html5', [
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ] );

    // Custom logo support
    add_theme_support( 'custom-logo', [
        'height'      => 80,
        'width'       => 250,
        'flex-height' => true,
        'flex-width'  => true,
    ] );

    // Custom header (background image strip)
    add_theme_support( 'custom-header', [
        'default-image'      => get_template_directory_uri() . '/assets/images/header-bg.jpg',
        'width'              => 2000,
        'height'             => 400,
        'flex-width'         => true,
        'flex-height'        => true,
        'header-text'        => false,
    ] );

    // Feed links
    add_theme_support( 'automatic-feed-links' );

    // Selective refresh for widgets
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'scotsac_setup' );

// ============================================================
// Enqueue styles and scripts
// ============================================================

function scotsac_enqueue_assets() {
    // Main theme stylesheet
    wp_enqueue_style(
        'scotsac-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get( 'Version' )
    );

    // Comment reply script (only when needed)
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'scotsac_enqueue_assets' );

// ============================================================
// Register sidebars / widget areas
// ============================================================

function scotsac_widgets_init() {
    // Main right sidebar
    register_sidebar( [
        'name'          => __( 'Main Sidebar', 'scotsac' ),
        'id'            => 'scotsac-sidebar',
        'description'   => __( 'Appears on pages and posts (right column).', 'scotsac' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s block">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="block__title widget-title">',
        'after_title'   => '</h2>',
    ] );

    // Footer widget area 1
    register_sidebar( [
        'name'          => __( 'Footer: Contact', 'scotsac' ),
        'id'            => 'footer-contact',
        'description'   => __( 'Footer contact column.', 'scotsac' ),
        'before_widget' => '<div class="block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="block__title">',
        'after_title'   => '</h2>',
    ] );
}
add_action( 'widgets_init', 'scotsac_widgets_init' );

// ============================================================
// Template helpers
// ============================================================

/**
 * Returns the body class string for layout decisions.
 * Mirrors the Drupal layout classes used in the original CSS.
 */
function scotsac_body_layout_class() {
    if ( is_front_page() ) {
        return 'front sidebar-second';
    }
    if ( is_singular( 'post' ) || is_singular( 'page' ) ) {
        // Check if sidebar has widgets
        if ( is_active_sidebar( 'scotsac-sidebar' ) ) {
            return 'not-front sidebar-second';
        }
        return 'not-front no-sidebars';
    }
    // Archive / blog index: full width
    return 'not-front no-sidebars';
}

/**
 * Returns true if the current template should show the sidebar.
 */
function scotsac_show_sidebar() {
    return is_active_sidebar( 'scotsac-sidebar' ) && ( is_singular() || is_front_page() );
}

/**
 * Social links data
 */
function scotsac_social_links() {
    return [
        [
            'url'   => 'https://www.facebook.com/pages/Scottish-Sub-Aqua-Club/214643265274075',
            'label' => 'Facebook',
            'icon'  => 'fb',
        ],
        [
            'url'   => 'https://www.youtube.com/channel/UCVKEJX9jRk5iI81i9hA1yww/feed',
            'label' => 'YouTube',
            'icon'  => 'yt',
        ],
    ];
}

// ============================================================
// Customizer settings
// ============================================================

function scotsac_customize_register( WP_Customize_Manager $wp_customize ) {
    // Join link URL
    $wp_customize->add_setting( 'scotsac_join_url', [
        'default'           => 'https://scotsac.justgo.com/',
        'sanitize_callback' => 'esc_url_raw',
    ] );
    $wp_customize->add_control( 'scotsac_join_url', [
        'label'   => __( 'Join / Login URL', 'scotsac' ),
        'section' => 'title_tagline',
        'type'    => 'url',
    ] );

    // Footer contact text
    $wp_customize->add_setting( 'scotsac_footer_contact', [
        'default'           => "The Scottish Sub-Aqua Club\nOffice 52, Stirling Business Centre\nWellgreen Pl\nStirling FK8 2DZ\n\nEmail: hq@scotsac.com\nPhone: +44 1786 643356",
        'sanitize_callback' => 'sanitize_textarea_field',
    ] );
    $wp_customize->add_control( 'scotsac_footer_contact', [
        'label'   => __( 'Footer Contact Details', 'scotsac' ),
        'section' => 'title_tagline',
        'type'    => 'textarea',
    ] );
}
add_action( 'customize_register', 'scotsac_customize_register' );

// ============================================================
// Excerpt length
// ============================================================

function scotsac_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'scotsac_excerpt_length' );

function scotsac_excerpt_more( $more ) {
    return '&hellip; <a href="' . esc_url( get_permalink() ) . '">' . __( 'Read more', 'scotsac' ) . '</a>';
}
add_filter( 'excerpt_more', 'scotsac_excerpt_more' );
