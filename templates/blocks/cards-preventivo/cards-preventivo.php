<?php
defined( 'ABSPATH' ) || exit;

$anchor = $block['anchor'] ?? '';
$class_name = 'block block__cards-preventivo py-5';

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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-4">
                    <?php if ( $label ) : ?>
                        <p class="d-flex align-items-center justify-content-center gap-2 text-body-secondary font-heading fw-bold mb-2">
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
                        <p class="lh-base mb-0"><?php echo nl2br( esc_html( $description ) ); ?></p>
                    <?php endif; ?>
                </div>

                <?php if ( $cards ) : ?>
                    <div class="row g-0 rounded-3 overflow-hidden shadow-around">
                        <?php foreach ( $cards as $card ) : ?>
                            <div class="col-md-6">
                                <div class="d-flex flex-column h-100 font-heading <?php echo $card['highlighted'] ? 'bg-quinary text-white' : 'bg-quaternary text-black'; ?>">
                                    <?php if ( $card['title'] || $card['badge'] ) : ?>
                                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mx-4 mt-4 mb-3">
                                            <?php if ( $card['title'] ) : ?>
                                                <h3 class="fs-5 lh-sm fw-semibold mb-0"><?php echo esc_html( $card['title'] ); ?></h3>
                                            <?php endif; ?>
                                            <?php if ( $card['badge'] ) : ?>
                                                <span class="badge rounded-pill bg-white text-dark fw-medium"><?php echo esc_html( $card['badge'] ); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ( $card['description'] ) : ?>
                                        <p class="lh-base mx-4 mb-4"><?php echo nl2br( esc_html( $card['description'] ) ); ?></p>
                                    <?php endif; ?>

                                    <?php if ( $card['list_title'] ) : ?>
                                        <p class="fw-semibold mx-4 mb-2 <?php echo $card['highlighted'] ? 'text-white text-opacity-75' : 'text-body-secondary'; ?>"><?php echo esc_html( $card['list_title'] ); ?></p>
                                    <?php endif; ?>

                                    <?php if ( $card['items'] ) : ?>
                                        <ul class="d-flex flex-column gap-2 ps-5 pe-4 mb-4<?php echo $card['highlighted'] ? ' bg-secondary py-2' : ''; ?>">
                                            <?php foreach ( $card['items'] as $item ) : ?>
                                                <li><?php echo esc_html( $item['text'] ); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>

                                    <?php if ( $card['note'] || $card['link'] ) : ?>
                                        <div class="mt-auto px-4 pt-4 pb-4">
                                            <?php if ( $card['note'] ) : ?>
                                                <p class="small lh-base mb-3"><?php echo nl2br( esc_html( $card['note'] ) ); ?></p>
                                            <?php endif; ?>

                                            <?php if ( $card['link'] ) :
                                                $link = $card['link'];
                                                ?>
                                                <a class="btn rounded-3 d-inline-flex align-items-center border-2 gap-2 <?php echo $card['highlighted'] ? 'btn-light text-black' : 'btn-outline-secondary'; ?>" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ?: '_self' ); ?>" rel="noopener noreferrer">
                                                    <span><?php echo esc_html( $link['title'] ); ?></span>
                                                    <i class="ph <?php echo $card['highlighted'] ? 'ph-arrow-up-right' : 'ph-arrow-right'; ?> flex-shrink-0 lh-1" aria-hidden="true"></i>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php elseif ( $is_preview ) : ?>
                    <p class="text-center mb-0"><?php esc_html_e( 'Aggiungi le due schede nei campi del blocco Cards preventivo.', 'centro-duplicazioni-chiavi' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
