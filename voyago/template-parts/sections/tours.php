<?php
/**
 * Tour cards sourced from editable WordPress tour entries.
 *
 * @package Voyago
 */
$mrr_tours = new WP_Query(
    array(
        'post_type'      => 'tour',
        'posts_per_page' => 4,
        'post_status'    => 'publish',
        'no_found_rows'  => true,
    )
);
?>
<section id="tours" class="mrr-tours mrr-section" aria-labelledby="mrr-tours-title">
    <div class="mrr-shell">
        <div class="mrr-section-heading mrr-section-heading--split" data-reveal>
            <div><p class="mrr-eyebrow"><span></span><?php esc_html_e( 'Chapter two · Choose your journey', 'voyago' ); ?></p><h2 id="mrr-tours-title"><?php echo esc_html( get_theme_mod( 'mrr_tours_title', 'Routes to somewhere unforgettable.' ) ); ?></h2></div>
            <p><?php echo esc_html( get_theme_mod( 'mrr_tours_copy', 'Every road has its own rhythm. Start with a route that feels like yours, then make it your own.' ) ); ?></p>
        </div>

        <?php if ( $mrr_tours->have_posts() ) : ?>
            <div class="mrr-tour-grid">
                <?php
                $mrr_index = 0;
                while ( $mrr_tours->have_posts() ) :
                    $mrr_tours->the_post();
                    $mrr_cover_asset = get_post_meta( get_the_ID(), '_mrr_tour_cover_asset', true );
                    $mrr_cover = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : ( $mrr_cover_asset ? get_template_directory_uri() . '/assets/images/' . rawurlencode( basename( $mrr_cover_asset ) ) : '' );
                    $mrr_duration = mrr_tour_meta( 'duration' );
                    $mrr_route = mrr_tour_meta( 'route' );
                    ?>
                    <article class="mrr-tour-card<?php echo 0 === $mrr_index ? ' mrr-tour-card--feature' : ''; ?>" data-reveal>
                        <a class="mrr-tour-card__image" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( sprintf( __( 'Discover %s', 'voyago' ), get_the_title() ) ); ?>">
                            <?php if ( $mrr_cover ) : ?><img src="<?php echo esc_url( $mrr_cover ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy" decoding="async"><?php endif; ?>
                            <span class="mrr-tour-card__index">0<?php echo esc_html( (string) ( $mrr_index + 1 ) ); ?></span>
                            <?php if ( $mrr_duration ) : ?><span class="mrr-tour-card__duration"><?php echo esc_html( $mrr_duration ); ?></span><?php endif; ?>
                        </a>
                        <div class="mrr-tour-card__body">
                            <?php if ( $mrr_route ) : ?><p class="mrr-tour-card__route"><?php echo esc_html( $mrr_route ); ?></p><?php endif; ?>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php if ( has_excerpt() ) : ?><p><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
                            <a class="mrr-text-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Discover this route', 'voyago' ); ?><span aria-hidden="true">↗</span></a>
                        </div>
                    </article>
                    <?php
                    ++$mrr_index;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        <?php else : ?>
            <div class="mrr-empty-state"><p><?php esc_html_e( 'Your tour stories will appear here. Add a journey under Tours in WordPress.', 'voyago' ); ?></p><a class="mrr-text-link" href="<?php echo esc_url( admin_url( 'post-new.php?post_type=tour' ) ); ?>"><?php esc_html_e( 'Add a tour', 'voyago' ); ?><span aria-hidden="true">↗</span></a></div>
        <?php endif; ?>
    </div>
</section>
