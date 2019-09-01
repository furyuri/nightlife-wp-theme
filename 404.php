<?php get_header(); ?>

 <!-- CONTENT BELOW -->

<main>
    <section id="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 blog-main">
                   
                    <article>
                    <h2>PAGE NOT FOUND</h2>
                        <p>Oops! The requested URL...<? 
                            echo '<strong class="url404"> http://www.urifrazier.com' . ($_SERVER['REQUEST_URI']) . '</strong> ';
                            echo 'was not found on this server.';
                            ?></p>
                        <p>Please try starting from our <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( 'name' ); ?>  home page</a> or using the <a href="#s">search tool.</a></p>
                    </article>
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