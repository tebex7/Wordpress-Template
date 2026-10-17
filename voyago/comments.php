<?php
/**
 * The template for displaying comments
 *
 * @package Voyago
 * @since 1.0.0
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            echo esc_html( $comment_count ) . ' ' . esc_html__( 'Comments', 'voyago' );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                )
            );
            ?>
        </ol>

        <?php the_comments_pagination(); ?>
    <?php endif; ?>

    <?php if ( ! comments_open() && get_comments_number() ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'voyago' ); ?></p>
    <?php endif; ?>

    <?php comment_form(); ?>
</div>
