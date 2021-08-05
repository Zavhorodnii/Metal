<?php
/*
 * Template Name: about_us
 */
get_header();
?>
    <section class="servise section_pad-top section_mar-bot">
    <div class="container">

        <?php
        if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs();
        ?>

        <div class="section__row-top">
            <h2 class="title-section"><? echo get_field('add_title_page') ;?></h2>
            <a href="popup-1" class="sectop__link col-fil js-btn-popup">Подписаться на рассылку акций</a>
        </div>

        <div class="wr-col-2">
            <div class="wr-col-2__item-left">
                <div class="wr-treatment">
                    <div class="wr-treatment__content">
                        <!-- первый абзац задан в стилях жирный-->
                        <? the_content() ;?>
                    </div>
                </div>

                <div class="content-site__text">
                    <?php
                    $block_tables = get_field('first_block_tables');
                    foreach($block_tables as $block_table){

                        if($block_table['table']){
                            foreach($block_table['table'] as $block){
                                if($block['title_table']){
                                    ?>
                                    <h2 class="site-title-5"><?php echo $block['title_table']; ?></h2>
                                    <?
                                }
                                if($block['table_fields'] || $block['main_title_block']){
                                    ?>
                                    <div class="content-site__item-form">
                                        <?
                                        if($block['main_title_block']){
                                            ?>
                                            <h3 class="site-title-3"><? echo $block['main_title_block'] ;?></h3>
                                            <?
                                        }
                                        if($block['table_fields']){
                                            foreach($block['table_fields'] as $field){
                                                if($field['title']){
                                                    ?>
                                                    <h4 class="site-title-3"><? echo $field['title'] ;?></h4>
                                                    <?
                                                }
                                                if($field['items']){
                                                    ?>
                                                    <ul class="ul-type-1">
                                                        <?
                                                        foreach($field['items'] as $item){
                                                            ?>
                                                            <li><?echo $item['item'];?></li>
                                                            <?
                                                        }
                                                        ?>
                                                    </ul>
                                                    <?
                                                }
                                                if($field['green_items']['first'] || $field['green_items']['second']){
                                                    ?>
                                                    <div class="wr-col-4">
                                                        <?
                                                        if($field['green_items']['first']){
                                                            ?>
                                                            <ul class="ul-type-2">
                                                                <?
                                                                foreach($field['green_items']['first'] as $item){
                                                                    ?>
                                                                    <li><a href="<?echo $item['link'];?>"><? echo $item['text'];?></a></li>
                                                                    <?
                                                                }
                                                                ?>
                                                            </ul>
                                                            <?
                                                        }
                                                        if($field['green_items']['second']){
                                                            ?>
                                                            <ul class="ul-type-2">
                                                                <?
                                                                foreach($field['green_items']['second'] as $item){
                                                                    ?>
                                                                    <li><a href="<?echo $item['link'];?>"><? echo $item['text'];?></a></li>
                                                                    <?
                                                                }
                                                                ?>
                                                            </ul>
                                                            <?
                                                        }
                                                        ?>
                                                    </div>
                                                    <?
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                    <?
                                }
                            }
                        }
                    }
                    ?>

                    <?php
                    $second_blocks = get_field('second_block_tables');
//                    var_export($second_blocks);
                    foreach($second_blocks as $second_block)
                        if($second_block){
                        ?>
                        <div class="wr-answers">
                            <h2 class="site-title-5"><? echo $second_block['title_table']; ?></h2>
                            <?php
                            if($second_block['block']){
                                foreach($second_block['block'] as $value){
                                    ?>
                                    <div class="answers__item">
                                        <div class="answers__item--title"><? echo $value['title'] ;?></div>
                                        <p class="answers__item--text"><? echo $value['description'] ;?></p>
                                    </div>
                                    <?
                                }
                            }
                            ?>
                        </div>
                        <?
                    }
                    ?>

                    <div class="wr-treatment__btn">
                        <a href="popup-4" class="btn btn-arrow js-btn-popup">
                            <span>Быстрая заявка на расчет</span>
                            <svg>
                                <path d="M21 11L6.83 11 10.41 7.41 9 6 3 12 9 18 10.41 16.59 6.83 13 21 13z"
                                      transform="matrix(-1 0 0 1 24 0)"></path>
                            </svg>
                        </a>
                        <a href="popup-0" class="btn btn-grad-black btn-arrow js-btn-popup">
                            <span>Перезвоните мне</span>
                            <svg>
                                <path d="M21 11L6.83 11 10.41 7.41 9 6 3 12 9 18 10.41 16.59 6.83 13 21 13z"
                                      transform="matrix(-1 0 0 1 24 0)"></path>
                            </svg>
                        </a>
                    </div>
                    <?php
                    $privacy = get_field('privacy_policy');
                    if( $privacy ){
                        ?>
                        <div class="content-text-info">
                            <?
                            if($privacy['title']){ ?>
                                <h3 class="site-title-3"><?php echo $privacy['title'];?></h3>
                                <?
                            }
                            if($privacy['description']){
                                echo $privacy['description'];
                            }
                            if($privacy['strong_text']){
                                ?>
                                <h4 class="site-title-3"><? echo $privacy['strong_text'] ;?></h4>
                                <?
                            }
                            ?>
                        </div>
                        <?
                    }
                    ?>
                </div>
            </div>
            <div class="wr-col-2__item-right">
                <div class="section-contact__adress section-contact__adress_dop section-contact__adress_dop-mob">


                    <?
                    $addition_information = get_field('addition_information', 'option');
                    if($addition_information)
                        foreach($addition_information as $information){
                            ?>
                            <div class="adress__items">
                                <div class="adress__text"><? echo $information['title'] ;?></div>
                                <?
                                if($information['description']){
                                    foreach($information['description'] as $info){
                                        ?>
                                        <div class="adress__item">
                                            <?
                                            if($info['icon'])
                                                switch($info['icon']){
                                                    case 'business_card':
                                                        ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18">
                                                            <g fill="none" fill-rule="evenodd">
                                                                <path d="M0 0L24 0 24 24 0 24z" transform="translate(-2 -3)" />
                                                                <path fill="#000"
                                                                      d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z"
                                                                      transform="translate(-2 -3)" />
                                                            </g>
                                                        </svg>
                                                        <?
                                                        break;
                                                    case 'train':
                                                        ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="21" viewBox="0 0 22 21">
                                                            <g fill="none" fill-rule="evenodd" transform="translate(-4)">
                                                                <path d="M0 0L24 0 24 24 0 24z" />
                                                                <path fill="#000"
                                                                      d="M12 2c-4.42 0-8 .5-8 4v9.5C4 17.43 5.57 19 7.5 19L6 20.5v.5h12v-.5L16.5 19c1.93 0 3.5-1.57 3.5-3.5V6c0-3.5-3.58-4-8-4zM7.5 17c-.83 0-1.5-.67-1.5-1.5S6.67 14 7.5 14s1.5.67 1.5 1.5S8.33 17 7.5 17zm3.5-6H6V6h5v5zm5.5 6c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm1.5-6h-5V6h5v5z" />
                                                                <circle cx="24" cy="2" r="2" fill="#FF001F" />
                                                            </g>
                                                        </svg>
                                                        <?
                                                        break;
                                                    case 'calendar':
                                                        ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="22" viewBox="0 0 23 22">
                                                            <g fill="none" fill-rule="evenodd" transform="translate(-3)">
                                                                <path fill="#000"
                                                                      d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11z" />
                                                                <path d="M0 0L24 0 24 24 0 24z" />
                                                                <circle cx="24" cy="2" r="2" fill="#61B986" />
                                                            </g>
                                                        </svg>
                                                        <?
                                                        break;
                                                    case 'clock':
                                                        ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                                            <g fill="none" fill-rule="evenodd">
                                                                <path fill="#000"
                                                                      d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z"
                                                                      transform="translate(-2 -2)" />
                                                                <path d="M0 0L24 0 24 24 0 24z" transform="translate(-2 -2)" />
                                                                <path fill="#000" d="M12.5 7L11 7 11 13 16.25 16.15 17 14.92 12.5 12.25z"
                                                                      transform="translate(-2 -2)" />
                                                            </g>
                                                        </svg>
                                                        <?
                                                        break;
                                                    default:
                                                        echo '';
                                                }
                                            ?>

                                            <span><? echo $info['info'] ;?></span>
                                        </div>
                                        <?
                                    }
                                }
                                ?>
                            </div>
                            <?
                        }
                    ?>
                </div>

                <?
                if (get_field('title_button', 'option')){
                    ?>
                    <div class="wr-link-m">
                        <a href="<? echo get_field('link_button', 'option') ;?>" class="sectop__link col-fil sectop__link_dop"><? echo get_field('title_button', 'option') ;?></a>
                    </div>
                    <?
                }
                ?>



                <?php
                $how_we_are_work = get_field('how_we_are_work');
                if($how_we_are_work){
                    ?>
                    <div class="section-contact__dop-adress js-dop-address">
                        <?
                        if($how_we_are_work['title']){
                            ?>
                            <div class="text-title-2"><? echo $how_we_are_work['title'] ;?></div>
                            <?
                        }
                        if($how_we_are_work['points']){
                            ?>
                            <ul class="list-text-site">
                                <?
                                foreach($how_we_are_work['points'] as $point){
                                    ?>
                                    <li><? echo $point['point'] ;?></li>
                                    <?
                                }
                                ?>
                            </ul>
                            <?
                        }
                        ?>
                    </div>
                    <?
                }
                ?>

            </div>
        </div>

</section>
<?php
get_footer();
?>
