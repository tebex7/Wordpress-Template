<?php
/**
 * Tripadvisor reviews are only shown through a configured official widget.
 *
 * @package Voyago
 */
$mrr_tripadvisor_url = trim( (string) get_theme_mod( 'mrr_tripadvisor_url', '' ) );
$mrr_tripadvisor_widget = trim( (string) get_theme_mod( 'mrr_tripadvisor_widget_url', '' ) );
$mrr_widget_host = strtolower( (string) wp_parse_url( $mrr_tripadvisor_widget, PHP_URL_HOST ) );
$mrr_widget_is_tripadvisor = $mrr_widget_host && ( 'tripadvisor.com' === $mrr_widget_host || preg_match( '/\.tripadvisor\.com$/', $mrr_widget_host ) );
?>
<section id="stories" class="mrr-reviews mrr-section" aria-labelledby="mrr-reviews-title">
    <div class="mrr-shell">
        <div class="mrr-section-heading mrr-section-heading--center" data-reveal>
            <p class="mrr-eyebrow"><span></span><?php esc_html_e( 'Chapter six · Stories carried home', 'voyago' ); ?></p>
            <h2 id="mrr-reviews-title"><?php echo esc_html( get_theme_mod( 'mrr_reviews_title', 'Our travelers’ stories.' ) ); ?></h2>
            <p><?php echo esc_html( get_theme_mod( 'mrr_reviews_copy', 'Real experiences. Unforgettable journeys. Shared by our travelers on Tripadvisor.' ) ); ?></p>
        </div>
        <?php if ( $mrr_tripadvisor_widget && $mrr_widget_is_tripadvisor ) : ?>
            <div class="mrr-reviews__widget"><iframe src="<?php echo esc_url( $mrr_tripadvisor_widget ); ?>" title="<?php esc_attr_e( 'Official Tripadvisor reviews for Mystic Morocco Roads', 'voyago' ); ?>" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe></div>
        <?php else : ?>
            <div class="mrr-reviews__empty" data-reveal><span aria-hidden="true">“</span><p><?php esc_html_e( 'Traveler stories belong to the people who shared them. Connect the official Tripadvisor listing to show their words here.', 'voyago' ); ?></p></div>
        <?php endif; ?>
        <?php if ( $mrr_tripadvisor_url ) : ?>
            <a class="mrr-button mrr-button--outline mrr-reviews__link" href="<?php echo esc_url( $mrr_tripadvisor_url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Read more reviews on Tripadvisor', 'voyago' ); ?><span aria-hidden="true">↗</span></a>
        <?php endif; ?>
    </div>
</section>
