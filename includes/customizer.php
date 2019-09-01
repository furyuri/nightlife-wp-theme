<?php
/**
 * Night Life Theme Customizer
 *
 * @file           customizer.php
 * @author         Uri Frazier
 */

// Start Theme Customizer ----------------------------------

    function nightlife_customizer_register( $wp_customize ) {

    // Theme Customizer -- Colors -------------------------------------------

        // Header Background Color Setting
        $wp_customize->add_setting( 'header_bg_color', array(
                'default' => '#220033'
        ) );

        // Header Background Color Control -- This is a color picker control
        $wp_customize->add_control( 
                new WP_Customize_Color_Control( $wp_customize, 'header_bg_color', 
                    array(
                        'label' => __('Header Background Color', 'nightlife'),
                        'section' => 'colors',
                        'settings' => 'header_bg_color',
                    )
        ) );
        
        // Header Text Color Setting
        $wp_customize->get_setting( 'header_textcolor' )->default = '#ffcc78';    

        // Home Page Area Colors

        $wp_customize->add_setting('home_area_colors', array(
                'default'=> 'value1',
        ));

        $wp_customize->add_control( 'home_area_colors', 
            array(
                'label'		 => __('Home Section Colors', 'nightlife' ),
                'section'    => 'colors',
                'settings'   => 'home_area_colors',
                'type'       => 'radio',
                'choices'    => array(
                    'value1' => __( 'Standard', 'nightlife' ),
                    'value2' => __( 'Ultra-Dark', 'nightlife' ),
                    ),
             )
        );
        
    // Theme Customizer -- Site Identity Section --------------------------------
    $wp_customize->get_section( 'title_tagline')->priority = 1; //Set Section Priority
       
        // Site Identity : Site Title
        $wp_customize->get_control( 'blogname' )->priority = 10; 
        
        // Site Identity : Checkbox to Display/Hide Site Title
        $wp_customize->get_control( 'display_header_text' )->priority = 20;
        $wp_customize->get_control( 'display_header_text' )->label = __('Display Site Title', 'nightlife');
        
         // Site Identity : Feature Text H1 Heading 
        $wp_customize->add_setting('feature_text_title', array(
                    'default'=> 'Rock That Body',
            ));    
        $wp_customize->add_control('feature_text_title', 
            array(
                'label'		 => __('Feature Text Title', 'nightlife' ),
                'section'    => 'title_tagline',
                'type'       => 'text',
                'settings'   => 'feature_text_title',
                'priority'   => 25,
            )
        );
        
        // Site Identity : Site Tag Line / Feature Text
        $wp_customize->get_control( 'blogdescription' )->label = __('Feature Text', 'nightlife');
        $wp_customize->get_control( 'blogdescription' )->priority = 30;
    
        // Site Identity : Site Icon
        $wp_customize->get_control( 'site_icon' )->label = __( 'Site Icon aka favicon', 'nightlife' ); 
        $wp_customize->get_control( 'site_icon' )->priority = 40;
    
    // Theme Customizer -- Hero Jumbotron Background Section  --------------------------- 
        
        // Hero Jumbotron Background : Background Image CSS
        $wp_customize->add_section(
            'homepage_jumbotron_bg',
            array(
                    'title'       => __( 'Hero-Jumbotron Background', 'nightlife' ),
                    'priority'    => 15,
                    'capability'  => 'edit_theme_options',
                    'description' => __( 'Change the background image in header/jumbotron of the homepage.', 'nightlife' ),
            )
        );
        $wp_customize->add_setting('nightlife_jumbotron_bg_image',
            array()
        ); 
        $wp_customize->add_control(
            new WP_Customize_Media_Control(
                $wp_customize,
                'nightlife_jumbotron_bg_image',
                array(
                        'mime_type' => 'image',
                        'label'       => __( 'Background Image', 'nightlife' ),
                        'settings'    => 'nightlife_jumbotron_bg_image',
                        'section'     => 'homepage_jumbotron_bg',
                        'description' => __( 'Remove selected image to restore default background.', 'nightlife' ),
                )
            )
        );
        
        // Hero Jumbotron Background : Background Image CSS Opacity Slider

        $wp_customize->add_setting('nightlife_image_opacity');

        $wp_customize->add_control( 'nightlife_image_opacity',
                array(
                    'type' => 'range',
                    'priority' => 20,
                    'section' => 'homepage_jumbotron_bg',
                    'label' => __( 'Set Background Image Opacity', 'nightlife' ),
                    'description' => '<span style="float: left; margin-top: 10px;">' . __( '&larr; Less', 'nightlife' ) . '</span><span style="float: right; margin-top: 10px;">' . __( 'More &rarr;', 'nightlife' ) . '</span>',
                    'input_attrs' => array(
                        'min' => .1,
                        'max' => 1,
                        'step' => .1,
                        'class' => 'image-opacity',
                        'style' => 'width: 60%; padding-top: 0; margin: 8px 0 0 10px;',
                    ),
                )
        );
        
    // Theme Customizer -- Home Page Layout & Content Section -------------------------------------------      
    $wp_customize->add_section( 'layout_options_section', array(
            'title'           => __( 'Home Page Layout & Content', 'nightlife' ),
            'description'     => __( 'Add or remove and edit section(s) of the home page', 'nightlife' ),
            'priority'        => 20,
    ) );
        
        // Home Page Layout & Content : Checkbox to Display/Hide Schedule Section
        $wp_customize->add_setting( 'schedule_area' );

        $wp_customize->add_control( 'schedule_area', array(
                'type'        =>  'checkbox',
                'priority'    => 10,
                'section'     => 'layout_options_section',
                'label'       => __( 'Check to Remove the Schedule Section', 'nightlife' ),
                'description' => '',
        ) );      
        
        // Home Page Layout & Content : Home Page Columns
        
        // Home Page Columns : Column 1 Top Title
            $wp_customize->add_setting( 'home_column_1_title', array(
                    'default'           => __('Good, clean, music.'),
                    'sanitize_callback' => 'sanitize_text_field',
            ) );

            $wp_customize->add_control( 'home_column_1_title', array(
                    'type'        =>  'text',
                    'priority'    => 11,
                    'section'     => 'layout_options_section',
                    'label'       => __( 'Column 1 Title', 'nightlife' ),
                    'description' => '',
            ) );        
        
        // Home Page Columns : Column 1 Top Text
            $wp_customize->add_setting( 'home_column_1_text', array(
                    'default'           => __('Add text via WordPress Customizer...consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'nightlife'),
                    'sanitize_callback' => 'sanitize_text_field',
            ) );

            $wp_customize->add_control( 'home_column_1_text', array(
                    'type'        =>  'textarea',
                    'priority'    => 12,
                    'section'     => 'layout_options_section',
                    'label'       => __( 'Column 1 Text', 'nightlife' ),
                    'description' => '',
            ) );        
        
        // Home Page Columns : Column 2 Top Title
            $wp_customize->add_setting( 'home_column_2_title', array(
                    'default'           => __('Premium Sound.', 'nightlife'),
                    'sanitize_callback' => 'sanitize_text_field',
            ) );

            $wp_customize->add_control( 'home_column_2_title', array(
                    'type'        =>  'text',
                    'priority'    => 13,
                    'section'     => 'layout_options_section',
                    'label'       => __( 'Column 2 Title', 'nightlife' ),
                    'description' => '',
            ) );        
        
        // Home Page Columns : Column 2 Top Text
            $wp_customize->add_setting( 'home_column_2_text', array(
                    'default'           => __('Add text via WordPress Customizer...consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'nightlife'),
                    'sanitize_callback' => 'sanitize_text_field',
            ) );

            $wp_customize->add_control( 'home_column_2_text', array(
                    'type'        =>  'textarea',
                    'priority'    => 14,
                    'section'     => 'layout_options_section',
                    'label'       => __( 'Column 2 Text', 'nightlife' ),
                    'description' => '',
            ) );        
        
        // Home Page Columns : Column 3 Top Title
            $wp_customize->add_setting( 'home_column_3_title', array(
                    'default'           => __('Exciting Lighting Effects.', 'nightlife'),
                    'sanitize_callback' => 'sanitize_text_field',
            ) );

            $wp_customize->add_control( 'home_column_3_title', array(
                    'type'        =>  'text',
                    'priority'    => 15,
                    'section'     => 'layout_options_section',
                    'label'       => __( 'Column 3 Title', 'nightlife' ),
                    'description' => '',
            ) );        
        
        // Home Page Columns : Column 3 Top Text
            $wp_customize->add_setting( 'home_column_3_text', array(
                    'default'           => __('Add text via WordPress Customizer...consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'nightlife'),
                    'sanitize_callback' => 'sanitize_text_field',
            ) );

            $wp_customize->add_control( 'home_column_3_text', array(
                    'type'        =>  'textarea',
                    'priority'    => 16,
                    'section'     => 'layout_options_section',
                    'label'       => __( 'Column 3 Text', 'nightlife' ),
                    'description' => '',
            ) );              
        
        // Home Page Layout & Content : Profile Block
        
        // Profile Block : Title
            $wp_customize->add_setting( 'home_profile_title', array(
                    'default'           => __('BDT DJ Profile', 'nightlife'),
                    'sanitize_callback' => 'sanitize_text_field',
            ) );

            $wp_customize->add_control( 'home_profile_title', array(
                    'type'        =>  'text',
                    'priority'    => 17,
                    'section'     => 'layout_options_section',
                    'label'       => __( 'Profile Title', 'nightlife' ),
                    'description' => '',
            ) );        
        
        // Profile Block : Text
            $wp_customize->add_setting( 'home_profile_text', array(
                    'default'           => __('Add text via WordPress Customizer...consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'nightlife'),
                    'sanitize_callback' => 'sanitize_text_field',
            ) );

            $wp_customize->add_control( 'home_profile_text', array(
                    'type'        =>  'textarea',
                    'priority'    => 18,
                    'section'     => 'layout_options_section',
                    'label'       => __( 'Profile Text', 'nightlife' ),
                    'description' => '',
            ) );           
        
    // Theme Customizer - Social Icons -------------------------------------------
    $wp_customize->add_section( 'social_icons_section', array(
            'title'           => __( 'Social Icons', 'nightlife' ),
            'description'     => __( 'Add your social media URLs to each field below to display their related social icons in the footer.', 'nightlife' ),
            'priority'        => 20,
    ) );

        // Social Icons : Facebook Link
        $wp_customize->add_setting( 'facebook_url', array(
                'default'           => '',
                'sanitize_callback' => 'esc_url',
        ) );
        $wp_customize->add_control( 'facebook_url', array(
                'type'        =>  'url',
                'priority'    => 10,
                'section'     => 'social_icons_section',
                'label'       => __( 'Facebook URL', 'nightlife' ),
                'description' => __( 'Enter the complete address, including the http://', 'nightlife' ),
        ) );

        // Social Icons : Twitter Link
        $wp_customize->add_setting( 'twitter_url', array(
                'default'           => '',
                'sanitize_callback' => 'esc_url',
        ) );
        $wp_customize->add_control( 'twitter_url', array(
                'type'        =>  'url',
                'priority'    => 11,
                'section'     => 'social_icons_section',
                'label'       => __( 'Twitter URL', 'nightlife' ),
                'description' => __( 'Enter the complete address, including the http://', 'nightlife' ),
        ) );

        // Social Icons : Instagram Link
        $wp_customize->add_setting( 'instagram_url', array(
                'default'           => '',
                'sanitize_callback' => 'esc_url',
        ) );
        $wp_customize->add_control( 'instagram_url', array(
                'type'        =>  'url',
                'priority'    => 12,
                'section'     => 'social_icons_section',
                'label'       => __( 'Instagram URL', 'nightlife' ),
                'description' => __( 'Enter the complete address, including the http://', 'nightlife' ),
        ) );
        
        
        
    // Theme Customizer - Unused Section Removal
    $wp_customize->remove_section('header_image'); //remove unused section;
    $wp_customize->remove_section( 'static_front_page');   
        
    }  //End Theme Customizer Scripts

    add_action( 'customize_register', 'nightlife_customizer_register' );

    // End Theme Customizer ---------------------------------

//********************************************************************************
add_action( 'wp_head', 'nightlife_customizer_css' ); //HOOK - HOOK - HOOK
//*******************************************************************************

// Add CSS from Theme Customizer to wp_head ---------------------------------------------

    function nightlife_customizer_css() {
        ?>
        <style>
        /*=== Style from The Customizer Colors Section - Header Background Color ===*/
            .navbar {
                    background-color: <?php echo get_theme_mod( 'header_bg_color' ); ?>;
            }
        /*=== Style from The Customizer Colors Section - Header Text Color ===*/
            .navbar .navbar-brand { 
                color: #<?php header_textcolor(); ?>;
            }
            
            <?php if (get_theme_mod('home_area_colors') == 'value2') : ?>
            .service-highlights, .service-highlights:nth-of-type(3) {
                background-color: #303030;
                color: #fff0a5;
            }            
            .service-highlights h2, .service-highlights:nth-of-type(3) h2 a{
                color: white;
            }
            #scheduler-col, #bio {
                background-color: black;
            }
            <?php endif; ?>
            
        /*=== Style from The Customizer Hero-Jumbotron Background Section - Image Source ===*/    
            <?php $jumbo_bg_ID = get_theme_mod( 'nightlife_jumbotron_bg_image' ) ?>
            <?php if( get_theme_mod( 'nightlife_jumbotron_bg_image' ) ) : ?>
            
                .jumbotron:before { background-image: url( "<?php echo wp_get_attachment_url( $jumbo_bg_ID ); ?>" ); }
            
            <?php else : ?>
                .jumbotron:before { background-image: url( "<?php echo get_template_directory_uri() . '/img/dance-party.jpg'; ?>" ); }
            <?php endif; ?>
            
        /*=== Style from The Customizer Hero-Jumbotron Background Section - BG Image Opacity ===*/       <?php if( get_theme_mod( 'nightlife_image_opacity' ) ) : ?>   
            .jumbotron:before { opacity: <?php echo get_theme_mod( 'nightlife_image_opacity' ); ?> ;}
            <?php else : ?>
            .jumbotron:before { opacity: 1; }
            <?php endif; ?>
        </style>
        <?php
      }