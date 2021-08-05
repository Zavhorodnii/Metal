<?php
/*
 * Template Name: gallery
 *
 */
get_header();
?>


<section class="section-work section_pad-top section_mar-bot">
    <div class="container">

        <?php
        if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs();
        ?>

        <div class="section__row-top">
            <h2 class="title-section"> <?php echo get_field('add_page_title'); ?>
                <span class="icon-title">
                            <svg class="svg-icon icon-ok">
                                <g fill="none" fill-rule="evenodd">
                                    <path d="M0 0L24 0 24 24 0 24z" transform="translate(-2 -2)"/>
                                    <path fill="#FFF" d="M18.18 21L16.545 13.971 22 9.244 14.809 8.627 12 2 9.191 8.627 2 9.244 7.455 13.971 5.82 21 12 17.272z" transform="translate(-2 -2)"/>
                                </g>
                            </svg>
                        </span>
            </h2>
            <a href="popup-1" class="sectop__link col-fil js-btn-popup">Подписаться на рассылку акций</a>
        </div>




        <?php
            $query = get_posts( array(
                'post_type'=>'gallery'
            ));
            $images = get_field('images',$query[0]->ID);
        ?>

        <div class="section__tabs">
            <?php
//            var_export($query);
            $index = 0;
            foreach($query as $value){
                ?>
                <a href="<? echo get_permalink($value->ID) ?>" class="section__tabs_tab <?php echo $index === 0 ? 'active' : '';?>"><? echo $value->post_title ;?></a>
                <?
                $index++;
            }
            ?>
        </div>

        <div class="section__tabs-mob">
            <div class="select-site js-select-site">
                <div class="select-site__main js-main-sel" data-value="-1">
                    <span class="js-select-main">Выбрать категорию</span>
                    <i class="select-icons icon-arrow-grey">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <g fill-rule="evenodd">

                                <path  d="M21 11L6.83 11 10.41 7.41 9 6 3 12 9 18 10.41 16.59 6.83 13 21 13z" transform="matrix(-1 0 0 1 24 0)"/>
                            </g>
                        </svg>
                    </i>
                </div>
                <div class="select-site__lisp js-select-lisp">
                    <?php
                    foreach($query as $value){
                        ?>
                        <a href="<? echo get_permalink($value->ID) ?>" class="select-site__option js-select-option" data-value="1"><? echo $value->post_title ;?></a>
                        <?
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="wrapp-lideshow">
            <div class="slideshow">

                <div class="slideshow__gallery swiper-container js-gallery">
                    <div class="slideshow__gallery-wrap swiper-wrapper">

                        <?
                        $index = 1;
                        foreach($images as $image){
                            ?>
                            <div class="slideshow__gallery-slide  js-swiper-slide  swiper-slide" data-id-slider="<? echo $index; ?>">
                                <img src="<? echo $image['image']['url']; ?>" alt="img">
                            </div>
                            <?
                            $index++;
                        }
                        ?>
                    </div>
                </div>

                <div class="slideshow__thumbs">
                    <div class="slideshow__thumbs-text"><?php echo count($images)?> фотографии этой категории:</div>
                    <div class="swiper-container js-thumbs">
                        <div class="slideshow__thumbs-wrap swiper-wrapper">

                            <?
                            foreach($images as $image){
                                ?>
                                <div class="slideshow__thumbs-slide  swiper-slide">
                                    <img src="<? echo $image['image']['url']; ?>" alt="img">
                                </div>
                                <?
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="slideshow__bottom">
                <div class="slideshow__bottom_col">
                    <span class="js-col-number"> 1 </span> из <span><?php echo count($images)?></span> фотографий
                </div>
                <div class="slideshow__bottom_btn">
                    <div class="swiper-button-prev js-slideshow-arrow slideshow-arrow">
                        <svg>
                            <path fill="#161616"
                                  d="M49 25.667L15.937 25.667 24.29 17.29 21 14 7 28 21 42 24.29 38.71 15.937 30.333 49 30.333z"
                                  transform="translate(-7 -14)" />
                        </svg>
                    </div>
                    <div class="swiper-button-next js-slideshow-arrow slideshow-arrow">
                        <svg>
                            <path fill="#161616"
                                  d="M49 25.667L15.937 25.667 24.29 17.29 21 14 7 28 21 42 24.29 38.71 15.937 30.333 49 30.333z"
                                  transform="matrix(-1 0 0 1 49 -14)" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapp-lideshow-mobile">
            <div class="content-lidesshop-mobile js-slidesshop-mobile">

                <div class="content-lidesshop-mobile__items js-content-lidesshop-mobile__items" data-slick-mob="0">
                    <?
                    $index = 0;
                    foreach($images as $image){
                        if($index > 3)
                            break;
                        ?>
                        <div class="lidesshop-mobile__itemm" data-slick-it="1">
                            <img src="<? echo $image['image']['url']; ?>" alt="img">
                        </div>
                        <?
                        $index++;
                    }
                    ?>

                </div>

                <div class="content-lidesshop-mobile__items js-content-lidesshop-mobile__items" data-slick-mob="1">
                    <?
                    $index = 0;
                    foreach($images as $image){
                        if($index < 4) {
                            $index++;
                            continue;
                        }
                        ?>
                        <div class="lidesshop-mobile__itemm" data-slick-it="1">
                            <img src="<? echo $image['image']['url']; ?>" alt="img">
                        </div>
                        <?
                        $index++;
                    }
                    ?>

                </div>

            </div>
            <div class="lideshow-mobile__arrow">
                <div class="arrow-lideshow-mobile arrow-lideshow-mobile-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="22" viewBox="0 0 34 22">
                        <g fill="none" fill-rule="evenodd">
                            <path d="M0 0L44 0 44 44 0 44z" transform="translate(-5 -11)"/>
                            <path fill="#161616" d="M38.5 20.167L12.522 20.167 19.085 13.585 16.5 11 5.5 22 16.5 33 19.085 30.415 12.522 23.833 38.5 23.833z" transform="translate(-5 -11)"/>
                        </g>
                    </svg>
                </div>
                <div class="lideshow-mobile-col"><span class="js-col-img-mob"><?php echo count($images) < 4 ? count($images) : 4 ?></span> из <span><?php echo count($images)?></span> фотографий</div>
                <div class="arrow-lideshow-mobile arrow-lideshow-mobile-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="22" viewBox="0 0 34 22">
                        <g fill="none" fill-rule="evenodd">
                            <path d="M0 0L44 0 44 44 0 44z" transform="matrix(-1 0 0 1 39 -11)"/>
                            <path fill="#161616" d="M38.5 20.167L12.522 20.167 19.085 13.585 16.5 11 5.5 22 16.5 33 19.085 30.415 12.522 23.833 38.5 23.833z" transform="matrix(-1 0 0 1 39 -11)"/>
                        </g>
                    </svg>
                </div>
            </div>
        </div>

    </div>

    </div>
    </div>

</section>
<?php
get_footer();
?>
