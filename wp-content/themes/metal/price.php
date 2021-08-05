<?php
/**
 * Template Name: price
 *
 */
get_header(); ?>

<section class="section-price section_pad-top section_mar-bot">
    <div class="js-delete-parallax"></div>
    <div class="container">

        <?php
            if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs();
        ?>

        <div class="section__row-top section__row-alig-top">
            <h2 class="title-section">Цены</h2>
            <?php
            $link = get_field('link', get_the_ID());
            if($link['title']){
                ?>
                <div class="see-all">
                    <div class="see-all__img">
                        <img src="<?php echo get_the_post_thumbnail_url($link['link']->ID) ?>" alt="img">
                    </div>

                    <div class="see-all__cont">
                        <p><?php echo $link['title']; ?></p>
                        <a href="<?php echo get_permalink($link['link']->ID) ?>">Посмотреть все</a>
                    </div>

                </div>
                <?php
            }
            ?>
        </div>

        <div class="section__tabs-mob">
            <div class="select-site js-select-site js-price-cat">
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
                <?php
                $block_prices = get_field('block_price');
                $index_in_menu = 0;
                ?>
                <div class="select-site__lisp js-select-lisp">

                    <?php
                        foreach ($block_prices as $block_price){
                            ?>
                            <a href="#" class="select-site__option js-select-option" data-value="<?php echo $index_in_menu;?>"><?php echo $block_price['block_table_of_contents'];?></a>
                            <?php
                            $index_in_menu++;
                        }
                    ?>

<!--                    <a href="#" class="select-site__option js-select-option" data-value="0">Токарные работы</a>-->
<!--                    <a href="#" class="select-site__option js-select-option" data-value="1">Фрезерные работы</a>-->
<!--                    <a href="#" class="select-site__option js-select-option" data-value="2">Порошковая покраска</a>-->
<!--                    <a href="#" class="select-site__option js-select-option" data-value="3">Сварочные работы (цветные металлы)</a>-->
<!--                    <a href="#" class="select-site__option js-select-option" data-value="4">Сварочные работы (нержавеющая сталь)</a>-->
<!--                    <a href="#" class="select-site__option js-select-option" data-value="5">Гальванические покрытия</a>-->
<!--                    <a href="#" class="select-site__option js-select-option" data-value="6">Гибка металла</a>-->
                </div>
            </div>
        </div>

        <?php
        $block_prices = get_field('block_price');
        $checkbox = 0;
        $index_in_menu = 0;
        foreach($block_prices as $block_price){
            if(count($block_price['table']) == 2){
            ?>
                <div class="section-price__item js-section-price__item" data-anchor="#5" data-id-price="<?php echo $index_in_menu; ?>">
                    <div class="section-price__item-title">
                        <div class="section-price__wid-50">
                            <h3 class="section-price__title"><?php echo $block_price['block_table_of_contents']; ?></h3>
                            <?php
                            if(count($block_price['table']) == 2){
                            ?>
                            <div class="section-price__dop-info"><?php echo $block_price['additional_text_centered']; ?></div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="section-price__dop-info"><?php echo $block_price['additional_text_on_the_right']; ?></div>
                    </div>
                    <form action="#" class="js-form">
                        <div class=" section-price__item_row">
                            <?php
                                foreach($block_price['table'] as $table){
                                ?>
                                    <div class="section-price__items ">
                                        <div class="section-price__rows">
                                            <div class="<?php echo $table['third_column_table_of_contents']? 'section-price__items_col1-3' : 'section-price__items_col1'; ?>">
                                                <p class="items_col_title"><?php echo $table['first_column_table_of_contents']; ?></p>
                                            </div>
                                            <div class="<?php echo $table['third_column_table_of_contents']? 'section-price__items_col2-3' : 'section-price__items_col2'; ?>">
                                                <p class="items_col_title"><?php echo $table['second_column_table_of_contents']; ?></p>
                                            </div>
                                            <?php
                                                if($table['third_column_table_of_contents']){
                                                ?>
                                                    <div class="section-price__items_col3-3">
                                                        <p class="items_col_title"><?php echo $table['third_column_table_of_contents']; ?></p>
                                                    </div>
                                                <?php
                                                }
                                            ?>
                                        </div>

                                        <?php
                                            foreach ($table['fields'] as $field){
                                            ?>
                                                <div class="section-price__rows js-price-row">
                                                    <div class="<?php echo $table['third_column_table_of_contents'] ? 'section-price__items_col1-3' : 'section-price__items_col1'; ?>">
                                                        <span class="section-price__info js-get-text"><?php echo $field['first_value_column_table_of_contents']; ?></span>
                                                    </div>

                                                    <?php
                                                    if($table['third_column_table_of_contents']){
                                                        ?>
                                                        <div class="<?php echo $table['third_column_table_of_contents'] ? 'section-price__items_col2-3' : 'section-price__items_col2'; ?>">
                                                            <span class="section-price__info"><?php echo $field['second_value_column_table_of_contents']; ?></span>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <div class="<?php echo $table['third_column_table_of_contents'] ? 'section-price__items_col3-3' : 'section-price__items_col2'; ?>">

                                                        <span class="section-price__info"><?php echo $table['third_column_table_of_contents'] ? $field['third_value_column_table_of_contents'] : $field['second_value_column_table_of_contents']; ?></span>

                                                        <div class="section-price__items_check">
                                                            <input type="checkbox" id="<?php echo $checkbox ?>" class="none site-checkbox js-price-check">
                                                            <i class="icon-check"></i>
                                                            <label for="<?php echo $checkbox ?>" class="section-price__label"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            $checkbox++;
                                            }
                                        ?>
                                    </div>

                                <?php
                                }
                            ?>
                        </div>

                        <?php

                        foreach ($block_price['feedback'] as $feedback){
                            if ($feedback == 'call_back'){
                                ?>
                                <div class="section-price__item_сalc mob">
                                    <div class="item_сalc__title">Рассчитайте стоимость по выбранные пунктам сейчас</div>
                                    <div class="item_сalc__form js-find-info">
                                        <div><input type="text" name="phone" class="site-input js-mask js-get-phone-number js-clear-input" placeholder="Контактный телефон"></div>
                                        <button type="submit" class="btn item_сalc_btn js-send-to-wp">Расчитать</button>
                                    </div>
                                </div>
                                <?php
                            }
                            if($feedback == 'download'){
                                ?>
                                <div class="section-price__item_сalc js-hide-block">
                                    <input type="file" class="item_сalc_file">
                                    <p class="item_сalc_text">Загрузите сюда ваши чертежи и мы расчитаем их сегодня</p>
                                </div>

                                <div class="form-active none">
                                    <div class="form-active__item js-find-info">
                                        <div class="form-active__title">Заполните форму заявки</div>
                                        <div class="item-form-row marg-row-bot">
                                            <span class="form-info-input">E-mail*</span>
                                            <div><input type="text" name="" class="input-form js-get-email js-clear-input" placeholder="Email"></div>
                                        </div>
                                        <div class="form-active__row-two">
                                            <div class="form-active__col form-active__col-1">
                                                <div class="item-form-row">
                                                    <span class="form-info-input js-name">Имя*</span>
                                                    <div> <input type="text" name="" class="input-form js-name js-get-user-name js-clear-input" placeholder="Введите имя">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-active__col form-active__col-2">
                                                <div class="item-form-row">
                                                    <span class="form-info-input">Контактный телефон*</span>
                                                    <div><input type="text" name="" class="input-form js-mask js-get-phone-number js-clear-input" placeholder="+7 (967) 773 99 97"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row-btn-form">
                                            <button type="submit" class="btn btn-forms js-send-to-wp">Отправить заявку</button>
                                        </div>
                                    </div>
                                    <div class="form-active__item form-active__item_right">
                                        <div class="form-text-style dop-pad">Выбранные пункты автоматически добавятся к заявке
                                        </div>
                                        <div class="form-text-style form-text-matgin none">работы - <span">0</span></div>
                                        <!--                            <div class="form-text-style form-text-matgin">Гибка металла - <span>1</span></div>-->
                                        <div class="form-text-style form-text-file dop-pad">Добавлены файлы</div>

                                        <div class="wrapp-add-file js_uploaded_file none">
                                            <div class="add-file-item">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/'; ?>img/ic-insert-photo.svg" alt="img-file">
                                                <div class="info-file">
                                                    <span class="add-file-name">Name…jpg</span>
                                                    <span class="add-file-mb">0.0MB</span>
                                                </div>
                                                <i class="add-file-closes">
                                                    <svg>
                                                        <path fill="#9B9B9B" fill-rule="evenodd"
                                                              d="M16.243 15.18c.293.292.293.773 0 1.065-.293.293-.768.293-1.061 0l-3.177-3.18-3.2 3.202c-.295.293-.774.293-1.07 0-.294-.3-.294-.78 0-1.072l3.2-3.203L7.758 8.82c-.293-.293-.293-.773 0-1.065.292-.293.767-.293 1.06 0l3.177 3.18L15.22 7.71c.295-.292.773-.292 1.069 0 .295.3.295.773 0 1.072l-3.223 3.226 3.178 3.172zM12 0C5.372 0 0 5.37 0 12s5.372 12 12 12 12-5.37 12-12S18.628 0 12 0z" />
                                                    </svg>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="section-contact__progress-files marg-row-bot none">
                                            <div class="flex-grou">
                                                <div class="proces-file">
                                                    <div class="proces-file__name">Трубы_техтреб_post.jpg</div>
                                                    <div class="proces-file__mb"><span class="js_loaded">2.3MB</span> of <span class="js_total">8.4MB</span></div>
                                                    <div class="wrapp-progress">
                                                        <div class="progress">
                                                            <div class="progress__item" style="width: 0%;"></div>
                                                        </div>

                                                        <i class="add-file-closes">
                                                            <svg>
                                                                <path fill="#9B9B9B" fill-rule="evenodd" d="M16.243 15.18c.293.292.293.773 0 1.065-.293.293-.768.293-1.061 0l-3.177-3.18-3.2 3.202c-.295.293-.774.293-1.07 0-.294-.3-.294-.78 0-1.072l3.2-3.203L7.758 8.82c-.293-.293-.293-.773 0-1.065.292-.293.767-.293 1.06 0l3.177 3.18L15.22 7.71c.295-.292.773-.292 1.069 0 .295.3.295.773 0 1.072l-3.223 3.226 3.178 3.172zM12 0C5.372 0 0 5.37 0 12s5.372 12 12 12 12-5.37 12-12S18.628 0 12 0z">
                                                                </path>
                                                            </svg>
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="section-price__item_сalc js-add_upload none">
                                    <input type="file" class="item_сalc_file">
                                    <p class="item_сalc_text">Загрузить еще файлы</p>
                                </div>


                                <?php
                            }
                        }

                        ?>

                    </form>
                </div>
            <?php
                $index_in_menu++;
            }else{
                ?>
                <div class="section-price__item js-section-price__item" data-anchor="#3" data-id-price="<?php echo $index_in_menu; ?>">
                    <div class="section-price__item-title">
                        <h3 class="section-price__title"><?php echo $block_price['block_table_of_contents']; ?></h3>
                        <div class="section-price__dop-info"><?php echo $block_price['additional_text_on_the_right']; ?></div>
                    </div>
                    <form action="#" class="js-form">
                        <div class=" section-price__item_row">
                            <?php
                                foreach($block_price['table'] as $table){
                                ?>
                                    <div class="section-price__items section-price__three-blocks">
                                        <div class="section-price__rows">
                                            <div class="section-price__items_col1">
                                                <p class="items_col_title"><?php echo $table['first_column_table_of_contents']; ?></p>
                                            </div>
                                            <div class="section-price__items_col2">
                                                <p class="items_col_title"><?php echo $table['second_column_table_of_contents']; ?></p>
                                            </div>
                                        </div>
                                        <?php
                                            foreach ($table['fields'] as $field){
                                                ?>
                                                    <div class="section-price__rows js-price-row">
                                                        <div class="section-price__items_col1">
                                                            <span class="section-price__info js-get-text"><?php echo $field['first_value_column_table_of_contents']; ?></span>
                                                        </div>
                                                        <div class="section-price__items_col2">
                                                            <span class="section-price__info"><?php echo $field['second_value_column_table_of_contents']; ?></span>
                                                            <div class="section-price__items_check">
                                                                <input type="checkbox" id="<?php echo $checkbox ?>" class="none site-checkbox js-price-check">
                                                                <i class="icon-check"></i>
                                                                <label for="<?php echo $checkbox ?>" class="section-price__label"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                $checkbox++;
                                            }
                                        ?>
                                    </div>
                                <?php
                                }
                            ?>
                        </div>


                        <?php

                        foreach ($block_price['feedback'] as $feedback){
                            if ($feedback == 'call_back'){
                                ?>
                                <div class="section-price__item_сalc mob">
                                    <div class="item_сalc__title">Рассчитайте стоимость по выбранные пунктам сейчас</div>
                                    <div class="item_сalc__form js-find-info">
                                        <div><input type="text" name="phone" class="site-input js-mask js-get-phone-number js-clear-input" placeholder="Контактный телефон"></div>
                                        <button type="submit" class="btn item_сalc_btn js-send-to-wp">Расчитать</button>
                                    </div>
                                </div>
                                <?php
                            }
                            if($feedback == 'download'){
                                ?>
                                <div class="section-price__item_сalc js-hide-block">
                                    <input type="file" class="item_сalc_file">
                                    <p class="item_сalc_text">Загрузите сюда ваши чертежи и мы расчитаем их сегодня</p>
                                </div>

                                <div class="form-active none">
                                    <div class="form-active__item js-find-info">
                                        <div class="form-active__title">Заполните форму заявки</div>
                                        <div class="item-form-row marg-row-bot">
                                            <span class="form-info-input">E-mail*</span>
                                            <div><input type="text" name="" class="input-form js-get-email js-clear-input" placeholder="Email"></div>
                                        </div>
                                        <div class="form-active__row-two">
                                            <div class="form-active__col form-active__col-1">
                                                <div class="item-form-row">
                                                    <span class="form-info-input js-name">Имя*</span>
                                                    <div> <input type="text" name="" class="input-form js-name js-get-user-name js-clear-input" placeholder="Введите имя">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-active__col form-active__col-2">
                                                <div class="item-form-row">
                                                    <span class="form-info-input">Контактный телефон*</span>
                                                    <div><input type="text" name="" class="input-form js-mask js-get-phone-number js-clear-input" placeholder="+7 (967) 773 99 97"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row-btn-form">
                                            <button type="submit" class="btn btn-forms js-send-to-wp">Отправить заявку</button>
                                        </div>
                                    </div>
                                    <div class="form-active__item form-active__item_right">
                                        <div class="form-text-style dop-pad">Выбранные пункты автоматически добавятся к заявке
                                        </div>
                                        <div class="form-text-style form-text-matgin none">работы - <span">0</span></div>
            <!--                            <div class="form-text-style form-text-matgin">Гибка металла - <span>1</span></div>-->
                                        <div class="form-text-style form-text-file dop-pad">Добавлены файлы</div>

                                        <div class="wrapp-add-file js_uploaded_file none">
                                            <div class="add-file-item">
                                                <img src="<?php echo get_template_directory_uri() . '/assets/'; ?>img/ic-insert-photo.svg" alt="img-file">
                                                <div class="info-file">
                                                    <span class="add-file-name">Name…jpg</span>
                                                    <span class="add-file-mb">0.0MB</span>
                                                </div>
                                                <i class="add-file-closes">
                                                    <svg>
                                                        <path fill="#9B9B9B" fill-rule="evenodd"
                                                              d="M16.243 15.18c.293.292.293.773 0 1.065-.293.293-.768.293-1.061 0l-3.177-3.18-3.2 3.202c-.295.293-.774.293-1.07 0-.294-.3-.294-.78 0-1.072l3.2-3.203L7.758 8.82c-.293-.293-.293-.773 0-1.065.292-.293.767-.293 1.06 0l3.177 3.18L15.22 7.71c.295-.292.773-.292 1.069 0 .295.3.295.773 0 1.072l-3.223 3.226 3.178 3.172zM12 0C5.372 0 0 5.37 0 12s5.372 12 12 12 12-5.37 12-12S18.628 0 12 0z" />
                                                    </svg>
                                                </i>
                                            </div>
                                        </div>
                                        <div class="section-contact__progress-files marg-row-bot none">
                                            <div class="flex-grou">
                                                <div class="proces-file">
                                                    <div class="proces-file__name">Трубы_техтреб_post.jpg</div>
                                                    <div class="proces-file__mb"><span class="js_loaded">2.3MB</span> of <span class="js_total">8.4MB</span></div>
                                                    <div class="wrapp-progress">
                                                        <div class="progress">
                                                            <div class="progress__item" style="width: 0%;"></div>
                                                        </div>

                                                        <i class="add-file-closes">
                                                            <svg>
                                                                <path fill="#9B9B9B" fill-rule="evenodd" d="M16.243 15.18c.293.292.293.773 0 1.065-.293.293-.768.293-1.061 0l-3.177-3.18-3.2 3.202c-.295.293-.774.293-1.07 0-.294-.3-.294-.78 0-1.072l3.2-3.203L7.758 8.82c-.293-.293-.293-.773 0-1.065.292-.293.767-.293 1.06 0l3.177 3.18L15.22 7.71c.295-.292.773-.292 1.069 0 .295.3.295.773 0 1.072l-3.223 3.226 3.178 3.172zM12 0C5.372 0 0 5.37 0 12s5.372 12 12 12 12-5.37 12-12S18.628 0 12 0z">
                                                                </path>
                                                            </svg>
                                                        </i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="section-price__item_сalc js-add_upload none">
                                    <input type="file" class="item_сalc_file">
                                    <p class="item_сalc_text">Загрузить еще файлы</p>
                                </div>


                                <?php
                            }
                        }

                        ?>


                    </form>
                </div>
                <?php
                $index_in_menu++;
            }
        }
        ?>

<!--        <div class="section-price__item js-section-price__item" data-anchor="#3" data-id-price="3">-->
<!--            <div class="section-price__item-title">-->
<!--                <h3 class="section-price__title">Сварочные работы (цветные металлы)</h3>-->
<!--                <div class="section-price__dop-info">Единица измерения сантиметрах</div>-->
<!--            </div>-->
<!--            <form action="#" class="js-form">-->
<!--                <div class=" section-price__item_row">-->
<!--                    <div class="section-price__items section-price__three-blocks">-->
<!---->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <p class="items_col_title">Стоимость работы</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">Алюминий</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 50 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox24" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox24" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">Черный металл</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 50 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox25" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox25" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                    <div class="section-price__items section-price__three-blocks">-->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <p class="items_col_title">Стоимость работы</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">Титан</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 100 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox26" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox26" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">Нержавейка</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 50 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox27" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox27" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                    <div class="section-price__items section-price__three-blocks">-->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <p class="items_col_title">Стоимость работы</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">Медь до 15 мм</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 50 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox28" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox28" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--            </form>-->
<!--        </div>-->

<!--        <div class="section-price__item js-section-price__item" data-anchor="#5" data-id-price="5">-->
<!--            <div class="section-price__item-title">-->
<!--                <div class="section-price__wid-50">-->
<!--                    <h3 class="section-price__title">Гальванические покрытия</h3>-->
<!--                    <div class="section-price__dop-info">заказ от 5 000 ₽</div>-->
<!--                </div>-->
<!--                <div class="section-price__dop-info">заказ от 5 000 ₽</div>-->
<!--            </div>-->
<!--            <form action="#" class="js-form">-->
<!--                <div class=" section-price__item_row">-->
<!---->
<!--                    <div class="section-price__items">-->
<!---->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <p class="items_col_title">Толщина в мкм</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <p class="items_col_title">Стоимость за 1 дм²</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Никелирование - Н</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">1-12 мкм</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 72 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox35" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox35" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Меднение - М</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">1-12 мкм</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 65 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox36" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox36" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Цинкование - Ц</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">7-15 мкм</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 59 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox38" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox38" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Олово-висмут - О-Ви</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">1-12 мкм</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 78 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox39" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox39" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="section-price__items">-->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <p class="items_col_title">Толщина в мкм</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <p class="items_col_title">Стоимость за 1 дм²</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                            <span class="section-price__info">Оксидирование<br>-->
<!--                                                        алюминия и титана</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">1-10 мкм</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 33 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox40" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox40" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Химическое<br> оксидирование<br> алюминия</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">доли микрона</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 33 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox41" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox41" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                            <span class="section-price__info">Травление<br>-->
<!--                                            (пассивация)<br>-->
<!--                                            нержавейки</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                            <span class="section-price__info">доли-->
<!--                                            микрона</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 33 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox100" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox100" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!---->
<!--        <div class="section-price__item js-section-price__item" data-anchor="#0" data-id-price="0">-->
<!--            <div class="section-price__item-title">-->
<!--                <h3 class="section-price__title">Токарные работы</h3>-->
<!--            </div>-->
<!--            <form action="#" class="js-form">-->
<!--                <div class="section-price__item_row">-->
<!--                    вапвп-->
<!--                    <div class="section-price__items">-->
<!---->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <p class="items_col_title">Стоимость работы</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                        <span class="section-price__info">Создание 3D модели<br>-->
<!--                                            по чертежу</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 1 000 ₽ / час</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox1" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox1" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                        <span class="section-price__info">Разработка технологии<br>-->
<!--                                            и подбор инструмента</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 600 ₽ / час</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox2" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox2" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                        <span class="section-price__info">Написание<br>-->
<!--                                            управляющих программ</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 1 200 ₽ / час</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox3" class="none site-checkbox js-price-check" checked>-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox3" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                        <span class="section-price__info">Токарная обработка<br>-->
<!--                                            на универсальных станках</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 850 ₽ / час</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox4" class="none site-checkbox js-price-check" checked>-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox4" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                    dgdfg-->
<!--                    <div class="section-price__items">-->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <p class="items_col_title">Стоимость работы</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                        <span class="section-price__info">Токарная обработка<br>-->
<!--                                            на станках с чпу</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 1 100 ₽ / час</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox5" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox5" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">Срочные токарные работы</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 2 000 ₽ / час</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox6" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox6" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                        <span class="section-price__info">Токарная обработка для<br>-->
<!--                                            материалов твердостью до HRC 45</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 1 300 ₽ / час</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox7" class="none site-checkbox js-price-check" checked>-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox7" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                        <span class="section-price__info">Токарные работы<br>-->
<!--                                            с твердыми сплавами</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">индивидуально</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox8" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox8" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!---->
<!--                call back-->
<!--                <div class="section-price__item_сalc mob">-->
<!--                    <div class="item_сalc__title">Рассчитайте стоимость по выбранные пунктам сейчас</div>-->
<!--                    <div class="item_сalc__form">-->
<!--                        <div><input type="text" name="phone" class="site-input js-mask" placeholder="Контактный телефон"></div>-->
<!--                        <button type="submit" class="btn item_сalc_btn">Расчитать</button>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!---->
<!--            </form>-->
<!--        </div>-->
<!---->
<!--        <div class="section-price__item js-section-price__item" data-anchor="#1" data-id-price="1">-->
<!--            <div class="section-price__item-title">-->
<!--                <h3 class="section-price__title">Фрезерные работы</h3>-->
<!--            </div>-->
<!--            <form action="#" class="js-form">-->
<!--                <div class=" section-price__item_row">-->
<!--                    <div class="section-price__items">-->
<!---->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <p class="items_col_title">Стоимость работы</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                    <span class="section-price__info">Создание 3D модели<br>-->
<!--                                        по чертежу</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 1 000 ₽ / час</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox9" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox9" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                    <span class="section-price__info">Разработка технологии<br>-->
<!--                                        и подбор инструмента</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 700 ₽ / час</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox10"-->
<!--                                           class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox10" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                    <span class="section-price__info">Написание<br>-->
<!--                                        управляющих программ</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 1 100 ₽ / час</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox11"-->
<!--                                           class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox11" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                    <span class="section-price__info">Фрезерная обработка<br>-->
<!--                                        на универсальных станках</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 900 ₽ / час</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox12"-->
<!--                                           class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox12" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!---->
<!--                    <div class="section-price__items">-->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <p class="items_col_title">Стоимость работы</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                    <span class="section-price__info">Фрезерная обработка<br>-->
<!--                                        на станках с чпу</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 1 200 ₽ / час</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox13"-->
<!--                                           class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox13" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                    <span class="section-price__info">Фрезерная обработка для<br>-->
<!--                                        материалов твердостью до HRC 45</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 1 400 ₽ / час</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox14"-->
<!--                                           class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox14" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">Срочные фрезерные работы</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 2 000 ₽ / час</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox15"-->
<!--                                           class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox15" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!---->
<!--        <div class="form-send none" >-->
<!--            <div class="form-send__icon">-->
<!--                <img src="img/img-ok.png" alt="icon">-->
<!--            </div>-->
<!--            <div class="form-send__title">Заявка отправлена!</div>-->
<!--            <p>Наши специалисты уже обрабатывают вашу заявку, подготавлявают-->
<!--                необходимый материал и свяжутся с Вами в самое ближайшее время.-->
<!--            </p>-->
<!--            <hr class="line-sits">-->
<!--            <p>Мы рады поделиться с вами всей доступной для нас-->
<!--                информацией и помочь выполнить самые сложные-->
<!--                и большие заказы.-->
<!--            </p>-->
<!--            <p>Благодарим за интерес, проявленный к нашей команде.</p>-->
<!--            <p>С уважением, Ваш Estate</p>-->
<!--        </div>-->
<!---->
<!--        <div class="section-price__item js-section-price__item" data-anchor="#2"  data-id-price="2">-->
<!--            <div class="section-price__item-title">-->
<!--                <h3 class="section-price__title">Порошковая покраска</h3>-->
<!--            </div>-->
<!--            <form action="#" class="js-validate">-->
<!--                <div class="section-price__item_row">-->
<!--                    <div class="section-price__items">-->
<!---->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <p class="items_col_title">Объем заказа</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <p class="items_col_title">Стоимость работы</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Плоские</span>-->
<!--                                <span class="section-price__info section-price__info-mob">Объем заказа 500 - 1000 м²</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">500 - 1000 м²</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 175 ₽ / м²</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox16"-->
<!--                                           class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox16" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                        <span class="section-price__info">Наценка<br>-->
<!--                                            за трудоемкость</span>-->
<!--                                <span class="section-price__info section-price__info-mob">Объем заказа 5 % - 100 %</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">5 % - 100 %</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">+ % к цене</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox17"-->
<!--                                           class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox17" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Колесные диски</span>-->
<!--                                <span class="section-price__info section-price__info-mob"> Объем заказа R12</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">размер R12</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                        <span class="section-price__info">от 5 000 ₽-->
<!--                                            за комплект</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox18"-->
<!--                                           class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox18" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Гофрированные</span>-->
<!--                                <span class="section-price__info section-price__info-mob"> 500 - 1000 м²</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">500 - 1000 м²</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 180 ₽ / м²</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox19"-->
<!--                                           class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox19" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                    <div class="section-price__items">-->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <p class="items_col_title">Объем заказа</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <p class="items_col_title">Стоимость работы</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Объемные</span>-->
<!--                                <span class="section-price__info section-price__info-mob">Объем заказа 300 - 500 м²</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">300 - 500 м²</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 210 ₽ / м²</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox20"-->
<!--                                           class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox20" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Погонажные</span>-->
<!--                                <span class="section-price__info section-price__info-mob">Объем заказа от 36 ₽ / м. пог.</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">от 40 м. пог.</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 36 ₽ / м. пог.</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox21"-->
<!--                                           class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox21" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Небольшие</span>-->
<!--                                <span class="section-price__info section-price__info-mob">Объем заказа от 350 шт.</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">от 350 шт.</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 3 ₽ / шт.</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox22"-->
<!--                                           class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox22" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                        <span class="section-price__info">Металлические-->
<!--                                            двери</span>-->
<!--                                <span class="section-price__info section-price__info-mob">Объем заказаот 2 300 ₽</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">от 1 компл.</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 2 300 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox23"-->
<!--                                           class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox23" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="section-price__item_сalc">-->
<!--                    <input type="file" class="item_сalc_file">-->
<!--                    <p class="item_сalc_text">Загрузите сюда ваши чертежи и мы расчитаем их сегодня</p>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!---->
<!--        <div class="section-price__item js-section-price__item" data-anchor="#3" data-id-price="3">-->
<!--            <div class="section-price__item-title">-->
<!--                <h3 class="section-price__title">Сварочные работы (цветные металлы)</h3>-->
<!--                <div class="section-price__dop-info">Единица измерения сантиметрах</div>-->
<!--            </div>-->
<!--            <form action="#" class="js-form">-->
<!--                <div class=" section-price__item_row">-->
<!--                    <div class="section-price__items section-price__three-blocks">-->
<!---->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <p class="items_col_title">Стоимость работы</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">Алюминий</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 50 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox24" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox24" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">Черный металл</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 50 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox25" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox25" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                    <div class="section-price__items section-price__three-blocks">-->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <p class="items_col_title">Стоимость работы</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">Титан</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 100 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox26" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox26" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">Нержавейка</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 50 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox27" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox27" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                    <div class="section-price__items section-price__three-blocks">-->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <p class="items_col_title">Стоимость работы</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">Медь до 15 мм</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">от 50 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox28" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox28" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="form-active">-->
<!--                    <div class="form-active__item">-->
<!--                        <div class="form-active__title">Заполните форму заявки</div>-->
<!--                        <div class="item-form-row marg-row-bot">-->
<!--                            <span class="form-info-input">E-mail*</span>-->
<!--                            <div><input type="text" name="" class="input-form js-email" placeholder="Email"></div>-->
<!--                        </div>-->
<!--                        <div class="form-active__row-two">-->
<!--                            <div class="form-active__col form-active__col-1">-->
<!--                                <div class="item-form-row">-->
<!--                                    <span class="form-info-input js-name">Имя*</span>-->
<!--                                    <div> <input type="text" name="" class="input-form js-name" placeholder="Введите имя">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="form-active__col form-active__col-2">-->
<!--                                <div class="item-form-row">-->
<!--                                    <span class="form-info-input">Контактный телефон*</span>-->
<!--                                    <div><input type="text" name="" class="input-form js-mask" placeholder="+7 (967) 773 99 97"></div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="row-btn-form">-->
<!--                            <button type="submit" class="btn btn-forms">Отправить заявку</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-active__item form-active__item_right">-->
<!--                        <div class="form-text-style dop-pad">Выбранные пункты автоматически добавятся к заявке-->
<!--                        </div>-->
<!--                        <div class="form-text-style form-text-matgin">Токарные работы - <span>3</span></div>-->
<!--                        <div class="form-text-style form-text-matgin">Гибка металла - <span>1</span></div>-->
<!--                        <div class="form-text-style form-text-file dop-pad">Добавлены файлы</div>-->
<!--                        <div class="wrapp-add-file">-->
<!--                            <div class="add-file-item">-->
<!--                                <img src="img/ic-insert-photo.svg" alt="img-file">-->
<!--                                <div class="info-file">-->
<!--                                    <span class="add-file-name">Тр…jpg</span>-->
<!--                                    <span class="add-file-mb">8.4MB</span>-->
<!--                                </div>-->
<!--                                <i class="add-file-closes">-->
<!--                                    <svg>-->
<!--                                        <path fill="#9B9B9B" fill-rule="evenodd"-->
<!--                                              d="M16.243 15.18c.293.292.293.773 0 1.065-.293.293-.768.293-1.061 0l-3.177-3.18-3.2 3.202c-.295.293-.774.293-1.07 0-.294-.3-.294-.78 0-1.072l3.2-3.203L7.758 8.82c-.293-.293-.293-.773 0-1.065.292-.293.767-.293 1.06 0l3.177 3.18L15.22 7.71c.295-.292.773-.292 1.069 0 .295.3.295.773 0 1.072l-3.223 3.226 3.178 3.172zM12 0C5.372 0 0 5.37 0 12s5.372 12 12 12 12-5.37 12-12S18.628 0 12 0z" />-->
<!--                                    </svg>-->
<!--                                </i>-->
<!--                            </div>-->
<!--                            <div class="add-file-item">-->
<!--                                <img src="img/ic-insert-photo.svg" alt="img-file">-->
<!--                                <div class="info-file">-->
<!--                                    <span class="add-file-name">Тр…jpg</span>-->
<!--                                    <span class="add-file-mb">8.4MB</span>-->
<!--                                </div>-->
<!--                                <i class="add-file-closes">-->
<!--                                    <svg>-->
<!--                                        <path fill="#9B9B9B" fill-rule="evenodd"-->
<!--                                              d="M16.243 15.18c.293.292.293.773 0 1.065-.293.293-.768.293-1.061 0l-3.177-3.18-3.2 3.202c-.295.293-.774.293-1.07 0-.294-.3-.294-.78 0-1.072l3.2-3.203L7.758 8.82c-.293-.293-.293-.773 0-1.065.292-.293.767-.293 1.06 0l3.177 3.18L15.22 7.71c.295-.292.773-.292 1.069 0 .295.3.295.773 0 1.072l-3.223 3.226 3.178 3.172zM12 0C5.372 0 0 5.37 0 12s5.372 12 12 12 12-5.37 12-12S18.628 0 12 0z" />-->
<!--                                    </svg>-->
<!--                                </i>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="section-price__item_сalc">-->
<!--                    <input type="file" class="item_сalc_file">-->
<!--                    <p class="item_сalc_text">Загрузить еще файлы</p>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!---->
<!--        <div class="section-price__item js-section-price__item" data-anchor="#4" data-id-price="4">-->
<!--            <div class="section-price__item-title">-->
<!--                <h3 class="section-price__title">Сварочные работы (нержавеющая сталь)</h3>-->
<!--            </div>-->
<!--            <form action="#" class="js-form">-->
<!--                <div class=" section-price__item_row">-->
<!---->
<!--                    <div class="section-price__items" >-->
<!---->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <p class="items_col_title">Ед. измерения</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <p class="items_col_title">Стоимость работы</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Емкости и баки</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">шт.</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 9 000 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox29" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox29" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Черный металл</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">см.</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 50 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox30" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox30" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Ограждения</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">п.м</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 3 000 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox31" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox31" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="section-price__items" >-->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <p class="items_col_title">Ед. измерения </p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <p class="items_col_title">Стоимость работы</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Трубы</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">1 стык.</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 210 ₽ / м²</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox32" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox32" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                        <span class="section-price__info">Индивидуальные<br>-->
<!--                                            изделия на заказ</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">шт.</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">договорная</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox33" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox33" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="section-price__item_сalc mob">-->
<!--                    <div class="item_сalc__title">Рассчитайте стоимость по выбранные пунктам сейчас</div>-->
<!--                    <div class="item_сalc__form">-->
<!--                        <div><input type="text" name="phone" class="site-input js-mask" placeholder="Контактный телефон"></div>-->
<!--                        <button type="submit" class="btn item_сalc_btn">Расчитать</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!---->
<!--        <div class="section-price__item js-section-price__item" data-anchor="#5" data-id-price="5">-->
<!--            <div class="section-price__item-title">-->
<!--                <div class="section-price__wid-50">-->
<!--                    <h3 class="section-price__title">Гальванические покрытия</h3>-->
<!--                    <div class="section-price__dop-info">заказ от 5 000 ₽</div>-->
<!--                </div>-->
<!--                <div class="section-price__dop-info">заказ от 5 000 ₽</div>-->
<!--            </div>-->
<!--            <form action="#" class="js-form">-->
<!--                <div class=" section-price__item_row">-->
<!---->
<!--                    <div class="section-price__items">-->
<!---->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <p class="items_col_title">Толщина в мкм</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <p class="items_col_title">Стоимость за 1 дм²</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Никелирование - Н</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">1-12 мкм</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 72 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox35" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox35" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Меднение - М</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">1-12 мкм</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 65 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox36" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox36" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Цинкование - Ц</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">7-15 мкм</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 59 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox38" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox38" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Олово-висмут - О-Ви</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">1-12 мкм</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 78 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox39" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox39" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="section-price__items">-->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <p class="items_col_title">Тип металлоизделий</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <p class="items_col_title">Толщина в мкм</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <p class="items_col_title">Стоимость за 1 дм²</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                            <span class="section-price__info">Оксидирование<br>-->
<!--                                                        алюминия и титана</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">1-10 мкм</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 33 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox40" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox40" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                <span class="section-price__info">Химическое<br> оксидирование<br> алюминия</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                <span class="section-price__info">доли микрона</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 33 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox41" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox41" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1-3">-->
<!--                                            <span class="section-price__info">Травление<br>-->
<!--                                            (пассивация)<br>-->
<!--                                            нержавейки</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2-3">-->
<!--                                            <span class="section-price__info">доли-->
<!--                                            микрона</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col3-3">-->
<!--                                <span class="section-price__info">от 33 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox100" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox100" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!---->
<!--        <div class="section-price__item js-section-price__item" data-anchor="#6" data-id-price="6">-->

<!--            <div class="section-price__item-title">-->
<!--                <div class="section-price__wid-50">-->
<!--                    <h3 class="section-price__title">Гибка металла</h3>-->
<!--                    <div class="section-price__dop-info">Цена длина гиба до 1 000 ₽</div>-->
<!--                </div>-->
<!--                <div class="section-price__dop-info">Цена длина гиба до 2 000 ₽</div>-->
<!--            </div>-->
<!---->
<!--            <form action="#" class="js-form">-->
<!--                <div class=" section-price__item_row">-->
<!---->
<!--                    <div class="section-price__items">-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <p class="items_col_title">Толщина в мм</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <p class="items_col_title">Цена за 1 дм²</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">от 0,3</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">7,50 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox42" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox42" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">3,0-5,0</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">10,50 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox43" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox43" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">Н6,0-12,0</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">14 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox44" class="none site-checkbox js-price-check" checked>-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox44" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="section-price__items">-->
<!--                        <div class="section-price__rows">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <p class="items_col_title">Толщина в мм</p>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <p class="items_col_title">Цена за 1 дм²</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">от 0,3</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">10,50 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox45" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox45" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">3,0-5,0</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">15 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox46" class="none site-checkbox js-price-check" checked>-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox46" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="section-price__rows js-price-row">-->
<!--                            <div class="section-price__items_col1">-->
<!--                                <span class="section-price__info">6,0-12,0</span>-->
<!--                            </div>-->
<!--                            <div class="section-price__items_col2">-->
<!--                                <span class="section-price__info">22,50 ₽</span>-->
<!--                                <div class="section-price__items_check">-->
<!--                                    <input type="checkbox" id="checkbox47" class="none site-checkbox js-price-check">-->
<!--                                    <i class="icon-check"></i>-->
<!--                                    <label for="checkbox47" class="section-price__label"></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!---->
<!--                </div>-->
<!--                <div class="section-price__item_сalc mob">-->
<!--                    <div class="item_сalc__title">Рассчитайте стоимость по выбранные пунктам сейчас</div>-->
<!--                    <div class="item_сalc__form">-->
<!--                        <div><input type="text" name="phone" class="site-input js-mask" placeholder="Контактный телефон"></div>-->
<!--                        <button type="submit" class="btn item_сalc_btn">Расчитать</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->

        <div class="section-price__bottom">
            <p class="section-price__bottom_text">Данные цены представлены для общего понимания ценообразования
                и не являются публичной офертой,
                конечная стоимость всегда определяется индивидуально в зависимости от объема, сложности и срока.
            </p>
            <div class="section-price__bottom_address">
                <a href="mailto:info@vseestate.ru"><?php the_field('mail_address', 'option') ?></a>
                <a href="tel:+79057267617"><?php the_field('mobile_phone', 'option') ?></a>
            </div>
            <div class="section-price__bottom_wrapp-btn">
                <a href="popup-0" class="btn js-btn-popup">Позвоните мне</a>
            </div>
        </div>

        <div class="mobile-section-price js-mob-prise">

            <div class="text">
                Ознакомьтесь с ценами на услуги,
                выбрав интересующую вас категорию
            </div>

            <div class="servise__item-btn">
                <div class="servise__item_row-btn">
                    <a href="popup-0" class="btn btn-grad-black btn-arrow js-btn-popup">
                        <span>Перезвоните мне</span>
                        <svg>
                            <path d="M21 11L6.83 11 10.41 7.41 9 6 3 12 9 18 10.41 16.59 6.83 13 21 13z" transform="matrix(-1 0 0 1 24 0)"></path>
                        </svg>
                    </a>
                </div>
                <div class="servise__item_row-btn">
                    <a href="#" class="btn btn-arrow">
                        <span>Быстрая заявка на расчет</span>
                        <svg>
                            <path d="M21 11L6.83 11 10.41 7.41 9 6 3 12 9 18 10.41 16.59 6.83 13 21 13z" transform="matrix(-1 0 0 1 24 0)"></path>
                        </svg>
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>


<?php get_footer(); ?>
