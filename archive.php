<?php get_header(); ?>

 <!-- CONTENT BELOW -->

<main>
    <section id="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 blog-main">
                    
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    
                        <article id="post-<?php the_ID(); ?>" <?php post_class( array('blog-post', 'row') ); ?>>

                            <?php if ( has_post_thumbnail() ) {
                                    echo '<div class="col-sm-4 thumbnail-div">' . '<a href="' . get_permalink() . '">' . get_the_post_thumbnail() . '</a></div>';
                                }
                            ?>
                            <div <?php if ( has_post_thumbnail() ) { 
                                echo 'class="col-sm-8"';
                                }
                                else {
                                    echo 'class="col-sm-12"';
                                }
                             ?>>   
                                <h2 class="blog-post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>

                                <p class="blog-post-meta"><?php echo get_the_date(); ?> <?php _e(' by ','nightlife'); ?><?php the_author_posts_link(); ?></p>
                                <?php the_excerpt(); ?>

                                <ul class="pager">
                                    <li><a href="<?php echo get_permalink(); ?>">Read More</a></li>
                                </ul>
                            </div>
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