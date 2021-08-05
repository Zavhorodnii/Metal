'use strict'



$(document).ready(function () {
    // console.log($('.item_сalc_file'));

    let $orderWork = new Map();
    let $arrayAddFile = [];

    function renoveFile (event) {
        event.preventDefault();
        console.log('renoveFile');
        let data = new FormData();
        let attribute = '';
        if ($(this).attr('form') === 'big'){
            attribute = $(this).closest('.js_uploaded_file').attr('data-id-file');
        }
        if ($(this).attr('form') === 'small'){
            attribute = $(this).closest('.js-clone-footer-form').attr('data-id-file');
        }
        if ($(this).attr('form') === 'contact'){
            attribute = $(this).closest('.js-clone-footer-form-contact').attr('data-id-file');
        }

        console.log('attribute = ' + attribute);


        data.append('upload_file', attribute);
        data.append('action', 'delete_file_from_wordpress');


        $.ajax({
            // url: url__,
            url: window.ajaxUrl,
            type: 'POST',
            dataType : 'json',
            processData : false,
            contentType : false,
            data: data,
            success: function(data){
                console.log(data);
                console.log('success delete');
                $arrayAddFile.splice($arrayAddFile.indexOf(Number(attribute)),1);
                if ($arrayAddFile.length === 0)
                    $(".file-downloaded").removeClass("add-files");
                console.log('list attribute ' + $arrayAddFile);
                // $('.js-open-popup').css('display', 'block');
            },
            error: function( jqXHR, status, errorThrown ){
                console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
                $('.js-error-message').html('Проблемы с удалением файла');
                $("#error-form").show();
            }
        })

        // $(this).closest('.js_uploaded_file').remove();
        $('[data-id-file = ' + attribute + ']').addClass('none');
        // console.log("attr = " + $('[data-id-file = attribute]'));
    }

    let $cloneUploadFileTemplate = $('.js_uploaded_file');
    let $js_clone_footer_form = $('.js-clone-footer-form');
    let $js_clone_footer_form_contact = $('.js-clone-footer-form-contact');
    let $cloneCheckMark = $('.form-text-matgin');
    // let burger_menu_menu = $('.js-clone-menu');
    let js_clone_menu = $('.js-clone-menu').clone()
    let js_clone_menu_mb = $('.js-clone-menu-mb').clone()


    function upload_fie(event){
        // var url__ = $('.data-php').attr('data-attr');
        event.preventDefault();

        console.log(this.files);

        let data = new FormData();
        $(".js-hide-block").addClass("none");
        $(".flex-grou").removeClass("none");
        $(".form-active").removeClass("none");
        // $(".section-contact__progress-files").removeClass("none");
        // $(".section-contact__progress-files2").removeClass("none");
        $(".section-contact__progress-files").addClass("none");
        $(".section-contact__progress-files2").addClass("none");

        // $orderWork.set($('.section-price__title').text(), $valueWork);

        data.append('action', 'file');
        data.append('upload_file', this.files[0], this.files[0].name);


        let file_name = this.files[0].name;
        let file_length = this.files[0].name.length;


        $('.proces-file__name').html(file_name.substr(0, 15) + '...' + file_name.substr(-4, file_length));
        let fileSize = (this.files[0].size/1048576).toFixed(1) + 'MB';

        let new_file_name = file_name;
        if(file_length > 9){
            new_file_name = file_name.substr(0, 5) + '...' + file_name.substr(-4, file_length);
        }

        $.ajax({
            // url: url__,
            url: window.ajaxUrl,
            type: 'POST',
            dataType : 'json',
            processData : false,
            contentType : false,
            data: data,
            success: function(data){
                $(".section-contact__progress-files2").addClass("none");
                $(".js-add_upload").removeClass("none");
                // $(".js_uploaded_file").removeClass("none");
                $(".flex-grou").addClass("none");
                console.log(data);
                console.log('success');
                console.log('id post' + data.id);
                $arrayAddFile.push(data.id);

                console.log('add $arrayAddFile = ' + $arrayAddFile)
                // $('.js_uploaded_file').attr('data-id-file', data.id)
                //    clone
                let $cloneUploadFile = $cloneUploadFileTemplate.clone();
                $cloneUploadFile.find('.add-file-name').html(new_file_name);
                $cloneUploadFile.find('.add-file-mb').html(fileSize);
                $cloneUploadFile.removeClass('none');
                $cloneUploadFile.attr('data-id-file', data.id);
                $cloneUploadFile.find('.add-file-closes').attr('form','big');
                $cloneUploadFile.find('.add-file-closes').click(renoveFile);
                $('.section-contact__progress-files').before($cloneUploadFile);


                $(".file-downloaded").addClass("add-files");


                let $clone_footer_form = $js_clone_footer_form.clone();
                $clone_footer_form.find('.add-file-name').html(new_file_name);
                $clone_footer_form.find('.add-file-mb').html(fileSize);
                $clone_footer_form.removeClass('none').removeClass('js-paste-form');
                $clone_footer_form.attr('data-id-file', data.id);
                $clone_footer_form.addClass('js-delete');
                $clone_footer_form.find('.add-file-closes').click(renoveFile);
                $clone_footer_form.find('.add-file-closes').attr('form','small');
                $('.file-downloaded').find('.js-paste-form').after($clone_footer_form);


                let $clone_footer_form_contact = $js_clone_footer_form_contact.clone();
                $clone_footer_form_contact.find('.add-file-name').html(new_file_name);
                $clone_footer_form_contact.find('.add-file-mb').html(fileSize);
                $clone_footer_form_contact.removeClass('none').removeClass('js-paste-form_contact');
                console.log('data.id = ' + data.id);
                $clone_footer_form_contact.attr('data-id-file', data.id);
                $clone_footer_form_contact.addClass('js-delete');
                $clone_footer_form_contact.find('.add-file-closes').click(renoveFile);
                $clone_footer_form_contact.find('.add-file-closes').attr('form','contact');
                $('.file-downloaded').find('.js-paste-form_contact').after($clone_footer_form_contact);


            },
            xhr: function() {
                $(".section-contact__progress-files").removeClass("none");
                $(".section-contact__progress-files2").removeClass("none");
                let xhr = new window.XMLHttpRequest();
                // let xhr = $.ajaxSettings.xhr();

                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        let percentComplete = (evt.loaded / evt.total)*100;
                        console.log(percentComplete);
                        $('.js_loaded').html((evt.loaded/1048576).toFixed(1) + 'MB');
                        $('.js_total').html((evt.total/1048576).toFixed(1) + 'MB');
                        $('.progress__item').css('width', percentComplete + '%');
                        //Do something with download progress
                        $('.add-file-closes').click(function (event) {
                            xhr.abort();
                            $(".section-contact__progress-files").addClass("none");
                            $(".section-contact__progress-files2").addClass("none");
                            $(".js-add_upload").removeClass("none");
                        });
                    }
                }, false);
                return xhr;
            },
            error: function( jqXHR, status, errorThrown ){
                console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
                $('.js-error-message').html('Проблемы с загрузкой файла');
                $("#error-form").show();
            }
        });
    }


    $('.item_сalc_file').change(
        upload_fie
    )


    $('.js-send-to-wp').click(function (event) {
        console.log('js-send-to-wp');
        event.preventDefault();
        let min = true;
        // console.log(this.files);

        let data = new FormData();
        // console.log('tyt');

        let $number_phone = $(this).closest('.js-find-info').find('.js-get-phone-number').val();
        // let $selected_option = $('.js-select-main').html();
        let $selected_option = $('.js-select-title-coll').html();
        let $textarea_site = $('.textarea-site').val();

        let email = $(this).closest('.js-find-info').find('.js-get-email').val();
        let name = $(this).closest('.js-find-info').find('.js-get-user-name').val();



        if(!$textarea_site || $textarea_site === '')
            $textarea_site = 'empty';

        if(!email || email === '')
            email = 'empty';

        if(!name || name === '')
            name = 'empty';

        if(!$number_phone || $number_phone === '')
            $number_phone = 'empty';

        console.log('$email = ' + email);
        console.log('$name = ' + name);
        console.log('$number_phone = ' + $number_phone);
        console.log('$textarea_site = ' + $textarea_site);
        console.log('$selected_option = ' + $selected_option);

        let jsonObject = {};
        $orderWork.forEach((value, key) => {
            jsonObject[key] = value
        });

        console.log('$orderWork = ' + $orderWork);

        // console.log($arrayAddFile);
        if($arrayAddFile.length !== 0){
            console.log('$arrayAddFile.length !== 0')
            data.append('arrayAddFile', $arrayAddFile);
            min = false;
        }


        data.append('action', 'send_post_to_wp');
        data.append('number_phone', $number_phone);
        data.append('email', email);
        data.append('name', name);
        data.append('orderWork', JSON.stringify(jsonObject));
        data.append('selected_option', $selected_option);
        data.append('textarea_site', $textarea_site);

        $.ajax({
            // url: url__,
            url: window.ajaxUrl,
            type: 'POST',
            // dataType : 'json',
            processData : false,
            contentType : false,
            data: data,
            success: function(data){
                email = '';
                name = '';
                $number_phone = '';
                $arrayAddFile = [];
                $orderWork.clear();
                $('.js_uploaded_file').remove();
                $('.js-delete').remove();
                $('.js-clear-input').val('');
                $('.js-price-row').removeClass('active');
                $('.js-price-check').prop('checked', false);
                console.log('data = ' + data);

                if ($arrayAddFile.length === 0)
                    $(".file-downloaded").removeClass("add-files");
                $('.js-close-popup').css('display', 'none');

                $("#form-ok").show();

            },
            error: function( jqXHR, status, errorThrown ){
                console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
                $('.js-error-message').html('Проблемы с отправкой сообщения');
                $("#error-form").show();
            }
        });
    });

    // $('.js-send-file-to-wp-admin').click(function () {
    //
    // });


    // $( ".js-big-form-to-send" ).submit(function( event ) {



    $('.js-send-to-mail').click(function (event) {
        console.log('js-send-to-mail');
        event.preventDefault();
        let data = new FormData();

        let phone_number = $(this).closest('.js-validate').find('.js-mask').val();

        console.log('phone_number = ' + phone_number);

        data.append('action', 'send_mail');
        data.append('send_phone_to_mail', phone_number);

        $.ajax({
            url: window.ajaxUrl,
            type: 'POST',
            dataType : 'json',
            processData : false,
            contentType : false,
            data: data,
            success: function(data){
                console.log(data);
                $('.popup__wrapp-form').find('.js-clear-input').val('');
                $('.js-close-popup').css('display', 'none');
                $("#assest").show();
            },
            error: function( jqXHR, status, errorThrown ){
                console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
            }
        })

    });

    $('.js-change-class').click(function(event) {
        event.preventDefault();

        console.log('js-change-class');
        $('.js-change-class').removeClass('active').removeClass('js-select-title');
        $(this).addClass('active').addClass('js-select-title');


        let js_change_class = $(this).attr('data-change_active');
        let js_link_post = $(this).attr('data-js_link_post');

        // $('[data-change_active = ' + js_change_class + ']').addClass('active');


        console.log('js_change_class = ' + js_change_class);
        console.log('js_link_post = ' + js_link_post);
        if (js_link_post == null)
            js_link_post = 'first';

        let data = new FormData();
        data.append('action', 'equipment_select');
        // data.append('id_menu', $(this).attr('data-change_active'));
        data.append('id_menu', js_change_class);
        data.append('id_post', js_link_post);

        $.ajax({
            url: window.ajaxUrl,
            type: 'POST',
            dataType : 'json',
            processData : false,
            contentType : false,
            data: data,
            success: function(data){
                console.log(data);
                $('[data-change_active = ' + js_change_class + ']').addClass('active');
                $('.js-derele-block').remove();
                $('.section-equipment__wrapp').html(data.html);
                $('.js-change-post').click(addClick);
                $('.js-quipment').click(showAllCharacteristics)
            },
            error: function( jqXHR, status, errorThrown ){
                console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
            }
        })
    });

    function add_content(){
        console.log('add_content');

        let js_change_class = $('.js-select-title').attr('data-change_active');
        let js_link_post = 'first';

        let data = new FormData();
        data.append('action', 'equipment_select');
        // data.append('id_menu', $(this).attr('data-change_active'));
        data.append('id_menu', js_change_class);
        data.append('id_post', js_link_post);

        $.ajax({
            url: window.ajaxUrl,
            type: 'POST',
            dataType : 'json',
            processData : false,
            contentType : false,
            data: data,
            success: function(data){
                $('.section-equipment__wrapp').html(data.html);
                $('.js-change-post').click(addClick);
                $('.js-quipment').click(showAllCharacteristics)
            },
            error: function( jqXHR, status, errorThrown ){
                console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
            }
        })
    }

    add_content();

    $('.js-change-post').click(addClick);


    function addClick(event) {
        event.preventDefault();

        console.log('js-change-post');

        let js_change_class = $('.js-select-title').attr('data-change_active');
        let js_link_post = $(this).attr('data-js_link_post');

        console.log('js_change_class = ' + js_change_class);
        console.log('js_link_post = ' + js_link_post);

        let data = new FormData();
        data.append('action', 'equipment_select');
        data.append('id_menu', js_change_class);
        data.append('id_post', js_link_post);

        $.ajax({
            url: window.ajaxUrl,
            type: 'POST',
            dataType : 'json',
            processData : false,
            contentType : false,
            data: data,
            success: function(data){
                $('.js-derele-block').remove();
                $('.section-equipment__wrapp').append(data.html);
                $('.js-change-post').click(addClick);
                $('.js-quipment').click(showAllCharacteristics)
            },
            error: function( jqXHR, status, errorThrown ){
                console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
            }
        })
    }


    function search_info(event) {
        event.preventDefault();

        console.log('+search_info+');
        let text = $('.js-search-info').val();
        if(text == ''){
            console.log('return');
            return;
        }
        console.log('text = ' + text);
        let data = new FormData();
        data.append('action', 'search_info');
        data.append('text', text);

        $.ajax({
            url: window.ajaxUrl,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            success: function (data){
                // console.log('data = ' + data.posts);
              // console.log('success =' + data.posts);
                if(data.posts == 'empty'){
                    console.log('if');
                    let str = '<div class="burger-menu__menu-items"><ul class="burger-menu__manu-list">' +
                        '<li>' +
                        'Поиск не дал результатов' +
                        '</li>' +
                        '</ul> </div>';
                    $('.burger-menu__menu').html(str);
                } else {
                    console.log('else');
                    $('.burger-menu__menu').html(data.posts);
                }
            },
            error: function( jqXHR, status, errorThrown ){
                js_clone_menu.removeClass('js-clone-menu');
                $('.burger-menu__menu').html(js_clone_menu);
                console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
            }
        })
    }

    let delete_call_search_info = [];
    $('.js-search-info').keyup(function(event) {
        delete_call_search_info.push(setTimeout(search_info, 2000, event));
        if(delete_call_search_info.length > 1){
            while (delete_call_search_info.length-1){
                clearTimeout(delete_call_search_info.shift())
            }
        }
    })


    function search_info_mb(event) {
        event.preventDefault();
        console.log('+search_info_mb+');
        let text = $('.js-search-info-mb').val();
        if(text == ''){
            console.log('return');
            return;
        }
        console.log('text = ' + text);
        let data = new FormData();
        data.append('action', 'search_info_mb');
        data.append('text', text);

        $.ajax({
            url: window.ajaxUrl,
            type: 'POST',
            dataType: 'json',
            processData: false,
            contentType: false,
            data: data,
            success: function (data){
                // console.log('data = ' + data.posts);
                // console.log('success =' + data.posts);
                if(data.posts == 'empty'){
                    console.log('if');
                    let str =
                        '<li>' +
                        'Поиск не дал результатов' +
                        '</li>';
                    $('.js-burger-menu__manu-list-mb').html(str);
                } else {
                    console.log('else');
                    $('.js-burger-menu__manu-list-mb').html(data.posts);
                }
            },
            error: function( jqXHR, status, errorThrown ){
                js_clone_menu_mb.removeClass('js-clone-menu-mb');
                $('.js-burger-menu__manu-list-mb').html(js_clone_menu_mb);
                console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
            }
        })
    }

    $('.js-search-info-mb').keyup(function(event) {
        delete_call_search_info.push(setTimeout(search_info_mb, 2000, event));
        if(delete_call_search_info.length > 1){
            while (delete_call_search_info.length-1){
                clearTimeout(delete_call_search_info.shift())
            }
        }
    })

    $('.main__screen-file').change(function(event){
        event.preventDefault();
        console.log('main__screen-file');
        $("[data-id-popup=popup-4]").show();
    })

    $('.main__screen-file').change(
        upload_fie
    )



    $('.header__menu_link').click(function (event) {
        $('.header__menu_link').removeClass('active');
        $(this).addClass('active');
    })


    // ibg
    function ibg() {
        $.each($('.ibg'), function (index, val) {
            if ($(this).find('img').length > 0) {
                var src_img = $(this).find('img').attr('src');
                $(this).css('background-image', 'url("' + src_img + '")');
            }
        });
    }
    ibg();
    // end ibg

    // Прокрутка вверх
    $('.js-srolles-top').click(function () {
        $('html, boud').animate({ scrollTop: 0 }, 300);
    });
    // end Прокрутка вверх

    // попап
    $('.js-btn-popup').click(function (e) {
        e.preventDefault();
        let index_btn_popup = $(this).attr('href');

        $.each($('.js-popup'), function (i, elem) {
            let index_popup = $(elem).attr('data-id-popup');
            index_btn_popup === index_popup ? $(elem).fadeIn(300) : $(elem).fadeOut(300);
        });
    });

    function close_popup() {
        $('.js-popup').fadeOut(300);
    }

    $('.js-popup__close').click(close_popup);

    $('.js-popup').click(function (e) {
        let popup = $('.js-popup__wrapp');
        if (!popup.is(e.target) && popup.has(e.target).length === 0)
            $('.js-popup').fadeOut(300);
    });

    $('.js-close-search-mob').click(function () {
        $('.js-mobile-popup-cearch').fadeOut(300);
    });

    // end попап

    // менял
    let swiper = new Swiper('.js-swiper-main', {
        spaceBetween: 15,
        width: 230,
        mousewheel: true,
        freeMode: true,
    });

    $('.js-price-check').each(function (e, elem) {
        if ($(elem).prop('checked')) {
            $(elem).closest('.js-price-row').addClass('active');
        } else {
            $(elem).closest('.js-price-row').removeClass('active');
        }
    });

    $('.js-price-check').click(function () {

        let find = $(this).closest('.section-price__item').find('.section-price__title').text();
        let findFirstColumn = $(this).closest('.js-price-row').find('.js-get-text').text();

        if ($(this).prop('checked')) {
            $(this).closest('.js-price-row').addClass('active');

           if($orderWork.has(find)){
                $orderWork.get(find).push(findFirstColumn);

                $('.js-delete').remove();

               for (let [key, value] of $orderWork) {
                   let $cloneSelectWork = $cloneCheckMark.clone();
                   $cloneSelectWork.html(key + ' - <span>' + value.length + '</span>');
                   $cloneSelectWork.removeClass('none');
                   $cloneSelectWork.addClass('js-delete');
                   $('.form-text-file').before($cloneSelectWork);
               }

           } else {
                $orderWork.set(find, [findFirstColumn,]);

                let $cloneSelectWork = $cloneCheckMark.clone();
                $cloneSelectWork.html(find + ' - <span>' + $orderWork.get(find).length + '</span>');

                $cloneSelectWork.removeClass('none');
                $cloneSelectWork.addClass('js-delete');
                $('.form-text-file').before($cloneSelectWork);
           }
        } else {
            $(this).closest('.js-price-row').removeClass('active');

            $orderWork.get(find).splice($orderWork.get(find).indexOf(findFirstColumn), 1);
            if ($orderWork.get(find).length === 0){
                $orderWork.delete(find);
                // $cloneSelectWork.remove();
            }

            $('.js-delete').remove();

            for (let [key, value] of $orderWork) {
                let $cloneSelectWork = $cloneCheckMark.clone();
                $cloneSelectWork.html(key + ' - <span>' + value.length + '</span>');
                $cloneSelectWork.removeClass('none');
                $cloneSelectWork.addClass('js-delete');
                $('.form-text-file').before($cloneSelectWork);
            }
        }

        console.log($orderWork);
        // console.log($orderWork.get(find).length);
    });

    // менял
    let galleryThumbs = new Swiper('.js-thumbs', {
        direction: 'vertical',
        spaceBetween: 10,
        slidesPerView: 4,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        mousewheel: true,
    });

    // менял
    let galleryTop = new Swiper('.js-gallery', {
        direction: 'vertical',
        thumbs: {
            swiper: galleryThumbs,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    galleryTop.on('touchStart', function () {
        colSlide();
    });

    function colSlide() {
        let col = $('.js-swiper-slide.swiper-slide-active').attr('data-id-slider');
        $('.js-col-number').text(col);
    }

    $('.js-slideshow-arrow').click(function () {
        colSlide();
    });

    $('.swiper-slide').on('mouseup mousemove click', function () {
        if ($('.js-swiper-slide').length > 0) {
            colSlide();
        }
    });

    function popup_ok() {
        let href = location.href;

        $('.js-popup-ok').each(function (e, elem) {
            if (href.includes($(elem).attr('data-id-popup'))) {
                $(elem).fadeIn(300);
            }
        });
    }
    popup_ok();


    $('.js-burger').click(function () {
        $('.js-burger-menu').fadeIn(200);
        $('body').addClass('fixed');

        if ($(this).hasClass('search-link')) {
            $('.burger-menu__chearch').focus();
        }
    });

    // менял
    $('.js-input-search').on('input', function () {
        if ($(this).val().length > 0) {
            $('.js-clear-search').addClass('active');
            $('.js-close-search-mob').addClass('none');
            $('.js-search-bnt-mob').removeClass('none');
        } else {
            // $('.js-remove').remove();
            js_clone_menu.removeClass('js-clone-menu');
            $('.burger-menu__menu').html(js_clone_menu);


            js_clone_menu_mb.removeClass('js-clone-menu-mb');
            $('.js-burger-menu__manu-list-mb').html(js_clone_menu_mb);
            console.log('removeClass 1');

            while (delete_call_search_info.length){
                clearTimeout(delete_call_search_info.shift())
            }

            $('.js-clear-search').removeClass('active');
            $('.js-close-search-mob').removeClass('none');
            $('.js-search-bnt-mob').addClass('none');
        }
    });

    // менял
    $('.js-clear-search').click(function () {
        js_clone_menu.removeClass('js-clone-menu');
        $('.burger-menu__menu').html(js_clone_menu);

        js_clone_menu_mb.removeClass('js-clone-menu-mb');
        $('.js-burger-menu__manu-list-mb').html(js_clone_menu_mb);

        while (delete_call_search_info.length){
            clearTimeout(delete_call_search_info.shift())
        }

        $('.js-input-search').val('');
        $(this).removeClass('active');
        $('.js-search-bnt-mob').addClass('none');
        $('.js-close-search-mob').removeClass('none');
    })

    // менял
    $('.js-close-burger').click(function () {
        $('.js-burger-menu').fadeOut(200);
        $('body').removeClass('fixed');
    });

    $('.js-copy').click(function (e) {
        e.preventDefault();
        let $temp = $("<input>");
        $("body").append($temp);
        $temp.val($('.js-call-phone').text()).select();
        document.execCommand("copy");
        $temp.remove();
    });

    // select

    function sleactive() {
        if (+$('.js-main-sel').attr('data-value') >= 0) {
            $('.js-main-sel').addClass('active-select');
        }
    }

    $('.js-main-sel').click(function () {
        $(this).closest('.js-select-site').toggleClass('active');
        sleactive();
    });

    $('.js-select-option').click(function () {
        $(this).closest('.js-select-site').find('.js-main-sel').attr('data-value', $(this).attr('data-value')).find('.js-select-main').text($(this).text());
        $('.js-select-site').removeClass('active');
        sleactive();

    });

    $(document).click(function (e) {
        let div = $('.js-select-site');

        if (!div.is(e.target) && div.has(e.target).length === 0) {
            div.removeClass('active');
        }
    });

    // validate 

    function valids(valid, elem) {
        if (valid) {
            elem.closest('div').addClass('valid');
            elem.removeClass('error');
            elem.addClass('border-active');
        } else {
            elem.closest('div').removeClass('valid');
            elem.removeClass('border-active');
            elem.addClass('error');
        }
    }

    function validPhone(phone) {
        let regular_phone = /^[\d]{1}\ \([\d]{2,3}\)\ [\d]{2,3} [\d]{2,3} [\d]{2,3}$/;
        let valid = regular_phone.test(phone.val());
        valids(valid, phone);
    }

    function vaidEmail(email) {
        let re = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
        let valid = re.test(email.val());
        valids(valid, email);
    }

    function validName(name) {
        let regular_name = /^[A-Z]{1}[a-z]{1,15}$|(^[А-Я-ЁЇІЄҐ]{1}[а-я-яёїієґ]{1,15}$)/;
        let valid = regular_name.test(name.val());
        valids(valid, name);
    }

    // $('.js-mask').on('input', function () {
    //     validPhone($(this));
    // });

    // $('.js-email').on('input', function () {
    //     vaidEmail($(this));
    // });
    //
    // $('.js-name').on('input', function () {
    //     validName($(this));
    // });

    // start mob 
    let cons = true;

    function srartMob() {
        let w_s = $(window).width();

        if (w_s <= 1300 && cons == true) {
            $('.advantages__row').slick({
                arrows: false,
                dots: true,
                infinite: false,
                slidesToShow: 2,
                slidesToScroll: 2,
                responsive: [{
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },]
            });
        }


        if (w_s <= 768 && cons == true) {


            $('.js-slidesshop-mobile').slick({
                arrows: true,
                dots: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                speed: 500,
                infinite: false,
                prevArrow: $('.arrow-lideshow-mobile-prev'),
                nextArrow: $('.arrow-lideshow-mobile-next'),
            });

            let col = 0;

            $('.js-content-lidesshop-mobile__items').each(function (e, elem) {
                $(elem).find('.lidesshop-mobile__itemm').each(function (i, elems) {
                    col++;
                });
                $(this).attr('data-slick-mob', col);
            });


            $('.js-slidesshop-mobile').on('afterChange', function (event, slick, currentSlide, nextSlide) {
                let cols = $('.js-content-lidesshop-mobile__items.slick-active').attr('data-slick-mob');
                $('.js-col-img-mob').text(cols);
            });

            $('.servise__item.servise__item-btn').remove();

            $('.js-servise__row').slick({
                dots: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: false,
                prevArrow: $('.arrow-lideshow-mobile-prev'),
                nextArrow: $('.arrow-lideshow-mobile-next'),
            });

            $('.js-servise__row').on('afterChange', function (event, slick, currentSlide, nextSlide) {
                let col_item = $('.js-servise-item.slick-active').attr('data-id-servise');
                $('.js-col-item-mob').text(col_item);
            });

            cons = false;
        }
    }

    srartMob();

    $(window).on('resize', function () {
        srartMob();
    });


    $('.js-price-cat').click(function () {
        let data_in = $(this).find('.js-main-sel').attr('data-value');
        $('.js-section-price__item').removeClass('active');

        if (data_in < 0) {
            $('.js-mob-prise').removeClass('none');
        } else {
            $('.js-mob-prise').addClass('none');
        }

        $('.js-section-price__item').each(function (e, elem) {

            if (data_in == $(elem).attr('data-id-price')) {
                $(elem).addClass('active');
            }
        });

    });

    // менял
    $('.js-quipment').click(showAllCharacteristics)


    function showAllCharacteristics() {

        if (!$(this).hasClass('active')) {
            $('.section-equipment__lisp').fadeIn(300);
            $(this).addClass('active').text('Свернуть');
        } else {
            $('.section-equipment__lisp').fadeOut(300);
            $(this).removeClass('active').text('Все характеристики');
        }

    }

    // менял прокрутка по якорю (по атибуту)

    $(function () {
        if ($('.js-section-price__item').length > 0) {
            let d_anchor = $('.js-section-price__item');
            let local = location.href;

            d_anchor.each(function (e, elem) {

                if (local.indexOf($(elem).attr('data-anchor')) !== -1) {
                    console.log($(elem).offset().top);
                    $('html, body').animate({
                        scrollTop: $(elem).offset().top - 100,
                    }, 500)
                }
            });
        }
    });

    //    новое  12.06

    if ($(window).width() <= 768) {
        $('.wr-treatment__content').append($('.js-dop-address'));
    }

    if ($(window).width() <= 992) {
        $('.js-in-aside').append($('.js-news__aside'));
    }

});