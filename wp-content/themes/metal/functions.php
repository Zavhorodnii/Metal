<?php

require_once get_template_directory() . '/records/records.php';
require_once get_template_directory() . '/ajax/ajax.php';
require_once get_template_directory() . '/ajax/ajax_search.php';
require_once get_template_directory() . '/ajax/ajax_equipment.php';
require_once 'breadcrumb.php';

add_action('wp_enqueue_scripts', 'header_style');
add_action('get_footer', 'footer_style');

add_theme_support( 'post-thumbnails', array( 'post', 'page', ) );

register_nav_menus(array(
    'top_menu_location'    => 'Верхнее меню',    //Название месторасположения меню в шаблоне
    'main_menu'    => 'Главное меню',    //Название месторасположения меню в шаблоне
));

function header_style(){
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');
}

function footer_style(){
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/libs/jquery/jquery.min.js');
    wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/libs/swiper-slick/js/swiper.min.js');
    wp_enqueue_script('slick', get_template_directory_uri(). '/assets/libs/slick/slick.min.js');
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js');
}

/*
* Добавляем выпадающее меню в визуальный редактор
*/
function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');
/*
* Функция вызова фильтра для настроек MCE
*/
function my_mce_before_init_insert_formats( $init_array ) {
// Определяем массив style_formats
    $style_formats = array(
// Каждый дочерний элемент — формат со своими собственными настройками
        array(
            'title' => 'Боковая полоса',
            'block' => 'span',
            'classes' => 'span',
            'wrapper' => true,
        ),
    );
// Вставляем массив, JSON ENCODED, в 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );
    return $init_array;
}
// Прикрепляем вызов к 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

if( !function_exists('_add_my_quicktags') ){
    function _add_my_quicktags()
    { ?>
        <script type="text/javascript">
            QTags.addButton( 'span', 'span', '<span>', '</span>', '', 'Добавление боковой полосы', 1 );
        </script>
    <?php }
    add_action('admin_print_footer_scripts', '_add_my_quicktags');
}

add_filter( 'excerpt_length', function(){
    return 15;
} );