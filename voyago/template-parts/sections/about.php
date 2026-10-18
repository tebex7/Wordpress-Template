<?php
/**
 * About section
 *
 * @package Voyago
 * @since 1.0.0
 */
?>
<?php
    /**
     * Discover Morocco: the second chapter.
     *
     * @package Voyago
     */
    $mrr_discover_image = get_theme_mod( 'mrr_discover_image', get_template_directory_uri() . '/assets/images/marrakech-lantern-maker.jpg' );
    ?>
    <section id="discover" class="mrr-discover mrr-section" aria-labelledby="mrr-discover-title">
        <div class="mrr-discover__inner mrr-shell">
            <figure class="mrr-discover__photo" data-reveal>
                <img src="<?php echo esc_url( $mrr_discover_image ); ?>" alt="Craftsperson shaping a lantern in the Marrakesh medina" loading="lazy" decoding="async">
                <figcaption><span>01</span> <?php esc_html_e( 'A land of living craft', 'voyago' ); ?></figcaption>
            </figure>
            <div class="mrr-discover__copy" data-reveal>
                <p class="mrr-eyebrow"><span></span><?php esc_html_e( 'Chapter one · A land of contrasts', 'voyago' ); ?></p>
                <h2 id="mrr-discover-title"><?php echo esc_html( get_theme_mod( 'mrr_discover_title', 'A land of endless discoveries.' ) ); ?></h2>
                <p><?php echo esc_html( get_theme_mod( 'mrr_discover_copy', 'Follow the call of the road from ochre medinas to the high Atlas, where mountain villages, cedar forests, Atlantic air, and Sahara light reveal a different Morocco at every turn.' ) ); ?></p>
                <a class="mrr-text-link" href="#tours"><?php esc_html_e( 'Find your way through Morocco', 'voyago' ); ?><span aria-hidden="true">↗</span></a>
                <div class="mrr-discover__note"><span>⟡</span><p><?php esc_html_e( 'The best discoveries rarely happen in a hurry.', 'voyago' ); ?></p></div>
            </div>
        </div>
    </section>
