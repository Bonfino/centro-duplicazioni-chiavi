<?php
defined('ABSPATH') || exit;

$header_icon = get_field('header_icon', 'option');
$header_bg = get_field('header_bg', 'option');
$header_phone = get_field('header_phone', 'option');
?>

<nav class="navbar navbar-expand-lg font-heading"
    aria-label="<?php esc_attr_e('Menu principale', 'centro-duplicazioni-chiavi'); ?>">
    <?php if (!empty($header_bg['url'])): ?>
        <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10 pe-none" style="
            background-image: url('<?php echo esc_url($header_bg['url']); ?>');
            background-repeat: repeat;
        " aria-hidden="true">
        </div>
    <?php endif; ?>

    <div class="container position-relative z-1 gap-3">
        <a class="navbar-brand col-6 col-lg-auto text-wrap" href="<?php echo esc_url(home_url('/')); ?>">
            <?php if (!empty($header_icon['url'])): ?>
                <img class="img-fluid d-block" src="<?php echo esc_url($header_icon['url']); ?>"
                    alt="<?php echo esc_attr($header_icon['alt'] ?? ''); ?>">
            <?php else: ?>
                <?php echo esc_html(get_bloginfo('name')); ?>
            <?php endif; ?>
        </a>

        <?php if (has_nav_menu('header') || !empty($header_phone)): ?>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#header-navigation" aria-controls="header-navigation" aria-expanded="false"
                aria-label="<?php esc_attr_e('Apri o chiudi il menu', 'centro-duplicazioni-chiavi'); ?>">
                <span class="navbar-toggler-icon" aria-hidden="true"></span>
            </button>

            <div class="collapse navbar-collapse" id="header-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header',
                    'container' => false,
                    'menu_class' => 'navbar-nav gap-2 gap-lg-5 fs-5 mx-lg-auto mb-3 mb-lg-0',
                    'depth' => 2,
                    'fallback_cb' => false,
                ));
                ?>

                <?php if (!empty($header_phone)): ?>
                    <a class="bg-tertiary text-primary fs-5 py-2 px-3 rounded-pill fw-semibold text-decoration-none d-inline-flex align-items-center gap-2 text-nowrap mb-3 mb-lg-0"
                        href="tel:<?php echo esc_attr($header_phone); ?>">
                        <i class="ph-fill ph-phone fs-4 lh-1" aria-hidden="true"></i>
                        <span>Tel: <?php echo esc_html($header_phone); ?></span>
                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</nav>