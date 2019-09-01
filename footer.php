    <footer>
        <section id="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>
                            <?php 
                                $my_postid = 119;
                                $title = get_post_field('post_title', $my_postid);
                                $title = apply_filters('the_title', $title);
                                $title = str_replace(']]>', ']]&gt;', $title);
                                echo $title;
                            ?> 
                        </h3>
                        <p><?php 
                                $my_postid = 119;
                                $content = get_post_field('post_content', $my_postid);
                                $content = apply_filters('the_content', $content);
                                $content = str_replace(']]>', ']]&gt;', $content);
                                echo $content;
                            ?></p>
                        <ul class="socialmedia">
                        <?php if ( get_theme_mod('facebook_url')) : ?>    
                            <li><a href="<?php echo get_theme_mod('facebook_url'); ?>" target="_blank"><i class="fab fa-facebook"></i></a></li>
                        <?php endif ?>
                        <?php if ( get_theme_mod('twitter_url')) : ?>      
                            <li><a href="<?php echo get_theme_mod('twitter_url'); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <?php endif ?>
                        <?php if ( get_theme_mod('instagram_url')) : ?>      
                            <li><a href="<?php echo get_theme_mod('instagram_url'); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <?php endif ?>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>
                            <?php 
                                $my_postid = 121;
                                $title = get_post_field('post_title', $my_postid);
                                $title = apply_filters('the_title', $title);
                                $title = str_replace(']]>', ']]&gt;', $title);
                                echo $title;
                            ?> 
                        </h3>
                        <p><?php 
                                $my_postid = 121;
                                $content = get_post_field('post_content', $my_postid);
                                $content = apply_filters('the_content', $content);
                                $content = str_replace(']]>', ']]&gt;', $content);
                                echo $content;
                            ?></p>
                    </div>
                    <div class="col-md-4">
                        <h3>
                            <?php 
                                $my_postid = 123;
                                $title = get_post_field('post_title', $my_postid);
                                $title = apply_filters('the_title', $title);
                                $title = str_replace(']]>', ']]&gt;', $title);
                                echo $title;
                            ?> 
                        </h3>
                        <p><?php 
                                $my_postid = 123;
                                $content = get_post_field('post_content', $my_postid);
                                $content = apply_filters('the_content', $content);
                                $content = str_replace(']]>', ']]&gt;', $content);
                                echo $content;
                            ?> </p>
                        <p>Copyright &copy; <?php echo date('Y'); ?> &nbsp; <?php 
                                $my_postid = 128;
                                $content = get_post_field('post_content', $my_postid);
                                $content = apply_filters('get_the_content', $content);
                                $content = str_replace(']]>', ']]&gt;', $content);
                                echo $content;
                            ?> </p>                    
                    </div> <!-- End col-->                
                </div> <!-- End row -->
            </div> <!-- End container-->
        </section>    
    </footer>
    <?php wp_footer() ?>
</body>

</html>