<?php
/**
 * Blog section
 *
 * @package Voyago
 * @since 1.0.0
 */
?>
<section class="voyago-section voyago-section--blog">
    <div class="voyago-container">
        <div class="voyago-section-header">
            <h2 class="voyago-section-title"><?php esc_html_e( 'Latest Blog Posts', 'voyago' ); ?></h2>
            <p class="voyago-section-subtitle"><?php esc_html_e( 'Travel tips and inspiration', 'voyago' ); ?></p>
        </div>
        <div class="voyago-blog-grid">
            <?php
            $blog_query = new WP_Query(
                array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'post_status'    => 'publish',
                )
            );

            if ( $blog_query->have_posts() ) {
                while ( $blog_query->have_posts() ) {
                    $blog_query->the_post();
                    ?>
                    <article class="voyago-blog-card">
                        <a href="<?php the_permalink(); ?>" class="voyago-blog-card-link">
                            <?php if ( has_post_thumbnail() ) { ?>
                                <div class="voyago-blog-card-image">
                                    <?php the_post_thumbnail( 'medium_large' ); ?>
                                </div>
                            <?php } ?>
                            <div class="voyago-blog-card-content">
                                <h3 class="voyago-blog-card-title"><?php the_title(); ?></h3>
                                <div class="voyago-blog-card-meta">
                                    <span class="voyago-blog-card-date"><?php echo esc_html( get_the_date() ); ?></span>
                                </div>
                                <?php if ( has_excerpt() ) { ?>
                                    <p class="voyago-blog-card-excerpt"><?php the_excerpt(); ?></p>
                                <?php } ?>
                            </div>
                        </a>
                    </article>
                    <?php
                }
                wp_reset_postdata();
            } else {
                ?>
                <p class="voyago-no-posts"><?php esc_html_e( 'No posts found.', 'voyago' ); ?></p>
                <?php
            }
            ?>
        </div>
    </div>
</section>
