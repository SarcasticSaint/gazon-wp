(function($){//нужная строка


    function open_popup() {
        var yt = $('.video-href').attr('data-video');
        console.log(yt);
        $('#video-cont').append('<iframe id="yt" width="560" height="315" src="//www.youtube.com/embed/'+yt+'?rel=0&amp;autoplay=1" frameborder="0" allowfullscreen></iframe>');
    }
    function close_popup() {
        $('#yt').remove();
    }

    $(document).ready(function() {//вешаем на загрузку страницы

        if($('#video-close').length){
            $("#video-close").on('click',function(){
                $('.popup .modal-dialog').removeClass('visual');
                $('.popup').fadeOut('slow');
                close_popup();
                console.log('kek');
            });
        }
        if($('.video-href').length){
            $(".video-href").on('click',function(){
                $('.video-popup').fadeIn('slow');
                open_popup();
            });
        }


        if($('.special-wrapper').length){
            var display = document.documentElement.clientWidth;
            var divs = $('.special-wrapper').find('.product-box');
            if(display > 981) {
                for(var i = 0; i < divs.length; i+=3) {
                    divs.slice(i, i+3).wrapAll("<div class='item'></div>");
                }
            }
        }

        if($('.portfolio-wrapper').length){
            $('.portfolio-wrapper .size-one').each(function () {
                var than = $(this),
                    duo = than.prev().add(than.prev().prev());
                than.wrapAll('<div class="wrap"></div>');
                duo.wrapAll('<div class="wrap"></div>');
            });

            $('.portfolio-wrapper .wrap').each(function (i) {
                var than = $(this);
                if(than.index() == 3 || than.index() == 11) {
                    than.addClass('big');
                }
            });
        }

        if($('.how').length){
            $('.nav-tabs li:first, .tab-content .tab-pane:first').addClass('active');
        }

        if($('.abs').length){
            $('.abs').click(function () {
                $(this).toggleClass('active');
            });
        }
        $('#liLanding').liLanding({
            speedFactor: 0.5
        });

        $(document).click(function(){
            $('.wpcf7-not-valid-tip').hide();
            $('body').find('input').removeClass( 'wpcf7-not-valid' );
        });
        $('.modal').on('hidden.bs.modal', function(){
            $('.wpcf7-not-valid-tip').hide();
            $('.modal').find('input').removeClass( 'wpcf7-not-valid' );
        });

        $(".popcloser").on('click',function(){
            $('.popup .modal-dialog').removeClass('visual');
            $('.popup').fadeOut('slow');

        });




        // //анимашка для мобайл меню
        // $('#nav-icon,.nav-close').click(function(){
        //     $('#nav-icon').toggleClass('open');
        //     $('.wrapper-menu-local').toggleClass('visual');
        //     $('.wrapper-menu-local>div').toggleClass('visual');
        //     $('.nav-iconcontainer').toggleClass('visual');
        //     $('body').toggleClass('oh');
        // });
        //
        // универсальный закрывальщик всего (конкретно - клоса на попапе)


        // var delay_popup = 30000;
        // setTimeout(function() {
        //     $('#ad_popup').fadeIn('slow');
        // }, delay_popup);

        // $('.portfolio-wrapper').each(function(){
        //     var $lis = $(this).children('.port-block');
        //     for(var i = 0, len = $lis.length; i < len; i+=3){
        //         $lis.slice(i, i+3).wrapAll("<div class='new'></div>");
        //     }
        // });

        // if( $('.ngg-navigation').length) {
        //     if(location.href.match(/fr/)) {
        //         $('.ngg-navigation .next').text('suivant');
        //         $('.ngg-navigation .prev').text('précédent');
        //     }else{
        //         $('.ngg-navigation .next').text('Next');
        //         $('.ngg-navigation .prev').text('previous ');
        //     }
        // }
        //
        // if( $('#fancybox-outer').length) {
        //     if(location.href.match(/fr/)) {
        //         $('#fancybox-right-ico').text('suivant');
        //         $('#fancybox-left-ico').text('précédent');
        //     }else{
        //         $('#fancybox-right-ico').text('Next');
        //         $('#fancybox-left-ico').text('previous');
        //     }
        //     $('#fancybox-right-ico').addClass('lol');
        // }
        // if($('.about-content-wrapper').length){
        //     $('.ngg-galleryoverview').each(function (i) {
        //         $(this).addClass('about-gallery-'+(i+1));
        //
        //     });
        // }

        // $(document).mouseup(function (e){ // событие клика по веб-документу
        //     var div = $(".wrapper-menu-local>div"); // тут указываем ID элемента
        //     if (!div.is(e.target) // если клик был не по нашему блоку
        //         && div.has(e.target).length === 0) { // и не по его дочерним элементам
        //         $('#nav-icon').removeClass('open');
        //         $('.wrapper-menu-local').removeClass('visual');
        //         $('.wrapper-menu-local>div').removeClass('visual');
        //         $('.nav-iconcontainer').removeClass('visual');
        //         $('body').removeClass('oh');
        //         // $('#popup-info .modal-dialog .modal-content .modal-body').empty(); //очищаем
        //     }
        // });

         // if(document.documentElement.clientWidth > 767) {}

    });

})(jQuery);//нужная строка
