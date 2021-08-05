<?php

// хук для регистрации
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

    // список параметров: wp-kama.ru/function/get_taxonomy_labels
    register_taxonomy( 'equipment', [ 'equipment' ], [
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => [
            'name'              => 'Тип оборудования',
            'singular_name'     => 'Тип оборудования',
            'search_items'      => 'Найти тип оборудование',
            'all_items'         => 'Все типы оборудования',
            'view_item '        => 'Посмотреть типы оборудования',
            'parent_item'       => 'Родительский тип оборудования',
            'parent_item_colon' => 'Родительский тип оборудования:',
            'edit_item'         => 'Добавить тип оборудования',
            'update_item'       => 'Обновить тип оборудования',
            'add_new_item'      => 'Добавить новый тип оборудования',
            'new_item_name'     => 'Название нового типа оборудования',
            'menu_name'         => 'Тип оборудования',
        ],
        'description'           => '', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => false, // равен аргументу public
        // 'show_in_nav_menus'     => true, // равен аргументу public
        // 'show_ui'               => true, // равен аргументу public
        // 'show_in_menu'          => true, // равен аргументу show_ui
        // 'show_tagcloud'         => true, // равен аргументу show_ui
        // 'show_in_quick_edit'    => null, // равен аргументу show_ui
        'hierarchical'          => true,

        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        // '_builtin'              => false,
        //'update_count_callback' => '_update_post_term_count',
    ] );

    // список параметров: wp-kama.ru/function/get_taxonomy_labels
    register_taxonomy( 'taxonomy_gallery', [ 'gallery' ], [
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => [
            'name'              => 'Вид производства',
            'singular_name'     => 'Вид производства',
            'search_items'      => 'Найти вид производства',
            'all_items'         => 'Все виды производства',
            'view_item '        => 'Посмотреть виды производства',
            'parent_item'       => 'Родительский вид производства',
            'parent_item_colon' => 'Родительский вид производства:',
            'edit_item'         => 'Добавить вид производства',
            'update_item'       => 'Обновить вид производства',
            'add_new_item'      => 'Добавить новый вид производства',
            'new_item_name'     => 'Название нового вида производства',
            'menu_name'         => 'Вид производства',
        ],
        'description'           => '', // описание таксономии
        'public'                => true,
        // 'publicly_queryable'    => null, // равен аргументу public
        // 'show_in_nav_menus'     => true, // равен аргументу public
        // 'show_ui'               => true, // равен аргументу public
        // 'show_in_menu'          => true, // равен аргументу show_ui
        // 'show_tagcloud'         => true, // равен аргументу show_ui
        // 'show_in_quick_edit'    => null, // равен аргументу show_ui
        'hierarchical'          => true,

        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        'sort'                  => false,
        // '_builtin'              => false,
        //'update_count_callback' => '_update_post_term_count',
    ] );
}