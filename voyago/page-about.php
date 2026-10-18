<?php
/**
 * Template Name: About Mystic Morocco Roads
 * Template Post Type: page
 *
 * @package Voyago
 */
get_header();
?>
<main id="primary" class="mrr-about-page">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php $mrr_about_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : get_theme_mod( 'mrr_discover_image', get_theme_file_uri( '/assets/images/marrakech-lantern-maker.jpg' ) ); ?>
        <section class="mrr-page-hero" aria-labelledby="mrr-about-title">
            <img src="<?php echo esc_url( $mrr_about_image ); ?>" alt="Moroccan craft and culture" fetchpriority="high">
            <span aria-hidden="true"></span>
            <div class="mrr-page-hero__inner mrr-shell">
                <p class="mrr-eyebrow mrr-eyebrow--light"><span></span><?php esc_html_e( 'The story behind the road', 'voyago' ); ?></p>
                <h1 id="mrr-about-title"><?php the_title(); ?></h1>
                <?php if ( has_excerpt() ) : ?><p><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
            </div>
        </section>
        <article class="mrr-policy mrr-shell mrr-section mrr-about-copy">
            <div class="entry-content"><?php the_content(); ?></div>
            <a class="mrr-text-link" href="<?php echo esc_url( get_post_type_archive_link( 'tour' ) ); ?>"><?php esc_html_e( 'Explore the journeys', 'voyago' ); ?><span aria-hidden="true">↗</span></a>
        </article>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>