<?php
defined( 'ABSPATH' ) || exit;

$anchor = $block['anchor'] ?? '';
$class_name = 'block block__hero-image position-relative bg-primary text-white';

if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

if ( $is_preview ) {
    $class_name .= ' is-admin';
}

$label = get_field( 'label' );
$title = get_field( 'title' );
$description = get_field( 'description' );
$background_image = get_field( 'background_image' );
$image = get_field( 'image' );
$primary_link = get_field( 'primary_link' );
$secondary_link = get_field( 'secondary_link' );

$page_id = $post_id ?? get_the_ID();
$ancestors = array_reverse( get_post_ancestors( $page_id ) );
?>

<section <?php if ( $anchor ) : ?>id="<?php echo esc_attr( $anchor ); ?>"<?php endif; ?> class="<?php echo esc_attr( $class_name ); ?>">
    <?php if ( $background_image ) : ?>
        <?php echo wp_get_attachment_image( $background_image['ID'], 'full', false, array(
            'class' => 'position-absolute top-0 start-0 w-100 h-100 object-fit-cover',
            'alt' => '',
            'loading' => 'eager',
            'fetchpriority' => 'high',
        ) ); ?>
    <?php endif; ?>
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-75" aria-hidden="true"></div>

    <div class="container position-relative z-1 pt-4">
        <nav aria-label="<?php esc_attr_e( 'Percorso di navigazione', 'centro-duplicazioni-chiavi' ); ?>">
            <ol class="list-unstyled d-flex flex-wrap align-items-center gap-1 font-heading fw-semibold mb-0">
                <li><a class="text-white text-decoration-none" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'centro-duplicazioni-chiavi' ); ?></a></li>
                <?php foreach ( $ancestors as $ancestor_id ) : ?>
                    <?php if ( $ancestor_id == get_option( 'page_on_front' ) ) { continue; } ?>
                    <li class="d-flex gap-1">
                        <span aria-hidden="true">/</span>
                        <a class="text-white text-decoration-none" href="<?php echo esc_url( get_permalink( $ancestor_id ) ); ?>"><?php echo esc_html( get_the_title( $ancestor_id ) ); ?></a>
                    </li>
                <?php endforeach; ?>
                <?php if ( $page_id != get_option( 'page_on_front' ) ) : ?>
                    <li class="d-flex gap-1" aria-current="page">
                        <span aria-hidden="true">/</span>
                        <span><?php echo esc_html( get_the_title( $page_id ) ); ?></span>
                    </li>
                <?php endif; ?>
            </ol>
        </nav>

        <div class="row align-items-center g-4 gx-lg-5 py-5">
            <div class="col-lg-6">
                <?php if ( $label ) : ?>
                    <p class="d-flex align-items-center gap-2 text-tertiary font-heading fw-bold mb-3">
                        <i class="ph-fill ph-circle lh-1" aria-hidden="true"></i>
                        <span><?php echo esc_html( $label ); ?></span>
                    </p>
                <?php endif; ?>

                <?php if ( $title ) : ?>
                    <h1 class="fs-2 lh-sm fw-semibold mb-4"><?php echo nl2br( esc_html( $title ) ); ?></h1>
                <?php endif; ?>

                <?php if ( $description ) : ?>
                    <p class="fs-5 fs-xl-4 lh-base text-white text-opacity-75 mb-0"><?php echo nl2br( esc_html( $description ) ); ?></p>
                <?php endif; ?>

                <?php if ( $primary_link || $secondary_link ) : ?>
                    <div class="d-flex flex-wrap align-items-center gap-3 gap-xl-4 mt-4 mt-lg-5 font-heading">
                        <?php if ( $primary_link ) : ?>
                            <a class="btn btn-secondary text-white rounded-3 px-3 py-2 fw-semibold d-inline-flex align-items-center justify-content-center gap-2" href="<?php echo esc_url( $primary_link['url'] ); ?>" target="<?php echo esc_attr( $primary_link['target'] ?: '_self' ); ?>" rel="noopener noreferrer">
                                <i class="ph-fill ph-phone flex-shrink-0 lh-1" aria-hidden="true"></i>
                                <span><?php echo esc_html( $primary_link['title'] ); ?></span>
                            </a>
                        <?php endif; ?>
                        <?php if ( $secondary_link ) : ?>
                            <a class="btn btn-outline-light rounded-3 px-3 py-2 fw-medium d-inline-flex align-items-center justify-content-center gap-3" href="<?php echo esc_url( $secondary_link['url'] ); ?>" target="<?php echo esc_attr( $secondary_link['target'] ?: '_self' ); ?>" rel="noopener noreferrer">
                                <span><?php echo esc_html( $secondary_link['title'] ); ?></span>
                                <i class="ph ph-arrow-up-right flex-shrink-0 lh-1" aria-hidden="true"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ( $is_preview && ! $label && ! $title && ! $description && ! $image && ! $background_image && ! $primary_link && ! $secondary_link ) : ?>
                    <p class="mb-0"><?php esc_html_e( 'Aggiungi i contenuti nei campi del blocco Hero con immagine.', 'centro-duplicazioni-chiavi' ); ?></p>
                <?php endif; ?>
            </div>

            <?php if ( $image ) : ?>
                <div class="col-lg-6">
                    <div class="ratio ratio-4x3 rounded-5 overflow-hidden border border-4 border-white border-opacity-50">
                        <?php echo wp_get_attachment_image( $image['ID'], 'large', false, array(
                            'class' => 'w-100 h-100 object-fit-cover',
                            'loading' => 'eager',
                        ) ); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
