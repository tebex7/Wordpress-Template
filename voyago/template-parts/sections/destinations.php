<?php
/**
 * Editorial destination gallery for the homepage.
 *
 * @package Voyago
 */
$mrr_default_destinations = "Marrakech|Lantern-lit alleys, gardens, and the pulse of the medina.|marrakech-lantern-maker.jpg\nAït Benhaddou|A clay-built ksar rising from the southern road.|ait-benhaddou-kasbah.jpg\nFes|A living medina shaped by craft and centuries of trade.|fes-medina.jpg\nChefchaouen|Blue-washed lanes folded into the Rif Mountains.|chefchaouen-blue-medina.jpg\nMerzouga|Sahara dunes, long shadows, and a slower horizon.|erg-chebbi-evening.jpg\nAtlas Mountains|High passes and small villages beneath the peaks.|high-atlas-range.jpg\nEssaouira|Salt air, white ramparts, and the Atlantic edge.|essaouira-atlantic-coast.jpg\nCasablanca|An Atlantic-facing city beneath the minaret of Hassan II.|casablanca-hassan-ii.jpg\nRabat|A river-side medina and a quieter coastal capital.|rabat-river-medina.jpg\nTangier|Northern lanes where the sea is never far away.|tangier-medina.jpg";
$mrr_destinations = mrr_customizer_rows( 'mrr_destinations_items', $mrr_default_destinations );
?>
<section id="destinations" class="mrr-destinations mrr-section" aria-labelledby="mrr-destinations-title">
    <div class="mrr-shell">
        <div class="mrr-section-heading mrr-section-heading--center" data-reveal>
            <p class="mrr-eyebrow"><span></span><?php esc_html_e( 'Chapter three · A country of many worlds', 'voyago' ); ?></p>
            <h2 id="mrr-destinations-title"><?php echo esc_html( get_theme_mod( 'mrr_destinations_title', 'Many worlds, one road.' ) ); ?></h2>
            <p><?php echo esc_html( get_theme_mod( 'mrr_destinations_copy', 'A country best understood one landscape, one conversation, and one unhurried stop at a time.' ) ); ?></p>
        </div>
        <div class="mrr-destination-grid">
            <?php foreach ( $mrr_destinations as $mrr_index => $mrr_row ) : ?>
                <?php $mrr_place = array_map( 'trim', explode( '|', $mrr_row ) ); ?>
                <?php if ( count( $mrr_place ) < 3 ) { continue; } ?>
                <?php $mrr_place_image = wp_http_validate_url( $mrr_place[2] ) ? $mrr_place[2] : get_template_directory_uri() . '/assets/images/' . rawurlencode( basename( $mrr_place[2] ) ); ?>
                <a class="mrr-destination mrr-destination--<?php echo esc_attr( (string) ( ( $mrr_index % 5 ) + 1 ) ); ?>" href="#tours" data-reveal>
                    <img src="<?php echo esc_url( $mrr_place_image ); ?>" alt="<?php echo esc_attr( $mrr_place[0] . ', Morocco' ); ?>" loading="lazy" decoding="async">
                    <span class="mrr-destination__veil" aria-hidden="true"></span>
                    <span class="mrr-destination__number"><?php echo esc_html( str_pad( (string) ( $mrr_index + 1 ), 2, '0', STR_PAD_LEFT ) ); ?></span>
                    <span class="mrr-destination__copy"><strong><?php echo esc_html( $mrr_place[0] ); ?></strong><span><?php echo esc_html( $mrr_place[1] ); ?></span></span>
                    <span class="mrr-destination__arrow" aria-hidden="true">↗</span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
