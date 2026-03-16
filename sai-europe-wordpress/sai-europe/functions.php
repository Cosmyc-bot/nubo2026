<?php
/**
 * SAI Europe Theme Functions
 *
 * @package sai-europe
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// ─── THEME SETUP ──────────────────────────────────────────────────────────────
function sai_setup() {
    load_theme_textdomain( 'sai-europe', get_template_directory() . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
    add_theme_support( 'custom-logo', [
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ] );
    add_theme_support( 'customize-selective-refresh-widgets' );

    register_nav_menus( [
        'primary' => __( 'Hauptmenü', 'sai-europe' ),
        'footer'  => __( 'Fußzeilenmenü', 'sai-europe' ),
    ] );

    add_image_size( 'team-photo', 600, 450, true );
    add_image_size( 'pub-thumb',  640, 360, true );
}
add_action( 'after_setup_theme', 'sai_setup' );

// ─── ENQUEUE SCRIPTS & STYLES ─────────────────────────────────────────────────
function sai_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'sai-fonts',
        'https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap',
        [],
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'sai-style',
        get_stylesheet_uri(),
        [ 'sai-fonts' ],
        wp_get_theme()->get( 'Version' )
    );

    // Main JS
    wp_enqueue_script(
        'sai-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        wp_get_theme()->get( 'Version' ),
        true
    );

    // Contact form nonce
    if ( is_page_template( 'page-kontakt.php' ) || is_front_page() ) {
        wp_localize_script( 'sai-main', 'saiAjax', [
            'ajaxUrl' => admin_url( 'admin-ajax.php' ),
            'nonce'   => wp_create_nonce( 'sai_contact_nonce' ),
        ] );
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'sai_scripts' );

// ─── CONTENT WIDTH ────────────────────────────────────────────────────────────
if ( ! isset( $content_width ) ) {
    $content_width = 1200;
}

// ─── WIDGETS ──────────────────────────────────────────────────────────────────
function sai_widgets_init() {
    register_sidebar( [
        'name'          => __( 'Footer Widget-Bereich', 'sai-europe' ),
        'id'            => 'footer-1',
        'description'   => __( 'Widgets für die Fußzeile.', 'sai-europe' ),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ] );
}
add_action( 'widgets_init', 'sai_widgets_init' );

// ─── CUSTOM EXCERPT ───────────────────────────────────────────────────────────
function sai_excerpt_length( $length ) {
    return is_admin() ? $length : 22;
}
add_filter( 'excerpt_length', 'sai_excerpt_length' );

function sai_excerpt_more( $more ) {
    return ' …';
}
add_filter( 'excerpt_more', 'sai_excerpt_more' );

// ─── CONTACT FORM AJAX HANDLER ────────────────────────────────────────────────
function sai_handle_contact() {
    check_ajax_referer( 'sai_contact_nonce', 'nonce' );

    $name    = sanitize_text_field( $_POST['name'] ?? '' );
    $email   = sanitize_email( $_POST['email'] ?? '' );
    $org     = sanitize_text_field( $_POST['organisation'] ?? '' );
    $subject = sanitize_text_field( $_POST['betreff'] ?? '' );
    $message = sanitize_textarea_field( $_POST['nachricht'] ?? '' );

    if ( ! $name || ! is_email( $email ) || ! $message ) {
        wp_send_json_error( [ 'message' => __( 'Bitte füllen Sie alle Pflichtfelder aus.', 'sai-europe' ) ] );
    }

    $to      = get_option( 'admin_email' );
    $headers = [
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . esc_html( $name ) . ' <' . $email . '>',
        'Reply-To: ' . esc_html( $name ) . ' <' . $email . '>',
    ];

    $body  = '<p><strong>Name:</strong> ' . esc_html( $name ) . '</p>';
    $body .= '<p><strong>E-Mail:</strong> ' . esc_html( $email ) . '</p>';
    if ( $org ) $body .= '<p><strong>Organisation:</strong> ' . esc_html( $org ) . '</p>';
    if ( $subject ) $body .= '<p><strong>Betreff:</strong> ' . esc_html( $subject ) . '</p>';
    $body .= '<p><strong>Nachricht:</strong><br>' . nl2br( esc_html( $message ) ) . '</p>';

    $sent = wp_mail( $to, 'SAI Europe Kontaktanfrage – ' . esc_html( $subject ?: 'Neue Nachricht' ), $body, $headers );

    if ( $sent ) {
        wp_send_json_success( [ 'message' => __( 'Vielen Dank! Wir melden uns in Kürze bei Ihnen.', 'sai-europe' ) ] );
    } else {
        wp_send_json_error( [ 'message' => __( 'Es ist ein Fehler aufgetreten. Bitte versuchen Sie es erneut.', 'sai-europe' ) ] );
    }
}
add_action( 'wp_ajax_sai_contact',        'sai_handle_contact' );
add_action( 'wp_ajax_nopriv_sai_contact', 'sai_handle_contact' );

// ─── BODY CLASSES ─────────────────────────────────────────────────────────────
function sai_body_classes( $classes ) {
    if ( is_front_page() ) $classes[] = 'is-front-page';
    return $classes;
}
add_filter( 'body_class', 'sai_body_classes' );

// ─── SCROLL-TO SMOOTH LINKS ───────────────────────────────────────────────────
function sai_clean_nav_links( $output ) {
    return $output;
}

// ─── CUSTOM WALKER NAV ────────────────────────────────────────────────────────
class SAI_Walker_Nav extends Walker_Nav_Menu {
    public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
        $item = $data_object;
        $classes = empty( $item->classes ) ? [] : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = implode( ' ', array_filter( $classes ) );
        $output .= '<li class="' . esc_attr( $class_names ) . '">';

        $atts = [];
        $atts['href']   = ! empty( $item->url ) ? $item->url : '#';
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target ) ? $item->target : '';
        $atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';

        // Mark CTA button
        if ( in_array( 'nav-cta', $classes ) ) {
            $atts['class'] = 'nav-cta';
        }

        $attrs_str = '';
        foreach ( $atts as $k => $v ) {
            if ( $v ) $attrs_str .= ' ' . esc_attr( $k ) . '="' . esc_attr( $v ) . '"';
        }

        $title   = apply_filters( 'the_title', $item->title, $item->ID );
        $output .= '<a' . $attrs_str . '>' . esc_html( $title ) . '</a>';
    }
}

// ─── THEME MODS / DEFAULTS ────────────────────────────────────────────────────
function sai_get_option( $key, $default = '' ) {
    return get_theme_mod( 'sai_' . $key, $default );
}

// ─── CUSTOMIZER ───────────────────────────────────────────────────────────────
function sai_customize_register( $wp_customize ) {
    // SAI Europe Panel
    $wp_customize->add_panel( 'sai_panel', [
        'title'    => __( 'SAI Europe Theme', 'sai-europe' ),
        'priority' => 30,
    ] );

    // Hero Section
    $wp_customize->add_section( 'sai_hero', [
        'title' => __( 'Hero-Bereich', 'sai-europe' ),
        'panel' => 'sai_panel',
    ] );

    $hero_fields = [
        'hero_eyebrow'     => [ 'label' => 'Eyebrow-Text',    'default' => 'Strategische Agentur für Innovation in Europa' ],
        'hero_headline'    => [ 'label' => 'Überschrift',     'default' => 'Nur ein innovatives Europa ist ein souveränes Europa' ],
        'hero_highlighted' => [ 'label' => 'Hervorgehobener Begriff', 'default' => 'innovatives Europa' ],
        'hero_lead'        => [ 'label' => 'Lead-Text',       'default' => 'SAI Europe bringt innovative Impulse zu Themen wie europäischer Souveränität, Startups, Künstliche Intelligenz, Raumfahrt und Klima in den politischen Diskurs – und entwickelt Expertise in Schlüsseltechnologien.' ],
        'hero_btn1_text'   => [ 'label' => 'Button 1 Text',   'default' => 'Unsere Leistungen' ],
        'hero_btn1_link'   => [ 'label' => 'Button 1 Link',   'default' => '#leistungen' ],
        'hero_btn2_text'   => [ 'label' => 'Button 2 Text',   'default' => 'Kontakt aufnehmen' ],
        'hero_btn2_link'   => [ 'label' => 'Button 2 Link',   'default' => '#kontakt' ],
    ];

    foreach ( $hero_fields as $key => $cfg ) {
        $wp_customize->add_setting( 'sai_' . $key, [
            'default'           => $cfg['default'],
            'sanitize_callback' => 'sanitize_text_field',
        ] );
        $wp_customize->add_control( 'sai_' . $key, [
            'label'   => $cfg['label'],
            'section' => 'sai_hero',
            'type'    => 'text',
        ] );
    }

    // Contact Section
    $wp_customize->add_section( 'sai_contact', [
        'title' => __( 'Kontakt', 'sai-europe' ),
        'panel' => 'sai_panel',
    ] );

    $contact_fields = [
        'contact_email'   => [ 'label' => 'E-Mail-Adresse',  'default' => 'Kontakt@sai-europe.org' ],
        'contact_address' => [ 'label' => 'Adresse',         'default' => 'Linienstraße 86, 10119 Berlin' ],
        'contact_linkedin'=> [ 'label' => 'LinkedIn URL',    'default' => '' ],
        'contact_twitter' => [ 'label' => 'X (Twitter) URL', 'default' => '' ],
    ];

    foreach ( $contact_fields as $key => $cfg ) {
        $wp_customize->add_setting( 'sai_' . $key, [
            'default'           => $cfg['default'],
            'sanitize_callback' => 'sanitize_text_field',
        ] );
        $wp_customize->add_control( 'sai_' . $key, [
            'label'   => $cfg['label'],
            'section' => 'sai_contact',
            'type'    => 'text',
        ] );
    }
}
add_action( 'customize_register', 'sai_customize_register' );

// ─── SECURITY ─────────────────────────────────────────────────────────────────
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
