<?php

add_action('wp_ajax_equipment_select', 'equipment_select');
add_action('wp_ajax_nopriv_equipment_select', 'equipment_select');

function equipment_select(){

    if (!$_POST['id_menu'] || !$_POST['id_post']){
        $result = array(
            'result' => 'error'
        );
        var_export($result);
        die();
    }

    $id_menu = $_POST['id_menu'];
    $id_post = $_POST['id_post'];

    $machine_type = array();

    $posts = get_posts( array(
        'tax_query' => array(
            array(
                'taxonomy' => 'equipment',
                'field'    => 'id',
                'terms'    => array( $id_menu )
            )
        ),
        'post_type' => 'equipment',
        'posts_per_page' => -1
    ) );

    $type = array();

    foreach( $posts as $pst ){
        $post = array();

        if($id_post == 'first')
            $id_post =  $pst->ID;

        $post['id'] = $pst->ID;
        $post['post_title'] = $pst->post_title;
        $post['img'] = get_the_post_thumbnail_url($pst->ID);
        $post['post_content'] = $pst->post_content;
        $post['title_equipment'] = get_field('title_equipment', $pst->ID);
        $post['table_specification'] = get_field('table_specification', $pst->ID);

        $type[$pst->ID] = $post;
    }
    $machine_type[$id_menu] = $type;

    $id_post = intval($id_post);

    $page[] = '<div class="section-equipment__items js-product js-derele-block">';
        $page[] =    '<div class="section-equipment__item-product">';
            $page[] =    '<h2 class="section-equipment__title">' . $machine_type[$id_menu][$id_post]['title_equipment'] . '</h2>';
            $page[] =    '<div class="section-equipment__row">';
                $page[] =    '<div class="section-equipment__img">';
                    $page[] =   '<img src="' . $machine_type[intval($id_menu)][intval($id_post)]['img'] . '" alt="img">';
                $page[] =    '</div>';
                $page[] =    '<div class="section-equipment__info">';
                    $page[] =    '<p class="section-equipment__text">' . $machine_type[intval($id_menu)][intval($id_post)]['post_content'] . '</p>';
                    $page[] =    '<div class="section-equipment__characterisc">';
                        $page[] =    '<div class="section-equipment__lisp">';
                            foreach ( $machine_type[intval($id_menu)][intval($id_post)]['table_specification'] as $specifications ){
                                $page[] =    '<p class="section-equipment__subtitle">' . $specifications['title_table'] . '</p>';
                                $page[] =    '<p class="section-equipment__about">' . $specifications['description_table'] . '</p>';
                                foreach ( $specifications['specifications'] as $specification ){
                                    $page[] =   '<div class="section-equipment__lisp_item">';
                                        $page[] =   '<div class="section-equipment__start-name">' . $specification['description'] . '</div>';
                                        $page[] =   '<div class="section-equipment__stat-val"><span>' . $specification['value'] . '</span></div>';
                                    $page[] =   '</div>';
                                }
                            }
                        $page[] =   '</div>';
                    $page[] =    '</div>';
                    $page[] =   '<button class="btn btn-quiment js-quipment">Все характеристики</button>';
                $page[] =    '</div>';
            $page[] =   '</div>';
        $page[] =   '</div>';
        $page[] =   '<div class="section-equipment__more-product">';
            $page[] =   '<div class="more-product__title"> Оборудование этой категории:</div>';
            $page[] =   '<div class="section-equipment__itemss">';
                foreach($machine_type[intval($id_menu)] as $block){
                    if ($block['id'] == $id_post) {
                        continue;
                    }
                        $page[] =   '<div class="more-product__item js-product-tab">';
                            $page[] =   '<div class="more-product__img">';
                                $page[] =   '<img src="' . $block['img'] . '" alt="img">';
                            $page[] =   '</div>';
                        $page[] =   '<div class="more-product-items">';
                            $page[] =   '<div class="more-product__text js-change-link js-change-post" data-js_link_post="' . $block['id'] . '">' . $block['title_equipment'] . '</div>';
                                $page[] =   '<a class="js-change-link js-change-post" data-js_link_post="' . $block['id'] . '" href="#">Смотреть</a>';
                            $page[] =   '</div>';
//                            $page[] =   '<a href="#"></a>';
                        $page[] =   '</div>';
                }
            $page[] =   '</div>';
        $page[] =   '</div>';
    $page[] =   '</div>';

    $result = array(
      'html' => implode(' ', $page),
    );

//    echo $sdfsdf;
//    echo implode(' ', $page);
//    var_export($machine_type);
//    var_export($type);
//    var_export($page);
//    var_export($sdfsdf);
//    var_export($machine_type);
    echo json_encode($result);
    die();
}