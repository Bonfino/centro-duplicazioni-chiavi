<?php
defined( 'ABSPATH' ) || exit;

function cdc_register_news() {
    if ( post_type_exists( 'news' ) ) {
        return;
    }

    register_post_type( 'news', array(
        'labels' => array(
            'name' => __( 'News', 'centro-duplicazioni-chiavi' ),
            'singular_name' => __( 'Notizia', 'centro-duplicazioni-chiavi' ),
            'add_new_item' => __( 'Aggiungi notizia', 'centro-duplicazioni-chiavi' ),
            'edit_item' => __( 'Modifica notizia', 'centro-duplicazioni-chiavi' ),
        ),
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'rewrite' => array( 'slug' => 'news', 'with_front' => false ),
        'menu_icon' => 'dashicons-megaphone',
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
    ) );
}
add_action( 'init', 'cdc_register_news', 20 );

function cdc_news_theme_activated() {
    cdc_register_news();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'cdc_news_theme_activated' );
