<?php
/**
 * Enqueue scripts and styles.
 */
function dcs_scripts() {
    wp_enqueue_style( 'dcs-main', get_template_directory_uri() . '/assets/main.min.css', false, _S_VERSION, 'all' );

    wp_enqueue_script( 'dcs-main', get_template_directory_uri() . '/assets/main.min.js', false, _S_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'dcs_scripts' );
