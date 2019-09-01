<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Required meta tags -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- HEADER SECTION -->
    <header>

        <!-- NAVBAR SECTION -->
        <nav class="navbar navbar-expand-lg navbar-dark" id="main-nav">
            <div class="container">
                <?php if ( display_header_text() ) : ?>
                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( 'name' ); ?></a>
                <?php endif; ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                        wp_nav_menu( array(
                           'menu'              => 'primary',
                           'theme_location'    => 'primary',
                           'depth'             => 2, // 1 = no dropdowns, 2 = with dropdowns.
                           'container'         => false,
                           'menu_class'        => 'navbar-nav ml-auto',
                           'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                           'walker'            => new WP_Bootstrap_Navwalker())
                        );
                    ?>
                </div> <!-- /navbar collapsable content -->
            </div> <!-- /navbar container-->
        </nav>
        <!-- FEATURE SECTION -->
            <!-- jumbotron -->
        <div class="jumbotron">
            <div class="container-fluid">
                <section class="col-sm-10 col-md-6 col-lg-4 mr-auto ml-auto blurb feature-text">
                    <h1 class=""><?php echo get_theme_mod('feature_text_title') ?></h1>
                    <p><?php bloginfo('description'); ?></p>
                </section>
            </div>     <!-- End container-->
        </div>    <!-- End jumbotron-->
    </header>