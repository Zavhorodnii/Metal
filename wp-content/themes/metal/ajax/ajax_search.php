<?php

add_action('wp_ajax_search_info', 'search_info');
add_action('wp_ajax_nopriv_search_info', 'search_info');

add_action('wp_ajax_search_info_mb', 'search_info_mb');
add_action('wp_ajax_nopriv_search_info_mb', 'search_info_mb');


function search_info(){
    $text = $_POST['text'];
    $query = new WP_Query( array(
        's'         => $text,
        'exact'     => false,
        'sentence'  => false,
    ));
//    $posts = query_posts( array(
//        's'         => $text,
//        'exact'     => false,
//    ));
    $posts = array();
    $index = 1;

    while($query->have_posts()){

        $query->the_post();
        if($index === 1){

            $posts[] = '<div class="burger-menu__menu-items">';
                $posts[] = '<ul class="burger-menu__manu-list">';

        }

        $posts[] = '<li>';
            $posts[] = '<a href="'. get_permalink($query->post->ID) .'">'. $query->post->post_title . '</a>';
        $posts[] = '</li>';

        if($index === 3){

                $posts[] = '</ul>';
            $posts[] = '</div>';

            $index = 0;
        }
        $index++;
    }
    if($index !== 3 && count($query->posts) > 0){
            $posts[] = '</ul>';
        $posts[] = '</div>';
    }
    if(!$posts){
        $posts[] = 'empty';
    }

    $result = array(
        'posts' => implode(' ', $posts),
    );

    echo json_encode($result);
    die();
}

function search_info_mb(){
    $text = $_POST['text'];
    $query = new WP_Query( array(
        's'         => $text,
        'exact'     => false,
        'sentence'  => false,
    ));
//    $posts = query_posts( array(
//        's'         => $text,
//        'exact'     => false,
//    ));
    $posts = array();
    while($query->have_posts()){

        $query->the_post();
//        echo $query->post->post_title . "\r\n";
        $posts[] = '<li class="js-clone-menu-mb">';
        $posts[] =     '<a href="'. get_permalink($query->post->ID) .'">'. $query->post->post_title . '</a>';
        $posts[] = '</li>';

    }
    if(!$posts){
//        echo 'empty';
        $posts[] = 'empty';
    }

    $result = array(
        'posts' => implode(' ', $posts),
    );

    echo json_encode($result);
    die();
}