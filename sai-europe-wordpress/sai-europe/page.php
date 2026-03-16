<?php
/**
 * Generic Page Template
 *
 * @package sai-europe
 */

get_header();
?>

<section class="page-hero">
  <div class="container">
    <div class="page-hero-inner">
      <?php
      $ancestors = get_post_ancestors( get_the_ID() );
      if ( $ancestors ) :
        $parent = get_the_title( end( $ancestors ) );
        echo '<p class="page-hero-eyebrow">' . esc_html( $parent ) . '</p>';
      endif;
      ?>
      <h1><?php the_title(); ?></h1>
      <?php if ( has_excerpt() ) : ?>
        <p><?php the_excerpt(); ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php while ( have_posts() ) : the_post(); ?>
  <article id="page-<?php the_ID(); ?>" <?php post_class( 'page-content' ); ?>>
    <?php the_content(); ?>
  </article>
<?php endwhile; ?>

<?php get_footer(); ?>
