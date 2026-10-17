<?php
/**
 * The footer for our theme
 *
 * @package Voyago
 * @since 1.0.0
 */
?>
</main><!-- #primary -->

<footer id="colophon" class="voyago-site-footer">
    <div class="voyago-container">
        <?php
        if ( has_nav_menu( 'footer' ) ) {
            wp_nav_menu(
                array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'voyago-footer-menu',
                    'container'      => false,
                    'depth'          => 1,
                )
            );
        }
        ?>

        <div class="voyago-site-info">
            <p>
                <?php
                echo esc_html__( 'Copyright', 'voyago' ) . ' &copy; ' . esc_html( gmdate( 'Y' ) ) . ' ';
                bloginfo( 'name' );
                echo '. ';
                esc_html_e( 'All rights reserved.', 'voyago' );
                ?>
            </p>
        </div>
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>