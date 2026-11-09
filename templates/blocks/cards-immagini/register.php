<?php
defined( 'ABSPATH' ) || exit;

cdc_register_block( 'cards-immagini', array(
    'title' => __( 'Cards immagini', 'centro-duplicazioni-chiavi' ),
    'description' => __( 'Schede con immagini collegate in sequenza da frecce.', 'centro-duplicazioni-chiavi' ),
    'icon' => 'admin-network',
    'keywords' => array( 'cards', 'immagini', 'sequenza' ),
) );
