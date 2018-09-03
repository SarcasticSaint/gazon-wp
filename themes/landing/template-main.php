<?php
/*
Template Name: Home page
*/
get_header(); ?>
<?php ?>
<script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
<script type="text/javascript">
    ymaps.ready(init); // карта соберется после загрузки скрипта и элементов
    var myMap; // заглобалим переменную карты чтобы можно было ею вертеть из любого места
    function init () { // функция - собиралка карты и фигни
        myMap = new ymaps.Map("map", { // создаем и присваиваем глобальной переменной карту и суем её в див с id="map"
            center: [55.736679, 37.661318], // центр
            behaviors: ['default'], // скроллинг колесом
            zoom: 17 // тут масштаб

        });
        myMap.controls // добавим всяких кнопок, в скобках их позиции в блоке
            .add('zoomControl', { left: 5, top: 5 }) //Масштаб
            .add('typeSelector') //Список типов карты
            //.add('mapTools', { left: 35, top: 5 }) // Стандартный набор кнопок

            //.add('searchControl'); // Строка с поиском

        /* Создаем кастомные метки */
        myPlacemark0 = new ymaps.Placemark([55.736042, 37.661329], { // Создаем метку с такими координатами и суем в переменную
            balloonContent: '<div class="ballon">' +
            '<p><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:8 (499) 390-68-48">8 (499) 390-68-48</a></p>' +
            '<p><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:gazon-5@yandex.ru">gazon-5@yandex.ru</a></p>' +
            '<p><i class="fa fa-map-marker" aria-hidden="true"></i> 121500, г. Москва, <br> ул. Воронцовская 25с3</p>' +
            '<p class="ballon-close" onclick="myMap.balloon.close()"></p></div>' // сдесь содержимое балуна в формате html, все стили в css
        }, {
            iconImageHref: 'wp-content/themes/landing/img/map-pin-silhouette.png', // картинка иконки
            iconImageSize: [42, 54], // размер иконки
            iconImageOffset: [-20, -40], // позиция иконки
            balloonContentSize: [280, 181], // размер нашего кастомного балуна в пикселях
            balloonLayout: "default#imageWithContent", // указываем что содержимое балуна кастомное
            balloonImageHref: 'wp-content/themes/landing/img/ballon.png', // Картинка заднего фона балуна
            balloonImageOffset: [-140, -230], // смещание балуна, надо подогнать под стрелочку
            balloonImageSize: [280, 181], // размер картинки-бэкграунда балуна
            balloonShadow: false,
            hideIconOnBalloonOpen:false, // не скрываем метку при открытом балуне
            balloonAutoPan: false // для фикса кривого выравнивания
        });

        /* Добавляем */
        myMap.geoObjects
            .add(myPlacemark0);
            myPlacemark0.balloon.open();
//        /* Фикс кривого выравнивания кастомных балунов */
//        myMap.geoObjects.events.add([
//            'balloonopen'
//        ], function (e) {
//            var geoObject = e.get('target');
//            myMap.panTo(geoObject.geometry.getCoordinates(), {
//                delay: 0
//            });
//        });
    }
</script>

<?php //wp_nav_menu('theme_location=upper_menu'); ?>

<?php
wp_nav_menu( array( 'container'=> false, 'theme_location'=> 'upper_menu','menu_id'=> 'liLanding','menu_class'=> 'landingDotted' ) );
?>

<header>
    <div class="container">
        <a href="<?php echo get_home_url(); ?>" class="header-logo">
            <img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="">
        </a>
        <div class="widgets-header">
            <?php if ( is_active_sidebar( 'true_header' ) ) : ?>
                <div id="true_header" class="sidebar">
                    <?php dynamic_sidebar( 'true_header' ); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>
<div class="container-fluid main" role="main">
<div class="row first landingItem" id="block1" style="background-image: url('<?php the_field('first-bg'); ?>')">
    <div class="container">
        <div class="text">
            <?php
            the_post();
            the_content();
            ?>
        </div>
        <div class="hrefs">
            <a class="video-href" href="#" data-video="<?php the_field('main-video',2); ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            <button type="button" class="btn-white check-btn" data-toggle="modal" data-target="#modal-call">Скачать чек лист</button>
        </div>
    </div>
</div>
<div class="row whywe landingItem" id="block2">
    <div class="container">
        <h2><?php the_field('why-title'); ?></h2>
        <div class="img">
            <img src="<?php the_field('why-img'); ?>" alt="">
            <p><?php the_field('why-img-text'); ?></p>
        </div>
        <?php if( have_rows('why-repeater') ):?>
            <ul class="why-wrapper">
                <?php while ( have_rows('why-repeater') ) : the_row(); ?>
                    <li>
                        <h3><?php the_sub_field('title'); ?></h3>
                        <p class="text"><?php the_sub_field('text'); ?></p>
                    </li>
                <?php endwhile;?>
            </ul>
        <?php else :
        endif;?>
    </div>
</div>
<div class="row features landingItem" id="block3">
    <div class="container">
        <h2><?php the_field('features-title'); ?></h2>
        <?php if( have_rows('features-repeater') ):?>
            <?php $counter=0;?>
            <ul class="features-wrapper">
                <?php while ( have_rows('features-repeater') ) : the_row(); ?>
                    <li>
                        <div class="number">
                            <p><?php echo ++$counter;?></p>
                        </div>
                        <div class="text-block">
                            <p class="title"><?php the_sub_field('title'); ?></p>
                            <p class="text"><?php the_sub_field('text'); ?></p>
                        </div>
                    </li>
                <?php endwhile;?>
            </ul>
        <?php else :
        endif;?>
    </div>
</div>
<div class="row base landingItem" id="block4">
    <div class="container">
        <h2><?php the_field('base-title'); ?></h2>
        <div class="base-wrapper">
            <div class="base-left">
                <h3><?php the_field('base-subtitle1'); ?></h3>
                <div class="img">
                    <img src="<?php the_field('base-img'); ?>" alt="">
                    <?php if( have_rows('base-repeater') ):?>
                        <?php $counter=0;?>
                        <?php while ( have_rows('base-repeater') ) : the_row(); ?>
                            <p class="abs abs-<?php echo $counter++;?>">
                                <span class="abs-plus"><span class="plus">+</span></span>
                                <span class="abs-text"><?php the_sub_field('text'); ?></span>
                            </p>
                        <?php endwhile;?>
                    <?php else :
                    endif;?>
                </div>

            </div>
            <div class="base-right">
                <h3><?php the_field('base-subtitle2'); ?></h3>
                <p><?php the_field('base-text'); ?></p>
            </div>
        </div>
    </div>
</div>
<div class="row tech landingItem" id="block5">
    <div class="container">
        <div class="tech-form">
            <h2><?php the_field('form-title'); ?></h2>
            <p><?php the_field('form-text'); ?></p>
            <?php echo do_shortcode( '[contact-form-7 id="4"]' );?>
        </div>
    </div>
</div>
<div class="row type landingItem" id="block6">
    <div class="container">
        <h2><?php the_field('type-title'); ?></h2>
        <?php if( have_rows('type-repeater') ):?>
            <div class="type-wrapper">
                <?php while ( have_rows('type-repeater') ) : the_row(); ?>
                    <div class="type-box">
                        <?php if( get_sub_field('image') ) { ?>
                            <div class="img">
                                <img src="<?php the_sub_field('image'); ?>" alt="">
                            </div>
                        <?php } ?>

                        <div class="text">

                            <?php if( get_sub_field('title') ) { ?>
                                <h3><?php the_sub_field('title'); ?></h3>
                            <?php } ?>

                            <?php if( get_sub_field('sostav') ) { ?>
                                <p class="sostav"><strong>Состав:</strong> <?php the_sub_field('sostav') ; ?></p>
                            <?php } ?>

                            <?php if( get_sub_field('text') ) { ?>
                                <p class="descr"><?php the_sub_field('text') ; ?></p>
                            <?php } ?>

                            <?php if( get_sub_field('parameters') ) { ?>
                                <p class="param"> <strong>Параметры:</strong> <?php the_sub_field('parameters') ; ?></p>
                            <?php } ?>

                            <?php if( get_sub_field('weight') ) { ?>
                                <p class="weight"> <strong>Вес:</strong> <?php the_sub_field('weight') ; ?></p>
                            <?php } ?>

                            <?php if( get_sub_field('price') ) { ?>
                                <p class="price"><?php the_sub_field('price') ; ?></p>
                            <?php } ?>

                            <button type="button" class="btn-green order-btn" data-toggle="modal" data-target="#modal-call">Заказать</button>

                        </div>
                    </div>
                <?php endwhile;?>
            </div>
        <?php else :
        endif;?>

    </div>
</div>
<div class="row special landingItem" id="block7">
    <div class="container">
        <h2><?php the_field('products-title'); ?></h2>
        <div class="special-wrapper">
            <?php if( have_rows('products-repeater') ):?>
                <?php while ( have_rows('products-repeater') ) : the_row(); ?>
                    <div class="product-box">
                        <div class="img">
                            <img src="<?php the_sub_field('img'); ?>" alt="">
                        </div>
                        <div class="text">
                            <p><?php the_sub_field('text'); ?></p>
                        </div>
                    </div>
                <?php endwhile;?>
            <?php else :
            endif;?>
        </div>
    </div>
</div>
<div class="row portfolio landingItem" id="block8">
    <div class="container">
        <h2><?php the_field('port-title'); ?></h2>
        <div class="portfolio-wrapper">
            <?php
            $args = array(
                'numberposts' => 24,
                'category'    => 4,
                'order'       => 'ASC',
                'post_type'   => 'post',
            );
            $posts = get_posts ($args); ?>
            <?php if ($posts) : ?>
                <?php $count = 0; ?>
                <?php foreach ($posts as $key=>$post) : setup_postdata ($post); ?>
                    <?php
                        $index = ($key%3 == 2) ? 'one' : 'duo' ;//1-2 элементу даем класс дуо. каждому третьему - ван
                    ?>
                    <a class="port-block size-<?php echo $index; ?>" href="<?php the_permalink(); ?>">
                        <span class="inner">
                            <img src="<?php the_field('port-img'); ?>" alt="">
                            <span class="hover-title"><?php the_title(); ?></span>
                        </span>
                    </a>
                    <?php
                endforeach;
                wp_reset_postdata();
                ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="row afterport ">
    <div class="container">
        <h2><?php the_field('afterport-title'); ?></h2>
    </div>
</div>
<div class="row how landingItem" id="block9">
    <div class="container">
        <h2><?php the_field('how-title'); ?></h2>
        <div class="tabs">
            <ul class="nav nav-tabs" role="tablist" id="tabs">
                <?php if( have_rows('how-repeater') ):?>
                    <?php $counter = 0; ?>
                    <?php while ( have_rows('how-repeater') ) : the_row(); ?>
                        <li><a href="#tab<?php echo $counter++?>" role="tab" data-toggle="tab"><?php echo $counter?></a></li>
                    <?php endwhile;?>
                <?php else :
                endif;?>
            </ul>

            <div class="tab-content">
                <?php if( have_rows('how-repeater') ):?>
                    <?php $counter = 0; ?>
                    <?php while ( have_rows('how-repeater') ) : the_row(); ?>
                        <div class="tab-pane" id="tab<?php echo $counter++?>">
                            <p class="title"><?php the_sub_field('title'); ?></p>
                            <p class="text"><?php the_sub_field('text'); ?></p>
                        </div>
                    <?php endwhile;?>
                <?php else :
                endif;?>
            </div>
        </div>



    </div>
</div>
<div class="row promo landingItem" id="block10">
    <div class="container">
        <h2><?php the_field('promo-title'); ?></h2>
        <p class="subtitle"><?php the_field('promo-subtitle'); ?></p>
        <?php if( have_rows('promo-repeater') ):?>
            <ul class="promo-wrapper">
                <?php while ( have_rows('promo-repeater') ) : the_row(); ?>
                    <li><?php the_sub_field('text'); ?></li>
                <?php endwhile;?>
            </ul>
        <?php else :
        endif;?>
    </div>
</div>
<div class="row bonus">
    <div class="container">
        <?php echo do_shortcode( '[contact-form-7 id="201"]' );?>
    </div>
</div>
<div class="row map landingItem" id="block11">
    <h2><?php the_field('loc-title'); ?></h2>
    <div id="map"></div>
</div>

<?php get_footer(); ?>
