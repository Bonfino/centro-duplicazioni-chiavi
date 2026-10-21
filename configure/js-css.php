<?php
defined( 'ABSPATH' ) || exit;

/** Gli stessi asset sono disponibili sul sito e nell'anteprima Gutenberg. */
function cdc_enqueue_block_assets() {
    $css = '/assets/dist/css/main.css';
    $js = '/assets/dist/js/main.js';

    if ( is_readable( get_theme_file_path( $css ) ) ) {
        wp_enqueue_style( 'cdc-main', get_theme_file_uri( $css ), array(), (string) filemtime( get_theme_file_path( $css ) ) );
    }
    if ( is_readable( get_theme_file_path( $js ) ) ) {
        wp_enqueue_script( 'cdc-main', get_theme_file_uri( $js ), array(), (string) filemtime( get_theme_file_path( $js ) ), true );
    }
}
add_action( 'enqueue_block_assets', 'cdc_enqueue_block_assets' );
