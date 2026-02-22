<?php
/**
 * The main template file.
 *
 * Used as the default fallback and for the blog/news listing.
 * Matches the original site's news page layout (full-width, no sidebar).
 */

get_header();
?>

    <div id="content" class="column no-sidebars" role="main">

        <?php if ( is_home() && ! is_front_page() ) : ?>
            <h1 class="page__title title" id="page-title">
                <?php esc_html_e( 'News', 'scotsac' ); ?>
            </h1>
        <?php elseif ( is_archive() ) : ?>
            <h1 class="page__title title" id="page-title">
                <?php the_archive_title(); ?>
            </h1>
            <?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
        <?php endif; ?>

        <?php if ( have_posts() ) : ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class( 'node node-article view-mode-teaser clearfix' ); ?>>

                    <header>
                        <h2 class="node__title entry-title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                <?php the_title(); ?>
                            </a>
                        </h2>
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
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'medium' ); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="entry-summary field-name-body">
                        <?php the_excerpt(); ?>
                    </div>

                    <footer class="entry-footer">
                        <a href="<?php the_permalink(); ?>" class="read-more">
                            <?php esc_html_e( 'Read more', 'scotsac' ); ?>
                        </a>
                    </footer>

                </article><!-- #post-<?php the_ID(); ?> -->

                <hr>

            <?php endwhile; ?>

            <!-- Pagination -->
            <nav class="navigation pager" aria-label="<?php esc_attr_e( 'Posts navigation', 'scotsac' ); ?>">
                <?php
                the_posts_pagination( [
                    'mid_size'  => 2,
                    'prev_text' => __( '&laquo; Previous', 'scotsac' ),
                    'next_text' => __( 'Next &raquo;', 'scotsac' ),
                ] );
                ?>
            </nav>

        <?php else : ?>

            <article class="no-results not-found">
                <header>
                    <h1 class="page__title"><?php esc_html_e( 'Nothing found', 'scotsac' ); ?></h1>
                </header>
                <div class="entry-content">
                    <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps a search can help.', 'scotsac' ); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </article>

        <?php endif; ?>

    </div><!-- #content -->

<?php get_footer(); ?>
