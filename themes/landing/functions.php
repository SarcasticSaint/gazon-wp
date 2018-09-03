<?php

if( !is_admin() ){
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-1.11.3');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script('owl', get_template_directory_uri() . '/js/owl.carousel.js');
    wp_enqueue_script('liLanding', get_template_directory_uri() . '/js/jquery.liLanding.js');
    wp_enqueue_script('maskedinput', get_template_directory_uri() . '/js/jquery.maskedinput.min.js');
    wp_enqueue_script('custom', get_template_directory_uri() . '/js/common.js');
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('owl-css', get_template_directory_uri() . '/css/owl.carousel.css');
    wp_enqueue_style('awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('liLanding-css', get_template_directory_uri() . '/css/liLanding.css');
    wp_enqueue_style('fonts', get_template_directory_uri() . '/css/fonts.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('style-css', get_template_directory_uri() . '/style.css');
}

function true_register_wp_sidebars() {
    register_sidebar(array(
        'id' => 'true_header',
        'name' => 'Виджеты шапки',
        'description' => 'Перетащите сюда виджеты, чтобы добавить их в хидер.',
        'before_widget' => '<aside class="widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3  class="widget-title">',
        'after_title'   => '</h3>',
    ));
    /* В подвале - второй сайдбар */
    register_sidebar(
        array(
            'id' => 'true_footer',
            'name' => 'Виджеты подвала',
            'description' => 'Перетащите сюда виджеты, чтобы добавить их в футер.',
            'before_widget' => '<aside class="widget">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3  class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', 'true_register_wp_sidebars' );

if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}
register_nav_menus( array(
    'upper_menu' => 'Меню главной страницы',
    'lower_menu' => 'Нижнее меню (футер)',
    'text_menu' => ' Меню записей'
) );
add_theme_support('post-thumbnails'); // поддержка миниатюр
//add_image_size('slider-thumb', 160, 160, true); // добавляем еще один размер картинкам 400x400 с обрезкой
add_image_size('bigslider-thumb', 1900, 595); // добавляем еще один размер

//////////// обрезка анонса до n символов
function excerpt($limit) {
    return wp_trim_words(get_the_excerpt(), $limit);
}



///////////// миниатюры
add_theme_support('post-thumbnails'); // поддержка миниатюр
//add_image_size('slider-thumb', 160, 160, true); // добавляем еще один размер картинкам 400x400 с обрезкой
add_image_size('bigslider-thumb', 1900, 595); // добавляем еще один размер
?>