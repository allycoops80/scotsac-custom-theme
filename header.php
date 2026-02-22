<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class( scotsac_body_layout_class() ); ?>>
<?php wp_body_open(); ?>

<p id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable">
        <?php esc_html_e( 'Skip to main content', 'scotsac' ); ?>
    </a>
</p>

<!-- ============================================================
     Header
     ============================================================ -->
<div id="header-wrapper">

    <header class="header" id="header" role="banner">

        <!-- Top bar: social icons -->
        <div class="second">
            <div class="region region-header-top">
                <?php
                $social_links = scotsac_social_links();
                if ( $social_links ) :
                ?>
                <p>
                    <?php foreach ( $social_links as $link ) : ?>
                        <a href="<?php echo esc_url( $link['url'] ); ?>"
                           aria-label="<?php echo esc_attr( $link['label'] ); ?>"
                           target="_blank" rel="noopener noreferrer">
                            <?php if ( file_exists( get_template_directory() . '/assets/images/' . $link['icon'] . '.png' ) ) : ?>
                                <img
                                    src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/' . $link['icon'] . '.png' ); ?>"
                                    alt="<?php echo esc_attr( $link['label'] ); ?>"
                                    width="24" height="23"
                                >
                            <?php else : ?>
                                <?php echo esc_html( $link['label'] ); ?>
                            <?php endif; ?>
                        </a>
                    <?php endforeach; ?>
                </p>
                <?php endif; ?>
            </div><!-- .region-header-top -->

            <!-- Logo + primary navigation -->
            <div class="wrap">

                <!-- Logo -->
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
                       title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
                       rel="home"
                       class="header__logo"
                       id="logo">
                        <?php if ( file_exists( get_template_directory() . '/assets/images/logo.png' ) ) : ?>
                            <img
                                src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>"
                                alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
                                class="header__logo-image"
                            >
                        <?php else : ?>
                            <span class="site-title"><?php bloginfo( 'name' ); ?></span>
                        <?php endif; ?>
                    </a>
                <?php endif; ?>

                <!-- Primary navigation -->
                <div class="header__region region region-header">
                    <nav id="site-navigation" class="block block-menu-block" role="navigation"
                         aria-label="<?php esc_attr_e( 'Primary menu', 'scotsac' ); ?>">
                        <?php
                        if ( has_nav_menu( 'primary' ) ) {
                            wp_nav_menu( [
                                'theme_location' => 'primary',
                                'container'      => false,
                                'menu_class'     => 'menu',
                                'depth'          => 2,
                                'fallback_cb'    => false,
                            ] );
                        } else {
                            // Fallback: list pages
                            wp_list_pages( [
                                'title_li' => '',
                                'echo'     => true,
                            ] );
                        }
                        ?>
                    </nav>
                </div><!-- .region-header -->

            </div><!-- .wrap -->
        </div><!-- .second -->

    </header><!-- #header -->

    <!-- Full-width header background image -->
    <?php
    $header_image = get_header_image();
    if ( $header_image ) :
    ?>
    <div class="region region-header-bg">
        <img
            src="<?php echo esc_url( $header_image ); ?>"
            alt=""
            width="<?php echo esc_attr( get_custom_header()->width ); ?>"
            height="<?php echo esc_attr( get_custom_header()->height ); ?>"
        >
    </div>
    <?php elseif ( file_exists( get_template_directory() . '/assets/images/header-bg.jpg' ) ) : ?>
    <div class="region region-header-bg">
        <img
            src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/header-bg.jpg' ); ?>"
            alt=""
        >
    </div>
    <?php endif; ?>

</div><!-- #header-wrapper -->

<!-- ============================================================
     Page wrapper
     ============================================================ -->
<div id="page-wrapper">
<div id="page">
<div id="main">
<a id="main-content"></a>
