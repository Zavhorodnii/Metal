<?php
/*
 * Template Name: news
 */
get_header();
?>
    <section class="servise section_pad-top section_mar-bot">
    <div class="container">

        <?php
        if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs();
        ?>

        <div class="section__row-top">
            <h2 class="title-section"><?php echo get_field('page_title', 'option') ;?></h2>
        </div>
    </div>

    <div class="wr-news">
        <div class="container">
            <div class="wr-news__row">
                <div class="wr-news__main">
                    <?php
                    $query = get_posts( array(
                        'post_type'=>'post'
                    ));
                    ?>
                    <div class="news__items js-in-aside">
                        <?php
                        $index = 0;
                        foreach($query as $post){
                            if($index > 1)
                                break;
                            ?>
                            <div class="new__item">
                                <a href="<?php echo get_permalink($post->ID); ?>" class="new__item--title"><?php echo $post->post_title ;?></a>
                                <div class="new__item--date">Опубликовано <?php echo get_the_date('j.m.Y', $post->ID) ;?></div>
                                <div class="new__item--img">
                                    <a href="#">
                                        <img src="<?php echo get_the_post_thumbnail_url($post->ID) ;?>" alt="img">
                                    </a>
                                </div>
                                <p class="new__item--text"><?php the_excerpt() ;?></p>
                            </div>
                            <?
                            $index++;
                        }
                        ?>

                    </div>
                    <div class="cat-news">
                        <p class="glav-text"><?php echo get_field('page_title', 'option') ;?></p>
                        <?php
                        $index = 0;
                        foreach($query as $post){
                            if($index < 2) {
                                $index++;
                                continue;
                            }
                            ?>
                            <div class="cat-news__item">
                                <div class="cat-news__item--wr">
                                    <div class="cat-news__item--cont">
                                        <a href="<?php echo get_permalink($post->ID); ?>" class="cat-news__item--title"><?php echo $post->post_title ;?></a>
                                        <p class="cat-news__item--text"><?php the_excerpt() ;?></p>
                                    </div>
                                    <div class="cat-news__item--img">
                                        <a href="#">
                                            <img src="<?php echo get_the_post_thumbnail_url($post->ID) ;?>" alt="#">
                                        </a>
                                    </div>
                                </div>
                                <div class="new__item--date">Опубликовано <?php echo get_the_date('j.m.Y', $post->ID) ;?></div>
                            </div>
                            <?
                            $index++;
                        }
                        ?>
                    </div>
                </div>
                <div class="wr-news__aside js-news__aside">
                    <ul class="news__aside--lits">
                        <li>
                            <p class="glav-text"><?php echo get_field('title_right_block', 'option') ;?></p>
                        </li>
                        <?php
                        $hot = get_field('hot_promotion', 'option');
                        if($hot['select_news'][0]){
                            ?>
                            <li>
                                <div class="main-screen-slider-item news__aside-screen">
                                    <div>
                                        <div class="slider-item__top">
                                            <span><?php echo $hot['green_text'] ;?></span>
                                            <i class="slider-item-icon item-icon-ok"></i>
                                        </div>
                                        <p class="slider-item__text"><?php echo $hot['title'] ;?>
                                            <span><?php echo $hot['addition_text'] ;?></span>
                                        </p>
                                    </div>
                                    <div class="slider-item__bot">
                                        <a href="<?php echo get_permalink($hot['select_news'][0]->ID) ;?>" class="slider-item_link">
                                            <span>Смотеть</span>
                                            <svg class="svg-icon icon-arrows">
                                                <path fill="#61B986"
                                                      d="M17.5 9.167L5.692 9.167 8.675 6.175 7.5 5 2.5 10 7.5 15 8.675 13.825 5.692 10.833 17.5 10.833z"
                                                      transform="matrix(-1 0 0 1 18 -5)" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                        $promotion = get_field('promotion', 'option');
                        if($promotion['select_promotion']){
                            foreach($promotion['select_promotion'] as $value){
                                //                            var_export($value);
                                ?>
                                <li>
                                    <div class="news__aside-item">
                                        <a href="<?php echo get_permalink($value->ID) ;?>" class="news__aside-item--title"><?php echo $value->post_title ;?></a>
                                        <div class="new__item--date">Опубликовано <?php echo get_the_date('j.m.Y', $value->ID) ;?></div>
                                    </div>
                                </li>
                                <?
                            }
                        }
                        ?>
                        <li>
                            <div class="news__aside-item bord-none">
                                <p class="news__aside-item--title"><?php echo get_field('text_following', 'option') ?></p>
                                <div class="news__aside--form">
                                    <form action="" class="js-validate">
                                        <div class="popup-rop-form">
                                            <input type="text" name="email"
                                                   class="site-input popup-input js-email"
                                                   placeholder="Напишите свой E-mail">
                                        </div>
                                        <div class="popup-wrapp-btn">
                                            <button type="submit"
                                                    class="btn btn-popuo-form">Подписаться</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>
<?php
get_footer();
?>
