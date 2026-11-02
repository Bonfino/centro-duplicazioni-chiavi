<?php
defined( 'ABSPATH' ) || exit;

/** I gruppi di campi vengono creati e assegnati a questa pagina dal backend. */
function cdc_register_theme_options() {
    acf_add_options_page( array(
        'page_title' => __( 'Impostazioni tema', 'centro-duplicazioni-chiavi' ),
        'menu_title' => __( 'Impostazioni tema', 'centro-duplicazioni-chiavi' ),
        'menu_slug' => 'cdc-theme-settings',
        'capability' => 'edit_theme_options',
        'redirect' => false,
        'icon_url' => 'dashicons-admin-customizer',
    ) );
}
add_action( 'acf/init', 'cdc_register_theme_options' );
