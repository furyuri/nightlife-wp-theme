<?php get_header('alt'); ?>

    <main>
        <section class="service-highlights">            
            <div class="container">                
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/record.jpg" class="highlight-img">
                        <h2><?php echo get_theme_mod( 'home_column_1_title', _e('Good, clean, music.') ); ?></h2>
                        <p><?php echo get_theme_mod('home_column_1_text', _e('Add text via WordPress Customizer...consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') ) ?></p>
                    </div>
                    <div class="col-md-4" >
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/speakers.jpg" class="highlight-img">
                        <h2><?php echo get_theme_mod( 'home_column_2_title', _e('Premium Sound.') ); ?></h2>
                        <p><?php echo get_theme_mod('home_column_2_text', _e('Add text via WordPress Customizer...consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') ) ?></p>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/discoball.jpg" class="highlight-img">
                        <h2><?php echo get_theme_mod( 'home_column_3_title', _e('Exciting Lighting Effects') ); ?></h2>
                        <p><?php echo get_theme_mod('home_column_3_text', _e('Add text via WordPress Customizer...consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') ) ?></p>

                    </div> <!-- End col-->
                </div> <!-- End row -->
            </div> <!-- End container-->
        </section>

        <section id="utilities">
            <div class="container-fluid">
                <div class="row">
                    <?php if (!get_theme_mod('schedule_area')) : ?>
                        <div class="col-sm-6 col-md-8" id="visual-interest-img"></div>
                        <div class="col-sm-6 col-md-4 mr-auto" id="scheduler-col">
                            <?php get_sidebar('scheduler'); ?>
                        </div> <!-- End col-->  
                    <?php else : ?>
                        <div class="col-sm-12" id="visual-interest-img"></div>
                    <?php endif ?>
                </div> <!-- End row -->
            </div> <!-- End container-->
        </section>
        
        <section class="service-highlights">
            <div class="container pop-services">
                
                <div class="row">
                    <div class="col"><h2>Most Popular Services</h2></div>
                </div>
                
                <div class="row">
                    <?php
                        $args = array(
                           'orderby' => 'date',
                           'posts_per_page' => 3,
                           'post_type' => array( 'nightlife_add-on', 'nightlife_service') // used instead of categories for website services consistency
                        );
                        $top_service_posts = new WP_Query( $args );
                    ?>
                    <?php if ( $top_service_posts->have_posts() ) : ?>
                    
                    <?php while ($top_service_posts->have_posts()) : $top_service_posts->the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class( array('blog-post', 'col-md-4') ); ?>>

                        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                        <p><?php the_excerpt(); ?></p>
                    </div> <!-- End col -->
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <div class="col-xs-12">
                          <p><?php _e( 'No posts have been created yet in the Services category.<br>
                    Add that category and create posts.<br>Be sure to give each post a featured image.', 'nightlife'); ?></p>
                        </div><!-- /.col -->
                    <?php endif; ?>
                    <br>
                </div> <!-- End row -->
            </div> <!-- End container-->
        </section>
        
        <section id="bio">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img class="img-responsive" id="dj-avatar" src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/avatar-profile.jpg">
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h2><?php echo get_theme_mod( 'home_profile_title', 'BDT DJ Profile' ); ?></h2>
                        <p><?php echo get_theme_mod( 'home_profile_text', 'Add text via WordPress Customizer...consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.' ); ?></p>
                    </div> <!-- End col-->                
                </div> <!-- End row -->
            </div> <!-- End container-->
        </section>
    </main>
<?php get_footer(); ?>