<?php
/**
 * About section
 *
 * @package Voyago
 * @since 1.0.0
 */
?>
<section class="voyago-section voyago-section--about">
    <div class="voyago-container">
        <div class="voyago-about-grid">
            <div class="voyago-about-content">
                <h2 class="voyago-section-title"><?php esc_html_e( 'About Us', 'voyago' ); ?></h2>
                <p class="voyago-about-text"><?php esc_html_e( 'We are a leading travel agency providing the best tour packages and travel services worldwide. Our experienced team is dedicated to making your dream vacation a reality.', 'voyago' ); ?></p>
                <a href="/about" class="voyago-btn"><?php esc_html_e( 'Learn More', 'voyago' ); ?></a>
            </div>
            <div class="voyago-about-image">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/about.jpg' ); ?>" alt="<?php esc_attr_e( 'About Voyago', 'voyago' ); ?>">
            </div>
        </div>
    </div>
</section>
