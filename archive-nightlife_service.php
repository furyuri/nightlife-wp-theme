<?php get_header(); ?>

<!-- CONTENT BELOW -->

<main>
    <section id="blog-section">
        <div class="container">
            
            <div class="row">
  
                <div class="col-lg-6 blog-main">
                    
                    <div class="row">
                        <div class="col text-center service-col-header"><h2>Services</h2></div>
                    </div> <!-- /.row --> 
                    
                    <div class="row">
                        <div class="col">
                            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <div id="post-<?php the_ID(); ?>" <?php post_class( array('blog-post', 'row') ); ?>>
                                
                                    <div class="col-sm-12 services-thumbnail ">
                                        <h3 class="blog-post-title"><?php the_title(); ?></h3>
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                        <?php the_content(); ?>
                                    </div><!-- /.col -->
       
                            </div><!-- /.blog-post row -->

                                <?php endwhile; else : ?>
                                   <p><?php _e( 'Sorry, no posts matched your criteria.', 'nightlife' ); ?></p>
                                <?php endif; ?>
                        </div> <!-- /.col -->  
                    </div> <!-- /.row -->              
                </div><!-- /.blog-main -->
            
            
 
            
                <div class="col-lg-6 blog-main">
                    
                    <div class="row">
                        <div class="col text-center service-col-header"><h2>Add On's</h2></div>
                    </div> <!-- /.row --> 
                    
                    <div class="row">
                        <div class="col">
                            <?php
                                $args = array( 'post_type' => 'nightlife_add-on', 'posts_per_page' => 10, 'orderby' => 'title', 'order' => 'ASC');

                                $service_query = new WP_Query ( $args );
                            if ( $service_query->have_posts() ) : ?>
                            <?php while ($service_query->have_posts()) : $service_query->the_post(); ?>
                            <div class="blog-post row">
                                
                                    <div class="col-sm-12 services-thumbnail ">
                                        <h3 class="blog-post-title"><?php the_title(); ?></h3>
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                        <?php the_content(); ?>
                                    </div><!-- /.col -->
  
                            </div><!-- /.blog-post row-->

                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                                <?php else : ?>
                                   <p><?php _e( 'Sorry, no posts matched your criteria.', 'nightlife' ); ?></p>
                                <?php endif; ?>
                        
                        </div> <!-- /.div -->
                    </div> <!-- /.row -->  
                </div><!-- /.blog-main -->
            </div> <!-- /.row (main) -->  
            
        </div><!-- /.container -->
    </section>
</main>

<?php get_footer(); ?>