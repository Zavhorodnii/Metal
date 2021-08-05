<?php
/*
 * Template Name: page_contact
 */
get_header();
?>

    <section class="section-contact section_pad-top section_mar-bot">
        <div class="container">

            <?php
            if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs();
            ?>

            <div class="section__row-top">
                <h2 class="title-section"><? echo get_field('title_page') ;?></h2>
            </div>

            <div class="section-contact__werapp">
                <div class="section-contact__left">
                    <div class="section-contact__call">
                        <div>Позвоните нам по телефону:</div>
                        <div class="call__phone js-call-phone"><? echo get_field('mobile_phone', 'option') ;?></div>
                        <div class="call__bot">
                            <a href="#" class="call__copy-phone js-copy">Скопировать номер</a>
                            <a href="popup-0" class="call__tel js-btn-popup">Позвоните мне</a>
                        </div>
                    </div>

                    <div class="section-contact__adress">

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
                        <div class="wrapp-link-maps">
                            <a href="<? echo get_field('link_button', 'option') ;?>" class="btn"><? echo get_field('title_button', 'option') ;?></a>
                        </div>
                    <?
                    }
                    ?>

                    <a href="#" class="icon-m">
                        <img src="<? echo get_template_directory_uri() . '/assets/' ;?>img/icon-m.png" alt="img">
                    </a>

                </div>
                <div class="section-contact__right">

                    <!-- убрать класс none -->
                    <div class="form-send none">
                        <div class="form-send__icon">
                            <img src="<? echo get_template_directory_uri() . '/assets' ;?>/img/img-ok.png" alt="icon">
                        </div>
                        <div class="form-send__title">Заявка отправлена!</div>
                        <p>Наши специалисты уже обрабатывают вашу заявку, подготавлявают необходимый материал и свяжутся с Вами в самое ближайшее время.
                        </p>

                        <div class="form-send__line"></div>

                        <p>Мы рады поделиться с вами всей доступной для нас информацией и помочь выполнить самые сложные и большие заказы.
                        </p>
                        <p>Благодарим за интерес, проявленный к нашей команде.</p>
                        <p>С уважением, Ваш Estate</p>
                    </div>

                    <div class="contact-wrapp-form js-find-info">
                        <div class="form-active__title pb-men">Заполните форму заявки</div>
                        <div class="form-text-style dop-pad"><? echo get_field('text_in_form'); ?></div>
                        <form action="" class="style-input">
                            <div class="item-form-row marg-row-bot">
                                <span class="form-info-input">E-mail*</span>
                                <div><input type="text" name="" class="input-form js-email js-get-email js-clear-input" placeholder="Email"></div>
                            </div>
                            <div class="form-active__row-two dop-pad">
                                <div class="form-active__col form-active__col-1">
                                    <div class="item-form-row ">
                                        <span class="form-info-input js-name">Имя*</span>
                                        <div><input type="text" name="" class="input-form js-name js-get-user-name js-clear-input" placeholder="Введите имя"></div>
                                    </div>
                                </div>
                                <div class="form-active__col form-active__col-2">
                                    <div class="item-form-row">
                                        <span class="form-info-input">Контактный телефон*</span>
                                        <div><input type="text" name="" class="input-form js-mask js-get-phone-number js-clear-input" placeholder="+7 (967) 773 99 97"></div>
                                    </div>
                                </div>
                            </div>


                            <div class="item-form-row marg-row-bot">
                                <div class="select-site js-select-site">
                                    <div class="select-site__main js-main-sel" data-value="-1">
                                        <span class="js-select-main js-select-title-coll">Как нам лучше связаться с Вами ?</span>
                                        <i class="select-icons">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="8"
                                                 viewBox="0 0 13 8">
                                                <g fill="none" fill-rule="evenodd" opacity=".3">
                                                    <path fill="#000"
                                                          d="M8.59 16.34L13.17 11.75 8.59 7.16 10 5.75 16 11.75 10 17.75z"
                                                          transform="rotate(90 13 5)" />
                                                    <path d="M0 0L24 0 24 24 0 24z" transform="rotate(90 13 5)" />
                                                </g>
                                            </svg>

                                        </i>
                                    </div>
                                    <div class="select-site__lisp js-select-lisp">
                                        <div class="select-site__option js-select-option" data-value="1">Назначить встречу
                                        </div>
                                        <div class="select-site__option js-select-option " data-value="2">Отправить электронное письмо</div>
                                        <div class="select-site__option js-select-option" data-value="3">Позвоните мне
                                        </div>
                                        <div class="select-site__option js-select-option" data-value="4">Звонок и электронное письмо</div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-form-row marg-row-bot">
                                <textarea class="textarea-site js-clear-input" placeholder="Напишите текст вопроса"></textarea>
                            </div>


                            <div class="item-form-row marg-row-bot">

                                <!-- нужно добавлять класс add-files -->
                                <div class="file-downloaded contact-files-add ">
                                    <div class="file-downloaded__fil">
                                        <div class="add-file-item js-clone-footer-form-contact js-paste-form_contact none">
                                            <img src="<? echo get_template_directory_uri() . '/assets' ?>/img/ic-insert-photo.svg" alt="img-file">
                                            <div class="info-file">
                                                <span class="add-file-name">Тр…jpg</span>
                                                <span class="add-file-mb">8.4MB</span>
                                            </div>
                                            <i class="add-file-closes">
                                                <svg>
                                                    <path fill="#9B9B9B" fill-rule="evenodd" d="M16.243 15.18c.293.292.293.773 0 1.065-.293.293-.768.293-1.061 0l-3.177-3.18-3.2 3.202c-.295.293-.774.293-1.07 0-.294-.3-.294-.78 0-1.072l3.2-3.203L7.758 8.82c-.293-.293-.293-.773 0-1.065.292-.293.767-.293 1.06 0l3.177 3.18L15.22 7.71c.295-.292.773-.292 1.069 0 .295.3.295.773 0 1.072l-3.223 3.226 3.178 3.172zM12 0C5.372 0 0 5.37 0 12s5.372 12 12 12 12-5.37 12-12S18.628 0 12 0z">
                                                    </path>
                                                </svg>
                                            </i>
                                        </div>
                                    </div>

                                    <div class="form-maket__input-file input-file-flex-col">
                                        <input type="file" class="form-maket__file item_сalc_file">
                                        <div class="form-maket__cont ">
                                            <span>Загрузить файлы / чертежи</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="info-text-file">только файлы png, jpg, pdf с макс. размером до 5 MB
                                </div>
                            </div>
                            <!-- убрать класс none -->
                            <div class="section-contact__progress-files marg-row-bot none">
                                <div class="flex-grou">
                                    <div class="proces-file">
                                        <div class="proces-file__name">Трубы_техтреб_post.jpg</div>
                                        <div class="proces-file__mb"><span class="js_loaded">2.3MB</span> of <span class="js_total">8.4MB</span></div>
                                        <div class="wrapp-progress">
                                            <div class="progress">
                                                <div class="progress__item" style="width: 45%;"></div>
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

                            <div class="row-btn-form">
                                <button type="submit" class="btn js-send-to-wp">Отправить заявку </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
?>
