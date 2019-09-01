<?php 

/**
* Template Name: Two Widget Areas on Top
*/

get_header(); ?>

 <!-- CONTENT BELOW -->
<main class="contact">
    <section id="blog-section">
        <div class="container">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <!-- SIDEBAR SECTION -->
            
            <div class="row">
                
                <div class="col-md-3" id="contact">

                    <?php get_sidebar('top-left'); ?>
                    
                </div><!-- /.blog-sidebar -->                
                
                <!-- SIDEBAR SECTION -->
                <div class="col-md-9" id="contact-map">

                    <?php get_sidebar('top-right'); ?>
                    
                </div><!-- /.blog-sidebar -->
                
                <!-- CONTENT SECTION -->
                <div class="col-sm-12 blog-main">
                    
                    <div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
   
                        <?php the_content(); ?>

                    </div><!-- /.blog-post -->
                    


                </div><!-- /.blog-main -->

            </div><!-- /.row -->
            
            <?php endwhile; else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.', 'nightlife' ); ?></p>
            <?php endif; ?>

        </div><!-- /.container -->
    </section>
</main>

<?php get_footer(); ?>