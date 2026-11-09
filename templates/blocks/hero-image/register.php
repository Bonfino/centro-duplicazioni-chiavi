<?php
defined( 'ABSPATH' ) || exit;

cdc_register_block( 'hero-image', array(
    'title' => __( 'Hero con immagine', 'centro-duplicazioni-chiavi' ),
    'description' => __( 'Hero con sfondo, testo, pulsanti e immagine affiancata.', 'centro-duplicazioni-chiavi' ),
    'icon' => 'admin-network',
    'keywords' => array( 'hero', 'immagine', 'intestazione' ),
) );
