<?php
defined( 'ABSPATH' ) || exit;

$anchor = $block['anchor'] ?? '';
$class_name = 'block block__banner-media bg-white';

if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

if ( $is_preview ) {
    $class_name .= ' is-admin';
}

$image = get_field( 'image' );
$label = get_field( 'label' );
$title = get_field( 'title' );
$highlight_word = get_field( 'highlight_word' );
$description = get_field( 'description' );
$link = get_field( 'link' );
?>

<section <?php if ( $anchor ) : ?>id="<?php echo esc_attr( $anchor ); ?>"<?php endif; ?> class="<?php echo esc_attr( $class_name ); ?>">
    <div class="container-fluid px-0">
        <div class="row g-0">
            <div class="col-lg-7 position-relative">
                <?php if ( $image ) : ?>
                    <?php echo wp_get_attachment_image( $image['ID'], 'full', false, array(
                        'class' => 'banner-media__image d-block w-100 object-fit-cover',
                        'loading' => 'lazy',
                    ) ); ?>
                <?php endif; ?>
            </div>

            <div class="col-lg-5 d-flex align-items-center p-4 p-xl-5">
                <div>
                    <?php if ( $label ) : ?>
                        <p class="d-flex align-items-center gap-2 font-heading text-body-secondary fw-bold mb-4">
                            <i class="ph-fill ph-circle text-secondary lh-1" aria-hidden="true"></i>
                            <span><?php echo esc_html( $label ); ?></span>
                        </p>
                    <?php endif; ?>

                    <?php if ( $title ) : ?>
                        <h2 class="font-heading fs-3 lh-sm fw-semibold text-black mb-3"><?php
                            if ( $highlight_word ) {
                                echo nl2br( implode(
                                    '<span class="text-secondary">' . esc_html( $highlight_word ) . '</span>',
                                    array_map( 'esc_html', explode( $highlight_word, $title ) )
                                ) );
                            } else {
                                echo nl2br( esc_html( $title ) );
                            }
                        ?></h2>
                    <?php endif; ?>

                    <?php if ( $description ) : ?>
                        <p class="lh-base mb-0"><?php echo nl2br( esc_html( $description ) ); ?></p>
                    <?php endif; ?>

                    <?php if ( $link ) : ?>
                        <a class="btn btn-secondary text-white rounded-3 font-heading fw-semibold d-inline-flex align-items-center gap-2 mt-4" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ?: '_self' ); ?>" rel="noopener noreferrer">
                            <i class="ph ph-map-pin flex-shrink-0 fs-5 lh-1" aria-hidden="true"></i>
                            <span><?php echo esc_html( $link['title'] ); ?></span>
                        </a>
                    <?php endif; ?>

                    <?php if ( $is_preview && ! $image && ! $label && ! $title && ! $description && ! $link ) : ?>
                        <p class="mb-0"><?php esc_html_e( 'Aggiungi i contenuti nei campi del blocco Banner immagine e testo.', 'centro-duplicazioni-chiavi' ); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
