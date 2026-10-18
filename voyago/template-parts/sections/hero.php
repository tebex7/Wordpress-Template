<?php
/**
 * Hero section
 *
 * @package Voyago
 * @since 1.0.0
 */
?>
<?php
    /**
     * Cinematic opening chapter.
     *
     * @package Voyago
     */
    $mrr_hero_image = get_theme_mod( 'mrr_hero_image', get_template_directory_uri() . '/assets/images/erg-chebbi-camel-crossing.jpg' );
    ?>
    <section class="mrr-hero" id="top" aria-labelledby="mrr-hero-title">
        <img class="mrr-hero__image" src="<?php echo esc_url( $mrr_hero_image ); ?>" alt="Camel caravan crossing the Erg Chebbi dunes in Morocco" fetchpriority="high" decoding="async">
        <div class="mrr-hero__shade" aria-hidden="true"></div>
        <div class="mrr-hero__inner mrr-shell">
            <div class="mrr-hero__copy" data-reveal>
                <p class="mrr-eyebrow mrr-eyebrow--light"><span></span><?php esc_html_e( 'An invitation to Morocco', 'voyago' ); ?></p>
                <h1 id="mrr-hero-title"><?php echo nl2br( esc_html( get_theme_mod( 'mrr_hero_title', 'Morocco Is Calling. Follow the Road Less Traveled.' ) ) ); ?></h1>
                <p class="mrr-hero__intro"><?php echo esc_html( get_theme_mod( 'mrr_hero_copy', 'From ancient medinas to golden Sahara dunes, discover Morocco through journeys shaped by culture, landscapes, and unforgettable encounters.' ) ); ?></p>
                <div class="mrr-actions">
                    <a class="mrr-button mrr-button--gold" href="#tours"><?php esc_html_e( 'Explore our journeys', 'voyago' ); ?><span aria-hidden="true">↗</span></a>
                    <a class="mrr-button mrr-button--light-ghost" href="<?php echo esc_url( mrr_inquiry_url() ); ?>"><?php esc_html_e( 'Plan your trip', 'voyago' ); ?></a>
                </div>
            </div>
            <div class="mrr-hero__caption"><span>31°08′ N</span><span><?php esc_html_e( 'The edge of the Sahara', 'voyago' ); ?></span></div>
            <a class="mrr-scroll-cue" href="#discover"><span><?php esc_html_e( 'Scroll to discover', 'voyago' ); ?></span><i aria-hidden="true"></i></a>
        </div>
    </section>
