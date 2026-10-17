<?php
/**
 * Tours section
 *
 * @package Voyago
 * @since 1.0.0
 */
?>
<section id="tours" class="voyago-section voyago-section--tours">
    <div class="voyago-container">
        <div class="voyago-section-header">
            <h2 class="voyago-section-title"><?php esc_html_e( 'Popular Tours', 'voyago' ); ?></h2>
            <p class="voyago-section-subtitle"><?php esc_html_e( 'Explore our best tour packages', 'voyago' ); ?></p>
        </div>
        <div class="voyago-tours-grid">
            <?php
            $tour_query = new WP_Query(
                array(
                    'post_type'      => 'tour',
                    'posts_per_page' => 6,
                    'post_status'    => 'publish',
                )
            );

            if ( $tour_query->have_posts() ) {
                while ( $tour_query->have_posts() ) {
                    $tour_query->the_post();
                    ?>
                    <article class="voyago-tour-card">
                        <a href="<?php the_permalink(); ?>" class="voyago-tour-card-link">
                            <?php if ( has_post_thumbnail() ) { ?>
                                <div class="voyago-tour-card-image">
                                    <?php the_post_thumbnail( 'medium_large' ); ?>
                                </div>
                            <?php } ?>
                            <div class="voyago-tour-card-content">
                                <h3 class="voyago-tour-card-title"><?php the_title(); ?></h3>
                                <?php if ( has_excerpt() ) { ?>
                                    <p class="voyago-tour-card-excerpt"><?php the_excerpt(); ?></p>
                                <?php } ?>
                            </div>
                        </a>
                    </article>
                    <?php
                }
                wp_reset_postdata();
            } else {
                ?>
                <p class="voyago-no-tours"><?php esc_html_e( 'No tours found. Add some tours to see them here.', 'voyago' ); ?></p>
                <?php
            }
            ?>
        </div>
    </div>
</section>
