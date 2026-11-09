<?php
defined( 'ABSPATH' ) || exit;

cdc_register_block( 'accordion-faq', array(
    'title' => __( 'Accordion FAQ', 'centro-duplicazioni-chiavi' ),
    'description' => __( 'Domande frequenti con risposte espandibili.', 'centro-duplicazioni-chiavi' ),
    'icon' => 'admin-network',
    'keywords' => array( 'faq', 'domande', 'accordion' ),
) );
