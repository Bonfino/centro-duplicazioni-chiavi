<?php
defined( 'ABSPATH' ) || exit;

cdc_register_block( 'banner-numeri', array(
    'title' => __( 'Banner numeri', 'centro-duplicazioni-chiavi' ),
    'description' => __( 'Banner con valori e descrizioni su sfondo blu.', 'centro-duplicazioni-chiavi' ),
    'icon' => 'admin-network',
    'keywords' => array( 'numeri', 'statistiche', 'banner' ),
) );
