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
        <div class="container-fluid heading-top">   
            <?php
                $page = $_SERVER['REQUEST_URI']; 
                //CONDITIONAL for TAGS
                if (is_tag()) {
                    echo '<h1 class="page-title">'; 
                        single_tag_title('Tag: ');    
                    echo '</h1>';
                }
            
                //CONDITIONAL for CUSTOM POST TYPES: SERVICES and ADD ON'S
                elseif(is_post_type_archive(array('nightlife_service', 'nightlife_add-on)'))){
                    echo '<h1 class="page-title">Services and Add-Ons</h1>';
                }
            
                //CONDITIONAL for CATEGORIES
                elseif (is_archive()) {
                    echo '<h1 class="page-title">';
                    single_term_title('Category: ');
                    if (is_month()) {
                        echo 'Posts from ';
                            single_month_title('');
                        echo '</h1>';
                    }
                }
                //CONDITIONAL for CONTACT PAGE - CUSTOM PAGE TEMPLATE
                elseif (is_page_template('page-templates/page_two-widget-area-top.php')) {
                    echo '<h1 class="page-title">Contact</h1>'; 
                }
                //CONDITIONAL for HOME.PHP default blog template
                elseif (is_home()) {
                    echo '<h1 class="page-title">Blog</h1>'; 
                }                  //CONDITIONAL for HOME.PHP default blog template
                //CONDITIONAL for SEARCH RESULTS
                elseif (fnmatch('/cas211w/project/?s=*', $page)){
                    echo '<h1 class="page-title">Search Results</h1>'; 
                }
                //CONDITIONAL for 404 Error Page RESULTS
                elseif (is_404()){
                    echo '<h1 class="page-title">Page Not Found</h1>'; 
                }
                //CONDITIONAL for SINGLE POSTS
                else {
                    global $post;
                    echo '<h1 class="page-title">';
                    echo get_the_title($post->ID);
                    echo '</h1>';
                    echo $actualpage;
                }
            ?>
        </div>     <!-- End container-->
        
    </header>