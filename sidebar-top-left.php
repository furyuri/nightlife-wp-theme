<?php 
    $my_postid = 139;
    $content = get_post_field('post_content', $my_postid);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    echo $content;
    ?>
                   