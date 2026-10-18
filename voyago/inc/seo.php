<?php
/**
 * Site identity structured data and homepage description.
 *
 * @package Voyago
 */

function mrr_output_site_identity() {
    $logo_id = (int) get_theme_mod( 'custom_logo' );
    $logo_url = $logo_id ? wp_get_attachment_image_url( $logo_id, 'full' ) : get_theme_mod( 'mrr_brand_logo', get_theme_file_uri( '/assets/images/brand-logo.png' ) );
    $site_url = home_url( '/' );
    $description = trim( (string) get_theme_mod( 'mrr_brand_description', get_bloginfo( 'description' ) ) );
    $same_as = array_filter(
        array(
            get_theme_mod( 'mrr_social_instagram', '' ),
            get_theme_mod( 'mrr_social_facebook', '' ),
            get_theme_mod( 'mrr_social_youtube', '' ),
            get_theme_mod( 'mrr_tripadvisor_url', '' ),
        )
    );

    $organization = array(
        '@type' => 'Organization',
        '@id'   => trailingslashit( $site_url ) . '#organization',
        'name'  => get_bloginfo( 'name' ),
        'url'   => $site_url,
    );
    if ( $description ) {
        $organization['description'] = $description;
    }
    if ( $logo_url ) {
        $organization['logo'] = array(
            '@type' => 'ImageObject',
            'url'   => esc_url_raw( $logo_url ),
        );
    }
    if ( $same_as ) {
        $organization['sameAs'] = array_map( 'esc_url_raw', $same_as );
    }

    $graph = array(
        '@context' => 'https://schema.org',
        '@graph'   => array(
            $organization,
            array(
                '@type'      => 'WebSite',
                '@id'        => trailingslashit( $site_url ) . '#website',
                'url'        => $site_url,
                'name'       => get_bloginfo( 'name' ),
                'publisher'  => array( '@id' => trailingslashit( $site_url ) . '#organization' ),
                'inLanguage' => get_bloginfo( 'language' ),
            ),
        ),
    );

    echo '<script type="application/ld+json">' . wp_json_encode( $graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT ) . '</script>' . "\n";

    if ( is_front_page() && $description ) {
        echo '<meta name="description" content="' . esc_attr( $description ) . '">' . "\n";
    }
}
add_action( 'wp_head', 'mrr_output_site_identity', 1 );