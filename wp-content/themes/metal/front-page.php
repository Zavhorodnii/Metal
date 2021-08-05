<?php get_header() ?>

    <sction class="main-screen">
        <div class="container">
            <div class="main-screen__content">
                <div class="main-screen__subtitle"><span>
                        <?php echo get_post_meta(get_the_ID(), 'above_title', true) ?>
                    </span></div>

                <h1 class="title-stie-h1"><?php echo get_post_meta(get_the_ID(), 'title_name', true);?></h1>
                <div class="main-screen_wrapp-bnt">
                    <a href="popup-0" class="btn main-screen_btn js-btn-popup">Оставить заявку</a>
                </div>
                <div class="main__wrapp-file">
                    <input type="file" class="main__screen-file">
                    <div class="main__screen-file_item">
                        <p class="main__screen-file_text">Загрузите сюда ваши чертежи и файлы для изготовления или
                            расчета стоимости заказа и они автоматически загрузятся в форму заявки</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="main-screen__wrapp-slide">
            <div class="main-screen__slider js-main-slider">
                <div class="js-swiper-main swiper-container">
                    <div class="swiper-wrapper">

                        <?php
                        // задаем нужные нам критерии выборки данных из БД
                        $args = array(
                            'posts_per_page' => 10,
                            'post_type'      => 'post',
                        );

                        $query = new WP_Query( $args );
//                        var_export($query);

                        // Возвращаем оригинальные данные поста. Сбрасываем $post.

                        ?>

                        <?php
                        if ( $query->have_posts() ) {
                            $first = true;
                            while ( $query->have_posts() ) {
                                $query->the_post();
                                ?>
                                <div class="main-screen-slider-item
                                 <?php
                                    if ($first){
                                        ?>
                                        main-screen-slider-item-1
                                        <?php
                                        $first = false;
                                    }
                                ?>
                                 swiper-slide">
                                    <div>
                                        <div class="slider-item__top">
                                            <span><?php the_time( 'j F'); ?></span>
                                            <a href="<?php the_permalink(); ?>" class="slider-item__top_img">
                                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="img">
                                            </a>
                                        </div>
                                        <p class="slider-item__text"><?php echo get_the_title(); ?></p>
                                    </div>
                                    <div class="slider-item__bot">
                                        <a href="<?php the_permalink(); ?>" class="slider-item_link">
                                            <span>Читать</span>
                                            <svg class="svg-icon icon-arrows">
                                                <path fill="#61B986"
                                                      d="M17.5 9.167L5.692 9.167 8.675 6.175 7.5 5 2.5 10 7.5 15 8.675 13.825 5.692 10.833 17.5 10.833z"
                                                      transform="matrix(-1 0 0 1 18 -5)" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </sction>

    <section class="advantages section_pad-top">
        <div class="container">
            <div class="advantages__crumbs"><a href="#">Главная</a></div>
            <div class="section__row-top">
                <h2 class="title-section"><?php echo get_post_meta(get_the_ID(), 'title_section', true) ?><span class="icon-title">
                            <svg class="svg-icon icon-ok">
                                <use xlink:href="#icon-ok"></use>
                            </svg>
                        </span>
                </h2>
                <a href="popup-1" class="sectop__link col-fil js-btn-popup">Подписаться на рассылку акций</a>
            </div>
            <div class="section__row-text">
                <span><?php echo get_post_meta(get_the_ID(), 'description_section', true) ?></span>
            </div>
            <?php $value = get_field( "our_advantage" );?>
            <div class="advantages__row">
                <div class="advantages__item advantages__item-1 advantages__item_text-right">
                    <div>
                        <div class="advantages__item_title">
                            <span class="
                                <?php
                                    echo ($value[0]['icon']=='icon_settings') ? 'icon-bef-settings' : 'icon-bef-ok'
                                ?>
                            "><?php echo $value[0]['title'];?></span>
                        </div>
                        <?php if($value[0]['description']){
                        ?>
                            <p class="advantages__item_text"><?php echo $value[0]['description'];?></p>
                        <?php
                        } ?>
                    </div>
                </div>
                <div class="advantages__item advantages__item-2 advantages__item_text-left">
                    <div>
                        <div class="advantages__item_title">
                            <span class="
                                <?php
                                    echo ($value[1]['icon']=='icon_settings') ? 'icon-bef-settings' : 'icon-bef-ok'
                                ?>
                            "><?php echo $value[1]['title'];?></span>
                        </div>
                        <?php if($value[1]['description']){
                            ?>
                            <p class="advantages__item_text"><?php echo $value[1]['description'];?></p>
                            <?php
                        } ?>
                    </div>
                </div>
                <div class="advantages__item advantages__item-3 advantages__item_text-left">
                    <div>
                        <div class="advantages__item_title">
                            <span class="
                                <?php
                                    echo ($value[2]['icon']=='icon_settings') ? 'icon-bef-settings' : 'icon-bef-ok'
                                ?>
                            "><?php echo $value[2]['title'];?></span>
                        </div>
                        <?php if($value[2]['description']){
                            ?>
                            <p class="advantages__item_text"><?php echo $value[2]['description'];?></p>
                            <?php
                        } ?>
                    </div>
                </div>
                <div class="advantages__item advantages__item-4 advantages__item_text-left">
                    <div>
                        <div class="advantages__item_title">
                            <span class="
                                <?php
                                    echo ($value[3]['icon']=='icon_settings') ? 'icon-bef-settings' : 'icon-bef-ok'
                                ?>
                            "><?php echo $value[3]['title'];?></span>
                        </div>
                        <?php if($value[3]['description']){
                            ?>
                            <p class="advantages__item_text"><?php echo $value[3]['description'];?></p>
                            <?php
                        } ?>
                    </div>
                </div>
                <div class="advantages__item advantages__item-5 advantages__item_text-left">
                    <div>
                        <div class="advantages__item_title">
                            <span class="
                                <?php
                                    echo ($value[4]['icon']=='icon_settings') ? 'icon-bef-settings' : 'icon-bef-ok'
                                ?>
                            "><?php echo $value[4]['title'];?></span>
                        </div>
                        <?php if($value[4]['description']){
                            ?>
                            <p class="advantages__item_text"><?php echo $value[4]['description'];?></p>
                            <?php
                        } ?>
                    </div>
                </div>
                <div class="advantages__item advantages__item-6 advantages__item_text-left">
                    <div>
                        <div class="advantages__item_title">
                            <span class="
                                <?php
                                    echo ($value[5]['icon']=='icon_settings') ? 'icon-bef-settings' : 'icon-bef-ok'
                                ?>
                            "><?php echo $value[5]['title'];?></span>
                        </div>
                        <?php if($value[5]['description']){
                            ?>
                            <p class="advantages__item_text"><?php echo $value[5]['description'];?></p>
                            <?php
                        } ?>
                    </div>
                </div>
                <div class="advantages__item advantages__item-7 advantages__item_text-left">
                    <div>
                        <div class="advantages__item_title">
                            <span class="
                                <?php
                                    echo ($value[6]['icon']=='icon_settings') ? 'icon-bef-settings' : 'icon-bef-ok'
                                ?>
                            "><?php echo $value[6]['title'];?></span>
                        </div>
                        <?php if($value[6]['description']){
                            ?>
                            <p class="advantages__item_text"><?php echo $value[6]['description'];?></p>
                            <?php
                        } ?>
                    </div>
                </div>
            </div>
    </section>

<?php
// задаем нужные нам критерии выборки данных из БД
$args = array(
    'posts_per_page' => -1,
    'post_type'      => 'service',
);

$query = new WP_Query( $args );
//var_export($query);

// Возвращаем оригинальные данные поста. Сбрасываем $post.
wp_reset_postdata();
?>

    <section class="servise section_pad-top section_mar-bot" id="serv">
        <a href="#serv" class="icon-arros-ser"></a>
        <div class="container">
            <div class="section__row-top">
                <h2 class="title-section">Наши услуги</h2>
                <a href="#" class="sectop__link col-fil">Подписаться на рассылку акций</a>
            </div>

            <div class="section__tabs-mob">
                <div class="select-site js-select-site">
                    <div class="select-site__main js-main-sel" data-value="-1">
                        <span class="js-select-main">Выбрать категорию</span>
                        <i class="select-icons icon-arrow-grey">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g fill-rule="evenodd">

                                    <path d="M21 11L6.83 11 10.41 7.41 9 6 3 12 9 18 10.41 16.59 6.83 13 21 13z"
                                          transform="matrix(-1 0 0 1 24 0)" />
                                </g>
                            </svg>
                        </i>
                    </div>
                    <div class="select-site__lisp js-select-lisp">

                        <?php
                            if ( $query->have_posts() ) {
                                while ( $query->have_posts() ) {
                                    $query->the_post();
                                    ?>
                                    <div class="select-site__option js-select-option" data-value="<?php echo get_the_ID(); ?>">
                                        <?php echo get_the_title(); ?>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>

            <div class="servise__row js-servise__row">

                <?php
                if ( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        ?>
                        <div class="servise__item js-servise-item" data-id-servise="<?php echo get_the_ID(); ?>">
                            <div>
                                <div class="servise__item_top">
                                    <div class="servise__item_title"><?php echo get_the_title(); ?></div>
                                    <div class="servise__item_icon"><img src="
                                    <?php echo wp_get_attachment_url(get_post_meta(get_the_ID(), 'icon_service_post', true)); ?>
                                    " alt="img"></div>
                                </div>
                                <p class="servise__item_text"><?php echo get_field('additional_tile_text') ?></p>
                            </div>
                            <div class="servise__item_bot">
                                <a href="<?php the_permalink(); ?>" class="servise__item_link">
                                    <span>Посмотреть цену</span>
                                    <span class="servise__item_icons">
                                    <svg>
                                        <path d="M21 11L6.83 11 10.41 7.41 9 6 3 12 9 18 10.41 16.59 6.83 13 21 13z"
                                              transform="matrix(-1 0 0 1 24 0)" />
                                    </svg>
                                </span>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="servise__item servise__item-btn">
                    <div class="servise__item_row-btn">
                        <a href="popup-4" class="btn btn-arrow js-btn-popup">
                            <span>Быстрая заявка на расчет</span>
                            <svg>
                                <path d="M21 11L6.83 11 10.41 7.41 9 6 3 12 9 18 10.41 16.59 6.83 13 21 13z"
                                      transform="matrix(-1 0 0 1 24 0)"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="servise__item_row-btn">
                        <a href="popup-0" class="btn btn-grad-black btn-arrow js-btn-popup">
                            <span>Перезвоните мне</span>
                            <svg>
                                <path d="M21 11L6.83 11 10.41 7.41 9 6 3 12 9 18 10.41 16.59 6.83 13 21 13z"
                                      transform="matrix(-1 0 0 1 24 0)"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="lideshow-mobile__arrow">
                <div class="arrow-lideshow-mobile arrow-lideshow-mobile-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="22" viewBox="0 0 34 22">
                        <g fill="none" fill-rule="evenodd">
                            <path d="M0 0L44 0 44 44 0 44z" transform="translate(-5 -11)" />
                            <path fill="#161616"
                                  d="M38.5 20.167L12.522 20.167 19.085 13.585 16.5 11 5.5 22 16.5 33 19.085 30.415 12.522 23.833 38.5 23.833z"
                                  transform="translate(-5 -11)" />
                        </g>
                    </svg>
                </div>
                <div class="lideshow-mobile-col"><span class="js-col-item-mob">1</span> из <span>21</span>
                </div>
                <div class="arrow-lideshow-mobile arrow-lideshow-mobile-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="22" viewBox="0 0 34 22">
                        <g fill="none" fill-rule="evenodd">
                            <path d="M0 0L44 0 44 44 0 44z" transform="matrix(-1 0 0 1 39 -11)" />
                            <path fill="#161616"
                                  d="M38.5 20.167L12.522 20.167 19.085 13.585 16.5 11 5.5 22 16.5 33 19.085 30.415 12.522 23.833 38.5 23.833z"
                                  transform="matrix(-1 0 0 1 39 -11)" />
                        </g>
                    </svg>
                </div>
            </div>

            <div class="mob-servise-btn servise__item-btn">
                <div class="servise__item_row-btn">
                    <a href="#" class="btn btn-arrow">
                        <span>Быстрая заявка на расчет</span>
                        <svg>
                            <path d="M21 11L6.83 11 10.41 7.41 9 6 3 12 9 18 10.41 16.59 6.83 13 21 13z"
                                  transform="matrix(-1 0 0 1 24 0)"></path>
                        </svg>
                    </a>
                </div>
                <div class="servise__item_row-btn">
                    <a href="popup-0" class="btn btn-grad-black btn-arrow js-btn-popup">
                        <span>Перезвоните мне</span>
                        <svg>
                            <path d="M21 11L6.83 11 10.41 7.41 9 6 3 12 9 18 10.41 16.59 6.83 13 21 13z"
                                  transform="matrix(-1 0 0 1 24 0)"></path>
                        </svg>
                    </a>
                </div>
            </div>

    </section>

    <?php get_footer(); ?>