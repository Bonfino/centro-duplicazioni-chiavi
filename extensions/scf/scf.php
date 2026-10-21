<?php
defined( 'ABSPATH' ) || exit;

require_once get_theme_file_path( '/extensions/scf/fields/options.php' );

/** Conserva i gruppi di campi del nuovo tema in file versionabili. */
function cdc_scf_json_save_path( $path ) {
    return get_stylesheet_directory() . '/extensions/scf/json';
}
add_filter( 'acf/settings/save_json', 'cdc_scf_json_save_path' );

function cdc_scf_json_load_paths( $paths ) {
    $paths[] = get_stylesheet_directory() . '/extensions/scf/json';
    return array_unique( $paths );
}
add_filter( 'acf/settings/load_json', 'cdc_scf_json_load_paths' );

/** Categoria dei blocchi del tema nell'inseritore Gutenberg. */
function cdc_block_categories( $categories ) {
    if ( ! function_exists( 'acf_register_block_type' ) ) {
        return $categories;
    }

    array_unshift( $categories, array(
        'slug' => 'cdc-blocks',
        'title' => __( 'Centro Chiavi', 'centro-duplicazioni-chiavi' ),
    ) );

    return $categories;
}
add_filter( 'block_categories_all', 'cdc_block_categories' );

/** Registra un blocco associandolo a templates/blocks/{slug}/{slug}.php. */
function cdc_register_block( $slug, $args = array() ) {
    if ( ! function_exists( 'acf_register_block_type' ) || ! preg_match( '/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $slug ) ) {
        return false;
    }

    $template = get_theme_file_path( '/templates/blocks/' . $slug . '/' . $slug . '.php' );
    if ( ! is_readable( $template ) ) {
        return false;
    }

    $settings = wp_parse_args( $args, array(
        'title' => ucfirst( str_replace( '-', ' ', $slug ) ),
        'description' => '',
        'category' => 'cdc-blocks',
        'icon' => 'layout',
        'keywords' => array( $slug ),
        'api_version' => 3,
        'acf_block_version' => 3,
        'expanded_editor_buttons' => true,
        'expanded_editor_button_text' => __( 'Apri editor esteso', 'centro-duplicazioni-chiavi' ),
        'supports' => array(
            'anchor' => true,
            'align' => false,
        ),
    ) );

    // SCF aggiunge il namespace acf/: ad esempio acf/cdc-hero.
    $settings['name'] = 'cdc-' . $slug;
    $settings['render_template'] = $template;

    return acf_register_block_type( $settings );
}

/** Carica solo i file di registrazione, quando le API SCF sono disponibili. */
function cdc_load_block_registrations() {
    if ( ! function_exists( 'acf_register_block_type' ) ) {
        return;
    }

    $directory = get_theme_file_path( '/templates/blocks' );
    $registrations = glob( $directory . '/*/register.php' );

    if ( false === $registrations ) {
        return;
    }

    foreach ( $registrations as $registration ) {
        if ( is_readable( $registration ) ) {
            require_once $registration;
        }
    }
}
add_action( 'acf/init', 'cdc_load_block_registrations' );

