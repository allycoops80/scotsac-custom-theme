<?php
/**
 * Front page template.
 *
 * Displays the homepage with feature blocks and sidebar,
 * matching the layout of the original Drupal site.
 *
 * The three feature blocks (Learn to Dive, FAQs, Diving in Scotland)
 * are driven by a "Front Page Features" widget area, or fall back
 * to hardcoded content matching the original site.
 *
 * Template Name: Front Page (auto-used when a static front page is set)
 */

get_header();
?>

    <div id="content" class="column" role="main">

        <!-- ============================================================
             Front page feature blocks (3-column)
             Add a "Text" or "Custom HTML" widget to the Front Page Features
             widget area, or the fallback blocks below are shown.
             ============================================================ -->
        <?php
        /**
         * To populate these blocks dynamically, create three widgets in
         * Appearance > Widgets > Front Page Features.
         * Each widget becomes one of the three columns.
         */
        ?>

        <!-- Fallback / static feature blocks matching the original Drupal site -->
        <div id="block-block-1" class="block block-block first odd">
            <h2 class="block__title block-title"><?php esc_html_e( 'Learn to Dive', 'scotsac' ); ?></h2>
            <?php
            $ltd_img = get_template_directory_uri() . '/assets/images/learntodive.png';
            if ( file_exists( get_template_directory() . '/assets/images/learntodive.png' ) ) :
            ?>
            <p><img alt="" src="<?php echo esc_url( $ltd_img ); ?>" style="width:320px;height:190px;"></p>
            <?php endif; ?>
            <p><?php esc_html_e( 'We will take you from novice to experienced diver via our clubs and member support area', 'scotsac' ); ?></p>
            <p><a href="<?php echo esc_url( home_url( '/learn-to-dive' ) ); ?>"><?php esc_html_e( 'Read More', 'scotsac' ); ?></a></p>
        </div>

        <div id="block-block-3" class="block block-block even">
            <h2 class="block__title block-title"><?php esc_html_e( 'FAQs', 'scotsac' ); ?></h2>
            <?php
            $faq_img = get_template_directory_uri() . '/assets/images/shop.png';
            if ( file_exists( get_template_directory() . '/assets/images/shop.png' ) ) :
            ?>
            <p><img alt="" src="<?php echo esc_url( $faq_img ); ?>" style="width:320px;height:190px;"></p>
            <?php endif; ?>
            <p><?php esc_html_e( 'If you are just starting, find answers to commonly asked questions', 'scotsac' ); ?></p>
            <p><a href="<?php echo esc_url( home_url( '/faq' ) ); ?>"><?php esc_html_e( 'FAQs', 'scotsac' ); ?></a></p>
        </div>

        <div id="block-block-4" class="block block-block odd">
            <h2 class="block__title block-title"><?php esc_html_e( 'Diving in Scotland', 'scotsac' ); ?></h2>
            <?php
            $dis_img = get_template_directory_uri() . '/assets/images/diving-in-scotland.jpg';
            if ( file_exists( get_template_directory() . '/assets/images/diving-in-scotland.jpg' ) ) :
            ?>
            <p><img alt="" src="<?php echo esc_url( $dis_img ); ?>" style="width:320px;height:190px;"></p>
            <?php endif; ?>
            <p><?php esc_html_e( 'World class diving on your doorstep', 'scotsac' ); ?></p>
            <p><a href="<?php echo esc_url( home_url( '/diving-in-scotland' ) ); ?>"><?php esc_html_e( 'More', 'scotsac' ); ?></a></p>
        </div>

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
