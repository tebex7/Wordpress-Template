<?php
/**
 * The template for displaying search results pages
 *
 * @package Voyago
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="voyago-content-area">
    <div class="voyago-container">
        <header class="voyago-page-header">
            <h1 class="page-title">
                <?php
                printf(
                    esc_html__( 'Search Results for: %s', 'voyago' ),
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </header>

        <?php if ( have_posts() ) : ?>
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'voyago-post-card' ); ?>>
                    <header class="entry-header">
                        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </header>
                    <div class="entry-summary">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
                <?php
            endwhile;
            ?>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p><?php esc_html_e( 'No results found for your search.', 'voyago' ); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
