<?php defined( 'ABSPATH' ) || exit; ?>
<main id="main-content">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
    <?php endwhile; ?>
</main>
