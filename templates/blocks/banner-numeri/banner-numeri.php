<?php
defined( 'ABSPATH' ) || exit;

$anchor = $block['anchor'] ?? '';
$class_name = 'block block__banner-numeri bg-primary text-white py-5';

if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

if ( $is_preview ) {
    $class_name .= ' is-admin';
}

$label = get_field( 'label' );
$numbers = get_field( 'numbers' );
?>

<section <?php if ( $anchor ) : ?>id="<?php echo esc_attr( $anchor ); ?>"<?php endif; ?> class="<?php echo esc_attr( $class_name ); ?>">
    <div class="container text-center">
        <?php if ( $label ) : ?>
            <h2 class="d-flex align-items-center justify-content-center gap-2 text-tertiary font-heading fs-6 lh-sm fw-bold mb-4">
                <i class="ph-fill ph-circle lh-1" aria-hidden="true"></i>
                <span><?php echo esc_html( $label ); ?></span>
            </h2>
        <?php endif; ?>

        <?php if ( $numbers ) : ?>
            <dl class="row g-0 mb-0 font-heading">
                <?php foreach ( $numbers as $number ) : ?>
                    <div class="banner-numeri__item col-12 col-md px-3 py-4">
                        <?php if ( $number['value'] ) : ?>
                            <dt class="text-tertiary fs-2 lh-1 fw-semibold mb-2"><?php echo esc_html( $number['value'] ); ?></dt>
                        <?php endif; ?>
                        <?php if ( $number['description'] ) : ?>
                            <dd class="text-white text-opacity-75 fs-5 fs-xl-4 lh-sm fw-semibold mb-0"><?php echo esc_html( $number['description'] ); ?></dd>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </dl>
        <?php elseif ( $is_preview ) : ?>
            <p class="mb-0"><?php esc_html_e( 'Aggiungi i valori nei campi del blocco Banner numeri.', 'centro-duplicazioni-chiavi' ); ?></p>
        <?php endif; ?>
    </div>
</section>
