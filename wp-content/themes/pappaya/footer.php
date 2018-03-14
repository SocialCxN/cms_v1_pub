<?php
/**
 * The template for displaying the footer.
 */
?>
        <!-- Footer -->
        </div>
        <?php if( (strlen(get_theme_mod('pappaya_footer_small_logo'))>0) || (strlen(get_theme_mod('pappaya_fb_url'))>0)||(strlen(get_theme_mod('pappaya_twitter_url'))>0)
        ||(strlen(get_theme_mod('pappaya_linkedin_url'))>0)||(strlen(get_theme_mod('pappaya_pinterest_url'))>0)||(strlen(get_theme_mod('pappaya_googleplus_url'))>0)
        ||(strlen(get_theme_mod('pappaya_youtube_url'))>0)||(strlen(get_theme_mod('pappaya_instagram_url'))>0) || (strlen( get_theme_mod('pappaya_footer_copy') )>0)
        ||is_active_sidebar('footer_sidebar_1')||is_active_sidebar('footer_sidebar_2')||is_active_sidebar('footer_sidebar_3')||is_active_sidebar('footer_sidebar_4') ){ ?>
    		<footer class="footer wn">
                <?php  if( is_active_sidebar( 'footer_sidebar_1' )||is_active_sidebar( 'footer_sidebar_2' )||is_active_sidebar( 'footer_sidebar_3' )||is_active_sidebar( 'footer_sidebar_4' ) ){
                    $bgStyle=null;
                    if( get_theme_mod( 'pappaya_footer_top_background' )!=null && (strlen(get_theme_mod( 'pappaya_footer_top_background' )) >0 ) ) { 
                        $bgStyle='style="background-image:url(\''.esc_url( get_theme_mod( 'pappaya_footer_top_background' ) ).'\');"';
                    } ?>
                    <div class="footer-top section section-boxed" <?php if(strlen($bgStyle)>0){ echo wp_kses( $bgStyle, array('style' => array('background-image',array('url'))));} ?>>
                        <div class="fw-container">
                            <div class="fw-row">
                                <div class="fw-col-md-3">
                                    <div class="widget">
                                        <?php dynamic_sidebar( 'footer_sidebar_1' ); ?>
                                    </div>
                                </div>
                                <div class="fw-col-md-3">
                                    <div class="widget">
                                        <?php dynamic_sidebar( 'footer_sidebar_2' ); ?>
                                    </div>
                                </div>
                                <div class="fw-col-md-3">
                                    <div class="widget">
                                        <?php dynamic_sidebar( 'footer_sidebar_3' ); ?>
                                    </div>
                                </div>
                                <div class="fw-col-md-3">
                                    <div class="widget">
                                        <?php dynamic_sidebar( 'footer_sidebar_4' ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                <?php }

                if( (strlen(get_theme_mod('pappaya_footer_small_logo'))>0) || (strlen(get_theme_mod('pappaya_fb_url'))>0)||(strlen(get_theme_mod('pappaya_twitter_url'))>0)
                ||(strlen(get_theme_mod('pappaya_linkedin_url'))>0)||(strlen(get_theme_mod('pappaya_pinterest_url'))>0)||(strlen(get_theme_mod('pappaya_googleplus_url'))>0)
                ||(strlen(get_theme_mod('pappaya_youtube_url'))>0)||(strlen(get_theme_mod('pappaya_instagram_url'))>0) || (strlen( get_theme_mod('pappaya_footer_copy') )>0) ){ ?>
                    <div class="footer-bottom">
                        <div class="fw-container">
                            <?php if (strlen(get_theme_mod('pappaya_footer_small_logo'))>0) { ?>
                                <div class="footer-logo">
                                    <a href="<?php echo site_url(); ?>">
                                        <img src="<?php echo esc_url(get_theme_mod('pappaya_footer_small_logo')); ?>" alt="<?php echo esc_attr(get_bloginfo('name'));?>"/>
                                    </a>
                                </div>
                            <?php }
                            if ( (strlen(get_theme_mod('pappaya_fb_url'))>0)||(strlen(get_theme_mod('pappaya_twitter_url'))>0)||(strlen(get_theme_mod('pappaya_linkedin_url'))>0)
                                ||(strlen(get_theme_mod('pappaya_pinterest_url'))>0)||(strlen(get_theme_mod('pappaya_googleplus_url'))>0)||(strlen(get_theme_mod('pappaya_youtube_url'))>0)
                                ||(strlen(get_theme_mod('pappaya_instagram_url'))>0) ){ ?>
                                <ul class="social">
                                    <?php if (strlen(get_theme_mod('pappaya_fb_url'))>0) { ?>
                                        <li><a href="<?php echo esc_url( get_theme_mod('pappaya_fb_url') );?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                    <?php }
                                    if (strlen(get_theme_mod('pappaya_twitter_url'))>0) { ?>
                                        <li><a href="<?php echo esc_url( get_theme_mod('pappaya_twitter_url') );?>" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                    <?php }
                                    if (strlen(get_theme_mod('pappaya_linkedin_url'))>0) { ?>
                                        <li><a href="<?php echo esc_url( get_theme_mod('pappaya_linkedin_url') );?>" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                    <?php }
                                    if (strlen(get_theme_mod('pappaya_pinterest_url'))>0) { ?>
                                        <li><a href="<?php echo esc_url( get_theme_mod('pappaya_pinterest_url') );?>" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                    <?php }
                                    if (strlen(get_theme_mod('pappaya_googleplus_url'))>0) { ?>
                                        <li><a href="<?php echo esc_url( get_theme_mod('pappaya_googleplus_url') );?>" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                                    <?php }
                                    if (strlen(get_theme_mod('pappaya_youtube_url'))>0) { ?>
                                        <li><a href="<?php echo esc_url( get_theme_mod('pappaya_youtube_url') );?>" class="youtube"><i class="fa fa-youtube"></i></a></li>
                                    <?php }
                                    if (strlen(get_theme_mod('pappaya_instagram_url'))>0) { ?>
                                        <li><a href="<?php echo esc_url( get_theme_mod('pappaya_instagram_url') );?>" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                    <?php } ?>
                                </ul>
                            <?php }
                            if( strlen( get_theme_mod('pappaya_footer_copy') )>0 ) { ?>
                                <div class="footertext">
                                    <?php echo esc_html( get_theme_mod('pappaya_footer_copy') );?>
                                    <div class="content-holder">
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
    		</footer>
        <?php } ?>
      <?php wp_footer(); ?>
    </body>
  </html>