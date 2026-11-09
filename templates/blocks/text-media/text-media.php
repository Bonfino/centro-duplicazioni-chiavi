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
$media_type = get_field( 'media_type' ) ?: 'video';
$video = get_field( 'video' );
$images = get_field( 'images' );
?>

<section <?php if ( $anchor ) : ?>id="<?php echo esc_attr( $anchor ); ?>"<?php endif; ?> class="<?php echo esc_attr( $class_name ); ?>">
    <div class="container">
        <?php if ( $is_preview && ! $label && ! $title && ! $description && ! ( 'video' === $media_type ? $video : $images ) ) : ?>
            <p class="mb-0"><?php esc_html_e( 'Aggiungi testo e contenuti multimediali nei campi del blocco Text media.', 'centro-duplicazioni-chiavi' ); ?></p>
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
                <?php if ( 'video' === $media_type && $video ) : ?>
                    <video class="d-block w-100" playsinline muted preload="metadata" <?php if ( ! $is_preview ) : ?>autoplay loop<?php endif; ?>>
                        <source src="<?php echo esc_url( $video['url'] ); ?>" type="<?php echo esc_attr( $video['mime_type'] ); ?>">
                    </video>
                <?php elseif ( 'images' === $media_type && $images ) : ?>
                    <div class="row g-3">
                        <?php foreach ( $images as $index => $item ) :
                            $full_width = 1 === count( $images ) || ( 3 === count( $images ) && 0 === $index );
                            ?>
                            <div class="<?php echo $full_width ? 'col-12' : 'col-12 col-sm-6'; ?>">
                                <figure class="position-relative mb-0">
                                    <div class="ratio <?php echo $full_width ? 'ratio-16x9' : 'ratio-4x3'; ?>">
                                        <?php if ( $item['image'] ) : ?>
                                            <?php echo wp_get_attachment_image( $item['image']['ID'], 'large', false, array(
                                                'class' => 'w-100 h-100 object-fit-cover',
                                                'loading' => 'lazy',
                                            ) ); ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ( $item['caption'] ) : ?>
                                        <figcaption class="position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-50 text-white font-heading small lh-sm p-3"><?php echo esc_html( $item['caption'] ); ?></figcaption>
                                    <?php endif; ?>
                                </figure>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
