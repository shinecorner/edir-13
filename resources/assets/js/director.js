$(window).load(function () {
    'use strict';

    /***********************************************************
     * ISOTOPE
     ***********************************************************/
    var isotope_works = $('.portfolio-isotope');
    isotope_works.isotope({
        'itemSelector': '.portfolio-item-isotope'
    });

    $('.portfolio-isotope-filter a').click(function () {
        $(this).parent().parent().find('li').removeClass('selected');
        $(this).parent().addClass('selected');

        var selector = $(this).attr('data-filter');
        isotope_works.isotope({filter: selector});
        return false;
    });

	/******************************************************************************
     * CONTACT-FORM
     ******************************************************************************/

    /* Form Validation, Submit Review */
    $('#review-form, #contact-form').on('submit', function (event) {
        event.preventDefault();
        grecaptcha.execute();
    });

    $.submitForm = function (formtype) {
        var $form = $('#' + formtype);

        var btn = $form.find('button[type="submit"]');
        btn.button('loading');

        $.ajax({
            url: $form.attr('action'),
            data: $form.serialize(),
            type: $form.attr('method')
        })
            .fail(function (resp) {
                $("#error-alert-sub").html('');
                try
                {
                    if(JSON.parse(resp)){
                        $.each(resp.responseJSON, function (k, v) {
                            $("#error-alert-sub").append(v.join('<br>'));
                        });
                    }
                }catch(e){

                }
                $("#error-alert").fadeTo(7000, 500).slideUp(500, function(){
                    $("#error-alert").slideUp(500);
                });
                setTimeout(function () {
                    btn.button('reset')
                }, 1000);
                grecaptcha.reset();
            })
            .done(function (resp) {

                btn.button('success');
                btn.hide();
                $("#success-alert").fadeTo(7000, 500).slideUp(500, function(){
                    $("#success-alert").slideUp(500);
                });
            });
    };

});

$(document).ready(function () {
    'use strict';

    /***********************************************************
     * ION RANGE SLIDER
     ***********************************************************/
    $('.price-range').ionRangeSlider({
        min: 1000,
        max: 150000,
        step: 3000,
        prefix: "$",
        maxPostfix: "+"
    });

    /***********************************************************
     * TABS
     ***********************************************************/
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

    /***********************************************************
     * CHOSEN
     ***********************************************************/
    $('select').chosen({
        'disable_search_threshold': 5
    });

    /***********************************************************
     * ACCORDION
     ***********************************************************/
    $('.panel-heading a[data-toggle="collapse"]').on('click', function () {
        var context = $(this).data('parent');
        var clicked_panel = $(this).parent().parent();

        if (clicked_panel.hasClass('active')) {
            $(clicked_panel).removeClass('active');
        } else {
            $('.panel-heading', context).removeClass('active');
            $(clicked_panel).addClass('active');
        }
    });

    /******************************************************************************
     * BXSLIDER
     ******************************************************************************/
    $('.car-carousel').bxSlider({
        minSlides: 5,
        maxSlides: 5,
        slideWidth: 270,
        slideMargin: 30,
        responsive: false
    });




    $('.gallery').bxSlider({
        pagerSelector: '#gallery-pager .pager',
        mode: 'vertical',
        nextSelector: '#gallery-pager .next',
        nextText: '',
        prevSelector: '#gallery-pager .prev',
        prevText: '',
        buildPager: function (slideIndex) {
            var selector = '.thumbnail-' + slideIndex;
            return $(selector).html();
        }
    });

    /******************************************************************************
     * BACKGROUND IMAGE
     ******************************************************************************/
    $('*[data-background-image]').each(function () {
        $(this).css({
            'background-image': 'url(' + $(this).data('background-image') + ')'
        });
    });

    /******************************************************************************
     * CONTENT ROW PICTURE
     ******************************************************************************/
    $('.content-row-picture').each(function () {
        var height = $(this).height();
        $('.content-row-picture-inner', this).css({'height': height});
    });

});