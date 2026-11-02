<?php
defined( 'ABSPATH' ) || exit;

$phone = get_field( 'footer_phone', 'option' );
$phone_href = 'tel:' . str_replace( ' ', '', $phone );
$assistance = get_field( 'footer_assistance_link', 'option' );
?>

<section class="bg-primary text-white py-5" aria-labelledby="footer-emergency-title">
    <div class="container">
        <div class="row g-4 align-items-center justify-content-between">
            <div class="col-lg-5">
                <p class="d-flex align-items-center gap-2 text-tertiary fw-bold mb-3">
                    <i class="ph-fill ph-circle lh-1" aria-hidden="true"></i>
                    <?php echo esc_html( get_field( 'footer_emergency_label', 'option' ) ); ?>
                </p>
                <h2 id="footer-emergency-title" class="fw-semibold mb-2">
                    <?php echo esc_html( get_field( 'footer_title', 'option' ) ); ?>
                </h2>
                <h3 class="mb-3">
                    <?php echo esc_html( get_field( 'footer_subtitle', 'option' ) ); ?>
                </h3>
                <p class="fs-5 text-white text-opacity-75 mb-0">
                    <?php echo esc_html( get_field( 'footer_description', 'option' ) ); ?>
                </p>
            </div>

            <div class="col-lg-auto d-none d-lg-flex align-self-stretch" aria-hidden="true">
                <div class="vr opacity-50"></div>
            </div>

            <div class="col-lg-5">
                <hr class="d-lg-none mt-0 mb-4 opacity-50" aria-hidden="true">
                <p class="text-white text-opacity-75 fw-semibold mb-2">Chiama subito</p>
                <a class="d-flex align-items-center gap-3 text-white text-decoration-none fs-1 fw-semibold" href="<?php echo esc_attr( $phone_href ); ?>">
                    <i class="ph ph-phone text-secondary flex-shrink-0 fs-2 lh-1" aria-hidden="true"></i>
                    <span class="text-break"><?php echo esc_html( $phone ); ?></span>
                </a>
                <div class="d-flex align-items-center gap-3 text-white text-opacity-75 my-4">
                    <span class="flex-grow-1 border-top border-white border-opacity-50" aria-hidden="true"></span>
                    <span>oppure</span>
                    <span class="flex-grow-1 border-top border-white border-opacity-50" aria-hidden="true"></span>
                </div>
                <?php if ( $assistance ) : ?>
                <a class="btn btn-secondary btn-lg d-flex align-items-center justify-content-between gap-3 p-3 p-xl-4 text-white text-start" href="<?php echo esc_url( $assistance['url'] ); ?>" target="<?php echo esc_attr( $assistance['target'] ?: '_self' ); ?>" rel="noopener noreferrer">
                    <span><?php echo esc_html( $assistance['title'] ); ?></span>
                    <i class="ph ph-arrow-right flex-shrink-0 fs-4 lh-1" aria-hidden="true"></i>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
