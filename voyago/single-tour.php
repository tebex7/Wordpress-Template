<?php
/**
 * Shared editorial template for every tour post.
 *
 * @package Voyago
 */
get_header();

while ( have_posts() ) :
    the_post();
    $mrr_cover_asset = get_post_meta( get_the_ID(), '_mrr_tour_cover_asset', true );
    $mrr_cover_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : ( $mrr_cover_asset ? get_template_directory_uri() . '/assets/images/' . rawurlencode( basename( $mrr_cover_asset ) ) : get_template_directory_uri() . '/assets/images/erg-chebbi-camel-crossing.jpg' );
    $mrr_duration = mrr_tour_meta( 'duration' );
    $mrr_price = mrr_tour_meta( 'price' );
    $mrr_start = mrr_tour_meta( 'route_start' );
    $mrr_end = mrr_tour_meta( 'route_end' );
    $mrr_route = mrr_tour_meta( 'route' );
    $mrr_highlights = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', mrr_tour_meta( 'highlights' ) ) ) );
    $mrr_included = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', mrr_tour_meta( 'included' ) ) ) );
    $mrr_excluded = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', mrr_tour_meta( 'excluded' ) ) ) );
    $mrr_itinerary = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', mrr_tour_meta( 'itinerary' ) ) ) );
    $mrr_faqs = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', mrr_tour_meta( 'faq' ) ) ) );
    $mrr_gallery = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', mrr_tour_meta( 'gallery' ) ) ) );
    ?>
    <main id="primary" class="mrr-tour-page">
        <section class="mrr-tour-hero" aria-labelledby="mrr-tour-title">
            <img class="mrr-tour-hero__image" src="<?php echo esc_url( $mrr_cover_image ); ?>" alt="<?php echo esc_attr( get_the_title() . ', Morocco' ); ?>">
            <div class="mrr-tour-hero__shade" aria-hidden="true"></div>
            <div class="mrr-tour-hero__inner">
                <p class="mrr-eyebrow mrr-eyebrow--light"><span></span><?php esc_html_e( 'A Morocco journey', 'voyago' ); ?></p>
                <h1 id="mrr-tour-title"><?php the_title(); ?></h1>
                <?php if ( has_excerpt() ) : ?><p class="mrr-tour-hero__intro"><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
                <div class="mrr-tour-hero__facts">
                    <?php if ( $mrr_duration ) : ?><span><?php echo esc_html( $mrr_duration ); ?></span><?php endif; ?>
                    <?php if ( $mrr_price ) : ?><span><?php echo esc_html( $mrr_price ); ?></span><?php endif; ?>
                    <?php if ( $mrr_start && $mrr_end ) : ?><span><?php echo esc_html( $mrr_start . ' → ' . $mrr_end ); ?></span><?php elseif ( $mrr_start || $mrr_end ) : ?><span><?php echo esc_html( $mrr_start ? $mrr_start : $mrr_end ); ?></span><?php endif; ?>
                    <?php if ( $mrr_route ) : ?><span><?php echo esc_html( $mrr_route ); ?></span><?php endif; ?>
                </div>
            </div>
        </section>

        <div class="mrr-tour-layout mrr-shell mrr-section">
            <article class="mrr-tour-content">
                <?php if ( get_post_meta( get_the_ID(), '_mrr_tour_demo', true ) ) : ?><p class="mrr-demo-note"><?php esc_html_e( 'Illustrative route concept. Confirm availability, itinerary, and all trip terms with the agency before relying on this example.', 'voyago' ); ?></p><?php endif; ?>
                <div class="entry-content"><?php the_content(); ?></div>

                <?php if ( $mrr_highlights ) : ?>
                    <section aria-labelledby="mrr-highlights-title"><h2 id="mrr-highlights-title"><?php esc_html_e( 'Along the way', 'voyago' ); ?></h2><ul><?php foreach ( $mrr_highlights as $mrr_highlight ) : ?><li><?php echo esc_html( $mrr_highlight ); ?></li><?php endforeach; ?></ul></section>
                <?php endif; ?>

                <?php if ( $mrr_itinerary ) : ?>
                    <section aria-labelledby="mrr-itinerary-title"><h2 id="mrr-itinerary-title"><?php esc_html_e( 'The route, day by day', 'voyago' ); ?></h2><ol class="mrr-tour-itinerary">
                        <?php foreach ( $mrr_itinerary as $mrr_day ) : ?>
                            <?php $mrr_day_parts = array_map( 'trim', explode( '|', $mrr_day, 2 ) ); ?>
                            <li><strong><?php echo esc_html( $mrr_day_parts[0] ); ?></strong><span><?php echo esc_html( isset( $mrr_day_parts[1] ) ? $mrr_day_parts[1] : '' ); ?></span></li>
                        <?php endforeach; ?>
                    </ol></section>
                <?php endif; ?>

                <?php if ( $mrr_included ) : ?><section aria-labelledby="mrr-included-title"><h2 id="mrr-included-title"><?php esc_html_e( 'Included', 'voyago' ); ?></h2><ul><?php foreach ( $mrr_included as $mrr_item ) : ?><li><?php echo esc_html( $mrr_item ); ?></li><?php endforeach; ?></ul></section><?php endif; ?>
                <?php if ( $mrr_excluded ) : ?><section aria-labelledby="mrr-excluded-title"><h2 id="mrr-excluded-title"><?php esc_html_e( 'Not included', 'voyago' ); ?></h2><ul><?php foreach ( $mrr_excluded as $mrr_item ) : ?><li><?php echo esc_html( $mrr_item ); ?></li><?php endforeach; ?></ul></section><?php endif; ?>
                <?php if ( mrr_tour_meta( 'practical' ) ) : ?><section aria-labelledby="mrr-practical-title"><h2 id="mrr-practical-title"><?php esc_html_e( 'Practical notes', 'voyago' ); ?></h2><p><?php echo nl2br( esc_html( mrr_tour_meta( 'practical' ) ) ); ?></p></section><?php endif; ?>

                <?php if ( $mrr_gallery ) : ?>
                    <section aria-labelledby="mrr-gallery-title"><h2 id="mrr-gallery-title"><?php esc_html_e( 'A few glimpses', 'voyago' ); ?></h2><div class="mrr-tour-gallery">
                        <?php foreach ( $mrr_gallery as $mrr_gallery_url ) : ?><img src="<?php echo esc_url( $mrr_gallery_url ); ?>" alt="<?php echo esc_attr( get_the_title() . ' tour photograph' ); ?>" loading="lazy"><?php endforeach; ?>
                    </div></section>
                <?php endif; ?>

                <?php if ( $mrr_faqs ) : ?>
                    <section class="mrr-tour-faq" aria-labelledby="mrr-faq-title"><h2 id="mrr-faq-title"><?php esc_html_e( 'Questions for the road', 'voyago' ); ?></h2>
                        <?php foreach ( $mrr_faqs as $mrr_faq ) : ?>
                            <?php $mrr_faq_parts = array_map( 'trim', explode( '|', $mrr_faq, 2 ) ); ?>
                            <?php if ( empty( $mrr_faq_parts[0] ) ) { continue; } ?>
                            <details><summary><?php echo esc_html( $mrr_faq_parts[0] ); ?></summary><p><?php echo esc_html( isset( $mrr_faq_parts[1] ) ? $mrr_faq_parts[1] : '' ); ?></p></details>
                        <?php endforeach; ?>
                    </section>
                <?php endif; ?>
            </article>

            <aside class="mrr-tour-aside">
                <p class="mrr-eyebrow"><span></span><?php esc_html_e( 'Make the route yours', 'voyago' ); ?></p>
                <p><?php esc_html_e( 'Share what draws you to Morocco and ask the agency about shaping this journey around your plans.', 'voyago' ); ?></p>
                <a class="mrr-button mrr-button--gold" href="<?php echo esc_url( mrr_inquiry_url() ); ?>"><?php esc_html_e( 'Ask about this route', 'voyago' ); ?><span aria-hidden="true">↗</span></a>
            </aside>
        </div>

        <?php
        $mrr_related = new WP_Query(
            array(
                'post_type'      => 'tour',
                'post_status'    => 'publish',
                'posts_per_page' => 3,
                'post__not_in'   => array( get_the_ID() ),
                'no_found_rows'  => true,
            )
        );
        ?>
        <?php if ( $mrr_related->have_posts() ) : ?>
            <section class="mrr-related mrr-section" aria-labelledby="mrr-related-title"><div class="mrr-shell"><div class="mrr-section-heading"><p class="mrr-eyebrow"><span></span><?php esc_html_e( 'Keep exploring', 'voyago' ); ?></p><h2 id="mrr-related-title"><?php esc_html_e( 'More roads through Morocco.', 'voyago' ); ?></h2></div><div class="mrr-tour-grid">
                <?php while ( $mrr_related->have_posts() ) : $mrr_related->the_post(); $mrr_related_image = get_post_meta( get_the_ID(), '_mrr_tour_cover_asset', true ); ?>
                    <article class="mrr-tour-card"><a class="mrr-tour-card__image" href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'large' ); elseif ( $mrr_related_image ) : ?><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . rawurlencode( basename( $mrr_related_image ) ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy"><?php endif; ?></a><div class="mrr-tour-card__body"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><a class="mrr-text-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Discover this route', 'voyago' ); ?><span aria-hidden="true">↗</span></a></div></article>
                <?php endwhile; wp_reset_postdata(); ?>
            </div></div></section>
        <?php endif; ?>
    </main>
    <?php
endwhile;

get_footer();