</main><!-- #main -->

<footer id="colophon" role="contentinfo">
  <div class="container">
    <div class="footer-grid">

      <!-- Brand -->
      <div class="footer-brand">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" rel="home">
          <div class="logo-badge" aria-hidden="true">SAI</div>
          <div class="logo-text">
            <span class="logo-text-main">SAI Europe</span>
            <span class="logo-text-sub">Innovation für Europa</span>
          </div>
        </a>
        <p class="footer-tagline">
          <?php esc_html_e( 'Strategische Agentur für Innovation in Europa – wir beschleunigen Innovationen made in Europe und bringen Impulse in den politischen Diskurs.', 'sai-europe' ); ?>
        </p>
        <div class="footer-social">
          <?php $linkedin = sai_get_option( 'contact_linkedin' ); ?>
          <?php if ( $linkedin ) : ?>
            <a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener" aria-label="LinkedIn">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
            </a>
          <?php else : ?>
            <a href="#" aria-label="LinkedIn">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
            </a>
          <?php endif; ?>
          <?php $twitter = sai_get_option( 'contact_twitter' ); ?>
          <?php if ( $twitter ) : ?>
            <a href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="noopener" aria-label="X (Twitter)">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
            </a>
          <?php endif; ?>
        </div>
      </div>

      <!-- Navigation -->
      <div class="footer-col">
        <h4><?php esc_html_e( 'Navigation', 'sai-europe' ); ?></h4>
        <ul>
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Startseite', 'sai-europe' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#mission' ) ); ?>"><?php esc_html_e( 'Über uns', 'sai-europe' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#leistungen' ) ); ?>"><?php esc_html_e( 'Leistungen', 'sai-europe' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#themen' ) ); ?>"><?php esc_html_e( 'Themen', 'sai-europe' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#team' ) ); ?>"><?php esc_html_e( 'Team', 'sai-europe' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#kontakt' ) ); ?>"><?php esc_html_e( 'Kontakt', 'sai-europe' ); ?></a></li>
        </ul>
      </div>

      <!-- Themen -->
      <div class="footer-col">
        <h4><?php esc_html_e( 'Themen', 'sai-europe' ); ?></h4>
        <ul>
          <li><a href="<?php echo esc_url( home_url( '/#themen' ) ); ?>"><?php esc_html_e( 'Künstliche Intelligenz', 'sai-europe' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#themen' ) ); ?>"><?php esc_html_e( 'Raumfahrt', 'sai-europe' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#themen' ) ); ?>"><?php esc_html_e( 'Klima & Energie', 'sai-europe' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#themen' ) ); ?>"><?php esc_html_e( 'Digitale Gesellschaft', 'sai-europe' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#themen' ) ); ?>"><?php esc_html_e( 'Startups & Venture', 'sai-europe' ); ?></a></li>
          <li><a href="<?php echo esc_url( home_url( '/#themen' ) ); ?>"><?php esc_html_e( 'Quantentechnologie', 'sai-europe' ); ?></a></li>
        </ul>
      </div>

      <!-- Kontakt -->
      <div class="footer-col">
        <h4><?php esc_html_e( 'Kontakt', 'sai-europe' ); ?></h4>
        <ul>
          <?php $email = sai_get_option( 'contact_email', 'Kontakt@sai-europe.org' ); ?>
          <li>
            <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
          </li>
          <?php $address = sai_get_option( 'contact_address', 'Linienstraße 86, 10119 Berlin' ); ?>
          <li><span style="color:rgba(255,255,255,0.4);font-size:.88rem"><?php echo esc_html( $address ); ?></span></li>
          <li>
            <?php
            $impressum_page = get_page_by_path( 'impressum' );
            $impressum_url  = $impressum_page ? get_permalink( $impressum_page->ID ) : home_url( '/impressum' );
            ?>
            <a href="<?php echo esc_url( $impressum_url ); ?>"><?php esc_html_e( 'Impressum', 'sai-europe' ); ?></a>
          </li>
          <li><a href="<?php echo esc_url( home_url( '/datenschutz' ) ); ?>"><?php esc_html_e( 'Datenschutz', 'sai-europe' ); ?></a></li>
        </ul>
      </div>

    </div><!-- .footer-grid -->

    <div class="footer-bottom">
      <p class="footer-copyright">
        &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php esc_html_e( 'SAI Europe GmbH. Alle Rechte vorbehalten.', 'sai-europe' ); ?>
      </p>
      <div class="footer-legal">
        <?php
        $impressum_page = get_page_by_path( 'impressum' );
        $impressum_url  = $impressum_page ? get_permalink( $impressum_page->ID ) : home_url( '/impressum' );
        ?>
        <a href="<?php echo esc_url( $impressum_url ); ?>"><?php esc_html_e( 'Impressum', 'sai-europe' ); ?></a>
        <a href="<?php echo esc_url( home_url( '/datenschutz' ) ); ?>"><?php esc_html_e( 'Datenschutzerklärung', 'sai-europe' ); ?></a>
      </div>
    </div>

  </div><!-- .container -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>
