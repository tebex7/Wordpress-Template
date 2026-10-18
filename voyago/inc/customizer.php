<?php
/**
 * Mystic Morocco Roads theme settings.
 *
 * @package Voyago
 */

function mrr_customize_register( $wp_customize ) {
    $wp_customize->add_section(
        'mrr_homepage',
        array(
            'title'       => esc_html__( 'Mystic Morocco Roads', 'voyago' ),
            'priority'    => 30,
            'description' => esc_html__( 'Homepage story, imagery, contact details, and Tripadvisor configuration.', 'voyago' ),
        )
    );

    $controls = array(
        'hero_title' => array( 'Hero headline', 'textarea', 'Morocco Is Calling. Follow the Road Less Traveled.' ),
        'hero_copy' => array( 'Hero introduction', 'textarea', 'From ancient medinas to golden Sahara dunes, discover Morocco through journeys shaped by culture, landscapes, and unforgettable encounters.' ),
        'brand_description' => array( 'Search and brand description', 'textarea', 'Discover Morocco through journeys shaped by its landscapes, medinas, and culture.' ),
        'discover_title' => array( 'Discover heading', 'text', 'A land of endless discoveries.' ),
        'discover_copy' => array( 'Discover copy', 'textarea', 'Follow the call of the road from ochre medinas to the high Atlas, where mountain villages, cedar forests, Atlantic air, and Sahara light reveal a different Morocco at every turn.' ),
        'tours_title' => array( 'Journeys heading', 'text', 'Routes to somewhere unforgettable.' ),
        'tours_copy' => array( 'Journeys introduction', 'textarea', 'Every road has its own rhythm. Start with a route that feels like yours, then make it your own.' ),
        'tours_page_title' => array( 'Tours page heading', 'text', 'Journeys through Morocco.' ),
        'tours_page_copy' => array( 'Tours page introduction', 'textarea', 'Browse route ideas and discover landscapes, medinas, and moments that might shape your own trip.' ),
        'destinations_title' => array( 'Destinations heading', 'text', 'Many worlds, one road.' ),
        'destinations_copy' => array( 'Destinations introduction', 'textarea', 'A country best understood one landscape, one conversation, and one unhurried stop at a time.' ),
        'destinations_items' => array( 'Destination entries (one per line: name|description|image filename or Media Library URL)', 'textarea', "Marrakech|Lantern-lit alleys, gardens, and the pulse of the medina.|marrakech-lantern-maker.jpg\nAït Benhaddou|A clay-built ksar rising from the southern road.|ait-benhaddou-kasbah.jpg\nFes|A living medina shaped by craft and centuries of trade.|fes-medina.jpg\nChefchaouen|Blue-washed lanes folded into the Rif Mountains.|chefchaouen-blue-medina.jpg\nMerzouga|Sahara dunes, long shadows, and a slower horizon.|erg-chebbi-evening.jpg\nAtlas Mountains|High passes and small villages beneath the peaks.|high-atlas-range.jpg\nEssaouira|Salt air, white ramparts, and the Atlantic edge.|essaouira-atlantic-coast.jpg\nCasablanca|An Atlantic-facing city beneath the minaret of Hassan II.|casablanca-hassan-ii.jpg\nRabat|A river-side medina and a quieter coastal capital.|rabat-river-medina.jpg\nTangier|Northern lanes where the sea is never far away.|tangier-medina.jpg" ),
        'experiences_title' => array( 'Experiences heading', 'text', 'The details that stay with you.' ),
        'experiences_copy' => array( 'Experiences introduction', 'textarea', 'Not just the places on the map, but the textures, tastes, and quiet pauses in between.' ),
        'experiences_items' => array( 'Signature experiences (one per line: title|description|image filename|location)', 'textarea', "Across the dunes|A quieter Sahara experience, shaped by the light and the open horizon.|sahara-camp.jpg|Sahara\nCraft in the medina|See a material take shape by hand in the old city.|marrakech-lantern-maker.jpg|Marrakech\nAlong the Atlantic|Follow the coast beyond the medina walls.|essaouira-atlantic-coast.jpg|Essaouira" ),
        'why_title' => array( 'Why travel with us heading', 'text', 'A road shaped around you.' ),
        'why_copy' => array( 'Why travel with us introduction', 'textarea', 'Thoughtful journeys leave room for discovery. Shape the route around your interests, your pace, and the places you want to linger.' ),
        'why_items' => array( 'Travel highlights', 'textarea', "A considered pace|Leave room for unplanned stops, long lunches, and the road in between.\nA route with texture|Bring together landscapes, living craft, and historic places.\nYour own point of view|Begin with what draws you to Morocco and build from there." ),
        'route_title' => array( 'Route heading', 'text', 'Follow the road south.' ),
        'route_copy' => array( 'Route introduction', 'textarea', 'A sample journey across changing landscapes. Every stop is an invitation to make the route your own.' ),
        'route_items' => array( 'Route stops (one per line: name|description|image filename or Media Library URL)', 'textarea', "Marrakech|Begin among the ochre walls and garden courtyards.|marrakech-lantern-maker.jpg\nHigh Atlas|Cross a mountain pass into a quieter landscape.|high-atlas-range.jpg\nAït Benhaddou|Pause at the earthen ksar above the old caravan road.|ait-benhaddou-kasbah.jpg\nOuarzazate|Follow the southern road through wide, open country.|erg-chebbi-evening.jpg\nMerzouga|Meet the dunes at the edge of the Sahara.|erg-chebbi-camel-crossing.jpg\nFes|Finish among the layered lanes of the old medina.|fes-medina.jpg" ),
        'reviews_title' => array( 'Traveler stories heading', 'text', 'Our travelers’ stories.' ),
        'reviews_copy' => array( 'Traveler stories introduction', 'textarea', 'Real experiences. Unforgettable journeys. Shared by our travelers on Tripadvisor.' ),
        'tripadvisor_url' => array( 'Tripadvisor business listing URL', 'url', '' ),
        'tripadvisor_widget_url' => array( 'Official Tripadvisor widget URL', 'url', '' ),
        'closing_title' => array( 'Closing headline', 'textarea', 'Every journey has a story. Let yours begin in Morocco.' ),
        'closing_copy' => array( 'Closing introduction', 'textarea', 'Tell us what inspires you, and start planning a journey through the Morocco you have always wanted to discover.' ),
        'contact_email' => array( 'Public contact email', 'email', '' ),
        'contact_phone' => array( 'Public contact phone', 'text', '' ),
        'contact_whatsapp' => array( 'WhatsApp link', 'url', '' ),
        'social_instagram' => array( 'Instagram URL', 'url', '' ),
        'social_facebook' => array( 'Facebook URL', 'url', '' ),
        'social_youtube' => array( 'YouTube URL', 'url', '' ),
        'footer_intro' => array( 'Footer brand introduction', 'textarea', 'A road of many colors. A country that stays with you long after you return.' ),
    );

    foreach ( $controls as $key => $control ) {
        $setting = 'mrr_' . $key;
        $sanitize = 'textarea' === $control[1] ? 'sanitize_textarea_field' : ( 'email' === $control[1] ? 'sanitize_email' : ( 'url' === $control[1] ? 'esc_url_raw' : 'sanitize_text_field' ) );
        $wp_customize->add_setting(
            $setting,
            array(
                'default'           => $control[2],
                'sanitize_callback' => $sanitize,
                'transport'         => 'refresh',
            )
        );
        $wp_customize->add_control(
            $setting,
            array(
                'section' => 'mrr_homepage',
                'label'   => esc_html__( $control[0], 'voyago' ),
                'type'    => $control[1],
            )
        );
    }

    $image_controls = array(
        'brand_logo'         => array( 'Mystic Morocco Roads logo', 'brand-logo.png' ),
        'hero_image'         => array( 'Hero photograph', 'erg-chebbi-camel-crossing.jpg' ),
        'discover_image'     => array( 'Discover Morocco photograph', 'marrakech-lantern-maker.jpg' ),
        'experience_image_1' => array( 'Desert experience photograph', 'sahara-camp.jpg' ),
        'experience_image_2' => array( 'Craft experience photograph', 'marrakech-lantern-maker.jpg' ),
        'experience_image_3' => array( 'Coast experience photograph', 'essaouira-atlantic-coast.jpg' ),
        'closing_image'      => array( 'Closing photograph', 'erg-chebbi-evening.jpg' ),
    );

    foreach ( $image_controls as $key => $image ) {
        $setting = 'mrr_' . $key;
        $wp_customize->add_setting(
            $setting,
            array(
                'default'           => get_template_directory_uri() . '/assets/images/' . $image[1],
                'sanitize_callback' => 'esc_url_raw',
                'transport'         => 'refresh',
            )
        );
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                $setting,
                array(
                    'section' => 'mrr_homepage',
                    'label'   => esc_html( $image[0] ),
                )
            )
        );
    }
}
add_action( 'customize_register', 'mrr_customize_register' );

function mrr_customizer_rows( $setting, $default = '' ) {
    $rows = preg_split( '/\r\n|\r|\n/', (string) get_theme_mod( $setting, $default ) );
    return array_values( array_filter( array_map( 'trim', $rows ) ) );
}

function mrr_inquiry_url() {
    $whatsapp = trim( (string) get_theme_mod( 'mrr_contact_whatsapp' ) );
    if ( $whatsapp ) {
        return esc_url( $whatsapp );
    }

    $email = sanitize_email( get_theme_mod( 'mrr_contact_email', '' ) );
    return $email ? 'mailto:' . antispambot( $email ) : esc_url( home_url( '/#contact' ) );
}

function mrr_policy_page_url( $slug ) {
    return mrr_page_url( $slug );
}

function mrr_page_url( $slug ) {
    $page = get_page_by_path( $slug, OBJECT, 'page' );
    return $page && 'publish' === $page->post_status ? get_permalink( $page ) : '';
}