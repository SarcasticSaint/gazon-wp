</div>

<footer>
    <div class="container">
        <div class="widgets-footer">
            <?php if ( is_active_sidebar( 'true_footer' ) ) : ?>
                <div id="true_footer" class="sidebar">
                    <?php dynamic_sidebar( 'true_footer' ); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="footer-menu">
            <?php wp_nav_menu('theme_location=lower_menu'); ?>
        </div>
    </div>
</footer>

<!--call popup-->
<div class="modal fade " id="modal-call" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-title">
                <button class="close" type="button" data-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <h3>Заполните форму и получите чек-лист!</h3>
                <?php echo do_shortcode( '[contact-form-7 id="202"]' );?>
            </div>
        </div>
    </div>
</div>


<!--thanks popup -->
<div class="popup thanks">
    <div class="modal-dialog clearfix ty">
        <div class="modal-title">
            <button class="close popcloser" type="button"></button>
        </div>
        <div class="modal-body">
            <?php
            $post_id = 203;
            $my_post = get_post($post_id);?>
            <?php echo apply_filters( 'the_content', $my_post->post_content );
            ?>
        </div>
    </div>
</div>

<!--video popup -->
<div class="popup video-popup">
    <div class="modal-dialog clearfix ty">
        <div class="modal-title">
            <button class="close popcloser" type="button" id="video-close"></button>
        </div>
        <div class="modal-body">
            <div class="video-wrapper">
                <div class="video-cont" id="video-cont">

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" language="javascript">
    function modal() {
        jQuery('.modal').removeClass('in');
        jQuery('.modal').fadeOut('slow');
        jQuery('.modal-backdrop').fadeOut('slow');
        jQuery('body').css('padding-right','0');
        jQuery('body').css('overflow','auto');
        jQuery('body').removeClass('modal-open');
        jQuery('.thanks').fadeIn('slow');
    }
</script>


<?php wp_reset_query();?>
<?php wp_footer();?>
</body>
</html>