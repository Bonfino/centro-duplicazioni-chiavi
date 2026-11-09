<?php
defined( 'ABSPATH' ) || exit;

cdc_register_block( 'text-media', array(
    'title' => __( 'Text media', 'centro-duplicazioni-chiavi' ),
    'description' => __( 'Testo affiancato a un video o a una composizione di immagini.', 'centro-duplicazioni-chiavi' ),
    'icon' => 'admin-network',
    'keywords' => array( 'testo', 'video', 'immagini', 'laboratorio' ),
) );
