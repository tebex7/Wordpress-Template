<?php
/**
 * The template for displaying archive pages
 *
 * @package Voyago
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="voyago-content-area">
    <div class="voyago-container">
        <?php if ( have_posts() ) : ?>
            <header class="voyago-page-header">
                <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
                <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
            </header>

            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'voyago-post-card' ); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="voyago-post-image">
                            <?php the_post_thumbnail( 'medium_large' ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="voyago-post-content">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="entry-meta">
                                <span><?php echo esc_html( get_the_date() ); ?></span>
                            </div>
                        </header>
                        <div class="entry-summary">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </article>
                <?php
            endwhile;
            ?>

            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p><?php esc_html_e( 'No posts found.', 'voyago' ); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
