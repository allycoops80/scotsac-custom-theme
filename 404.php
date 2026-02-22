<?php
/**
 * 404 template.
 */

get_header();
?>

    <div id="content" class="column no-sidebars" role="main">

        <article class="error-404 not-found">
            <header>
                <h1 class="page__title"><?php esc_html_e( 'Page not found', 'scotsac' ); ?></h1>
            </header>

            <div class="entry-content">
                <p>
                    <?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. The page may have moved or no longer exists.', 'scotsac' ); ?>
                </p>
                <p>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php esc_html_e( '&laquo; Return to the home page', 'scotsac' ); ?>
                    </a>
                </p>
                <?php get_search_form(); ?>
            </div>
        </article>

    </div><!-- #content -->

<?php get_footer(); ?>
