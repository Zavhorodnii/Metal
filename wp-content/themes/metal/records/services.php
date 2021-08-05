<?php

add_action('init', 'my_custom_init');

add_theme_support( 'post-thumbnails', array( 'equipment' ) );

function my_custom_init(){
    register_post_type('service', array(
        'labels'             => array(
            'name'               => 'Услуги', // Основное название типа записи
            'singular_name'      => 'Услуга', // отдельное название записи типа Book
            'add_new'            => 'Добавить услугу',
            'add_new_item'       => 'Добавить новую услугу',
            'edit_item'          => 'Редактировать услуги',
            'new_item'           => 'Новая услуга',
            'view_item'          => 'Посмотреть услуги',
            'search_items'       => 'Найти услуги',
            'not_found'          =>  'Услуг не найдены',
            'not_found_in_trash' => 'В корзине услуги не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Услуги'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
    ) );

    register_post_type('equipment', array(
        'labels'             => array(
            'name'               => 'Обородувание', // Основное название типа записи
            'singular_name'      => 'Оборудование', // отдельное название записи типа Book
            'add_new'            => 'Добавить оборудование',
            'add_new_item'       => 'Добавить новое оборудование',
            'edit_item'          => 'Редактировать оборудование',
            'new_item'           => 'Новое оборудование',
            'view_item'          => 'Посмотреть оборудования',
            'search_items'       => 'Найти оборудование',
            'not_found'          =>  'Оборудования не найдены',
            'not_found_in_trash' => 'В корзине оборудование не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Оборудование'

        ),
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
    ) );

    register_post_type('gallery', array(
        'labels'             => array(
            'name'               => 'Галерея', // Основное название типа записи
            'singular_name'      => 'Галерея', // отдельное название записи типа Book
            'add_new'            => 'Добавить галерею',
            'add_new_item'       => 'Добавить новую галерею',
            'edit_item'          => 'Редактировать галерею',
            'new_item'           => 'Новая галерея',
            'view_item'          => 'Посмотреть галерею',
            'search_items'       => 'Найти галерею',
            'not_found'          => 'Галерея не найдена',
            'not_found_in_trash' => 'В корзине галерея не найдена',
            'parent_item_colon'  => '',
            'menu_name'          => 'Галерея'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array('title','editor','author','thumbnail','excerpt','comments'),
        'menu_icon'          => 'dashicons-format-image',
    ) );

    register_post_type('orders', array(
        'labels'             => array(
            'name'               => 'Заявки', // Основное название типа записи
            'singular_name'      => 'Заявки', // отдельное название записи типа Book
            'add_new'            => 'Добавить заявку',
            'add_new_item'       => 'Добавить новую заявку',
            'edit_item'          => 'Редактировать заявку',
            'new_item'           => 'Новая заявка',
            'view_item'          => 'Посмотреть заявку',
            'search_items'       => 'Найти заявки',
            'not_found'          => 'Заявка не найдена',
            'not_found_in_trash' => 'В корзине заявку не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Заявки'

        ),
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-bell',
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
    ) );

    register_post_type('newsletter', array(
        'labels'             => array(
            'name'               => 'Рассылки', // Основное название типа записи
            'singular_name'      => 'Рассылки', // отдельное название записи типа Book
            'add_new'            => 'Добавить рассылку',
            'add_new_item'       => 'Добавить новую рассылку',
            'edit_item'          => 'Редактировать рассылки',
            'new_item'           => 'Новая рассылка',
            'view_item'          => 'Посмотреть рассылки',
            'search_items'       => 'Найти рассылки',
            'not_found'          => 'Рассылка не найдена',
            'not_found_in_trash' => 'В корзине рассылок не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Рассылки'

        ),
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-buddicons-pm',
        'hierarchical'       => false,
        'menu_position'      => 6,
        'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
    ) );
}

add_theme_support( 'post-thumbnails', array( 'service', 'gallery', ) );