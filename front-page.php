<?php


get_header();
?>

    <div id="content" class="column" role="main">

        <!-- Static page content (if a page is set as the front page) -->
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'node node-page view-mode-full clearfix' ); ?>>
                    <?php if ( get_the_content() ) : ?>
                        <div class="entry-content field-name-body">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>

    </div><!-- #content -->

    <?php get_sidebar(); ?>

<?php get_footer(); ?>
