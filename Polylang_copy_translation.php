<?php
/*
Plugin Name: Polylang copy translation
Description: Copy over the translation from current page/post to new translation. 
version: 0.1
Author: Jesper Heikkilä
Author URI: http://www.bluerange.se
*/
// copy content and title when translating posts and pages with Polylang
add_filter('default_content','copy_post_translation', 100, 2);
add_filter('default_title','copy_post_translation', 100, 2);
function copy_post_translation($content, $post){
        $from_post = isset($_GET['from_post'])? (int)$_GET['from_post'] : false;
        if($content == ''){
                $from_post = get_post($from_post);
                if($from_post)
                switch(current_filter()){
                        case 'default_content':
                                $content = $from_post->post_content;
                                break;
                        case 'default_title':
                                $content = $from_post->post_title;
                                break;
                        default:
                                break;
                }
        }
        return $content;
}
?>