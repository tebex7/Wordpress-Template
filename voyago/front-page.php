<?php
/**
 * The front page template file
 *
 * @package Voyago
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="mrr-home">
    <?php
    get_template_part( 'template-parts/sections/hero' );
    get_template_part( 'template-parts/sections/about' );
    get_template_part( 'template-parts/sections/tours' );
    get_template_part( 'template-parts/sections/destinations' );
    get_template_part( 'template-parts/sections/features' );
    get_template_part( 'template-parts/sections/counters' );
    get_template_part( 'template-parts/sections/testimonials' );
    get_template_part( 'template-parts/sections/contact' );
    ?>
</main>

<?php
get_footer();
