<?php
defined( 'ABSPATH' ) || exit;

cdc_register_block( 'cards-preventivo', array(
    'title' => __( 'Cards preventivo', 'centro-duplicazioni-chiavi' ),
    'description' => __( 'Due schede per le modalità di richiesta del preventivo.', 'centro-duplicazioni-chiavi' ),
    'icon' => 'admin-network',
    'keywords' => array( 'preventivo', 'negozio', 'online' ),
) );
