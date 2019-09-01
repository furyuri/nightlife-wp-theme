<?php
/**
 * Night Life Theme Customizer
 *
 * @file           register_sidebars.php
 * @author         Uri Frazier
 */

    // Register Sidebars
    function nightlife_sidebars() {

        $args = array(
            'id'            => 'schedule-widget-area',
            'class'         => 'schedule-widget',
            'name'          => __( 'Schedule Widget', 'nightlife' ),
            'description'   => __( 'This widget is located on the homepage and contains the scheduling tool/plugin.', 'nightlife' ),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h2>',
            'after_title' => '</h2>',
        );
        register_sidebar( $args );

        $args = array(
            'id'            => 'sidebar-widget-area',
            'class'         => 'main-sidebar',
            'name'          => __( 'Main Sidebar', 'nightlife' ),
            'description'   => __( 'This is the sidebar for blog/post pages.', 'nightlife' ),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        );
        register_sidebar( $args );

    }
    add_action( 'widgets_init', 'nightlife_sidebars' );