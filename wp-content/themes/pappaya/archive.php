<?php
/**
 * The Archive template file.
 *
 * It is used to display an archive page.
 *
 * @package WordPress
 * @subpackage pappaya
 * @since pappaya 1.0
 */

get_header(); ?>
      
    <!-- Middle -->
    <div class="middle">
        <div class="section">
            <div class="fw-container">
                <div class="fw-row">
                    <?php  $pappaya_blog_layout = get_theme_mod('pappaya_blog_layout','right');
                    if(isset( $pappaya_blog_layout ) && ($pappaya_blog_layout == 'left'||$pappaya_blog_layout == 'both') && is_active_sidebar( 'blog-left-sidebar' ) )
                    {   ?>
                        <div class="fw-col-md-3 blog-sidebar">
                            <?php dynamic_sidebar( 'blog-left-sidebar' ); ?>
                        </div>
                    <?php } ?>
                    
                    <?php $fw_col_md = 9;
                    if( isset( $pappaya_blog_layout ) && $pappaya_blog_layout == 'both' ){
                        if(  is_active_sidebar( 'blog-left-sidebar' ) && is_active_sidebar( 'blog-right-sidebar' ) ){
                            $fw_col_md = 6;
                        }
                        elseif( is_active_sidebar( 'blog-left-sidebar' )||is_active_sidebar( 'blog-right-sidebar' ) ){
                            $fw_col_md = 9;
                        }
                        else{ $fw_col_md = 12; }
                    }
                    elseif (isset( $pappaya_blog_layout ) && $pappaya_blog_layout == 'right' && is_active_sidebar( 'blog-right-sidebar' )) {
                        $fw_col_md = 9;
                    }
                    elseif (isset( $pappaya_blog_layout ) && $pappaya_blog_layout == 'left' && is_active_sidebar( 'blog-left-sidebar' )) {
                        $fw_col_md = 9;
                    }
                    else{ $fw_col_md = 12; }  ?>
                    <div class="fw-col-md-<?php echo esc_attr( $fw_col_md ); ?>">   
                        <div class="content-area">              
                            <?php if ( have_posts() ) : ?>
                                <?php /* The loop */ ?>
                                <?php while ( have_posts() ) : the_post(); ?>
                                    <?php get_template_part( 'content', get_post_format() ); ?>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <?php get_template_part( 'content', 'none' ); ?>
                            <?php endif; ?>
                            <?php
                            if (function_exists("pappaya_pagination")) {
                                pappaya_pagination();
                            }
                            ?>
                            <!-- Comments -->
                            <?php if (have_comments()) {
                                if( comments_open() && !is_front_page() ) { ?>
                                    <div class="wp_comments">
                                        <?php comments_template( '', true ); ?>
                                    </div>
                                <?php }
                            }   ?>
                        </div>
                    </div>

                    <?php if(isset( $pappaya_blog_layout ) && ($pappaya_blog_layout == 'right'||$pappaya_blog_layout == 'both') && is_active_sidebar( 'blog-right-sidebar' ) ){ ?>
                        <div class="fw-col-md-3 blog-sidebar">
                            <?php dynamic_sidebar( 'blog-right-sidebar' ); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End middle -->

<?php get_footer();