<?php
defined( 'ABSPATH' ) || exit;

/** Stili condivisi; nell'editor le anteprime sono statiche. */
function cdc_enqueue_block_assets() {
    $css = '/assets/dist/css/main.css';
    $js = '/assets/dist/js/main.js';

    if ( is_readable( get_theme_file_path( $css ) ) ) {
        wp_enqueue_style( 'cdc-main', get_theme_file_uri( $css ), array(), (string) filemtime( get_theme_file_path( $css ) ) );
    }
    if ( is_admin() ) {
        wp_enqueue_style( 'cdc-editor', get_theme_file_uri( '/assets/src/css/editor.css' ), array( 'cdc-main' ), (string) filemtime( get_theme_file_path( '/assets/src/css/editor.css' ) ) );
        wp_enqueue_script( 'cdc-editor', get_theme_file_uri( '/assets/src/js/editor.js' ), array(), (string) filemtime( get_theme_file_path( '/assets/src/js/editor.js' ) ), true );
    } elseif ( is_readable( get_theme_file_path( $js ) ) ) {
        wp_enqueue_script( 'cdc-main', get_theme_file_uri( $js ), array(), (string) filemtime( get_theme_file_path( $js ) ), true );
    }
}
add_action( 'enqueue_block_assets', 'cdc_enqueue_block_assets' );
