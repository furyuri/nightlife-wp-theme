<?php 

/**
* Template Name: Services Page
*/

get_header(); ?>

<!-- CONTENT BELOW -->

<main>
    <section id="blog-section">
        <div class="container single-service">
            <div class="row">
                
                <div class="col-sm-6 blog-main ml-auto mr-auto">
                    
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
                    <div id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
                        <?php the_post_thumbnail('thumbnail'); ?>
                        <h2 class="blog-post-title"><?php the_title(); ?></h2>
                        
                        <?php the_content(); ?>
                    </div><!-- /.blog-post -->
                    
                        <?php endwhile; else : ?>
                           <p><?php _e( 'Sorry, no posts matched your criteria.', 'nightlife' ); ?></p>
                        <?php endif; ?>

                </div><!-- /.blog-main -->

            </div><!-- /.row -->

        </div><!-- /.container -->
    </section>
</main>

<?php get_footer(); ?>