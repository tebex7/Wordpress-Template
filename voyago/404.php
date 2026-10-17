<?php
/**
 * The template for displaying 404 pages
 *
 * @package Voyago
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="voyago-content-area">
    <div class="voyago-container">
        <section class="voyago-404">
            <header class="voyago-page-header">
                <h1 class="page-title"><?php esc_html_e( 'Oops! That page could not be found.', 'voyago' ); ?></h1>
            </header>

            <p><?php esc_html_e( 'It looks like nothing was found at this location. You can try a search or return to the homepage.', 'voyago' ); ?></p>

            <?php get_search_form(); ?>
            <p>
                <a class="voyago-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Back to Home', 'voyago' ); ?></a>
            </p>
        </section>
    </div>
</main>

<?php
get_footer();
