<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main">
  <?php esc_html_e( 'Zum Inhalt springen', 'sai-europe' ); ?>
</a>

<header id="site-header" role="banner">
  <div class="container">
    <nav class="nav-inner" aria-label="<?php esc_attr_e( 'Hauptnavigation', 'sai-europe' ); ?>">

      <!-- Logo -->
      <?php if ( has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home">
          <div class="logo-badge" aria-hidden="true">SAI</div>
          <div class="logo-text">
            <span class="logo-text-main">SAI Europe</span>
            <span class="logo-text-sub">Innovation für Europa</span>
          </div>
        </a>
      <?php endif; ?>

      <!-- Primary Navigation -->
      <div id="primary-menu-wrap">
        <?php
        wp_nav_menu( [
            'theme_location' => 'primary',
            'menu_id'        => 'primary-menu',
            'container'      => false,
            'walker'         => new SAI_Walker_Nav(),
            'fallback_cb'    => 'sai_fallback_menu',
        ] );
        ?>
      </div>

      <!-- Mobile toggle -->
      <button class="nav-toggle" id="nav-toggle" aria-label="<?php esc_attr_e( 'Menü öffnen', 'sai-europe' ); ?>" aria-expanded="false" aria-controls="primary-menu-wrap">
        <span></span>
        <span></span>
        <span></span>
      </button>

    </nav>
  </div>
</header>

<main id="main" role="main">
<?php

/**
 * Fallback menu when no menu is assigned.
 */
function sai_fallback_menu() {
    echo '<ul id="primary-menu">';
    echo '<li><a href="' . esc_url( home_url( '/#mission' ) ) . '">' . esc_html__( 'Über uns', 'sai-europe' ) . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#leistungen' ) ) . '">' . esc_html__( 'Leistungen', 'sai-europe' ) . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#themen' ) ) . '">' . esc_html__( 'Themen', 'sai-europe' ) . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#team' ) ) . '">' . esc_html__( 'Team', 'sai-europe' ) . '</a></li>';
    echo '<li><a href="' . esc_url( home_url( '/#kontakt' ) ) . '" class="nav-cta">' . esc_html__( 'Kontakt', 'sai-europe' ) . '</a></li>';
    echo '</ul>';
}
