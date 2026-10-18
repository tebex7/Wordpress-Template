<?php
/**
 * The header for our theme
 *
 * @package Voyago
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#primary"><?php esc_html_e( 'Skip to content', 'voyago' ); ?></a>

<?php $mrr_home = home_url( '/' ); ?>
<?php $mrr_brand_logo = (int) get_theme_mod( 'custom_logo' ) ? wp_get_attachment_image_url( (int) get_theme_mod( 'custom_logo' ), 'full' ) : get_theme_mod( 'mrr_brand_logo', get_theme_file_uri( '/assets/images/brand-logo.png' ) ); ?>
<?php $mrr_tours_url = get_post_type_archive_link( 'tour' ); ?>
<?php $mrr_about_url = mrr_page_url( 'about' ); ?>
<?php $mrr_contact_url = mrr_page_url( 'contact' ); ?>
<header id="masthead" class="mrr-header<?php echo is_front_page() ? ' mrr-header--over-hero' : ''; ?>" data-site-header>
    <div class="mrr-header__inner">
        <?php if ( $mrr_brand_logo ) : ?>
            <a class="mrr-brand" href="<?php echo esc_url( $mrr_home ); ?>" rel="home" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                <span class="mrr-brand__image"><img class="mrr-brand__logo" src="<?php echo esc_url( $mrr_brand_logo ); ?>" alt="" width="2048" height="1152" fetchpriority="high"></span>
                <span class="mrr-brand__name"><?php bloginfo( 'name' ); ?></span>
            </a>
        <?php else : ?>
            <a class="mrr-brand" href="<?php echo esc_url( $mrr_home ); ?>" rel="home" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                <span class="mrr-brand__wordmark"><span><?php bloginfo( 'name' ); ?></span><small><?php esc_html_e( 'Journeys through Morocco', 'voyago' ); ?></small></span>
            </a>
        <?php endif; ?>

        <button class="mrr-menu-toggle" type="button" aria-controls="primary-navigation" aria-expanded="false" aria-label="<?php esc_attr_e( 'Open navigation', 'voyago' ); ?>" data-menu-toggle>
            <span></span><span></span>
        </button>

        <nav id="primary-navigation" class="mrr-navigation" aria-label="<?php esc_attr_e( 'Main navigation', 'voyago' ); ?>" data-navigation>
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'mrr-navigation__list',
                        'container'      => false,
                        'depth'          => 1,
                    )
                );
                ?>
            <?php else : ?>
                <ul class="mrr-navigation__list">
                    <li><a href="<?php echo esc_url( $mrr_home ); ?>"><?php esc_html_e( 'Home', 'voyago' ); ?></a></li>
                    <li><a href="<?php echo esc_url( $mrr_tours_url ? $mrr_tours_url : $mrr_home . '#tours' ); ?>"><?php esc_html_e( 'Tours', 'voyago' ); ?></a></li>
                    <li><a href="<?php echo esc_url( $mrr_home . '#experiences' ); ?>"><?php esc_html_e( 'Experiences', 'voyago' ); ?></a></li>
                    <li><a href="<?php echo esc_url( $mrr_about_url ? $mrr_about_url : $mrr_home . '#discover' ); ?>"><?php esc_html_e( 'About Us', 'voyago' ); ?></a></li>
                    <li><a href="<?php echo esc_url( $mrr_contact_url ? $mrr_contact_url : $mrr_home . '#contact' ); ?>"><?php esc_html_e( 'Contact', 'voyago' ); ?></a></li>
                </ul>
            <?php endif; ?>
            <a class="mrr-button mrr-button--gold mrr-navigation__cta" href="<?php echo esc_url( mrr_inquiry_url() ); ?>"><?php esc_html_e( 'Plan your trip', 'voyago' ); ?><span aria-hidden="true">↗</span></a>
        </nav>
    </div>
</header>