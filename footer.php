</div><!-- #main -->
</div><!-- #page -->
</div><!-- #page-wrapper -->

<!-- ============================================================
     Footer
     ============================================================ -->
<div id="footer-wrapper">
    <footer id="footer" role="contentinfo">

        <!-- Footer column 1: ScotSAC links menu -->
        <div class="block">
            <h2 class="block__title"><?php esc_html_e( 'Scottish Sub Aqua Club', 'scotsac' ); ?></h2>
            <?php
            if ( has_nav_menu( 'footer-col-1' ) ) {
                wp_nav_menu( [
                    'theme_location' => 'footer-col-1',
                    'container'      => false,
                    'menu_class'     => 'menu',
                    'depth'          => 1,
                    'fallback_cb'    => false,
                ] );
            } else {
                // Fallback: hardcoded links matching original site
                ?>
                <ul class="menu">
                    <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><?php esc_html_e( 'About', 'scotsac' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/diving-links' ) ); ?>"><?php esc_html_e( 'Diving Links', 'scotsac' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/volunteer-policy' ) ); ?>"><?php esc_html_e( 'Volunteer Policy', 'scotsac' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/directors-and-post-holders' ) ); ?>"><?php esc_html_e( 'Directors and post holders', 'scotsac' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>"><?php esc_html_e( 'Privacy Notice', 'scotsac' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/anti-doping' ) ); ?>"><?php esc_html_e( 'Anti-Doping', 'scotsac' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/child-protection' ) ); ?>"><?php esc_html_e( 'Child Protection', 'scotsac' ); ?></a></li>
                </ul>
                <?php
            }
            ?>
        </div><!-- .block -->

        <!-- Footer column 2: Getting Started menu -->
        <div class="block">
            <h2 class="block__title"><?php esc_html_e( 'Getting Started', 'scotsac' ); ?></h2>
            <?php
            if ( has_nav_menu( 'footer-col-2' ) ) {
                wp_nav_menu( [
                    'theme_location' => 'footer-col-2',
                    'container'      => false,
                    'menu_class'     => 'menu',
                    'depth'          => 1,
                    'fallback_cb'    => false,
                ] );
            } else {
                ?>
                <ul class="menu">
                    <li><a href="<?php echo esc_url( home_url( '/learn-dive' ) ); ?>"><?php esc_html_e( 'Learn to Dive', 'scotsac' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/diving-scotland' ) ); ?>"><?php esc_html_e( 'Diving in Scotland', 'scotsac' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/faq' ) ); ?>"><?php esc_html_e( 'FAQ', 'scotsac' ); ?></a></li>
                </ul>
                <?php
            }
            ?>
        </div><!-- .block -->

        <!-- Footer column 3: Contact -->
        <div class="block">
            <h2 class="block__title"><?php esc_html_e( 'Contact', 'scotsac' ); ?></h2>

            <?php if ( is_active_sidebar( 'footer-contact' ) ) : ?>
                <?php dynamic_sidebar( 'footer-contact' ); ?>
            <?php else : ?>
                <?php
                $contact_text = get_theme_mod(
                    'scotsac_footer_contact',
                    "The Scottish Sub-Aqua Club\nOffice 52, Stirling Business Centre\nWellgreen Pl\nStirling FK8 2DZ\n\nEmail: hq@scotsac.com\nPhone: +44 1786 643356"
                );
                ?>
                <p><?php echo nl2br( esc_html( $contact_text ) ); ?></p>
                <p><?php esc_html_e( 'The Scottish Sub Aqua Club is a Company Limited by Guarantee registered in Scotland. Company number SC313935', 'scotsac' ); ?></p>
            <?php endif; ?>
        </div><!-- .block -->

    </footer><!-- #footer -->

    <!-- Copyright bar -->
    <div id="footer-copyright">
        <p>
            <?php
            printf(
                /* translators: 1: Copyright years, 2: Site name, 3: Privacy policy URL */
                esc_html__( 'Copyright &copy; Scottish Sub Aqua Club 1999&ndash;%1$s. All rights reserved. %2$s', 'scotsac' ),
                esc_html( gmdate( 'Y' ) ),
                '<a href="' . esc_url( home_url( '/privacy-policy' ) ) . '">' . esc_html__( 'Privacy Policy', 'scotsac' ) . '</a>'
            );
            ?>
        </p>
    </div><!-- #footer-copyright -->

</div><!-- #footer-wrapper -->

<?php wp_footer(); ?>
</body>
</html>
