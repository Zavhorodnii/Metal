<!DOCTYPE html>
<html lang="ru">

<head>
    <title><?php the_title() ?></title>
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/assets/img/icons/favicon.ico'; ?>">

    <?php wp_head(); ?>

</head>

<body>
<!-- ОБОЛОЧКА -->
<div class="wrapper">
    <!-- parallax -->
    <div class="parallax <?php echo is_page_template('price.php') ? '' : 'ibg'; ?> ">
        <?php

        if ( !is_page( array('price', 'contacts',) ) ) {
            ?>
            <img src="<?php echo get_template_directory_uri() . '/assets/img/main-bg.jpg'; ?>" class="none" alt="parallax">
            <?php
        }
        if( is_page( array('contacts',) ) ){
            ?>
            <img src="<? echo get_template_directory_uri() . '/assets' ?> /img/bg-contacts.jpg" class="none" alt="parallax">
            <?
        }

        ?>
    </div>
    <!--end parallax -->
    <!-- header -->
    <header class="header">
        <div class="container">
            <div class="header__row">
                <div class="header__logo">
                    <a href="#" class="heaer__logo-link">
                        <img src="<?php echo get_field('site_logo', 'option')['url']; ?>" alt="logo-site">
                    </a>
                </div>
                <div class="header__burder-menu js-burger">
                    <svg class="svg-icon burger-icon">
                        <g>
                            <path d="M7 42h14v-4.667H7V42zm0-28v4.667h42V14H7zm0 16.333h28v-4.666H7v4.666z"
                                  transform="translate(-7 -14)" />
                            <path d="M0 0L56 0 56 56 0 56z" transform="translate(-7 -14)" />
                        </g>
                    </svg>
                </div>
                <div class="header__wrapp-menu">
                    <nav class="header__nenu">
                        <ul class="header__menu_list">
                            <?php
                            $menu = wp_get_nav_menu_items( 'site_menu') ;

                            foreach ( (array) $menu as $key => $menu_item ){
                                ?>
                                <li class="header__menu_items">
                                    <a href="<? echo $menu_item->url; ?>" class="header__menu_link <?

                                    echo home_url( $wp->request ) . '/' === $menu_item->url ? 'active' : ''

                                    ?>"><? echo $menu_item->title; ?></a>
                                </li>
                                <?
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
                <div class="header__phone">
                    <a href="popup-0" class="phone_link js-btn-popup">
                        <svg class="svg-icon icon-phone">
                            <use xlink:href="#phone"></use>
                        </svg>
                    </a>
                </div>


                <!-- новое -->
                <div class="header__item">
                    <div class="header__cont">
                        <div class="header__cont--item">
                            <a href="tel:79057267617">
                                <svg class="svg-icon icon-phone">
                                    <use xlink:href="#phone"></use>
                                </svg>
                                <span>
                                        <?php the_field('mobile_phone', 'option'); ?>
                                    </span>
                            </a>
                        </div>
                        <div class="header__cont--item">
                            <a href="mailto:info@vseestate.ru">
                                <svg class="svg-icon icon-email">
                                    <use xlink:href="#icons-email"></use>
                                </svg>
                                <span><?php the_field('mail_address', 'option'); ?></span>
                            </a>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </header>
    <!--end header -->