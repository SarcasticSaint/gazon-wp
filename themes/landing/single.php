<?php
/**
 * The template for displaying all posts.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package landing
 */


get_header(); ?>

<div class="row post-content" id="block2">
    <div class="container">
        <h2>Портфолио</h2>
        <div class="post-wrapper">
            <div class="post-info">
                <h3><?php the_title();?></h3>
                <h4>Задача</h4>
                <p><?php the_field('task'); ?></p>
                <h4>Описание работ</h4>
                <?php if( have_rows('desc-repeater') ):?>
                    <ul class="desc-wrapper">
                        <?php while ( have_rows('desc-repeater') ) : the_row(); ?>
                            <li><i class="fa fa-check" aria-hidden="true"></i> <?php the_sub_field('text'); ?></li>
                        <?php endwhile;?>
                    </ul>
                <?php else :
                endif;?>
                <h4>Срок реализации</h4>
                <p><?php the_field('time'); ?></p>
                <div class="post-hrefs">
                    <a class="main-href" href="<?php echo get_home_url(); ?>">На главную</a>
                    <?php
                    $next_post = get_next_post($in_same_cat = true);
                    if( ! empty($next_post) ){
                        ?>
                        <a class="next-href" href="<?php echo get_permalink( $next_post->ID ); ?>">Следующий объект</a>
                        <?php
                        }
                    ?>
                </div>
            </div>
            <div class="post-img">
                <?php if( have_rows('portfolio') ):?>
                    <ul class="portfolio-post">
                        <?php while ( have_rows('portfolio') ) : the_row(); ?>
                            <li><img src="<?php the_sub_field('img'); ?>" alt=""></li>
                        <?php endwhile;?>
                    </ul>
                <?php else :
                endif;?>
            </div>

        </div>
    </div>
</div>


<?php get_footer(); ?>
