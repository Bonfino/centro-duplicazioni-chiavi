<?php
defined( 'ABSPATH' ) || exit;

$anchor = $block['anchor'] ?? '';
$class_name = 'block block__cards-immagini bg-quaternary py-5';

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
$cards = get_field( 'cards' );
?>

<section <?php if ( $anchor ) : ?>id="<?php echo esc_attr( $anchor ); ?>"<?php endif; ?> class="<?php echo esc_attr( $class_name ); ?>">
    <div class="container text-center">
        <div class="mb-5">
            <?php if ( $label ) : ?>
                <p class="d-flex align-items-center justify-content-center gap-2 font-heading fw-bold text-body-secondary mb-3">
                    <i class="ph-fill ph-circle text-secondary lh-1" aria-hidden="true"></i>
                    <span><?php echo esc_html( $label ); ?></span>
                </p>
            <?php endif; ?>

            <?php if ( $title ) : ?>
                <h2 class="fs-2 lh-sm fw-semibold text-black mb-3"><?php
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
                <p class="font-heading text-body-secondary lh-base mb-0"><?php echo nl2br( esc_html( $description ) ); ?></p>
            <?php endif; ?>
        </div>

        <?php if ( $cards ) : ?>
            <ol class="d-flex flex-column flex-lg-row gap-5 list-unstyled mb-0">
                <?php foreach ( $cards as $index => $card ) : ?>
                    <li class="cards-immagini__step position-relative">
                        <article class="h-100 bg-white border rounded-4 p-4">
                            <?php if ( $card['image'] ) : ?>
                                <div class="ratio ratio-1x1 w-75 mx-auto mb-4">
                                    <?php echo wp_get_attachment_image( $card['image']['ID'], 'medium_large', false, array(
                                        'class' => 'w-100 h-100 object-fit-contain',
                                        'loading' => 'lazy',
                                    ) ); ?>
                                </div>
                            <?php endif; ?>

                            <?php if ( $card['title'] ) : ?>
                                <h3 class="font-heading fs-5 lh-sm fw-bold text-black mb-3"><?php echo esc_html( $card['title'] ); ?></h3>
                            <?php endif; ?>

                            <?php if ( $card['description'] ) : ?>
                                <p class="text-body-secondary lh-base mb-0"><?php echo nl2br( esc_html( $card['description'] ) ); ?></p>
                            <?php endif; ?>
                        </article>

                        <?php if ( $index < count( $cards ) - 1 ) : ?>
                            <span class="cards-immagini__arrow text-secondary fs-2 lh-1" aria-hidden="true">
                                <i class="ph ph-caret-down d-block d-lg-none"></i>
                                <i class="ph ph-caret-right d-none d-lg-block"></i>
                            </span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        <?php elseif ( $is_preview ) : ?>
            <p class="mb-0"><?php esc_html_e( 'Aggiungi le schede nei campi del blocco Cards immagini.', 'centro-duplicazioni-chiavi' ); ?></p>
        <?php endif; ?>
    </div>
</section>
