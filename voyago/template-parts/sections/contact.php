<?php
/**
 * Cinematic final invitation and inquiry link.
 *
 * @package Voyago
 */
$mrr_closing_image = get_theme_mod( 'mrr_closing_image', get_template_directory_uri() . '/assets/images/erg-chebbi-evening.jpg' );
?>
<section id="contact" class="mrr-closing" aria-labelledby="mrr-closing-title">
    <img class="mrr-closing__image" src="<?php echo esc_url( $mrr_closing_image ); ?>" alt="Last light over the Sahara dunes in Morocco" loading="lazy" decoding="async">
    <div class="mrr-closing__veil" aria-hidden="true"></div>
    <div class="mrr-closing__inner mrr-shell" data-reveal>
        <p class="mrr-eyebrow mrr-eyebrow--light"><span></span><?php esc_html_e( 'Chapter seven · Your story begins here', 'voyago' ); ?></p>
        <h2 id="mrr-closing-title"><?php echo nl2br( esc_html( get_theme_mod( 'mrr_closing_title', 'Every journey has a story. Let yours begin in Morocco.' ) ) ); ?></h2>
        <p><?php echo esc_html( get_theme_mod( 'mrr_closing_copy', 'Tell us what inspires you, and start planning a journey through the Morocco you have always wanted to discover.' ) ); ?></p>
        <a class="mrr-button mrr-button--gold" href="<?php echo esc_url( mrr_inquiry_url() ); ?>"><?php esc_html_e( 'Plan your trip', 'voyago' ); ?><span aria-hidden="true">↗</span></a>
    </div>
</section>
