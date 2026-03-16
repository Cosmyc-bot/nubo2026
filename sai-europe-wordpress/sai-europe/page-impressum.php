<?php
/**
 * Template Name: Impressum
 * Template Post Type: page
 *
 * @package sai-europe
 */

get_header();
?>

<section class="page-hero">
  <div class="container">
    <div class="page-hero-inner">
      <p class="page-hero-eyebrow"><?php esc_html_e( 'Rechtliches', 'sai-europe' ); ?></p>
      <h1><?php esc_html_e( 'Impressum', 'sai-europe' ); ?></h1>
    </div>
  </div>
</section>

<div class="page-content">
  <?php if ( have_posts() && get_the_content() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; ?>
  <?php else : ?>
    <!-- Default Impressum content (fallback if page has no custom content) -->
    <h2><?php esc_html_e( 'Angaben gemäß § 5 TMG', 'sai-europe' ); ?></h2>
    <p>
      <strong>SAI Europe GmbH</strong><br>
      Linienstraße 86<br>
      10119 Berlin<br>
      Deutschland
    </p>

    <h3><?php esc_html_e( 'Vertreten durch', 'sai-europe' ); ?></h3>
    <p>
      <?php esc_html_e( 'Dr. Anna Christmann (Geschäftsführerin)', 'sai-europe' ); ?>
    </p>

    <h3><?php esc_html_e( 'Kontakt', 'sai-europe' ); ?></h3>
    <p>
      <?php esc_html_e( 'E-Mail:', 'sai-europe' ); ?>
      <a href="mailto:Kontakt@sai-europe.org">Kontakt@sai-europe.org</a>
    </p>

    <h3><?php esc_html_e( 'Handelsregister', 'sai-europe' ); ?></h3>
    <p>
      <?php esc_html_e( 'Amtsgericht Berlin Charlottenburg', 'sai-europe' ); ?><br>
      <?php esc_html_e( 'Registernummer: HRB 278517 B', 'sai-europe' ); ?>
    </p>

    <hr>

    <h2><?php esc_html_e( 'Verantwortlich für den Inhalt nach § 55 Abs. 2 RStV', 'sai-europe' ); ?></h2>
    <p>
      Dr. Anna Christmann<br>
      Linienstraße 86<br>
      10119 Berlin
    </p>

    <hr>

    <h2><?php esc_html_e( 'Haftungsausschluss', 'sai-europe' ); ?></h2>

    <h3><?php esc_html_e( 'Haftung für Inhalte', 'sai-europe' ); ?></h3>
    <p>
      <?php esc_html_e( 'Die Inhalte unserer Seiten wurden mit größter Sorgfalt erstellt. Für die Richtigkeit, Vollständigkeit und Aktualität der Inhalte können wir jedoch keine Gewähr übernehmen. Als Diensteanbieter sind wir gemäß § 7 Abs.1 TMG für eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach §§ 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, übermittelte oder gespeicherte fremde Informationen zu überwachen oder nach Umständen zu forschen, die auf eine rechtswidrige Tätigkeit hinweisen.', 'sai-europe' ); ?>
    </p>

    <h3><?php esc_html_e( 'Haftung für Links', 'sai-europe' ); ?></h3>
    <p>
      <?php esc_html_e( 'Unser Angebot enthält Links zu externen Webseiten Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb können wir für diese fremden Inhalte auch keine Gewähr übernehmen. Für die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich.', 'sai-europe' ); ?>
    </p>

    <h3><?php esc_html_e( 'Urheberrecht', 'sai-europe' ); ?></h3>
    <p>
      <?php esc_html_e( 'Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielfältigung, Bearbeitung, Verbreitung und jede Art der Verwertung außerhalb der Grenzen des Urheberrechtes bedürfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers.', 'sai-europe' ); ?>
    </p>

    <hr>

    <h2><?php esc_html_e( 'Datenschutz', 'sai-europe' ); ?></h2>
    <p>
      <?php esc_html_e( 'Die Nutzung unserer Webseite ist in der Regel ohne Angabe personenbezogener Daten möglich. Soweit auf unseren Seiten personenbezogene Daten (beispielsweise Name, Anschrift oder eMail-Adressen) erhoben werden, erfolgt dies, soweit möglich, stets auf freiwilliger Basis. Diese Daten werden ohne Ihre ausdrückliche Zustimmung nicht an Dritte weitergegeben.', 'sai-europe' ); ?>
    </p>
    <p>
      <?php esc_html_e( 'Weitere Informationen entnehmen Sie bitte unserer', 'sai-europe' ); ?>
      <a href="<?php echo esc_url( home_url( '/datenschutz' ) ); ?>">
        <?php esc_html_e( 'Datenschutzerklärung', 'sai-europe' ); ?>
      </a>.
    </p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
