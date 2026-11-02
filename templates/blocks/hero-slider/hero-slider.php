<?php
defined( 'ABSPATH' ) || exit;

/**
 * Template del blocco Hero slider.
 * $block contiene gli attributi; $is_preview indica l'anteprima nell'editor.
 */

$anchor = $block['anchor'] ?? '';
$class_name = 'block block__hero block__hero-slider position-relative';

if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

if ( $is_preview ) {
    $class_name .= ' is-admin';
}

$slides = get_field( 'hero_slides' );
$slider_id = wp_unique_id( 'hero-slider-' );

if ( empty( $slides ) ) {
    if ( $is_preview ) {
        echo '<p class="p-4">' . esc_html__( 'Aggiungi una slide nei campi del blocco Hero slider.', 'centro-duplicazioni-chiavi' ) . '</p>';
    }
    return;
}
?>

<section <?php if ( $anchor ) : ?>id="<?php echo esc_attr( $anchor ); ?>"<?php endif; ?> class="<?php echo esc_attr( $class_name ); ?>" aria-label="<?php esc_attr_e( 'In evidenza', 'centro-duplicazioni-chiavi' ); ?>" aria-roledescription="carousel">
    <div id="<?php echo esc_attr( $slider_id ); ?>" class="carousel slide" data-bs-interval="false">
        <div class="carousel-inner" aria-live="polite">
            <?php foreach ( $slides as $index => $slide ) : ?>
                <div class="carousel-item<?php echo 0 === $index ? ' active' : ''; ?>" role="group" aria-roledescription="slide" aria-label="<?php echo esc_attr( ( $index + 1 ) . ' / ' . count( $slides ) ); ?>">
                    <div class="hero-slider__slide position-relative d-flex align-items-center bg-primary text-white">
                        <?php if ( ! empty( $slide['image'] ) ) : ?>
                            <?php echo wp_get_attachment_image( $slide['image']['ID'], 'full', false, array(
                                'class' => 'hero-slider__image position-absolute top-0 start-0 w-100 h-100 object-fit-cover',
                                'alt' => '',
                                'loading' => 0 === $index ? 'eager' : 'lazy',
                                'fetchpriority' => 0 === $index ? 'high' : 'auto',
                            ) ); ?>
                        <?php endif; ?>
                        <div class="hero-slider__overlay position-absolute top-0 start-0 w-100 h-100" aria-hidden="true"></div>

                        <div class="container position-relative z-1">
                            <div class="row justify-content-center">
                            <div class="hero-slider__content col-lg-10 px-5 px-lg-3 font-heading">
                                <?php if ( ! empty( $slide['title'] ) ) : ?>
                                    <h1 class="hero-slider__title lh-sm fw-semibold mb-3"><?php echo nl2br( esc_html( $slide['title'] ) ); ?></h1>
                                <?php endif; ?>
                                <?php if ( ! empty( $slide['description'] ) ) : ?>
                                    <p class="hero-slider__description fs-5 fs-xl-4 lh-base mb-0"><?php echo nl2br( esc_html( $slide['description'] ) ); ?></p>
                                <?php endif; ?>

                                <?php if ( ! empty( $slide['primary_link'] ) || ! empty( $slide['secondary_link'] ) ) : ?>
                                    <div class="hero-slider__actions d-flex flex-wrap align-items-center gap-3 mt-4 mt-lg-5">
                                        <?php if ( ! empty( $slide['primary_link'] ) ) :
                                            $link = $slide['primary_link'];
                                            ?>
                                            <a class="btn btn-secondary text-white rounded-3 px-3 py-2 fw-medium d-inline-flex align-items-center justify-content-center gap-2" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ?: '_self' ); ?>" rel="noopener noreferrer">
                                                <i class="ph-fill ph-phone fs-5 lh-1" aria-hidden="true"></i>
                                                <span><?php echo esc_html( $link['title'] ); ?></span>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ( ! empty( $slide['secondary_link'] ) ) :
                                            $link = $slide['secondary_link'];
                                            ?>
                                            <a class="btn btn-outline-light rounded-3 px-3 py-2 fw-medium d-inline-flex align-items-center justify-content-center gap-2" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ?: '_self' ); ?>" rel="noopener noreferrer">
                                                <i class="ph ph-whatsapp-logo fs-5 lh-1" aria-hidden="true"></i>
                                                <span><?php echo esc_html( $link['title'] ); ?></span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if ( count( $slides ) > 1 ) : ?>
            <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo esc_attr( $slider_id ); ?>" data-bs-slide="prev" aria-controls="<?php echo esc_attr( $slider_id ); ?>">
                <i class="ph ph-caret-left" aria-hidden="true"></i>
                <span class="visually-hidden"><?php esc_html_e( 'Slide precedente', 'centro-duplicazioni-chiavi' ); ?></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#<?php echo esc_attr( $slider_id ); ?>" data-bs-slide="next" aria-controls="<?php echo esc_attr( $slider_id ); ?>">
                <i class="ph ph-caret-right" aria-hidden="true"></i>
                <span class="visually-hidden"><?php esc_html_e( 'Slide successiva', 'centro-duplicazioni-chiavi' ); ?></span>
            </button>
        <?php endif; ?>
    </div>
</section>
