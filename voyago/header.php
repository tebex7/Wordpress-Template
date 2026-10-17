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
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'voyago' ); ?></a>

<header id="masthead" class="voyago-site-header">
    <div class="voyago-container">
        <div class="voyago-header-inner">
            <div class="voyago-site-branding">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    ?>
                    <h1 class="voyago-site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php bloginfo( 'name' ); ?>
                        </a>
                    </h1>
                    <?php
                    $voyago_description = get_bloginfo( 'description', 'display' );
                    if ( $voyago_description || is_customize_preview() ) {
                        ?>
                        <p class="voyago-site-description"><?php echo esc_html( $voyago_description ); ?></p>
                    <?php } ?>
                <?php } ?>
            </div>

            <nav id="site-navigation" class="voyago-main-nav" aria-label="<?php esc_attr_e( 'Primary Navigation', 'voyago' ); ?>">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'voyago-menu',
                        'container'      => false,
                    )
                );
                ?>
            </nav>
        </div>
    </div>
</header>