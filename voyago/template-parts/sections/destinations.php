<?php
/**
 * Destinations section
 *
 * @package Voyago
 * @since 1.0.0
 */
?>
<section class="voyago-section voyago-section--destinations">
    <div class="voyago-container">
        <div class="voyago-section-header">
            <h2 class="voyago-section-title"><?php esc_html_e( 'Top Destinations', 'voyago' ); ?></h2>
            <p class="voyago-section-subtitle"><?php esc_html_e( 'Explore our most popular travel destinations', 'voyago' ); ?></p>
        </div>
        <div class="voyago-destinations-grid">
            <div class="voyago-destination-item">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/destination-1.jpg' ); ?>" alt="<?php esc_attr_e( 'Destination', 'voyago' ); ?>">
                <div class="voyago-destination-content">
                    <h3 class="voyago-destination-name"><?php esc_html_e( 'Paris', 'voyago' ); ?></h3>
                </div>
            </div>
            <div class="voyago-destination-item">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/destination-2.jpg' ); ?>" alt="<?php esc_attr_e( 'Destination', 'voyago' ); ?>">
                <div class="voyago-destination-content">
                    <h3 class="voyago-destination-name"><?php esc_html_e( 'Tokyo', 'voyago' ); ?></h3>
                </div>
            </div>
            <div class="voyago-destination-item">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/destination-3.jpg' ); ?>" alt="<?php esc_attr_e( 'Destination', 'voyago' ); ?>">
                <div class="voyago-destination-content">
                    <h3 class="voyago-destination-name"><?php esc_html_e( 'Bali', 'voyago' ); ?></h3>
                </div>
            </div>
        </div>
    </div>
</section>
