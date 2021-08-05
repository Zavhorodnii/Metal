'use strict'

$(document).ready(function () {

    // $(".item_сalc_file").change(function(){
    //     var th = $(this);
    //     //some action
    // });

    $('.item_calc_file').change(function(){
        alert('Hello world');
    });

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
        if ($(this).prop('checked')) {
            $(this).closest('.js-price-row').addClass('active');
        } else {
            $(this).closest('.js-price-row').removeClass('active');
        }
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
            $('.js-clear-search').removeClass('active');
            $('.js-close-search-mob').removeClass('none');
            $('.js-search-bnt-mob').addClass('none');
        }
    });

    // менял
    $('.js-clear-search').click(function () {
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

    $('.js-mask').on('input', function () {
        validPhone($(this));
    });

    $('.js-email').on('input', function () {
        vaidEmail($(this));
    });

    $('.js-name').on('input', function () {
        validName($(this));
    });

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
    $('.js-quipment').click(function () {


        if (!$(this).hasClass('active')) {
            $('.section-equipment__lisp').fadeIn(300);
            $(this).addClass('active').text('Свернуть');
        } else {
            $('.section-equipment__lisp').fadeOut(300);
            $(this).removeClass('active').text('Все характеристики');
        }

    })

    // $('.ul-type-8 ').css('padding-left', '40px')

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