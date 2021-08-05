<?php
/**
 * Template Name: service
 *
 */
get_header(); ?>

<section class="servise section_pad-top section_mar-bot">
    <div class="container">

        <?php
        if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs();
        ?>

        <div class="section__row-top">
            <h2 class="title-section">Наши услуги</h2>
            <a href="popup-1" class="sectop__link col-fil js-btn-popup">Подписаться на рассылку акций</a>
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
                <?php
                    $params = array(
                        'posts_per_page' => -1,
                        'post_type'      => 'service',
                    );
                    $recent_posts_array = get_posts( $params );
                ?>
                <div class="select-site__lisp js-select-lisp">
                    <?php

                        foreach($recent_posts_array as $item){
                            ?>
                            <div class="select-site__option js-select-option" data-value="<?php echo $item->ID ?>"><?php echo $item->post_title; ?></div>
                            <?php
                        }

                    ?>
                </div>
            </div>
        </div>


        <div class="servise__row js-servise__row">

            <?php
                $index = 0;
                foreach($recent_posts_array as $item){
                    ?>
                    <div class="servise__item js-servise-item" data-id-servise="<?php echo $index+1; ?>">
<!--                    <div class="servise__item js-servise-item" data-id-servise="--><?php //echo $item->ID ?><!--">-->
                        <div>
                            <div class="servise__item_top">
                                <div class="servise__item_title"><?php echo $item->post_title; ?></div>
                                <div class="servise__item_icon"><img src="<?php echo get_field('icon_service_post', $item->ID)['url']; ?>" alt="img"></div>
                            </div>
                            <p class="servise__item_text"><?php echo get_field('additional_tile_text', $item->ID); ?></p>
                        </div>
                        <div class="servise__item_bot">
                            <a href="<?php echo get_post_permalink($item->ID); ?>" class="servise__item_link">
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
//                    echo $item->ID . ' | ';
                    $index++;
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
            <div class="lideshow-mobile-col"><span class="js-col-item-mob">1</span> из <span><?php echo count($recent_posts_array); ?></span>
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

</section>

<?php
get_footer();
?>
