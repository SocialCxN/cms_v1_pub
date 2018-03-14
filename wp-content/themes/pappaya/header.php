<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <?php
    // Favicon
    // If a Site Icon hasn't been set or if the `has_site_icon` function doesn't exist (ie older than WordPress 4.3) 
    if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {
      echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_template_directory_uri().'/img/fav_icon.png">';
    }
  ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php // Preloader
    if(  get_theme_mod('pappaya_theme_preloader') == 1 ){ get_template_part('includes/preloader'); } ?>
<div class="wrapper woocommerce wn">
  <noscript>
    <div class="noscript">
      <div class="noscript-inner">
        <p><strong><?php esc_html_e('JavaScript seem to be disabled in your browser.','pappaya'); ?></strong></p>
        <p><?php esc_html_e('You must have JavaScript enabled in your browser to utilize the functionality of this website.','pappaya'); ?></p>
      </div>
    </div>
  </noscript>
  <!-- Header -->
    <?php $headerClass = null;
    if(  get_theme_mod('pappaya_theme_sticky_header') == 1 ){
        $headerClass = ' sticky-header';
    }
    $header_overlay = pappaya_get_page_option(get_the_ID(),'pappaya_header_overlay');
    if(($header_overlay) && ($header_overlay==1)){
        $headerClass .= ' header-overlay';
    }
    ?>
    <header id="header" class="header<?php echo esc_attr( $headerClass );?>">
        <nav id="nav" class="nav">
            <div class="fw-container">
                <div class="nav-wrap">
                    <div class="header-col">
                        <div class="header-cell">
                            <?php
                            if( get_theme_mod( 'pappaya_theme_logo' )!=null  && strlen(get_theme_mod('pappaya_theme_logo'))>0 )
                            { ?>
                                <a href="<?php echo site_url(); ?>" class="logo">
                                    <img class="site-logo" src="<?php echo esc_url(get_theme_mod('pappaya_theme_logo')); ?>"  alt="<?php echo esc_html(get_bloginfo('name')); ?>" />
                                </a>
                              <?php
                            }elseif( !display_header_text() )
                            { ?>
                                <a href="<?php echo site_url(); ?>" class="logo">
                                    <div class="site_name"><?php echo esc_html(get_bloginfo('name')); ?></div>
                                </a>
                              <?php
                            } ?>

                            <?php // For showing site-name & description based on Default WP customizer option
                            if( display_header_text()  )
                            {  ?>
                                <div class="display_site_description">
                                    <div class="site-title site_name"><a href='<?php echo get_site_url(); ?>/'><?php echo esc_html(get_bloginfo('name')); ?></a></div>
                                    <div class="site_description"><?php echo esc_html(get_bloginfo('description')); ?></div>
                                </div>
                                <?php 
                            }   ?>
                        </div>
                        
                        <?php if ( has_nav_menu( 'primary' ) ) { ?>
                            <div class="header-cell">
                                <div id="navigation" class="navigation">
                                    <?php wp_nav_menu( array('theme_location' => 'primary') );

                                    if( ( (($header_overlay) && ($header_overlay==1))||(get_theme_mod('pappaya_theme_hide_sub_header') == 1) ) && class_exists('WooCommerce'))
                                    {   ?>
                                        <ul class="mini-cart">
                                            <li class='menu_cart menu-overlay pappaya-mini-cart'>
                                                <a href='javascript:void(0);' class='cart-btn waves-effect'>          
                                                    <span class='cart-md mo-cart'>
                                                        <i class='fa fa-shopping-basket'></i>
                                                        <span class='cart-count'><?php echo esc_html( WC()->cart->cart_contents_count ); ?></span>
                                                    </span>
                                                </a>
                                                <span class='cart-pointer'></span>
                                                <div class='dd-cart'>
                                                    <div class='inner-scroll'>
                                                        <?php woocommerce_mini_cart(); ?>
                                                        <span class='clearfix'></span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                        <div id="menu-toggle">
                                        <div id="hamburger">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                        <div id="cross">
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                    </div>
                    <div class="header-searchform">
                        <div class="searchform-title"><?php esc_html_e("Just type and press 'enter'",'pappaya'); ?></div>
                        <form role="search" method="get" id="searchform_header" class="searchform" action="<?php echo esc_url( home_url( '/' ) ) ;?>">
                            <div>
                                <label class="screen-reader-text" for="s_header"><?php echo esc_html_x( 'Search for:', 'label', 'pappaya' ) ;?></label>
                                <input type="text"  placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'pappaya' ) ;?>" value="<?php echo esc_attr(get_search_query()) ;?>" name="s" id="s_header" />
                                <input type="submit" id="searchsubmit_header" value="<?php echo esc_attr_x( 'Search', 'submit button', 'pappaya' ) ;?>" />
                                <input type="hidden"  value="post" name="post_type[]" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <?php $headStyle=null;
        if(is_page()){
            $pageHeadImage=wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
            if(isset($pageHeadImage[0]) && (strlen($pageHeadImage[0])>0) ){
                $headStyle= 'style="background-image:url('.$pageHeadImage[0].');"';
            }
            else
            {
                $pageHeadImage=get_header_image();
                $headStyle= 'style="background-image:url('.$pageHeadImage.');"';
            }
        }
        else
        {
            $pageHeadImage=get_header_image();
            $headStyle= 'style="background-image:url('.$pageHeadImage.');"';
        }
        if( (!isset($header_overlay) || $header_overlay!=1) && (get_theme_mod('pappaya_theme_hide_sub_header') != 1) ){  ?>
            <div class="header-bottom" <?php echo wp_kses( $headStyle, array('style' => array('background-image',array('url')))); ?> >
                <div class="fw-container">
                    <div class="header-contents">
                        <div class="page-name">
                            <?php

                            if(is_page()){
                                $otherTitle=pappaya_get_page_option(get_the_ID(),'pappaya_page_othertitle');
                                if(($otherTitle) && (strlen($otherTitle)>0)) {
                                    $header_title = $otherTitle;
                                }
                                else{
                                    $hideTitle = pappaya_get_page_option(get_the_ID(),'pappaya_hide_page_title');
                                    if( ($hideTitle)&&($hideTitle==1) ){
                                        $header_title = get_the_title();
                                    }
                                    else{
                                        $header_title = esc_html__('Page : ','pappaya').get_the_title();
                                    }
                                }
                            }
                            if( is_home() ){
                                $header_title = esc_html__('Blog','pappaya');
                                if ( is_front_page() ) {
                                    $header_title = esc_html__('Latest Posts','pappaya');
                                }
                                else{
                                    $otherTitle=pappaya_get_page_option(get_queried_object_id(),'pappaya_page_othertitle');
                                    if(($otherTitle) && (strlen($otherTitle)>0))
                                    {
                                        $header_title = $otherTitle;
                                    }
                                }
                            }
                            if(is_singular('post'))
                            { 
                                   $header_title = esc_html__('Blog','pappaya');
                            }
                            elseif(is_search()){
                                $header_title = esc_html__('Search Results : " ','pappaya'). get_search_query().' "';
                            }
                            if ( class_exists( 'WooCommerce' ) ) {
                                if (is_product()) 
                                {
                                    $header_title = woocommerce_page_title('', false);
                                }
                            }
                            if (is_archive()) {
                                if ( is_category() ) { $header_title = single_cat_title( '', false );}
                                // heading Blog for tag , author & date.
                                elseif ( is_tag() || is_author() || is_date() )  { $header_title = esc_html__('Blog','pappaya');}
                                elseif ( is_post_type_archive('fw-portfolio') ) { $header_title = post_type_archive_title('',false); }
                                elseif ( class_exists( 'WooCommerce' ) ) {
                                    if ( is_shop() ) {
                                        $otherTitle = pappaya_get_page_option(get_option('woocommerce_shop_page_id'),'pappaya_page_othertitle');
                                        if(($otherTitle) && (strlen($otherTitle)>0))
                                        {
                                           $header_title = $otherTitle;
                                        }
                                        else{
                                            $hideTitle = pappaya_get_page_option(wc_get_page_id ('shop'),'pappaya_hide_page_title');
                                            if( ($hideTitle)&&($hideTitle==1) ){
                                                $header_title = woocommerce_page_title('', false);
                                            }
                                            else{
                                                $header_title = esc_html__('Products','pappaya');
                                            }
                                        }
                                    }
                                    elseif (is_product_category()){ $header_title = esc_html__('Products Category','pappaya');}//single_cat_title( '', false );}
                                    else{ $header_title = woocommerce_page_title('', false); }
                                }
                            }
                            if ( is_404()){
                                $header_title = esc_html__("404 - page not found","pappaya");
                            }
                            if (isset($header_title) && strlen($header_title)>0) {
                                echo esc_html( $header_title );
                            }
                            else
                            {
                                the_title();
                            }
                            
                            ?>
                        </div>
                        <?php if ( !is_front_page() ){pappaya_breadcrumb();} ?>
                        <?php if( class_exists('WooCommerce' ) ){pappaya_mini_shopping_cart_section();} ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </header>
  <!-- End Header -->