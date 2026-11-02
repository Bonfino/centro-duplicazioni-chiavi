<?php
defined( 'ABSPATH' ) || exit;

/** Posizioni disponibili per i futuri menu del tema. */
function cdc_register_menus() {
    register_nav_menus( array(
        'header' => __( 'Menu Header', 'centro-duplicazioni-chiavi' ),
        'footer' => __( 'Menu Footer', 'centro-duplicazioni-chiavi' ),
        'footer_support' => __( 'Menu Footer Supporto', 'centro-duplicazioni-chiavi' ),
        'footer_legal' => __( 'Menu Footer Legal', 'centro-duplicazioni-chiavi' ),
    ) );
}
add_action( 'after_setup_theme', 'cdc_register_menus' );

// Le voci con sottovoci diventano dropdown Bootstrap.
function cdc_header_menu_item_classes( $classes, $item, $args, $depth ) {
    if ( 'header' === ( $args->theme_location ?? '' ) && 0 === $depth ) {
        $classes[] = 'nav-item';
        if ( in_array( 'menu-item-has-children', (array) $item->classes, true ) ) {
            $classes[] = 'dropdown';
        }
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'cdc_header_menu_item_classes', 10, 4 );

function cdc_header_menu_link_attributes( $attributes, $item, $args, $depth ) {
    if ( 'header' !== ( $args->theme_location ?? '' ) ) {
        return $attributes;
    }

    $attributes['class'] = trim( ( $attributes['class'] ?? '' ) . ' ' . ( $depth > 0 ? 'dropdown-item text-wrap py-2' : 'nav-link' ) );
    if ( 0 === $depth && in_array( 'menu-item-has-children', (array) $item->classes, true ) ) {
        $attributes['class'] .= ' dropdown-toggle';
        $attributes['data-bs-toggle'] = 'dropdown';
        $attributes['aria-expanded'] = 'false';
        $attributes['role'] = 'button';
    }
    return $attributes;
}
add_filter( 'nav_menu_link_attributes', 'cdc_header_menu_link_attributes', 10, 4 );

function cdc_footer_menu_link_attributes( $attributes, $item, $args ) {
    if ( in_array( $args->theme_location ?? '', array( 'footer', 'footer_support', 'footer_legal' ), true ) ) {
        $attributes['class'] = trim( ( $attributes['class'] ?? '' ) . ' link-light text-decoration-none' );
    }
    return $attributes;
}
add_filter( 'nav_menu_link_attributes', 'cdc_footer_menu_link_attributes', 10, 3 );

function cdc_header_submenu_classes( $classes, $args, $depth ) {
    if ( 'header' === ( $args->theme_location ?? '' ) ) {
        $classes[] = 'dropdown-menu';
    }
    return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'cdc_header_submenu_classes', 10, 3 );
