<?php
defined( 'ABSPATH' ) || exit;

$anchor = $block['anchor'] ?? '';
$class_name = 'block block__accordion-faq bg-white py-5';

if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

if ( $is_preview ) {
    $class_name .= ' is-admin';
}

$label = get_field( 'label' );
$title = get_field( 'title' );
$highlight_word = get_field( 'highlight_word' );
$faqs = get_field( 'faqs' );
$accordion_id = wp_unique_id( 'accordion-faq-' );
?>

<section <?php if ( $anchor ) : ?>id="<?php echo esc_attr( $anchor ); ?>"<?php endif; ?> class="<?php echo esc_attr( $class_name ); ?>">
    <div class="container">
        <div class="text-center mb-5">
            <?php if ( $label ) : ?>
                <p class="d-flex align-items-center justify-content-center gap-2 font-heading text-body-secondary fw-bold mb-2">
                    <i class="ph-fill ph-circle text-secondary lh-1" aria-hidden="true"></i>
                    <span><?php echo esc_html( $label ); ?></span>
                </p>
            <?php endif; ?>

            <?php if ( $title ) : ?>
                <h2 class="fs-2 lh-sm fw-semibold text-black mb-0"><?php
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
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <?php if ( $faqs ) : ?>
                    <div id="<?php echo esc_attr( $accordion_id ); ?>" class="accordion d-flex flex-column gap-4">
                        <?php foreach ( $faqs as $index => $faq ) :
                            $question_id = $accordion_id . '-question-' . $index;
                            $answer_id = $accordion_id . '-answer-' . $index;
                            $is_open = 0 === $index;
                            ?>
                            <div class="accordion-item rounded-4 overflow-hidden">
                                <h3 class="accordion-header">
                                    <button id="<?php echo esc_attr( $question_id ); ?>" class="accordion-button font-heading fs-6 lh-base fw-semibold gap-3<?php echo $is_open ? '' : ' collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo esc_attr( $answer_id ); ?>" aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr( $answer_id ); ?>">
                                        <span><?php echo esc_html( $faq['question'] ); ?></span>
                                        <i class="ph ph-caret-down flex-shrink-0 ms-auto lh-1" aria-hidden="true"></i>
                                    </button>
                                </h3>
                                <div id="<?php echo esc_attr( $answer_id ); ?>" class="accordion-collapse collapse<?php echo $is_open ? ' show' : ''; ?>" aria-labelledby="<?php echo esc_attr( $question_id ); ?>" data-bs-parent="#<?php echo esc_attr( $accordion_id ); ?>">
                                    <div class="accordion-body small lh-base pt-0 text-white text-opacity-75">
                                        <?php echo wp_kses_post( $faq['answer'] ); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php elseif ( $is_preview ) : ?>
                    <p class="text-center mb-0"><?php esc_html_e( 'Aggiungi domande e risposte nei campi del blocco Accordion FAQ.', 'centro-duplicazioni-chiavi' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
