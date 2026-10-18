<?php
/**
 * One reusable overview for the tour collection.
 *
 * @package Voyago
 */
get_header();
$mrr_tour_archive_image = get_theme_mod( 'mrr_hero_image', get_theme_file_uri( '/assets/images/erg-chebbi-camel-crossing.jpg' ) );
?>
<main id="primary" class="mrr-tours-archive">
    <section class="mrr-page-hero" aria-labelledby="mrr-tour-archive-title">
        <img src="<?php echo esc_url( $mrr_tour_archive_image ); ?>" alt="A route across the Moroccan Sahara" fetchpriority="high">
        <span aria-hidden="true"></span>
        <div class="mrr-page-hero__inner mrr-shell">
            <p class="mrr-eyebrow mrr-eyebrow--light"><span></span><?php esc_html_e( 'Choose your way through Morocco', 'voyago' ); ?></p>
            <h1 id="mrr-tour-archive-title"><?php echo esc_html( get_theme_mod( 'mrr_tours_page_title', 'Journeys through Morocco.' ) ); ?></h1>
            <p><?php echo esc_html( get_theme_mod( 'mrr_tours_page_copy', 'Browse route ideas and discover landscapes, medinas, and moments that might shape your own trip.' ) ); ?></p>
        </div>
    </section>

    <section class="mrr-tours mrr-section" aria-label="<?php esc_attr_e( 'Available tour routes', 'voyago' ); ?>">
        <div class="mrr-shell">
            <?php if ( have_posts() ) : ?>
                <div class="mrr-tour-grid">
                    <?php
                    $mrr_index = 0;
                    while ( have_posts() ) :
                        the_post();
                        $mrr_cover_asset = get_post_meta( get_the_ID(), '_mrr_tour_cover_asset', true );
                        $mrr_cover = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : ( $mrr_cover_asset ? get_theme_file_uri( '/assets/images/' . rawurlencode( basename( $mrr_cover_asset ) ) ) : '' );
                        ?>
                        <article <?php post_class( 'mrr-tour-card' ); ?> data-reveal>
                            <a class="mrr-tour-card__image" href="<?php the_permalink(); ?>">
                                <?php if ( $mrr_cover ) : ?><img src="<?php echo esc_url( $mrr_cover ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy"><?php endif; ?>
                                <span class="mrr-tour-card__index">0<?php echo esc_html( (string) ( ++$mrr_index ) ); ?></span>
                                <?php if ( mrr_tour_meta( 'duration' ) ) : ?><span class="mrr-tour-card__duration"><?php echo esc_html( mrr_tour_meta( 'duration' ) ); ?></span><?php endif; ?>
                            </a>
                            <div class="mrr-tour-card__body">
                                <?php if ( mrr_tour_meta( 'route' ) ) : ?><p class="mrr-tour-card__route"><?php echo esc_html( mrr_tour_meta( 'route' ) ); ?></p><?php endif; ?>
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <?php if ( has_excerpt() ) : ?><p><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
                                <a class="mrr-text-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Discover this route', 'voyago' ); ?><span aria-hidden="true">↗</span></a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                <?php the_posts_pagination(); ?>
            <?php else : ?>
                <div class="mrr-empty-state"><p><?php esc_html_e( 'No journeys have been added yet.', 'voyago' ); ?></p></div>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>