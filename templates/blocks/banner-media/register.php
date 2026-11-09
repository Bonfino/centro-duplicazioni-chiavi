<?php
defined( 'ABSPATH' ) || exit;

cdc_register_block( 'banner-media', array(
    'title' => __( 'Banner immagine e testo', 'centro-duplicazioni-chiavi' ),
    'description' => __( 'Banner a tutta larghezza con immagine e contenuto affiancati.', 'centro-duplicazioni-chiavi' ),
    'icon' => 'admin-network',
    'keywords' => array( 'banner', 'immagine', 'laboratorio' ),
) );
