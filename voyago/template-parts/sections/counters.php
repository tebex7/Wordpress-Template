<?php
/**
 * A sample route across Morocco, not a statement of travel times.
 *
 * @package Voyago
 */
$mrr_default_route = "Marrakech|Begin among ochre walls and garden courtyards.|marrakech-lantern-maker.jpg\nHigh Atlas|Cross a mountain pass into a quieter landscape.|high-atlas-range.jpg\nAït Benhaddou|Pause at the earthen ksar above the old caravan road.|ait-benhaddou-kasbah.jpg\nOuarzazate|Follow the southern road through wide, open country.|erg-chebbi-evening.jpg\nMerzouga|Meet the dunes at the edge of the Sahara.|erg-chebbi-camel-crossing.jpg\nFes|Finish among the layered lanes of the old medina.|fes-medina.jpg";
$mrr_route_stops = mrr_customizer_rows( 'mrr_route_items', $mrr_default_route );
?>
<section id="route" class="mrr-route mrr-section" aria-labelledby="mrr-route-title">
    <div class="mrr-shell">
        <div class="mrr-section-heading mrr-section-heading--split" data-reveal>
            <div><p class="mrr-eyebrow"><span></span><?php esc_html_e( 'Chapter five · Follow the road', 'voyago' ); ?></p><h2 id="mrr-route-title"><?php echo esc_html( get_theme_mod( 'mrr_route_title', 'Follow the road south.' ) ); ?></h2></div>
            <p><?php echo esc_html( get_theme_mod( 'mrr_route_copy', 'A sample journey across changing landscapes. Every stop is an invitation to make the route your own.' ) ); ?></p>
        </div>
        <ol class="mrr-route-list">
            <?php foreach ( $mrr_route_stops as $mrr_index => $mrr_row ) : ?>
                <?php $mrr_stop = array_map( 'trim', explode( '|', $mrr_row ) ); ?>
                <?php if ( count( $mrr_stop ) < 3 ) { continue; } ?>
                <?php $mrr_stop_image = wp_http_validate_url( $mrr_stop[2] ) ? $mrr_stop[2] : get_template_directory_uri() . '/assets/images/' . rawurlencode( basename( $mrr_stop[2] ) ); ?>
                <li class="mrr-route-stop" data-reveal>
                    <span class="mrr-route-stop__node" aria-hidden="true"></span>
                    <figure><img src="<?php echo esc_url( $mrr_stop_image ); ?>" alt="<?php echo esc_attr( $mrr_stop[0] . ', Morocco' ); ?>" loading="lazy" decoding="async"></figure>
                    <span class="mrr-route-stop__number">0<?php echo esc_html( (string) ( $mrr_index + 1 ) ); ?></span>
                    <h3><?php echo esc_html( $mrr_stop[0] ); ?></h3>
                    <p><?php echo esc_html( $mrr_stop[1] ); ?></p>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</section>
