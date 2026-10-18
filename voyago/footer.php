<?php
/**
 * The footer for our theme
 *
 * @package Voyago
 * @since 1.0.0
 */
?>
<footer id="colophon" class="mrr-footer">
    <div class="mrr-footer__main mrr-shell">
        <div class="mrr-footer__brand">
            <?php $mrr_footer_logo = (int) get_theme_mod( 'custom_logo' ) ? wp_get_attachment_image_url( (int) get_theme_mod( 'custom_logo' ), 'full' ) : get_theme_mod( 'mrr_brand_logo', get_theme_file_uri( '/assets/images/brand-logo.png' ) ); ?>
            <?php if ( $mrr_footer_logo ) : ?>
                <a class="mrr-brand mrr-brand--footer" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><span class="mrr-brand__image"><img class="mrr-brand__logo" src="<?php echo esc_url( $mrr_footer_logo ); ?>" alt="" width="2048" height="1152" loading="lazy"></span><span class="mrr-brand__name"><?php bloginfo( 'name' ); ?></span></a>
            <?php else : ?>
                <a class="mrr-brand mrr-brand--footer" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <span class="mrr-brand__name"><?php bloginfo( 'name' ); ?></span>
                </a>
            <?php endif; ?>
            <p><?php echo esc_html( get_theme_mod( 'mrr_footer_intro', 'A road of many colors. A country that stays with you long after you return.' ) ); ?></p>
        </div>

        <div class="mrr-footer__column">
            <h2><?php esc_html_e( 'Explore', 'voyago' ); ?></h2>
            <a href="<?php echo esc_url( get_post_type_archive_link( 'tour' ) ? get_post_type_archive_link( 'tour' ) : home_url( '/#tours' ) ); ?>"><?php esc_html_e( 'Tours', 'voyago' ); ?></a>
            <a href="<?php echo esc_url( home_url( '/#experiences' ) ); ?>"><?php esc_html_e( 'Experiences', 'voyago' ); ?></a>
            <a href="<?php echo esc_url( home_url( '/#destinations' ) ); ?>"><?php esc_html_e( 'Destinations', 'voyago' ); ?></a>
            <?php $mrr_about_url = mrr_page_url( 'about' ); ?>
            <?php if ( $mrr_about_url ) : ?><a href="<?php echo esc_url( $mrr_about_url ); ?>"><?php esc_html_e( 'About us', 'voyago' ); ?></a><?php endif; ?>
            <?php $mrr_reviews = get_theme_mod( 'mrr_tripadvisor_url', '' ); ?>
            <?php if ( $mrr_reviews ) : ?><a href="<?php echo esc_url( $mrr_reviews ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Tripadvisor', 'voyago' ); ?></a><?php endif; ?>
        </div>

        <div class="mrr-footer__column">
            <h2><?php esc_html_e( 'Get in touch', 'voyago' ); ?></h2>
            <?php $mrr_email = sanitize_email( get_theme_mod( 'mrr_contact_email', '' ) ); ?>
            <?php $mrr_phone = trim( (string) get_theme_mod( 'mrr_contact_phone', '' ) ); ?>
            <?php $mrr_whatsapp = trim( (string) get_theme_mod( 'mrr_contact_whatsapp', '' ) ); ?>
            <?php if ( $mrr_email ) : ?><a href="mailto:<?php echo esc_attr( antispambot( $mrr_email ) ); ?>"><?php echo esc_html( antispambot( $mrr_email ) ); ?></a><?php endif; ?>
            <?php $mrr_contact_page_url = mrr_page_url( 'contact' ); ?>
            <?php if ( $mrr_contact_page_url ) : ?><a href="<?php echo esc_url( $mrr_contact_page_url ); ?>"><?php esc_html_e( 'Contact', 'voyago' ); ?></a><?php endif; ?>
            <?php if ( $mrr_phone ) : ?><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $mrr_phone ) ); ?>"><?php echo esc_html( $mrr_phone ); ?></a><?php endif; ?>
            <?php if ( $mrr_whatsapp ) : ?><a href="<?php echo esc_url( $mrr_whatsapp ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'WhatsApp', 'voyago' ); ?></a><?php endif; ?>
            <?php foreach ( array( 'Instagram' => 'mrr_social_instagram', 'Facebook' => 'mrr_social_facebook', 'YouTube' => 'mrr_social_youtube' ) as $mrr_social_label => $mrr_social_setting ) : ?>
                <?php $mrr_social_url = get_theme_mod( $mrr_social_setting, '' ); ?>
                <?php if ( $mrr_social_url ) : ?><a href="<?php echo esc_url( $mrr_social_url ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $mrr_social_label ); ?></a><?php endif; ?>
            <?php endforeach; ?>
            <?php if ( ! $mrr_email && ! $mrr_phone && ! $mrr_whatsapp ) : ?><a href="<?php echo esc_url( home_url( '/#contact' ) ); ?>"><?php esc_html_e( 'Send an inquiry', 'voyago' ); ?></a><?php endif; ?>
        </div>
    </div>

    <div class="mrr-footer__bottom mrr-shell">
        <p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></p>
        <nav aria-label="<?php esc_attr_e( 'Legal', 'voyago' ); ?>">
            <?php foreach ( array( 'privacy-policy' => 'Privacy Policy', 'terms-and-conditions' => 'Terms and Conditions', 'cancellation-policy' => 'Cancellation Policy' ) as $mrr_policy_slug => $mrr_policy_title ) : ?>
                <?php $mrr_policy_url = mrr_policy_page_url( $mrr_policy_slug ); ?>
                <?php if ( $mrr_policy_url ) : ?><a href="<?php echo esc_url( $mrr_policy_url ); ?>"><?php echo esc_html( $mrr_policy_title ); ?></a><?php endif; ?>
            <?php endforeach; ?>
        </nav>
        <a class="mrr-footer__top" href="#top" aria-label="<?php esc_attr_e( 'Back to top', 'voyago' ); ?>">↑</a>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>