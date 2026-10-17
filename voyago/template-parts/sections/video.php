<?php
/**
 * Video section
 *
 * @package Voyago
 * @since 1.0.0
 */
?>
<section class="voyago-section voyago-section--video">
    <div class="voyago-container">
        <div class="voyago-section-header">
            <h2 class="voyago-section-title"><?php esc_html_e( 'Discover Our Adventures', 'voyago' ); ?></h2>
            <p class="voyago-section-subtitle"><?php esc_html_e( 'Watch our travel highlights', 'voyago' ); ?></p>
        </div>
        <div class="voyago-video-content">
            <div class="voyago-video-placeholder">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/video-bg.jpg' ); ?>" alt="<?php esc_attr_e( 'Video placeholder', 'voyago' ); ?>">
            </div>
        </div>
    </div>
</section>
