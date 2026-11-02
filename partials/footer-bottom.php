<?php
defined( 'ABSPATH' ) || exit;

$phone = get_field( 'footer_phone', 'option' );
$phone_href = 'tel:' . str_replace( ' ', '', $phone );
$background = get_field( 'footer_bg', 'option' );
$menus = array(
    'footer' => 'Link utili',
    'footer_support' => 'Supporto',
    'footer_legal' => 'Legal',
);
$socials = array(
    'facebook' => array( 'label' => 'Facebook', 'icon' => 'ph-fill ph-facebook-logo' ),
    'youtube' => array( 'label' => 'YouTube', 'icon' => 'ph-fill ph-youtube-logo' ),
    'instagram' => array( 'label' => 'Instagram', 'icon' => 'ph ph-instagram-logo' ),
);
?>

<div class="bg-dark text-white position-relative py-5">
    <?php if ( $background ) : ?>
        <div class="footer-pattern position-absolute top-0 start-0 w-100 h-100 pe-none opacity-5" style="background-image: url('<?php echo esc_url( $background['url'] ); ?>');" aria-hidden="true"></div>
    <?php endif; ?>
    <div class="container position-relative z-1">
        <div class="row gx-3 gx-lg-4 gy-4">
            <div class="col-7">
                <div class="row gy-4">
                    <?php foreach ( $menus as $location => $title ) : ?>
                        <nav class="col-12 col-lg-4" aria-labelledby="<?php echo esc_attr( $location . '-title' ); ?>">
                            <h2 id="<?php echo esc_attr( $location . '-title' ); ?>" class="h6 fw-bold mb-4"><?php echo esc_html( $title ); ?></h2>
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => $location,
                                'container' => false,
                                'menu_class' => 'list-unstyled d-flex flex-column gap-3 mb-0',
                                'depth' => 1,
                                'fallback_cb' => false,
                            ) );
                            ?>
                        </nav>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-5 d-flex justify-content-lg-end">
                <div>
                    <h2 class="h6 fw-bold mb-3">Seguici</h2>
                    <ul class="d-flex flex-wrap gap-3 list-unstyled fs-4 mb-0">
                        <?php foreach ( $socials as $name => $social ) :
                            $url = get_field( 'footer_' . $name, 'option' );
                            if ( ! $url ) {
                                continue;
                            }
                            ?>
                            <li>
                                <a class="d-inline-flex link-light text-decoration-none" href="<?php echo esc_url( $url ); ?>" aria-label="<?php echo esc_attr( $social['label'] ); ?>" target="_blank" rel="noopener noreferrer">
                                    <i class="<?php echo esc_attr( $social['icon'] ); ?> lh-1" aria-hidden="true"></i>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-dark text-white border-top border-white border-opacity-25 py-3">
    <div class="container d-flex flex-column flex-xl-row align-items-center justify-content-center gap-3 gap-xl-4 text-center small">
        <p class="mb-0">Copyright &copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php echo esc_html( get_field( 'footer_copyright', 'option' ) ); ?></p>
        <address class="mb-0">Indirizzo: <?php echo esc_html( get_field( 'footer_address', 'option' ) ); ?></address>
        <a class="text-white text-decoration-none flex-shrink-0" href="<?php echo esc_attr( $phone_href ); ?>">Tel: <?php echo esc_html( $phone ); ?></a>
    </div>
</div>

<div class="bg-secondary text-white py-3">
    <div class="container d-flex flex-column flex-lg-row align-items-center justify-content-center gap-2 gap-lg-4 text-center">
        <p class="fw-bold mb-0">PRONTO INTERVENTO 24 ORE</p>
        <p class="mb-0">Emergenza? Chiama ora: <a class="text-white fw-bold" href="<?php echo esc_attr( $phone_href ); ?>"><?php echo esc_html( $phone ); ?></a></p>
        <a class="btn btn-tertiary rounded-pill d-inline-flex align-items-center gap-2 text-primary px-3" href="<?php echo esc_attr( $phone_href ); ?>">
            <i class="ph-fill ph-phone lh-1" aria-hidden="true"></i>
            <span>Chiama ora</span>
        </a>
    </div>
</div>
