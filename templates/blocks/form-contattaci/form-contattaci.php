<?php
defined( 'ABSPATH' ) || exit;

$anchor = ! empty( $block['anchor'] ) ? $block['anchor'] : 'form-contattaci';
$class_name = 'block block__form-contattaci position-relative bg-primary py-5';

if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

if ( $is_preview ) {
    $class_name .= ' is-admin';
}

$label = get_field( 'label' );
$title = get_field( 'title' );
$background_image = get_field( 'background_image' );
$form = get_field( 'form' );
$phone_text = get_field( 'phone_text' );
?>

<section id="<?php echo esc_attr( $anchor ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
    <?php if ( $background_image ) : ?>
        <?php echo wp_get_attachment_image( $background_image['ID'], 'full', false, array(
            'class' => 'position-absolute top-0 start-0 w-100 h-100 object-fit-cover',
            'alt' => '',
            'loading' => 'lazy',
        ) ); ?>
    <?php endif; ?>
    <div class="form-contattaci__overlay position-absolute top-0 start-0 w-100 h-100" aria-hidden="true"></div>

    <div class="container position-relative z-1">
        <?php if ( $label ) : ?>
            <p class="d-flex align-items-center justify-content-center gap-2 font-heading fs-4 lh-sm fw-bold text-white text-center mb-4">
                <i class="ph-fill ph-circle text-secondary fs-6 lh-1" aria-hidden="true"></i>
                <span><?php echo esc_html( $label ); ?></span>
            </p>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <div class="bg-white text-black rounded-3 shadow mx-3 mx-md-0 p-4 p-md-5">
                    <?php if ( $title ) : ?>
                        <h2 class="form-contattaci__ribbon position-relative bg-secondary text-white text-center font-heading fs-5 lh-sm fw-bold py-3 px-4 mb-4"><?php echo esc_html( $title ); ?></h2>
                    <?php endif; ?>

                    <?php if ( $form ) : ?>
                        <div class="form-contattaci__form">
                            <?php echo do_shortcode( '[contact-form-7 id="' . $form->ID . '"]' ); ?>
                        </div>
                    <?php elseif ( $is_preview ) : ?>
                        <p class="text-center mb-0"><?php esc_html_e( 'Seleziona il modulo Contact Form 7 nei campi del blocco.', 'centro-duplicazioni-chiavi' ); ?></p>
                    <?php endif; ?>

                    <?php if ( $phone_text ) : ?>
                        <p class="small lh-base text-body-secondary text-center mt-3 mb-0"><?php echo esc_html( $phone_text ); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
