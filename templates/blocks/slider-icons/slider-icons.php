<?php
defined('ABSPATH') || exit;

$anchor = $block['anchor'] ?? '';
$class_name = 'block block__slider-icons bg-quaternary py-5';

if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

if ($is_preview) {
    $class_name .= ' is-admin';
}

$label = get_field('label');
$title = get_field('title');
$highlight_word = get_field('highlight_word');
$description = get_field('description');
$link = get_field('link');
$logos = get_field('logos');
$footer_label = get_field('footer_label');
$footer_link = get_field('footer_link');
$footer_highlight_word = get_field('footer_highlight_word');

$rows = $logos ? array_chunk($logos, (int) ceil(count($logos) / 2)) : array();
?>

<section <?php if ($anchor): ?>id="<?php echo esc_attr($anchor); ?>" <?php endif; ?>
    class="<?php echo esc_attr($class_name); ?>">
    <div class="container">
        <div class="text-center">
            <?php if ($label): ?>
                <p
                    class="d-flex align-items-center justify-content-center gap-2 text-body-secondary font-heading fw-bold mb-2">
                    <i class="ph-fill ph-circle text-secondary lh-1" aria-hidden="true"></i>
                    <span><?php echo esc_html($label); ?></span>
                </p>
            <?php endif; ?>

            <?php if ($title): ?>
                <h2 class="fs-2 lh-sm fw-semibold text-black mb-3">
                <?php
                if ($highlight_word) {
                    echo implode(
                        '<span class="text-secondary">' . esc_html($highlight_word) . '</span>',
                        array_map('esc_html', explode($highlight_word, $title))
                    );
                } else {
                    echo esc_html($title);
                }
                ?>
                </h2>
            <?php endif; ?>
        </div>

        <div class="row align-items-center g-3">
            <?php if ($description): ?>
                <div class="col-lg-8 offset-lg-2 text-center">
                    <p class="lh-base mb-0"><?php echo nl2br(esc_html($description)); ?></p>
                </div>
            <?php endif; ?>

            <?php if ($link): ?>
                <div class="col-lg-2 ms-lg-auto text-center text-lg-end">
                    <a class="d-inline-flex align-items-center gap-2 text-secondary fw-semibold text-decoration-none"
                        href="<?php echo esc_url($link['url']); ?>"
                        target="<?php echo esc_attr($link['target'] ?: '_self'); ?>" rel="noopener noreferrer">
                        <span class="text-decoration-underline"><?php echo esc_html($link['title']); ?></span>
                        <i class="ph ph-arrow-right flex-shrink-0 fs-4 lh-1" aria-hidden="true"></i>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($rows): ?>
        <div class="slider-icons__rows d-flex flex-column gap-3 my-5">
            <?php foreach ($rows as $index => $row): ?>
                <div class="slider-icons__row py-2<?php echo 1 === $index ? ' slider-icons__row--reverse' : ''; ?>">
                    <div class="slider-icons__track d-flex">
                        <ul class="slider-icons__group d-flex align-items-center gap-3 pe-3 list-unstyled mb-0">
                            <?php foreach ($row as $logo): ?>
                                <li
                                    class="slider-icons__item d-flex align-items-center justify-content-center flex-shrink-0 bg-white shadow-sm p-3">
                                    <?php echo wp_get_attachment_image($logo['ID'], 'medium', false, array(
                                        'class' => 'w-100 h-100 object-fit-contain',
                                    )); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php elseif ($is_preview): ?>
        <div class="container my-5">
            <p class="text-center mb-0">
                <?php esc_html_e('Aggiungi i loghi nella galleria del blocco Slider icons.', 'centro-duplicazioni-chiavi'); ?>
            </p>
        </div>
    <?php endif; ?>

    <?php if ($footer_label || $footer_link): ?>
        <div class="container text-center">
            <?php if ($footer_label): ?>
                <p class="font-heading fw-bold text-body-secondary fs-5 mb-1"><?php echo esc_html($footer_label); ?></p>
            <?php endif; ?>

            <?php if ($footer_link): ?>
                <a class="font-heading fs-4 lh-sm text-black text-decoration-none"
                    href="<?php echo esc_url($footer_link['url']); ?>"
                    target="<?php echo esc_attr($footer_link['target'] ?: '_self'); ?>" rel="noopener noreferrer"><?php
                           if ($footer_highlight_word) {
                               echo implode(
                                   '<span class="text-secondary">' . esc_html($footer_highlight_word) . '</span>',
                                   array_map('esc_html', explode($footer_highlight_word, $footer_link['title']))
                               );
                           } else {
                               echo esc_html($footer_link['title']);
                           }
                           ?></a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>
