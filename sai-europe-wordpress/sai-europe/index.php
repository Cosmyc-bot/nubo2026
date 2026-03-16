<?php
/**
 * Fallback template (blog index / search results)
 *
 * @package sai-europe
 */

get_header();
?>

<section class="page-hero">
  <div class="container">
    <div class="page-hero-inner">
      <?php if ( is_search() ) : ?>
        <p class="page-hero-eyebrow"><?php esc_html_e( 'Suchergebnisse', 'sai-europe' ); ?></p>
        <h1>
          <?php
          printf(
            /* translators: %s: search query */
            esc_html__( 'Suchergebnisse für „%s"', 'sai-europe' ),
            esc_html( get_search_query() )
          );
          ?>
        </h1>
      <?php elseif ( is_archive() ) : ?>
        <p class="page-hero-eyebrow"><?php esc_html_e( 'Archiv', 'sai-europe' ); ?></p>
        <h1><?php the_archive_title(); ?></h1>
        <?php the_archive_description( '<p>', '</p>' ); ?>
      <?php else : ?>
        <p class="page-hero-eyebrow"><?php esc_html_e( 'Aktuelles', 'sai-europe' ); ?></p>
        <h1><?php esc_html_e( 'Blog & Neuigkeiten', 'sai-europe' ); ?></h1>
      <?php endif; ?>
    </div>
  </div>
</section>

<div class="container section">
  <?php if ( have_posts() ) : ?>
    <div class="grid-3">
      <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'pub-card' ); ?>>
          <div class="pub-header">
            <p class="pub-type"><?php esc_html_e( 'Beitrag', 'sai-europe' ); ?></p>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          </div>
          <div class="pub-body">
            <p class="pub-excerpt"><?php the_excerpt(); ?></p>
            <div class="pub-meta">
              <span><?php echo esc_html( get_the_date( 'd.m.Y' ) ); ?></span>
              <span><?php the_author(); ?></span>
            </div>
            <a href="<?php the_permalink(); ?>" class="btn btn--ghost">
              <?php esc_html_e( 'Weiterlesen', 'sai-europe' ); ?>
            </a>
          </div>
        </article>
      <?php endwhile; ?>
    </div>

    <div style="margin-top:3rem;text-align:center;">
      <?php the_posts_pagination( [
          'prev_text' => '← ' . esc_html__( 'Neuere Beiträge', 'sai-europe' ),
          'next_text' => esc_html__( 'Ältere Beiträge', 'sai-europe' ) . ' →',
      ] ); ?>
    </div>

  <?php else : ?>
    <div style="text-align:center;padding:4rem 0;">
      <p><?php esc_html_e( 'Keine Beiträge gefunden.', 'sai-europe' ); ?></p>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--outline-navy" style="margin-top:1.5rem;">
        <?php esc_html_e( 'Zur Startseite', 'sai-europe' ); ?>
      </a>
    </div>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
