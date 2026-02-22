<?php
/**
 * Static page template.
 *
 * Used for all WordPress Pages (About, Contact, etc.).
 * Matches the original Drupal "sidebar-second" layout.
 */

get_header();

$show_sidebar = scotsac_show_sidebar();
?>

    <?php if ( $show_sidebar ) : ?>
    <div id="content" class="column sidebar-second" role="main">
    <?php else : ?>
    <div id="content" class="column no-sidebars" role="main">
    <?php endif; ?>

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class( 'node node-page view-mode-full clearfix' ); ?>>

                    <header>
                        <h1 class="page__title title" id="page-title">
                            <?php the_title(); ?>
                        </h1>
                    </header>

                    <div class="entry-content field-name-body">
                        <?php
                        the_content();

                        wp_link_pages( [
                            'before' => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'scotsac' ) . '">',
                            'after'  => '</nav>',
                        ] );
                        ?>
                    </div><!-- .entry-content -->

                    <?php if ( comments_open() || get_comments_number() ) : ?>
                        <div class="comments-area">
                            <?php comments_template(); ?>
                        </div>
                    <?php endif; ?>

                </article>

            <?php endwhile; ?>
        <?php endif; ?>

    </div><!-- #content -->

    <?php if ( $show_sidebar ) : ?>
        <?php get_sidebar(); ?>
    <?php endif; ?>

<?php get_footer(); ?>
