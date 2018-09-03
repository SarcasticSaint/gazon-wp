<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package landing
 */


get_header(); ?>


<div class="page-content-wrapper">
    <div class="row page-content">
        <div class="container">
            <?php the_post(); ?>
            <?php the_content(); ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>
