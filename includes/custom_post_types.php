<?php
/**
 * Night Life Theme Customizer
 *
 * @file           custom_post_types.php
 * @author         Uri Frazier
 */

    // Register Custom Post Type - Services
    add_action( 'init', 'create_post_type' );
    add_post_type_support( 'nightlife_service', 'thumbnail' );
    add_post_type_support( 'nightlife_add-on', 'thumbnail' );

    function create_post_type() {
      register_post_type( 'nightlife_service',
          array(
             'labels' => array(
             'name' => __( 'Services' ),
             'singular_name' => __( 'Service' )
            ),
          'public' => true,
          'has_archive' => true,
        )
      );
      register_post_type( 'nightlife_add-on',
          array(
             'labels' => array(
             'name' => __( "Add-On's" ),
             'singular_name' => __( 'Add-On' )
            ),
          'public' => true,
          'has_archive' => true,
        )
      );
    }//end Register Custom Post Type