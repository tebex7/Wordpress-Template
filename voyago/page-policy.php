<?php
/**
 * Template Name: Policy Document
 * Template Post Type: page
 *
 * Shared, editable layout for privacy, terms, and cancellation policies.
 * @package Voyago
 */
get_header();
?>
<main id="primary" class="mrr-policy mrr-shell mrr-section">
    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <p class="mrr-eyebrow"><span></span><?php esc_html_e( 'The practical details', 'voyago' ); ?></p>
            <h1><?php the_title(); ?></h1>
            <div class="entry-content"><?php the_content(); ?></div>
        </article>
    <?php endwhile; ?>
</main>
<?php get_footer(); ?>