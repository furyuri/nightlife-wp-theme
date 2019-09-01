<?php 

    if ( ! isset( $content_width ) ) {
        $content_width = 660;
    }

    function nightlife_setup() {
            add_theme_support('automatic-feed-links');
            add_theme_support('title-tag');
            add_theme_support('post-thumbnails');
        
            // Register Custom Navigation Walker 
            require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
        
            register_nav_menus( array(
                'primary' => __( 'Primary Menu', 'nightlife' ),
            ) );
        
            // Enable Custom Header Support
            $args = array(
                'flex-width'    => 'true',
                'width'         => 2000,
                'flex-height'   => 'true',
                'height'        => 1000,
                'default-image' => get_template_directory_uri() . '/images/header.jpg',
                'uploads'       => true,
            );
            add_theme_support( 'custom-header', $args );
        }

        add_action('after_setup_theme','nightlife_setup');

    function nightlife_scripts() {

        /* Stylesheets */
        wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css' );
        wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.0.10/css/all.css' );
        wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Black+Han+Sans|Montserrat:400,400i,700' );

        /* Scripts */
        wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
        wp_enqueue_script( 'custom-scripts', get_template_directory_uri() . '/js/custom-scripts.js', array('jquery','bootstrap-script'), '1.0', true );
        
        if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )  wp_enqueue_script( 'comment-reply' );
    }

        add_action('wp_enqueue_scripts','nightlife_scripts');

    function custom_excerpt_more( $more ) {
            return '...';
    }
    add_filter( 'excerpt_more', 'custom_excerpt_more' );

    function custom_excerpt_length( $length ) {
        return 25;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

    // add HTML to footer of WP Admin Page
    function nightlife_footer_admin () {
        echo '<p>' . __( 'Theme by', 'nightlife' ) . ' <a href="https://www.urifrazier.com" target="_blank">' . __( 'UFO Design', 'nightlife' ) . '</a> | ' . __( 'Designed by', 'nightlife' ) . ' <a href="https://www.urifrazier.com" target="_blank">Uri Frazier</a></p>';
    }

    add_filter('admin_footer_text', 'nightlife_footer_admin');

// Moves the Comment textarea to the bottom of the group of Comment Fields
    function wpb_move_comment_field_to_bottom( $fields ) {
      $comment_field = $fields['comment'];
      unset( $fields['comment'] );
      $fields['comment'] = $comment_field;
      return $fields;
      }
    add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

    require_once( get_template_directory() . '/includes/register_sidebars.php');
    require_once( get_template_directory() . '/includes/custom_post_types.php');
    require_once( get_template_directory() . '/includes/customizer.php');

// Remove irrelevant post (categories) from search results
    function wcs_exclude_category_search( $query ) {
      if (is_search ) {
        $query->set( 'cat', '-13, -12, -1' );
      }
    }
    add_action( 'pre_get_posts', 'wcs_exclude_category_search', 1 );
//Hide categories from WordPress category widget
    function exclude_widget_categories($args){
        $exclude = "1, 12, 13";
        $args["exclude"] = $exclude;
        return $args;
    }
add_filter("widget_categories_args","exclude_widget_categories");

// Halt the main query in the case of an empty search 
add_filter( 'posts_search', function( $search, \WP_Query $q )
{
    if( ! is_admin() && empty( $search ) && $q->is_search() && $q->is_main_query() )
        $search .=" AND 0=1 ";

    return $search;
}, 10, 2 );

?>