<?php
/**
 * Editable fields for the reusable tour post type.
 *
 * @package Voyago
 */

function mrr_tour_fields() {
    return array(
        'duration'     => array( 'Duration', 'text', 'Example: 5 days' ),
        'price'        => array( 'Price or pricing note (optional; leave blank until confirmed)', 'text', '' ),
        'route_start'  => array( 'Starting point', 'text', '' ),
        'route_end'    => array( 'Ending point', 'text', '' ),
        'route'        => array( 'Route', 'text', 'Separate stops with arrows or commas.' ),
        'highlights'   => array( 'Tour highlights', 'textarea', 'One highlight per line.' ),
        'itinerary'    => array( 'Day-by-day itinerary', 'textarea', 'One day per line, formatted as Day 1|Description.' ),
        'included'     => array( 'Included services', 'textarea', 'One item per line.' ),
        'excluded'     => array( 'Not included', 'textarea', 'One item per line.' ),
        'practical'    => array( 'Practical information', 'textarea', 'Use only confirmed information.' ),
        'faq'          => array( 'Frequently asked questions', 'textarea', 'One question per line, formatted as Question|Answer.' ),
        'gallery'      => array( 'Photo gallery URLs', 'textarea', 'Paste one WordPress media-library image URL per line.' ),
    );
}

function mrr_add_tour_meta_box() {
    add_meta_box(
        'mrr-tour-details',
        esc_html__( 'Tour details', 'voyago' ),
        'mrr_render_tour_meta_box',
        'tour',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes_tour', 'mrr_add_tour_meta_box' );

function mrr_render_tour_meta_box( $post ) {
    wp_nonce_field( 'mrr_save_tour_details', 'mrr_tour_details_nonce' );

    foreach ( mrr_tour_fields() as $key => $field ) {
        $value = get_post_meta( $post->ID, '_mrr_tour_' . $key, true );
        ?>
        <p>
            <label for="mrr-tour-<?php echo esc_attr( $key ); ?>"><strong><?php echo esc_html( $field[0] ); ?></strong></label><br>
            <?php if ( 'textarea' === $field[1] ) : ?>
                <textarea class="widefat" rows="<?php echo 'itinerary' === $key ? '6' : '4'; ?>" id="mrr-tour-<?php echo esc_attr( $key ); ?>" name="mrr_tour[<?php echo esc_attr( $key ); ?>]" placeholder="<?php echo esc_attr( $field[2] ); ?>"><?php echo esc_textarea( $value ); ?></textarea>
            <?php else : ?>
                <input class="widefat" type="text" id="mrr-tour-<?php echo esc_attr( $key ); ?>" name="mrr_tour[<?php echo esc_attr( $key ); ?>]" value="<?php echo esc_attr( $value ); ?>" placeholder="<?php echo esc_attr( $field[2] ); ?>">
            <?php endif; ?>
        </p>
        <?php
    }
}

function mrr_save_tour_details( $post_id ) {
    if ( ! isset( $_POST['mrr_tour_details_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['mrr_tour_details_nonce'] ) ), 'mrr_save_tour_details' ) ) {
        return;
    }
    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! current_user_can( 'edit_post', $post_id ) || wp_is_post_revision( $post_id ) ) {
        return;
    }

    $submitted = isset( $_POST['mrr_tour'] ) && is_array( $_POST['mrr_tour'] ) ? wp_unslash( $_POST['mrr_tour'] ) : array();
    foreach ( mrr_tour_fields() as $key => $field ) {
        $value = isset( $submitted[ $key ] ) && is_string( $submitted[ $key ] ) ? $submitted[ $key ] : '';
        $value = 'textarea' === $field[1] ? sanitize_textarea_field( $value ) : sanitize_text_field( $value );
        if ( '' === $value ) {
            delete_post_meta( $post_id, '_mrr_tour_' . $key );
        } else {
            update_post_meta( $post_id, '_mrr_tour_' . $key, $value );
        }
    }
}
add_action( 'save_post_tour', 'mrr_save_tour_details' );

function mrr_tour_meta( $key, $post_id = 0 ) {
    return get_post_meta( $post_id ? $post_id : get_the_ID(), '_mrr_tour_' . $key, true );
}