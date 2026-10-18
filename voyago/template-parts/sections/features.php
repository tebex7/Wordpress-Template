<?php
/**
 * Signature experiences and editable travel principles.
 *
 * @package Voyago
 */
$mrr_default_experiences = "Across the dunes|A quieter Sahara experience, shaped by the light and the open horizon.|sahara-camp.jpg|Sahara\nCraft in the medina|See a material take shape by hand in the old city.|marrakech-lantern-maker.jpg|Marrakech\nAlong the Atlantic|Follow the coast beyond the medina walls.|essaouira-atlantic-coast.jpg|Essaouira";
$mrr_experiences = mrr_customizer_rows( 'mrr_experiences_items', $mrr_default_experiences );
$mrr_default_reasons = "A considered pace|Leave room for unplanned stops, long lunches, and the road in between.\nA route with texture|Bring together landscapes, living craft, and historic places.\nYour own point of view|Begin with what draws you to Morocco and build from there.";
$mrr_reasons = mrr_customizer_rows( 'mrr_why_items', $mrr_default_reasons );
?>
<section id="experiences" class="mrr-experiences mrr-section" aria-labelledby="mrr-experiences-title">
    <div class="mrr-shell">
        <div class="mrr-section-heading mrr-section-heading--split" data-reveal>
            <div><p class="mrr-eyebrow mrr-eyebrow--light"><span></span><?php esc_html_e( 'Chapter four · Travel by feeling', 'voyago' ); ?></p><h2 id="mrr-experiences-title"><?php echo esc_html( get_theme_mod( 'mrr_experiences_title', 'The details that stay with you.' ) ); ?></h2></div>
            <p><?php echo esc_html( get_theme_mod( 'mrr_experiences_copy', 'Not just the places on the map, but the textures, tastes, and quiet pauses in between.' ) ); ?></p>
        </div>
        <div class="mrr-experience-grid">
            <?php foreach ( $mrr_experiences as $mrr_index => $mrr_row ) : ?>
                <?php $mrr_experience = array_map( 'trim', explode( '|', $mrr_row ) ); ?>
                <?php if ( count( $mrr_experience ) < 4 ) { continue; } ?>
                <?php $mrr_image = get_theme_mod( 'mrr_experience_image_' . ( $mrr_index + 1 ), get_template_directory_uri() . '/assets/images/' . basename( $mrr_experience[2] ) ); ?>
                <article class="mrr-experience" data-reveal>
                    <div class="mrr-experience__image"><img src="<?php echo esc_url( $mrr_image ); ?>" alt="<?php echo esc_attr( $mrr_experience[3] . ' experience in Morocco' ); ?>" loading="lazy" decoding="async"><span>0<?php echo esc_html( (string) ( $mrr_index + 1 ) ); ?></span></div>
                    <div class="mrr-experience__body"><p><?php echo esc_html( $mrr_experience[3] ); ?></p><h3><?php echo esc_html( $mrr_experience[0] ); ?></h3><span><?php echo esc_html( $mrr_experience[1] ); ?></span></div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="mrr-why mrr-section" aria-labelledby="mrr-why-title">
    <div class="mrr-why__inner mrr-shell">
        <div class="mrr-why__intro" data-reveal>
            <p class="mrr-eyebrow"><span></span><?php esc_html_e( 'A thoughtful way to travel', 'voyago' ); ?></p>
            <h2 id="mrr-why-title"><?php echo esc_html( get_theme_mod( 'mrr_why_title', 'A road shaped around you.' ) ); ?></h2>
            <p><?php echo esc_html( get_theme_mod( 'mrr_why_copy', 'Thoughtful journeys leave room for discovery. Shape the route around your interests, your pace, and the places you want to linger.' ) ); ?></p>
        </div>
        <div class="mrr-why__list">
            <?php foreach ( $mrr_reasons as $mrr_index => $mrr_row ) : ?>
                <?php $mrr_reason = array_map( 'trim', explode( '|', $mrr_row, 2 ) ); ?>
                <?php if ( count( $mrr_reason ) < 2 ) { continue; } ?>
                <article class="mrr-why-item" data-reveal><span class="mrr-why-item__index">0<?php echo esc_html( (string) ( $mrr_index + 1 ) ); ?></span><div><h3><?php echo esc_html( $mrr_reason[0] ); ?></h3><p><?php echo esc_html( $mrr_reason[1] ); ?></p></div><span class="mrr-why-item__mark" aria-hidden="true">↗</span></article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
