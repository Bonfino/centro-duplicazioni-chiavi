<?php
defined( 'ABSPATH' ) || exit;

$anchor = $block['anchor'] ?? '';
$class_name = 'block block__vantaggi-numeri position-relative bg-black text-white py-5';

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
$background_image = get_field( 'background_image' );
$benefits = get_field( 'benefits' );
$stats = get_field( 'stats' );
?>

<section <?php if ( $anchor ) : ?>id="<?php echo esc_attr( $anchor ); ?>"<?php endif; ?> class="<?php echo esc_attr( $class_name ); ?>">
    <?php if ( $background_image ) : ?>
        <?php echo wp_get_attachment_image( $background_image['ID'], 'full', false, array(
            'class' => 'position-absolute top-0 start-0 w-100 h-100 object-fit-cover',
            'alt' => '',
            'loading' => 'lazy',
        ) ); ?>
    <?php endif; ?>
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-black opacity-80" aria-hidden="true"></div>

    <div class="container position-relative z-1">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <?php if ( $label ) : ?>
                    <p class="d-flex align-items-center justify-content-center gap-2 font-heading fw-bold text-white text-opacity-75 mb-4">
                        <i class="ph-fill ph-circle text-secondary lh-1" aria-hidden="true"></i>
                        <span><?php echo esc_html( $label ); ?></span>
                    </p>
                <?php endif; ?>

                <?php if ( $title ) : ?>
                    <h2 class="fs-2 lh-sm fw-semibold mb-3"><?php
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
                    <p class="font-heading lh-base text-white text-opacity-75 mb-0"><?php echo nl2br( esc_html( $description ) ); ?></p>
                <?php endif; ?>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row align-items-center justify-content-center g-5">
                    <?php if ( $benefits ) : ?>
                        <div class="col-lg-6">
                            <ul class="d-flex flex-column gap-3 list-unstyled fs-5 lh-base mb-0">
                                <?php foreach ( $benefits as $benefit ) : ?>
                                    <li class="d-flex align-items-start gap-2">
                                        <i class="ph ph-check-circle text-secondary flex-shrink-0 fs-4 lh-base" aria-hidden="true"></i>
                                        <span><?php echo esc_html( $benefit['text'] ); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <?php if ( $stats ) : ?>
                        <div class="col-lg-6">
                            <dl class="row row-cols-2 g-0 font-heading text-center mb-0">
                                <?php foreach ( $stats as $stat ) : ?>
                                    <div class="vantaggi-numeri__stat col d-flex flex-column align-items-center p-3">
                                        <dt class="d-flex flex-column align-items-center gap-2 fw-semibold">
                                            <?php if ( $stat['icon'] ) : ?>
                                                <?php echo wp_get_attachment_image( $stat['icon']['ID'], 'thumbnail', false, array(
                                                    'class' => 'vantaggi-numeri__icon object-fit-contain',
                                                    'alt' => '',
                                                    'loading' => 'lazy',
                                                ) ); ?>
                                            <?php endif; ?>
                                            <span class="fs-1 lh-sm"><?php echo esc_html( $stat['value'] ); ?></span>
                                        </dt>
                                        <?php if ( $stat['description'] ) : ?>
                                            <dd class="text-white text-opacity-75 lh-sm mt-1 mb-0"><?php echo esc_html( $stat['description'] ); ?></dd>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </dl>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ( $is_preview && ! $benefits && ! $stats ) : ?>
                    <p class="text-center mb-0"><?php esc_html_e( 'Aggiungi vantaggi e dati nei campi del blocco Vantaggi e numeri.', 'centro-duplicazioni-chiavi' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
