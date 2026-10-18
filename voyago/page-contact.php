<?php
/**
 * Template Name: Contact Mystic Morocco Roads
 * Template Post Type: page
 *
 * @package Voyago
 */
get_header();
?>
<main id="primary" class="mrr-contact-page">
    <?php while ( have_posts() ) : the_post(); ?>
        <section class="mrr-page-hero" aria-labelledby="mrr-contact-title">
            <img src="<?php echo esc_url( get_theme_mod( 'mrr_closing_image', get_theme_file_uri( '/assets/images/erg-chebbi-evening.jpg' ) ) ); ?>" alt="Evening light across the Moroccan Sahara">
            <span aria-hidden="true"></span>
            <div class="mrr-page-hero__inner mrr-shell">
                <p class="mrr-eyebrow mrr-eyebrow--light"><span></span><?php esc_html_e( 'Start a conversation', 'voyago' ); ?></p>
                <h1 id="mrr-contact-title"><?php the_title(); ?></h1>
                <?php if ( has_excerpt() ) : ?><p><?php echo esc_html( get_the_excerpt() ); ?></p><?php endif; ?>
            </div>
        </section>
        <section class="mrr-contact-content mrr-shell mrr-section">
            <div class="mrr-contact-content__copy entry-content"><?php the_content(); ?></div>
            <div class="mrr-contact-content__channels">
                <?php $mrr_email = sanitize_email( get_theme_mod( 'mrr_contact_email', '' ) ); ?>
                <?php $mrr_phone = trim( (string) get_theme_mod( 'mrr_contact_phone', '' ) ); ?>
                <?php $mrr_whatsapp = trim( (string) get_theme_mod( 'mrr_contact_whatsapp', '' ) ); ?>
                <?php if ( $mrr_email ) : ?><a href="mailto:<?php echo esc_attr( antispambot( $mrr_email ) ); ?>"><span><?php esc_html_e( 'Email', 'voyago' ); ?></span><strong><?php echo esc_html( antispambot( $mrr_email ) ); ?></strong></a><?php endif; ?>
                <?php if ( $mrr_phone ) : ?><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $mrr_phone ) ); ?>"><span><?php esc_html_e( 'Phone', 'voyago' ); ?></span><strong><?php echo esc_html( $mrr_phone ); ?></strong></a><?php endif; ?>
                <?php if ( $mrr_whatsapp ) : ?><a href="<?php echo esc_url( $mrr_whatsapp ); ?>" target="_blank" rel="noopener noreferrer"><span><?php esc_html_e( 'WhatsApp', 'voyago' ); ?></span><strong><?php esc_html_e( 'Message us', 'voyago' ); ?></strong></a><?php endif; ?>
                <?php if ( ! $mrr_email && ! $mrr_phone && ! $mrr_whatsapp ) : ?><p><?php esc_html_e( 'Contact channels have not been configured yet.', 'voyago' ); ?></p><?php endif; ?>
            </div>
        </section>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>