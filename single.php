<?php
/**
 * Single post template.
 *
 * Displays individual news articles/posts.
 * Uses full-width layout (no sidebar) matching the original site's
 * node detail pages.
 */

get_header();
?>

    <div id="content" class="column no-sidebars" role="main">

        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class( 'node node-article view-mode-full clearfix' ); ?>>

                    <header>
                        <h1 class="page__title node__title" id="page-title">
                            <?php the_title(); ?>
                        </h1>
                        <div class="node__submitted entry-meta">
                            <?php
                            printf(
                                /* translators: 1: date, 2: author */
                                esc_html__( 'Posted on %1$s by %2$s', 'scotsac' ),
                                '<time datetime="' . esc_attr( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time>',
                                '<span class="author">' . esc_html( get_the_author() ) . '</span>'
                            );
                            ?>
                        </div>
                    </header>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="entry-thumbnail">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content field-name-body field-type-text-with-summary">
                        <?php
                        the_content();

                        wp_link_pages( [
                            'before' => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'scotsac' ) . '">',
                            'after'  => '</nav>',
                        ] );
                        ?>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer">
                        <?php
                        $categories = get_the_category_list( ', ' );
                        if ( $categories ) {
                            printf(
                                '<span class="cat-links">' . esc_html__( 'Categories: %s', 'scotsac' ) . '</span>',
                                $categories // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                            );
                        }

                        $tags = get_the_tag_list( '', ', ' );
                        if ( $tags ) {
                            printf(
                                '<span class="tag-links">' . esc_html__( 'Tags: %s', 'scotsac' ) . '</span>',
                                $tags // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                            );
                        }
                        ?>
                    </footer>

                </article><!-- #post-<?php the_ID(); ?> -->

                <!-- Post navigation -->
                <nav class="navigation post-navigation" aria-label="<?php esc_attr_e( 'Post navigation', 'scotsac' ); ?>">
                    <?php
                    the_post_navigation( [
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__( '&laquo; Previous', 'scotsac' ) . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next &raquo;', 'scotsac' ) . '</span> <span class="nav-title">%title</span>',
                    ] );
                    ?>
                </nav>

                <?php if ( comments_open() || get_comments_number() ) : ?>
                    <div class="comments-area">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>

    </div><!-- #content -->

<?php get_footer(); ?>
