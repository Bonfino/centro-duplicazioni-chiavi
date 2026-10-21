<?php defined( 'ABSPATH' ) || exit; ?>
<main id="main-content">
    <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_excerpt(); ?>
        </article>
    <?php endwhile; ?>
    <?php the_posts_pagination(); ?>
</main>
