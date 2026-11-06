<?php
defined( 'ABSPATH' ) || exit;

$anchor = $block['anchor'] ?? '';
$class_name = 'block block__text-media bg-quaternary py-5';

if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

if ( $is_preview ) {
    $class_name .= ' is-admin';
}

$label = get_field( 'label' );
$title = get_field( 'title' );
$highlight_word = get_field( 'highlight_word' );
$description = get_field( 'description' );
$video = get_field( 'video' );
?>

<section <?php if ( $anchor ) : ?>id="<?php echo esc_attr( $anchor ); ?>"<?php endif; ?> class="<?php echo esc_attr( $class_name ); ?>">
    <div class="container">
        <?php if ( $is_preview && ! $label && ! $title && ! $description && ! $video ) : ?>
            <p class="mb-0"><?php esc_html_e( 'Aggiungi testo e video nei campi del blocco Text media.', 'centro-duplicazioni-chiavi' ); ?></p>
        <?php endif; ?>

        <div class="row align-items-center g-4 g-lg-5">
            <div class="col-lg-6">
                <?php if ( $label ) : ?>
                    <p class="d-flex align-items-center gap-2 text-body-secondary font-heading fw-bold mb-3">
                        <i class="ph-fill ph-circle text-secondary lh-1" aria-hidden="true"></i>
                        <span><?php echo esc_html( $label ); ?></span>
                    </p>
                <?php endif; ?>

                <?php if ( $title ) : ?>
                    <h2 class="fs-2 lh-sm fw-bold text-black mb-4"><?php
                        if ( $highlight_word ) {
                            echo implode(
                                '<span class="text-secondary">' . esc_html( $highlight_word ) . '</span>',
                                array_map( 'esc_html', explode( $highlight_word, $title ) )
                            );
                        } else {
                            echo esc_html( $title );
                        }
                    ?></h2>
                <?php endif; ?>

                <?php if ( $description ) : ?>
                    <p class="fs-5 fs-xl-4 lh-base mb-0"><?php echo nl2br( esc_html( $description ) ); ?></p>
                <?php endif; ?>
            </div>

            <div class="col-lg-6">
                <?php if ( $video ) : ?>
                    <video class="d-block w-100" playsinline muted preload="metadata" <?php if ( ! $is_preview ) : ?>autoplay loop<?php endif; ?>>
                        <source src="<?php echo esc_url( $video['url'] ); ?>" type="<?php echo esc_attr( $video['mime_type'] ); ?>">
                    </video>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
