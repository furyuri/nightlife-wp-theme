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
                        <p class="blog-post-meta"><?php echo get_the_date(); ?> <?php _e(' by ','nightlife'); ?><?php the_author_posts_link(); ?></p>
                        
                        <?php 
                            if ( comments_open() ) {
                              echo '<p class="postmetadata">';
                              comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments are off for this post');
                              echo '</p>';
                           }
                        ?>
                        
                        <?php the_content(); ?>
                        <?php
                            $defaults = array(
                                'before'           => '<p class="pagination">',
                                'after'            => '</p>',
                                'link_before'      => '<span>',
                                'link_after'       => '</span>',
                                'next_or_number'   => 'number',
                                'separator'        => ' &nbsp;&nbsp;',
                                'nextpagelink'     => __( 'Next page' ),
                                'previouspagelink' => __( 'Previous page' ),
                                'pagelink'         => '%',
                                'echo'             => 1
                            );
                            wp_link_pages( $defaults );
                        ?>
                        <p> <?php _e('Posted in:','nightlife'); ?> <?php the_category(', ');?></p>
                        <p><?php the_tags();?></p>
                        

                        
                    </article><!-- /.blog-post -->
                    
                        <?php endwhile; else : ?>
                           <p><?php _e( 'Sorry, no posts matched your criteria.', 'nightlife' ); ?></p>
                        <?php endif; ?>
                    
                    <nav>
                        <ul class="pager">
                            <li><?php previous_post_link('%link', '&larr; Previous post in category', TRUE); ?></li>
                            <li><?php next_post_link( '%link', 'Next post in category &rarr;', TRUE); ?></li>

                        </ul>
                    </nav>
                    
                <section class="post-comments">
                        <?php comments_template(); ?>
                        <p class="postmetadata">
                          <?php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed'); ?>
                        </p>
                </section>
                
                </div><!-- /.blog-main -->
                
                <!-- SIDEBAR SECTION -->

            </div><!-- /.row -->

        </div><!-- /.container -->
    </section>
</main>

<?php get_footer(); ?>