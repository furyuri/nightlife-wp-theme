<?php get_header(); ?>
 
<!-- BLOG SECTION -->
<main>
    <section id="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 blog-main">
                    
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
                   <article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
                        <a href="<?php the_permalink(); ?>">
                            <h2 class="blog-post-title"><?php the_title(); ?></h2>
                        </a>
                        <p class="blog-post-meta"><?php echo get_the_date(); ?> <?php _e(' by ','nightlife'); ?> <?php the_author_posts_link(); ?></p>
                        
                        <?php the_excerpt(); ?>
                        
                        <ul class="pager">
                            <li><a href="<?php echo get_permalink(); ?>">Read More</a></li>
                        </ul>
                        
                    </article><!-- /.blog-post -->
                    
                        <?php endwhile; else : ?>
                           <p><?php _e( 'Sorry, no posts matched your criteria.', 'nightlife' ); ?></p>
                        <?php endif; ?>
                    
                    <nav>
                        <ul class="pager">
                            <li><?php next_posts_link('&larr; Older Posts'); ?></li>
                            <li><?php previous_posts_link('Newer Posts &rarr;'); ?></li>
                        </ul>
                    </nav>

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