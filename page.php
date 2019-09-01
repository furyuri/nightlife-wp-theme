<?php get_header(); ?>

 <!-- CONTENT BELOW -->

<main>
    <section id="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 blog-main">
                    
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
                        <h2 class="blog-post-title"><?php the_title(); ?></h2>
   
                        <?php the_content(); ?>

                    </article><!-- /.blog-post -->
                    
                        <?php endwhile; else : ?>
                           <p><?php _e( 'Sorry, no posts matched your criteria.', 'nightlife' ); ?></p>
                        <?php endif; ?>

                </div><!-- /.blog-main -->
                <!-- SIDEBAR SECTION -->
                <div class="col-sm-3 col-sm-offset-1 blog-sidebar">

                    <?php get_sidebar(); ?>
                </div><!-- /.blog-sidebar -->

            </div><!-- /.row -->

        </div><!-- /.container -->
    </section>
</main>

<?php get_footer(); ?>