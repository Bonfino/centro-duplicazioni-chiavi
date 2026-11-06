<?php
defined( 'ABSPATH' ) || exit;

cdc_register_block( 'text-media', array(
    'title' => __( 'Text media', 'centro-duplicazioni-chiavi' ),
    'description' => __( 'Testo e video affiancati.', 'centro-duplicazioni-chiavi' ),
    'icon' => 'admin-network',
    'keywords' => array( 'testo', 'video', 'chi siamo' ),
) );
