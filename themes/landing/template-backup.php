<?php
/*
Template Name: backup
*/
get_header(); ?>

<?php $my_lang = pll_current_language();
if ( $my_lang == 'fr' ) {
    $lang = 25;
    $top = 92;
    $single = 87;
    $img = 103;
    $logo = 99;
    $main = 111;
    $heim = 107;
    $tag='fr';}
else {  $lang = 23;
        $single = 85;
        $top = 90;
        $img = 101;
        $logo = 97;
        $main = 109;
        $heim = 105;
        $tag='en';}?>

<div class="home-content">
    <div class="row first" style="background-image: url('<?php the_field('first-bg'); ?>')">
        <div class="container">
            <div class="first-group"><p><?php the_field('first-group'); ?></p></div>
            <div class="first-header"><h1><?php the_field('first'); ?></h1></div>
            <div class="btn-wrapper">
                <a class="white-btn" href="https://yurplan.com/event/RAGNARD-ROCK-FEST-2017-Children-of-Yggdrasil/10874" target="_blank">
                    <?php $my_lang = pll_current_language();
                    if ( $my_lang == 'fr' ) {echo ('Acheter des billets');}
                    else {echo ('Buy tickets');}?>
                </a>
            </div>
        </div>
    </div>
    <div class="row main-page-content">
        <div class="container">
            <?php the_post(); ?>
            <?php the_content(); ?>
        </div>
    </div>
    <div class="row video-href" style="background-image: url('<?php the_field('video-bg'); ?>')">
        <div class="container">
            <h3 class="video-title"><?php the_field('video-title'); ?></h3>
            <p class="video-text"><?php the_field('video-text'); ?></p>
            <div class="btn-wrapper">
                <a class="white-btn" href="<?php the_field('video-href'); ?>" target="_blank">watch video</a>
            </div>
        </div>
    </div>
    <div class="row advantages">
        <div class="container">
           <div class="advant-wrapper">
               <?php if( have_rows('advantages') ):?>
                   <?php while ( have_rows('advantages') ) : the_row(); ?>
                       <div class="advant-box">
                           <p><?php the_sub_field('text'); ?></p>
                           <div class="img">
                               <img src="<?php the_sub_field('img'); ?>" alt="">
                           </div>
                       </div>
                   <?php endwhile;?>
               <?php else :
               endif;?>
           </div>
        </div>
    </div>
    <div class="row stage" style="background-image: url('<?php the_field('stage-bg'); ?>')">
        <div class="container">
            <h3 class="stage-title"><?php the_field('stage-title'); ?></h3>
            <p class="stage-date"><?php the_field('stage-date'); ?></p>
            <div class="single-wrapper">
                <?php $posts = get_posts ("category=$single&order=ASC&numberposts=1"); ?>
                <?php if ($posts) : ?>
                    <?php foreach ($posts as $post) : setup_postdata ($post); ?>
                        <div class="block">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php the_field('logo'); ?>" alt="">
                            </a>
                        </div>
                        <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                <?php endif; ?>
            </div>

            <div class="top-wrapper">
                <?php
                $args = array(
                'numberposts' => -1,
                'category'    => $top,
                'orderby'     => 'meta_value_num',
                'order'       => 'ASC',
                'meta_key'  =>'sorting_number',
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                );
                $posts = get_posts ($args); ?>
                <?php if ($posts) : ?>
                    <?php foreach ($posts as $post) : setup_postdata ($post); ?>
                        <div class="block">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                        <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="row main-calendar">
        <div class="container">
            <h3 class="main-calendar-title"><?php the_field('main-calendar-title'); ?></h3>
            <p class="main-calendar-date"><?php the_field('main-calendar'); ?></p>
            <div class="main-img-wrapper">
                <?php
                $args = array(
                    'numberposts' => 6,
                    'category'    => $img,
                    'orderby'     => 'meta_value_num',
                    'order'       => 'ASC',
                    'meta_key'  =>'sorting_number',
                    'post_type'   => 'post',
                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                );
                $posts = get_posts ($args); ?>
                <?php if ($posts) : ?>
                    <?php foreach ($posts as $post) : setup_postdata ($post); ?>
                        <div class="block">
                            <?php   the_post_thumbnail('full' ); // category-thumb - название размера ?>
                            <div class="btn-wrapper">
                                <a class="white-btn" href="<?php the_permalink(); ?>">
                                    <?php $my_lang = pll_current_language();
                                    if ( $my_lang == 'fr' ) {echo ('Plus');}
                                    else {echo ('More');}?>
                                </a>

                            </div>
                        </div>
                        <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                <?php endif; ?>
            </div>
            <div class="main-text-wrapper">
                <?php
                $args = array(
                    'numberposts' => -1,
                    'category'    => $main,
                    'meta_key'  =>'sorting_number',
                    'orderby'     => 'meta_value_num',
                    'order'       => 'ASC',
                    'post_type'   => 'post',
//                    'type' => 'numeric',
//                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                );
                $posts = get_posts ($args); ?>
                <?php if ($posts) : ?>
                    <?php foreach ($posts as $post) : setup_postdata ($post); ?>
                        <div class="block">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <p class="hidden"><?php the_field('sorting_number'); ?></p>
                        </div>
                        <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
    <div class="row heim-calendar">
        <div class="container">
            <h3 class="heim-calendar-title"><?php the_field('heim-calendar-title'); ?></h3>
            <p class="heim-calendar-date"><?php the_field('heim-calendar'); ?></p>
            <div class="heim-logo-wrapper">
                <?php
                $args = array(
                    'numberposts' => -1,
                    'category'    => $logo,
                    'meta_key'  =>'sorting_number',
                    'orderby'     => 'meta_value_num',
                    'order'       => 'ASC',
                    'post_type'   => 'post',
//                    'type' => 'numeric',
//                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                );
                $posts = get_posts ($args); ?>
                <?php if ($posts) : ?>
                    <?php foreach ($posts as $post) : setup_postdata ($post); ?>
                        <div class="block">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php the_field('main-logo'); ?>" alt="">
                            </a>
                        </div>
                        <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                <?php endif; ?>
            </div>
            <div class="heim-text-wrapper">
                <?php
                $args = array(
                    'numberposts' => -1,
                    'category'    => $heim,
                    'meta_key'  =>'sorting_number',
                    'orderby'     => 'meta_value_num',
                    'order'       => 'ASC',
                    'post_type'   => 'post',
//                    'type' => 'numeric',
//                    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                );
                $posts = get_posts ($args); ?>
                <?php if ($posts) : ?>
                    <?php foreach ($posts as $post) : setup_postdata ($post); ?>
                        <div class="block">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                        <?php
                    endforeach;
                    wp_reset_postdata();
                    ?>
                <?php endif; ?>
            </div>
            <div class="btn-wrapper">
                <a class="white-btn" href="https://yurplan.com/event/RAGNARD-ROCK-FEST-2017-Children-of-Yggdrasil/10874" target="_blank">
                    <?php $my_lang = pll_current_language();
                    if ( $my_lang == 'fr' ) {echo ('Acheter des billets');}
                    else {echo ('Buy tickets');}?>
                </a>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
