<?php
/**
 * Optional editorial demo routes and policy placeholders.
 *
 * @package Voyago
 */

function mrr_seed_theme_content() {
    if ( 'Voyago Travel' === get_option( 'blogname' ) ) {
        update_option( 'blogname', 'Mystic Morocco Roads' );
    }

    $samples = array(
        array(
            'slug'     => 'marrakech-to-merzouga-desert-route',
            'title'    => 'Marrakech to Merzouga: A Desert Road',
            'excerpt'  => 'An illustrative route from the ochre medina, over the High Atlas, and onward to the Erg Chebbi dunes.',
            'duration' => 'Illustrative itinerary',
            'start'    => 'Marrakech',
            'end'      => 'Merzouga',
            'route'    => 'Marrakech → High Atlas → Aït Benhaddou → Merzouga',
            'image'    => 'erg-chebbi-camel-crossing.jpg',
            'highlights' => "Cross the High Atlas landscape\nPause at the earthen ksar of Aït Benhaddou\nWatch the light change over Erg Chebbi",
            'itinerary' => "Day 1|Marrakech to the High Atlas and Aït Benhaddou.\nDay 2|Continue south through changing landscapes toward the Sahara.\nDay 3|Spend time around the dunes before returning along the southern road.",
        ),
        array(
            'slug'     => 'imperial-cities-sample-route',
            'title'    => 'Imperial Cities: A Northern Route',
            'excerpt'  => 'A sample thread between Marrakech, Rabat, and Fes, with time for old streets and changing architecture.',
            'duration' => 'Illustrative itinerary',
            'start'    => 'Marrakech',
            'end'      => 'Fes',
            'route'    => 'Marrakech → Rabat → Fes',
            'image'    => 'fes-medina.jpg',
            'highlights' => "Walk the lanes of the Fes medina\nSee the Atlantic-facing capital, Rabat\nTrace architectural details across the route",
            'itinerary' => "Day 1|Begin in Marrakech and follow the route north.\nDay 2|Pause in Rabat and continue toward Fes.\nDay 3|Explore the layered streets and craft traditions of Fes.",
        ),
        array(
            'slug'     => 'coastal-morocco-sample-route',
            'title'    => 'Coastal Morocco: The Atlantic Edge',
            'excerpt'  => 'A sample coastal journey following sea air, white ramparts, and the changing Atlantic shore.',
            'duration' => 'Illustrative itinerary',
            'start'    => 'Casablanca',
            'end'      => 'Essaouira',
            'route'    => 'Casablanca → Atlantic coast → Essaouira',
            'image'    => 'essaouira-atlantic-coast.jpg',
            'highlights' => "Follow Morocco's Atlantic edge\nPause among the ramparts and port of Essaouira\nBalance city streets with open sea",
            'itinerary' => "Day 1|Set out from Casablanca along the Atlantic coast.\nDay 2|Arrive in Essaouira and explore at an easy pace.",
        ),
        array(
            'slug'     => 'grand-morocco-sample-route',
            'title'    => 'The Grand Morocco Road: A Sample',
            'excerpt'  => 'A wide-angle route sketch joining medina streets, mountain country, earthen architecture, and desert horizons.',
            'duration' => 'Illustrative itinerary',
            'start'    => 'Marrakech',
            'end'      => 'Fes',
            'route'    => 'Marrakech → Atlas Mountains → Sahara → Fes',
            'image'    => 'ait-benhaddou-kasbah.jpg',
            'highlights' => "Move from mountain passes to desert landscapes\nVisit the Aït Benhaddou ksar\nEnd among the lanes of Fes",
            'itinerary' => "Day 1|Begin in Marrakech and travel toward the Atlas.\nDay 2|Continue through the southern route and its earthen architecture.\nDay 3|Take in the Sahara landscape.\nDay 4|Follow the road north toward Fes.",
        ),
        array(
            'slug'     => 'atlas-mountains-sample-route',
            'title'    => 'Atlas Mountains: A Slower Crossing',
            'excerpt'  => 'A sample mountain itinerary with room for village landscapes, high passes, and the changing light of the Atlas.',
            'duration' => 'Illustrative itinerary',
            'start'    => 'Marrakech',
            'end'      => 'Marrakech',
            'route'    => 'Marrakech → High Atlas → Ouirgane',
            'image'    => 'high-atlas-range.jpg',
            'highlights' => "See the High Atlas at a slower pace\nPause in mountain landscapes\nReturn by the southern approach to Marrakech",
            'itinerary' => "Day 1|Leave Marrakech for the Atlas foothills.\nDay 2|Follow a quieter mountain route and return toward the city.",
        ),
    );

    foreach ( $samples as $sample ) {
        if ( get_page_by_path( $sample['slug'], OBJECT, 'tour' ) ) {
            continue;
        }

        $post_id = wp_insert_post(
            array(
                'post_type'    => 'tour',
                'post_status'  => 'publish',
                'post_name'    => $sample['slug'],
                'post_title'   => $sample['title'],
                'post_excerpt' => $sample['excerpt'],
                'post_content' => '<p>' . esc_html__( 'Illustrative route concept only. Replace with confirmed trip details, practical information, and approved business terms before accepting inquiries.', 'voyago' ) . '</p>',
            ),
            true
        );

        if ( is_wp_error( $post_id ) ) {
            continue;
        }

        update_post_meta( $post_id, '_mrr_tour_duration', $sample['duration'] );
        update_post_meta( $post_id, '_mrr_tour_route_start', $sample['start'] );
        update_post_meta( $post_id, '_mrr_tour_route_end', $sample['end'] );
        update_post_meta( $post_id, '_mrr_tour_route', $sample['route'] );
        update_post_meta( $post_id, '_mrr_tour_highlights', $sample['highlights'] );
        update_post_meta( $post_id, '_mrr_tour_itinerary', $sample['itinerary'] );
        update_post_meta( $post_id, '_mrr_tour_demo', '1' );
        update_post_meta( $post_id, '_mrr_tour_cover_asset', $sample['image'] );
    }

    $mrr_pages = array(
        'about' => array(
            'title'    => 'About Us',
            'template' => 'page-about.php',
            'content'  => '<h2>A country best discovered along the way</h2><p>From medina lanes and mountain roads to the broad Sahara horizon, Morocco offers a changing sense of place at every turn. Mystic Morocco Roads is a starting point for discovering those landscapes, histories, and everyday details.</p><h2>Make the route your own</h2><p>Use this page to share the real story behind the agency, the people visitors will meet, and the approach that shapes each journey. Add your confirmed team and service information before launch.</p>',
        ),
        'contact' => array(
            'title'    => 'Contact',
            'template' => 'page-contact.php',
            'content'  => '<p>Have a route in mind? Share the places, pace, and experiences you would like to explore. Use the contact channels below for trip-planning questions.</p>',
        ),
    );

    foreach ( $mrr_pages as $mrr_slug => $mrr_page ) {
        $mrr_existing = get_page_by_path( $mrr_slug, OBJECT, 'page' );
        if ( ! $mrr_existing ) {
            $mrr_page_id = wp_insert_post(
                array(
                    'post_type'    => 'page',
                    'post_status'  => 'publish',
                    'post_name'    => $mrr_slug,
                    'post_title'   => $mrr_page['title'],
                    'post_content' => $mrr_page['content'],
                ),
                true
            );
            $mrr_existing = is_wp_error( $mrr_page_id ) ? null : get_post( $mrr_page_id );
        }
        if ( $mrr_existing && in_array( get_post_meta( $mrr_existing->ID, '_wp_page_template', true ), array( '', 'default' ), true ) ) {
            update_post_meta( $mrr_existing->ID, '_wp_page_template', $mrr_page['template'] );
        }
    }

    $policy_pages = array(
        'terms-and-conditions' => 'Terms and Conditions',
        'cancellation-policy'  => 'Cancellation Policy',
    );

    foreach ( $policy_pages as $slug => $title ) {
        if ( get_page_by_path( $slug, OBJECT, 'page' ) ) {
            continue;
        }

        $mrr_policy_id = wp_insert_post(
            array(
                'post_type'    => 'page',
                'post_status'  => 'publish',
                'post_name'    => $slug,
                'post_title'   => $title,
                'post_content' => '<p>' . esc_html__( 'This policy has not been configured yet. Add the approved Mystic Morocco Roads policy text here before relying on or publishing this page.', 'voyago' ) . '</p>',
            )
        );
        if ( ! is_wp_error( $mrr_policy_id ) ) {
            update_post_meta( $mrr_policy_id, '_wp_page_template', 'page-policy.php' );
        }
    }

    $mrr_existing_pages = get_posts(
        array(
            'post_type'      => 'page',
            'post_status'    => array( 'publish', 'draft', 'private' ),
            'name'           => 'privacy-policy',
            'posts_per_page' => 1,
        )
    );
    $privacy_page = $mrr_existing_pages ? $mrr_existing_pages[0] : null;
    if ( $privacy_page && ! get_post_meta( $privacy_page->ID, '_mrr_policy_template', true ) ) {
        update_post_meta( $privacy_page->ID, '_mrr_policy_template', '1' );
    }
    if ( $privacy_page && in_array( get_post_meta( $privacy_page->ID, '_wp_page_template', true ), array( '', 'default' ), true ) ) {
        update_post_meta( $privacy_page->ID, '_wp_page_template', 'page-policy.php' );
    }

    foreach ( array( 'terms-and-conditions', 'cancellation-policy' ) as $mrr_policy_slug ) {
        $mrr_policy_matches = get_posts(
            array(
                'post_type'      => 'page',
                'post_status'    => array( 'publish', 'draft', 'private' ),
                'name'           => $mrr_policy_slug,
                'posts_per_page' => 1,
            )
        );
        $mrr_policy_page = $mrr_policy_matches ? $mrr_policy_matches[0] : null;
        if ( $mrr_policy_page && ! get_post_meta( $mrr_policy_page->ID, '_wp_page_template', true ) ) {
            update_post_meta( $mrr_policy_page->ID, '_wp_page_template', 'page-policy.php' );
        }
    }
}
add_action( 'after_switch_theme', 'mrr_seed_theme_content' );