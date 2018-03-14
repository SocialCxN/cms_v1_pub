<?php
/**
 *  pappaya Functions
 *
 * @package WordPress
 * @subpackage pappaya
 * @since pappaya 1.0
 */

// Include path
define('pappaya_INC_PATH', get_template_directory() . '/includes/');

// Include walker comments
require_once (pappaya_INC_PATH . 'Walker_Comments.php');

// Set content width
if ( ! isset( $content_width ) ) { $content_width = 860; }

//Add Custom Widgets
include_once( get_template_directory() . '/includes/widgets/widget-contact-us.php' );
/**
 * 	pappaya Widget areas (sidebars for widgets)
 */
function pappaya_widgets_init() {
  if (function_exists('register_sidebar')) {
    register_sidebar( array(
      'name'          => esc_html__( 'Blog Right Widget Area', 'pappaya' ),
      'id'            => 'blog-right-sidebar',
      'description'   => esc_html__( 'Appears in the Right sidebar of the Blog pages.', 'pappaya' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<div class="widget-title"><h5>',
      'after_title'   => '</h5></div>',
    ));
    register_sidebar( array(
      'name'          => esc_html__( 'Blog Left Widget Area', 'pappaya' ),
      'id'            => 'blog-left-sidebar',
      'description'   => esc_html__( 'Appears in the Left sidebar of the Blog pages.', 'pappaya' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<div class="widget-title"><h5>',
      'after_title'   => '</h5></div>',
    ));
    register_sidebar( array(
      'name'          => esc_html__( 'Shop Right Widget Area', 'pappaya' ),
      'id'            => 'shop-right-sidebar',
      'description'   => esc_html__( 'Appears in the Right sidebar for Product pages.', 'pappaya' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<div class="widget-title"><h5>',
      'after_title'   => '</h5></div>',
    ));
    register_sidebar( array(
      'name'          => esc_html__( 'Shop Left Widget Area', 'pappaya' ),
      'id'            => 'shop-left-sidebar',
      'description'   => esc_html__( 'Appears in the Left sidebar for Product pages.', 'pappaya' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<div class="widget-title"><h5>',
      'after_title'   => '</h5></div>',
    ));
    register_sidebar(array(
    'name' => esc_html__( 'Footer Column 1', 'pappaya' ),
    'id'   => 'footer_sidebar_1',
    'description'   => esc_html__( 'Footer sidebar 1', 'pappaya' ),
    'before_widget' => '<div class="footer-widget-item">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5>',
    'after_title'   => '</h5>'
    ));
    register_sidebar(array(
    'name' => esc_html__( 'Footer Column 2', 'pappaya' ),
    'id'   => 'footer_sidebar_2',
    'description'   => esc_html__( 'Footer Sidebar 2', 'pappaya' ),
    'before_widget' => '<div class="footer-widget-item">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5>',
    'after_title'   => '</h5>'
    ));
    register_sidebar(array(
    'name' => esc_html__( 'Footer Column 3', 'pappaya' ),
    'id'   => 'footer_sidebar_3',
    'description'   => esc_html__( 'Footer Sidebar 3', 'pappaya' ),
    'before_widget' => '<div class="footer-widget-item">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5>',
    'after_title'   => '</h5>'
    ));
    register_sidebar(array(
    'name' => esc_html__( 'Footer Column 4', 'pappaya' ),
    'id'   => 'footer_sidebar_4',
    'description'   => esc_html__( 'Footer Sidebar 4', 'pappaya' ),
    'before_widget' => '<div class="footer-widget-item">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5>',
    'after_title'   => '</h5>'
    ));
  }
}
add_action( 'widgets_init', 'pappaya_widgets_init' );

/**
 *  Add Custom Widgets
 */


// ============== Thumbnail sizes ==============
if (function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails');
  add_theme_support( 'custom-header' );
  add_theme_support( 'custom-background');
  add_theme_support( 'title-tag' );
  add_theme_support( 'automatic-feed-links');

  // Enabling product gallery features (zoom, swipe, lightbox) in woocommerce 3.0.0 (here enabling lightbox)
  add_theme_support( 'wc-product-gallery-lightbox' );

  add_image_size('pappaya-img-wide', 1170, 620, true);
  add_image_size('pappaya-img-landscape', 870, 460, true);
  add_image_size('pappaya-portfolio-gallary-thumb', 370, 324, true);
  add_image_size('pappaya-portfolio-gallary-wide', 750, 750, true);
  add_image_size('pappaya-image-slider-thumb', 80, 80, true);
}


// =========== Register styles_scripts & custom colors from theme options inline_style =====================
  /**
   *  pappaya Registor Stylesheets and Scripts
   */
  function pappaya_register_styles_scripts(){
    if(  get_theme_mod('pappaya_theme_preloader') == 1 ){
      wp_enqueue_style('pappaya-preloader', get_template_directory_uri().'/css/preloader-style.css',array(),'1.0');
    }
    $protocol    = is_ssl() ? 'https' : 'http';
    $loadedFonts = pappaya_load_googlefont_styles();
    if( isset($loadedFonts) && strlen($loadedFonts) >0 ){
      wp_enqueue_style('google-fonts',"{$protocol}://fonts.googleapis.com/css?family=".$loadedFonts);
    }
    wp_enqueue_style('material-style', get_template_directory_uri() . '/css/materialize.css',array(),'1.0');  //  Import materialize.css
    wp_enqueue_style('pappaya-style', get_template_directory_uri() . '/css/main.css',array(),'1.0');  //  Main Styles
    wp_enqueue_style('pappaya-menu', get_template_directory_uri() . '/css/menu.css',array(),'1.0');  //  menu Styles
    wp_enqueue_style('owl-css', get_template_directory_uri() . '/css/owl.carousel.css',array(),'1.0');  //  Slider Styles
    wp_enqueue_style('woocommerce', get_template_directory_uri() . '/css/woocommerce/woocommerce.css',array(),'1.0');
    wp_enqueue_style('woocommerce-layout', get_template_directory_uri() . '/css/woocommerce/woocommerce-layout.css',array(),'1.0');
    wp_enqueue_style('woocommerce-smallscreen', get_template_directory_uri() . '/css/woocommerce/woocommerce-smallscreen.css',array(),'1.0');
    if(!function_exists('fw_ext_page_builder_is_builder_post')){ //  fw-ext-builder-frontend-grid
      wp_enqueue_style('pappaya-grid', get_template_directory_uri() . '/css/grid.css',array(),'1.0');  //  to avoid design break if unyson not installed
    }
    wp_enqueue_style('font-awesome', get_template_directory_uri() .  '/css/font-awesome.min.css');
    wp_enqueue_style('pappaya-color', get_template_directory_uri() . '/css/color.css',array(),'1.0');

    wp_enqueue_script('material-script', get_template_directory_uri().'/js/materialize.js',array('jquery'),'', true);
    wp_enqueue_script('owl', get_template_directory_uri().'/js/owl.carousel.min.js',array('jquery'),'', true);
    if(get_theme_mod('pappaya_googlemap_api')&&strlen(get_theme_mod('pappaya_googlemap_api'))>0){
      $gmap_key = esc_html(get_theme_mod('pappaya_googlemap_api'));
      wp_enqueue_script('google-maps-api-v3', 'https://maps.googleapis.com/maps/api/js?key='.$gmap_key,array(),'', true);
    }
    wp_enqueue_script('appear', get_template_directory_uri().'/js/jquery.appear.js',array('jquery'),'', true);

    // wp_enqueue_script('waypoint', get_template_directory_uri().'/js/jquery.waypoints.min.js',array('jquery'),'', true);
    // wp_enqueue_script('counterup', get_template_directory_uri().'/js/jquery.counterup.min.js',array('jquery'),'', true);


    wp_enqueue_script('pappaya-main', get_template_directory_uri().'/js/functions.js',array('jquery'),'', true);
    if(get_theme_mod('pappaya_theme_retina')==1){
      wp_enqueue_script('retina', get_template_directory_uri().'/js/retina.min.js',array(),'1.0',true);
    }
    if ( is_singular(array('post')) && comments_open() ){
      wp_enqueue_script('comment-reply');
    }

    //=============== custom colors and options from theme options(customizer) =========
      /* --------------------------------------------------------
    
        Theme name            : pappaya
        Author                : layero.com
        Version               : 1.0
        Primary Color         : #ff5722; //Material color name : deep-orange
        Secondary Color       : #ffca28; //Material color name : amber lighten-1
        Custom Color 1        : #42a5f5; //Material color name : blue lighten-1
        Custom Color 2        : #66bb6a; //Material color name : green lighten-1
        Other custom color (Custom Color 3) : #44525a; //Material color name
        Body typography       : #757575 , Roboto, 400
        headings color        : #37474f , Roboto, 700
        Gray (Custom Color 4) : #eee
      --------------------------------------------------------- */

      //----  Variables -----
        $site_title          = get_header_textcolor();//get_theme_mod('header_textcolor');

        $pri_color           = get_theme_mod('pappaya_theme_pri_color','#ff5722');
        $priColor            = (isset($pri_color))?esc_html($pri_color):null;
        $sec_color           = get_theme_mod('pappaya_theme_sec_color','#ffca28');
        $secColor            = (isset($sec_color))?esc_html($sec_color):null;
        $custom_color_1      = get_theme_mod('pappaya_theme_custom_color_1','#42a5f5');
        $customColor_1       = (isset($custom_color_1))?esc_html($custom_color_1):null;
        $custom_color_2      = get_theme_mod('pappaya_theme_custom_color_2','#66bb6a');
        $customColor_2       = (isset($custom_color_2))?esc_html($custom_color_2):null;
        $custom_color_3      = get_theme_mod('pappaya_theme_custom_color_3','#44525a');
        $customColor_3       = (isset($custom_color_3))?esc_html($custom_color_3):null;
        $custom_color_4      = get_theme_mod('pappaya_theme_custom_color_4','#eee');
        $customColor_4       = (isset($custom_color_4))?esc_html($custom_color_4):null;

        $heading_typography  = get_theme_mod('pappaya_heading_typography');
        $headingFont         = (isset($heading_typography['font-family']))?esc_html($heading_typography['font-family']):'Roboto';
        $headingVariant      = (isset($heading_typography['variant']))?esc_html($heading_typography['variant']):700;
        if ($headingVariant == 'regular') { $headingVariant = 'normal'; }
        $headingColor        = (isset($heading_typography['color']))?esc_html($heading_typography['color']):'#37474f';
        $h1_size             = get_theme_mod('pappaya_h1_size','2.8');
        $h1Size              = (isset($h1_size))?esc_html($h1_size):null;
        $h2_size             = get_theme_mod('pappaya_h2_size','2.571428571');
        $h2Size              = (isset($h2_size))?esc_html($h2_size):null;
        $h3_size             = get_theme_mod('pappaya_h3_size','2');
        $h3Size              = (isset($h3_size))?esc_html($h3_size):null;
        $h4_size             = get_theme_mod('pappaya_h4_size','1.9');
        $h4Size              = (isset($h4_size))?esc_html($h4_size):null;
        $h5_size             = get_theme_mod('pappaya_h5_size','1.714285714');
        $h5Size              = (isset($h5_size))?esc_html($h5_size):null;
        $h6_size             = get_theme_mod('pappaya_h6_size','1.3');
        $h6Size              = (isset($h6_size))?esc_html($h6_size):null;
        $h6_weight           = get_theme_mod('pappaya_h6_weight','300');
        $h6Weight            = (isset($h6_weight))?esc_html($h6_weight):null;

        $body_typography     = get_theme_mod('pappaya_body_typography');
        $bodyFont            = (isset($body_typography['font-family']))?esc_html($body_typography['font-family']):'Roboto';
        $bodyFontSize        = (isset($body_typography['font-size']))?esc_html($body_typography['font-size']):'14px';
        $bodyVariant         = (isset($body_typography['variant']))?esc_html($body_typography['variant']):'normal';
        if ($bodyVariant == 'regular') { $bodyVariant = 'normal'; }
        $bodyColor           = (isset($body_typography['color']))?esc_html($body_typography['color']):'#757575';

        $footer_top_bg_color = get_theme_mod('pappaya_footer_top_bg_color','#212121');
        $footerTopBg         = (isset($footer_top_bg_color))?esc_html($footer_top_bg_color):null;
        $footer_top_h5_color = get_theme_mod('pappaya_footer_top_heading_color','#FFFFFF');
        $footerTopH5         = (isset($footer_top_h5_color))?esc_html($footer_top_h5_color):null;
        $footer_top_text     = get_theme_mod('pappaya_footer_top_text_color','#878787');
        $footerTopTextColor  = (isset($footer_top_text))?esc_html($footer_top_text):null;

      //----  CSS -----
        $custom_css = "

          .site-title a {color: #{$site_title}}

          html, body,
          .collapsible-body,
          #header ul.menu ul.sub-menu li a,
          #header .menu ul ul.children li a  { color: {$bodyColor}; }
          html,
          body { font-family: {$bodyFont};
                 font-size: {$bodyFontSize};
                 font-weight: {$bodyVariant}; }

          /* --- Heading styles --- */
          h1 {font-size: {$h1Size}rem; font-weight: {$headingVariant}; }
          h2,
          .woocommerce-page-title h1,
          h1.blog-single-title   {font-size: {$h2Size}rem; font-weight: {$headingVariant}; }
          h3 {font-size: {$h3Size}rem; font-weight: {$headingVariant}; }
          h4 {font-size: {$h4Size}rem; font-weight: {$headingVariant}; }
          h5{font-size: {$h5Size}rem; font-weight: {$headingVariant}; }
          h6 {font-size: {$h6Size}rem; font-weight: {$h6Weight}; }

          /* --- Responsive --- */
          @media(max-width: 480px) {
          h1 {font-size: {$h2Size}rem; font-weight: {$headingVariant}; }
          h2,
          .woocommerce-page-title h1,
          h1.blog-single-title  {font-size: {$h3Size}rem; font-weight: {$headingVariant}; }
          h3 {font-size: {$h4Size}rem; font-weight: {$headingVariant}; }
          h4{font-size: {$h5Size}rem; font-weight: {$headingVariant}; }
          h5 {font-size: {$h6Size}rem; font-weight: {$headingVariant}; }
          h6 {font-size: {$h6Size}rem; font-weight: {$h6Weight}; }
          }
          
          h1, h2, h3, h4, h5, h6 { font-family: {$headingFont}; }

          .icon-title, 
          .collapsible-header, 
          .fw-heading h4, 
          .fw-heading h5, 
          .fw-heading h6,
          .fw-call-to-action .fw-action-content h2,
          .fw-heading-row span,
          .image-listing li .il-title { font-family: {$headingFont}!important; font-weight: {$headingVariant}!important; }


          /* --- Heading Color --- */
          h1, h2, h3, h4, h5, h6,
          #header ul.menu ul.sub-menu li,
          .page-name,
          .fw-icon.material-icon .list-title, 
          .fw-iconbox.material-icon .icon-title,
          .wn-divider,
          .collapsible-header,
          .collapsible-colored .collapsible-header span,
          .testimonials-author-details .author-name,
          .wn .fw-package .fw-heading-row,
          .dropdown-content li > a, 
          .dropdown-content li > span,
          .sub-title-404,
          .footer .fw-heading h1,
          .footer .fw-heading h2,
          .footer .fw-heading h3,
          .footer .fw-heading h4,
          .footer .fw-heading h5,
          .footer .fw-heading h6,
          .footer .column-bg form .field-holder,
          .input-field label,
          .image-listing li .il-title,
          .middle .fw-heading h1,
          .middle .fw-heading h2,
          .middle .fw-heading h3,
          .middle .fw-heading h4,
          .middle .fw-heading h5,
          .middle .fw-heading h6,
          .footer .fw-heading h1,
          .footer .fw-heading h2,
          .footer .fw-heading h3,
          .footer .fw-heading h4,
          .footer .fw-heading h5,
          .footer .fw-heading h6,
          .progress-bar-title,
          .single-page-title h1,
          .wn .fw-heading h3 a,
          .wn .blog-sidebar .widget ul li > a,
          .wn .widget_layered_nav ul li > a,
          .wn .widget_product_categories ul li > a,
          .wn .wp_comments ul.wp-comments-list li.comment .commenter_name a,
          .timeline-nav .ts-item,
          .fw-heading.fw-team-lg .fw-special-title,
          h1.blog-single-title a {color: {$headingColor};}
          .middle .fw-heading:after,
          .page-name:after,
          .tab-contents h1:after,
          .tab-contents h2:after,
          .tab-contents h3:after,
          .tab-contents h4:after,
          .tab-contents h5:after,
          .tab-contents h6:after,
          .wn .fw-package .fw-heading-row span:after {background: {$headingColor};}
          .header-searchform .searchform input[type=text]:focus:not([readonly]) { border-bottom-color: {$headingColor}; box-shadow: 0 1px 0 0 {$headingColor}; }

          /* ---------------------------------------------------------
              Primary Color
          */
          /* --- Text Color / Primary --- */
          a,
          #header #nav ul li .mega-menu ul li > ul li a:hover,
          .breadcrumbs a:last-child,
          .tab-nav ul.tabs li a.active,
          .tab-wrap .fw-tabs-container .fw-tabs ul li a.active,
          .wn .fw-package .fw-pricing-row,
          .bar-chart-count,
          .wn .blog-sidebar .widget ul li > a:hover,
          .wn .widget_layered_nav ul li > a:hover,
          .wn .widget_product_categories ul li > a:hover,
          .posts_nav a:hover,
          #header ul.menu li.menu-overlay .cart-md .cart-count,
          .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a,
          .woocommerce .woocommerce-MyAccount-navigation ul li:hover a {color: {$priColor};}

          /* --- Background Color / Primary --- */
          .bg-primary,
          .sticky-header .sticky,
          #header #nav ul li .mega-menu > ul.mega-menu-row > li.mega-menu-col a.fa:after,
          #header #nav ul li .mega-menu > ul.mega-menu-row > li.mega-menu-col a.fa:before,
          #header #nav ul li .mega-menu ul.mega-menu-row ul.sub-menu li a:after,
          .btn, .btn-large, .btn-flat,
          input[type='submit'],
          .post-password-form input[type='submit'],
          .tab-wrap .fw-tabs-container .fw-tabs ul li a.active:after,
          .tabs .indicator,
          .tab-left .tab-nav ul.tabs li a.active:after,
          .tab-right .tab-nav ul.tabs li a.active:after,
          .collapsible-colored li .collapsible-header,
          .wn .highlight-col .fw-package,
          .alert-primary,
          .owl-dots .owl-dot.active,
          .progress-line,
          .wn .wn-pagination ul li:hover a,
          .wn .wn-pagination ul li span.current,
          #menu-toggle #cross span,
          .wn .dd-cart .inner-scroll .buttons a.button.checkout,
          .wn .widget_price_filter .ui-slider .ui-slider-range,
          .wn .widget_price_filter .ui-slider .ui-slider-handle,
          #header #nav ul.menu li .mega-menu ul li a.fa::before, 
          #header .menu ul li a.fa::before,
          #header .menu ul li a.fa:hover::after,
          .sticky #menu-toggle span {background: {$priColor}; color: #fff;}

          #header #nav ul li .mega-menu > ul.mega-menu-row > li.mega-menu-col a:hover:after, 
          #header .menu ul li a:hover:after {background: {$priColor}; color: #fff;}

          

          .filter-gallery ul li .thumb-wrap:before { background: {$priColor}; }

          /* --- Border Color / Primary --- */
          .tab-wrap .fw-tabs-container .fw-tabs ul li a.active {border-bottom-color: {$priColor};}
          blockquote {border-left-color: {$priColor}; }

          /* ---------------------------------------------------------
              Other colors Color
          */
          /* --- Background Color / Secondary --- */
          .bg-secondary,
          .collapsible-colored li:nth-child(2n) .collapsible-header,
          .alert-secondary,
          .wn a.add_to_cart_button:hover,
          .wn #respond input#submit:hover, 
          .wn a.button:hover, 
          .wn button.button:hover, 
          .wn input.button:hover,
          .wn a.button.checkout,
          .wn .article-item .fw-heading h3 span.featured {background: {$secColor}; color: #fff;}

          /* --- Background Color / Custom 1 --- */
          .bg-custom-1,
          .collapsible-colored li:nth-child(3n) .collapsible-header,
          .alert-custom1 {background: {$customColor_1}; color: #fff;}

          /* --- Background Color / Custom 2 --- */
          .bg-custom-2,
          .collapsible-colored li:nth-child(4n) .collapsible-header,
          .alert-custom2,
          .wn span.onsale {background: {$customColor_2}; color: #fff;}

          /* --- Background Color / Custom 3 --- */
          .bg-custom-3,
          .collapsible-colored li:nth-child(5n) .collapsible-header,
          .alert-custom3 {background: {$customColor_3}; color: #fff;}


          /* --- Background Color / Gray --- */
          .bg-light {background: {$customColor_4};}


          /* --- White color color --- */
          .wn .highlight-col .fw-package .fw-heading-row span:after,
          .wn .highlight-col .fw-package .fw-button-row a { background: #fff; color: {$priColor}; }


          /* ---------------------------------------------------------
              Material default overrides
          */
          .materialize-red.lighten-2,
          .materialize-red-text.text-lighten-2,
          nav {background: {$priColor};}
          .pagination li.active,
          .side-nav .collapsible-body li.active,
          .side-nav.fixed .collapsible-body li.active { background: {$priColor}; }
          ul.filter_nav li.active,
          ul.filter_nav li:hover { color: {$priColor}; border-color: {$priColor}; }
          .input-field .prefix.active,
          input:not([type]):focus:not([readonly]) + label,
          input[type=text]:focus:not([readonly]) + label,
          input[type=password]:focus:not([readonly]) + label,
          input[type=email]:focus:not([readonly]) + label,
          input[type=url]:focus:not([readonly]) + label,
          input[type=time]:focus:not([readonly]) + label,
          input[type=date]:focus:not([readonly]) + label,
          input[type=datetime-local]:focus:not([readonly]) + label,
          input[type=tel]:focus:not([readonly]) + label,
          input[type=number]:focus:not([readonly]) + label,
          input[type=search]:focus:not([readonly]) + label,
          textarea.materialize-textarea:focus:not([readonly]) + label {
              color: {$priColor};
          }

          input:not([type]):focus:not([readonly]),
          input[type=text]:focus:not([readonly]),
          input[type=password]:focus:not([readonly]),
          input[type=email]:focus:not([readonly]),
          input[type=url]:focus:not([readonly]),
          input[type=time]:focus:not([readonly]),
          input[type=date]:focus:not([readonly]),
          input[type=datetime-local]:focus:not([readonly]),
          input[type=tel]:focus:not([readonly]),
          input[type=number]:focus:not([readonly]),
          input[type=search]:focus:not([readonly]),
          textarea.materialize-textarea:focus:not([readonly]) {
              border-bottom: 1px solid {$priColor};
              box-shadow: 0 1px 0 0 {$priColor};
          }

          /* --- Secondary --- */
          .btn:hover, .btn-large:hover {background: {$secColor};}


          [type='radio']:checked + label:after {
            border: 2px solid {$secColor};
            background-color: {$secColor};
          }
          [type='checkbox']:checked + label:before {border-right-color: {$secColor}; border-bottom-color: {$secColor};}

          /* Radio With gap */
          [type='radio'].with-gap:checked + label:before {
            border: 2px solid {$secColor};
          }

          [type='radio'].with-gap:checked + label:after {
            border: 2px solid {$secColor};
            background-color: {$secColor};
          }

          /* --- Responsive --- */
          @media(max-width: 991px) {
              #nav { color: {$headingColor}; } /* -- Heading color -- */
          }

          /* ----- Woocommerce -- */
          .mini-cart .cart-btn,
          .cart-fly,
          .header .dd-cart ul li > a,
          .wn ul.product_list_widget li > a,
          .header .dd-cart .inner-scroll .total .amount,
          .wn ul.products li.product h3,
          .wn-ordering .select-wrapper input.select-dropdown,
          .wn #reviews #comments ol.commentlist li .comment-text p.meta strong,
          .wn .comment-form-rating label,
          .wn table.shop_table th,
          .wn table.shop_table td.product-name a,
          .wn .cart-collaterals .cart_totals table.shop_table th {color: {$headingColor};} /*Heading color*/

          .wn a.add_to_cart_button,
          .wn a.button, 
          .wn button.button, 
          .wn input.button,
          .wn ul.products li.product .product-item a.add_to_cart_button,
          .wn a.button.alt, 
          .wn button.button.alt, 
          .wn input.button.alt,
          .wn nav.woocommerce-pagination ul li:hover a,
          .wn nav.woocommerce-pagination ul li span.current,
          .timeline-nav .current .ts-item {background: {$priColor}; color: #fff;} /*primary background color*/ 
          .wn ul.products li.product .price .amount,
          .wn ul.product_list_widget li .amount,
          .sidebar .widget ul li a:hover,
          .wn div.product p.price .amount,
          .wn div.product span.price .amount,
          .wn table.shop_table td .amount {color: {$priColor};} /* Primary color*/ 

          .wn div.product p.price,
          .wn div.product span.price,
          .wn ul.product_list_widget li del .amount,
          .wn div.product p.price del .amount,
          ul li.wc-layered-nav-rating a,
          widget.woocommerce.widget_product_tag_cloud a{color: inherit;}

          .wn #respond input#submit, 
          .wn #respond input#submit.alt, 
          .wn a.button.alt:hover, 
          .wn button.button.alt:hover, 
          .wn input.button.alt:hover {background: {$secColor}; color: #fff;}

          .wn nav.wn-pagination ul li a:focus,
          .wn nav.wn-pagination ul li a:hover,
          .wn nav.wn-pagination ul li span.current,
          .wn #respond input#submit:hover,
          .wn #respond input#submit.alt:hover {background: {$headingColor}; color: #fff;} /* Heading color as background */

          .cart-bottom .cart_totals {background: {$customColor_4};}


          /* ---------------------------------------------------------
              Buttons
          */
          .btn-primary,
          .btn-text.btn:hover,
          .post-password-form input[type='submit'] {background: {$priColor}; color: #fff;}
          .btn-secondary,
          .btn-text.btn-secondary:hover,
          .wn .added_to_cart,
          .wn ul.products li.product .product-item a.added_to_cart,
          .wn .widget_price_filter .price_slider_amount .button:hover,
          .post-password-form input[type='submit']:hover {background: {$secColor}; color: #fff;}
          .btn-white,
          .wn input.btn-white,
          .btn-text.btn-white:hover,
          .wn input.btn-white:hover,
          .wn .widget_price_filter .price_slider_amount .button {background: #FFF; color: {$headingColor};}
          .btn-light,
          .btn-text.btn-light:hover {background: {$customColor_4}; color: {$headingColor};}
          .btn-gray,
          .btn-text.btn-gray:hover {background: {$bodyColor}; color: #fff;}
          .btn-dark,
          .btn-text.btn-dark:hover,
          .wn a.button.checkout:hover {background: {$headingColor}; color: #fff;}
          .btn-text.btn-primary,
          .btn-text.btn           {background: #fff; color: {$priColor};}
          .btn-text.btn-secondary {background: #fff; color: {$secColor};}
          .btn-text.btn-white     {background: #fff; color: {$headingColor};}
          .btn-text.btn-light     {background: #fff; color: {$customColor_4};}
          .btn-text.btn-gray      {background: #fff; color: {$bodyColor};}
          .btn-text.btn-dark      {background: #fff; color: {$headingColor};}


          /* ------------------------------------------------------------------------------------------------
            Devider styles
          */
          .divider-primary {border-color: {$priColor}; color: {$priColor};}
          .divider-primary span > span {background: {$priColor};}
          .divider-secondary {border-color: {$secColor}; color: {$secColor};}
          .divider-secondary span > span {background: {$secColor};}
          .divider-light {border-color: {$customColor_1}; color: {$customColor_1};}
          .divider-light span > span {background: {$customColor_1};}
          .divider-gray {border-color: {$customColor_4}; color: {$customColor_4};}
          .divider-gray span > span {background: {$customColor_4}; }


          /* ------------------------------------------------------------------------------------------------
            Table Shortcode styles
          */

          /*  Primary Color column */

          .wn .style-1 .primary-col .fw-package{background: {$priColor}; color: #fff;}

          .wn .primary-col .fw-package .fw-pricing-row,
          .wn .primary-col .fw-package .fw-heading-row {color: inherit;}

          .wn .style-1 .primary-col .fw-package .fw-heading-row span:after,
          .wn .style-1 .primary-col .fw-package .fw-button-row a,
          .wn .style-2 .primary-col .fw-package .fw-pricing-row {background: #fff; color: {$priColor};}

          .wn .style-2 .primary-col .fw-package .fw-heading-row span:after,
          .wn .style-2 .primary-col .fw-package .fw-button-row a {background: {$priColor}; color: #fff;}


          /*  Secondary Color column */

          .wn .style-1 .secondary-col .fw-package{background: {$secColor}; color: #fff;}

          .wn .secondary-col .fw-package .fw-pricing-row,
          .wn .secondary-col .fw-package .fw-heading-row {color: inherit;}

          .wn .secondary-col .fw-package .fw-heading-row span:after,
          .wn .secondary-col .fw-package .fw-button-row a,
          .wn .style-2 .secondary-col .fw-package .fw-pricing-row  {background: #fff; color: {$secColor};}

          .wn .style-2 .secondary-col .fw-package .fw-heading-row span:after,
          .wn .style-2 .secondary-col .fw-package .fw-button-row a {background: {$secColor}; color: #fff;}

          /*  Custom Color 1 column */

          .wn .style-1 .custom-1-col .fw-package{background: {$customColor_1}; color: #fff;}

          .wn .custom-1-col .fw-package .fw-pricing-row,
          .wn .custom-1-col .fw-package .fw-heading-row {color: inherit;}

          .wn .custom-1-col .fw-package .fw-heading-row span:after,
          .wn .custom-1-col .fw-package .fw-button-row a,
          .wn .style-2 .custom-1-col .fw-package .fw-pricing-row  {background: #fff; color: {$customColor_1};}

          .wn .style-2 .custom-1-col .fw-package .fw-heading-row span:after,
          .wn .style-2 .custom-1-col .fw-package .fw-button-row a {background: {$customColor_1}; color: #fff;}

          /*  Custom Color 2 column */

          .wn .style-1 .custom-2-col .fw-package{background: {$customColor_2}; color: #fff;}

          .wn .custom-2-col .fw-package .fw-pricing-row,
          .wn .custom-2-col .fw-package .fw-heading-row {color: inherit;}

          .wn .custom-2-col .fw-package .fw-heading-row span:after,
          .wn .custom-2-col .fw-package .fw-button-row a,
          .wn .style-2 .custom-2-col .fw-package .fw-pricing-row  {background: #fff; color: {$customColor_2};}

          .wn .style-2 .custom-2-col .fw-package .fw-heading-row span:after,
          .wn .style-2 .custom-2-col .fw-package .fw-button-row a {background: {$customColor_2}; color: #fff;}

          /*  Custom Color 3 column */

          .wn .style-1 .custom-3-col .fw-package{background: {$customColor_3}; color: #fff;}

          .wn .custom-3-col .fw-package .fw-pricing-row,
          .wn .custom-3-col .fw-package .fw-heading-row {color: inherit;}

          .wn .custom-3-col .fw-package .fw-heading-row span:after,
          .wn .custom-3-col .fw-package .fw-button-row a,
          .wn .style-2 .custom-3-col .fw-package .fw-pricing-row  {background: #fff; color: {$customColor_3};}

          .wn .style-2 .custom-3-col .fw-package .fw-heading-row span:after,
          .wn .style-2 .custom-3-col .fw-package .fw-button-row a {background: {$customColor_3}; color: #fff;}

          /*  Custom Color 4 column */

          .wn .style-1 .custom-4-col .fw-package{background: {$customColor_4}; color: #fff;}

          .wn .custom-4-col .fw-package .fw-pricing-row,
          .wn .custom-4-col .fw-package .fw-heading-row {color: inherit;}

          .wn .custom-4-col .fw-package .fw-heading-row span:after,
          .wn .custom-4-col .fw-package .fw-button-row a,
          .wn .style-2 .custom-4-col .fw-package .fw-pricing-row  {background: #fff; color: {$customColor_4};}

          .wn .style-2 .custom-4-col .fw-package .fw-heading-row span:after,
          .wn .style-2 .custom-4-col .fw-package .fw-button-row a {background: {$customColor_4}; color: #fff;}


          /* ------------------------------------------------------------------------------------------------
            Footer-Top styles
          */
          .footer-top { background: {$footerTopBg}; }

          .footer-top h5,
          .wn .footer-widget-item ul.product_list_widget li > a span,
          .footer .widget-address .image-listing li .il-title { color: {$footerTopH5}; }

          .footer-top,
          .footer-top p,
          .footer-top li a{ color: {$footerTopTextColor}; }



          /* ------------------------------------------------------------------------------------------------
            Woocommerce styles
          */
          .woocommerce #respond input#submit.alt.disabled, 
          .woocommerce #respond input#submit.alt.disabled:hover, 
          .woocommerce #respond input#submit.alt:disabled, 
          .woocommerce #respond input#submit.alt:disabled:hover, 
          .woocommerce #respond input#submit.alt:disabled[disabled], 
          .woocommerce #respond input#submit.alt:disabled[disabled]:hover, 
          .woocommerce a.button.alt.disabled, 
          .woocommerce a.button.alt.disabled:hover, 
          .woocommerce a.button.alt:disabled, 
          .woocommerce a.button.alt:disabled:hover, 
          .woocommerce a.button.alt:disabled[disabled], 
          .woocommerce a.button.alt:disabled[disabled]:hover, 
          .woocommerce button.button.alt.disabled, 
          .woocommerce button.button.alt.disabled:hover, 
          .woocommerce button.button.alt:disabled, 
          .woocommerce button.button.alt:disabled:hover, 
          .woocommerce button.button.alt:disabled[disabled], 
          .woocommerce button.button.alt:disabled[disabled]:hover, 
          .woocommerce input.button.alt.disabled, 
          .woocommerce input.button.alt.disabled:hover, 
          .woocommerce input.button.alt:disabled, 
          .woocommerce input.button.alt:disabled:hover, 
          .woocommerce input.button.alt:disabled[disabled], 
          .woocommerce input.button.alt:disabled[disabled]:hover {background: {$priColor}; color: #fff;}

          .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a,
          .woocommerce .woocommerce-MyAccount-navigation ul li:hover a { border-bottom-color: {$priColor}; }

          /* ---------------------------------------------------------
              Responsive
          */
          @media(max-width: 991px) {
            #header #nav ul li .mega-menu > ul.mega-menu-row > li.mega-menu-col > a.fa::before {background: inherit; color: inherit;}

            .woocommerce table.shop_table_responsive tr td:before,
            .woocommerce-page table.shop_table_responsive tr td:before {color: {$headingColor};}
            /* #header ul.menu .mega-menu ul.sub-menu, #header ul.menu ul.sub-menu {border-left-color: {$priColor};}
            #header ul.menu .mega-menu ul ul.sub-menu, #header ul.menu ul ul.sub-menu {border-left-color: {$customColor_1};} */
          }

        ";


      wp_add_inline_style( 'pappaya-color', $custom_css );
    //=============== custom colors from theme options END ===================

    //=============== Inline Script - Map section ============================

      $custom_js = "

        // Fuinctions on window.load
        jQuery(window).load(function() {
            var winWidth = jQuery(window).width();

            ";

            if( get_theme_mod('pappaya_googlemap_api')&&strlen(get_theme_mod('pappaya_googlemap_api'))>0 && get_theme_mod('pappaya_google_map_lat')&&strlen(get_theme_mod('pappaya_google_map_lat'))>0
                      &&get_theme_mod('pappaya_google_map_lng')&&strlen(get_theme_mod('pappaya_google_map_lng'))>0 ){

                $map_lat = get_theme_mod('pappaya_google_map_lat');
                $map_lng = get_theme_mod('pappaya_google_map_lng');

                $custom_js .= "

                if (jQuery('#pappaya-map-canvas').length) {
                    var mapOptions = {
                        zoom: 8,
                        scrollwheel: false,
                        center: new google.maps.LatLng({$map_lat}, {$map_lng}),
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    }
                    var map = new google.maps.Map(document.getElementById('pappaya-map-canvas'), mapOptions);
                }

                ";
            }

      $custom_js .= "

        });

                    ";
      wp_add_inline_script('pappaya-main',$custom_js);
      //=============== Inline Script - Map section END ============================

  }
  add_action('wp_enqueue_scripts', 'pappaya_register_styles_scripts');

// =========== _/\_ register_styles_scripts & custom colors from theme options ends _/\_ =============

/**
 *  pappaya Editor Styling
 */
add_action( 'after_setup_theme', 'pappaya_editor_style' );
function pappaya_editor_style() {
  add_editor_style(get_stylesheet_directory_uri() . '/css/editor-style.css');
}

/**
 *  pappaya lightbox Function
 *  PRETTY PHOTO 
 *    Prettyphoto (not Fancybox) will continue to be registered but not enqueued, since woocommerse update 2.7
 */
if ( class_exists( 'WooCommerce' ) ) {
  add_action( 'wp_enqueue_scripts', 'pappaya_lightbox' );
  function pappaya_lightbox() {
    global $woocommerce;
    $suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
    {
    wp_enqueue_script( 'prettyPhoto', esc_url( $woocommerce->plugin_url() ) . '/assets/js/prettyPhoto/jquery.prettyPhoto' . $suffix . '.js', array( 'jquery' ), $woocommerce->version, true );
    wp_enqueue_script( 'prettyPhoto-init', esc_url( $woocommerce->plugin_url() ) . '/assets/js/prettyPhoto/jquery.prettyPhoto.init' . $suffix . '.js', array( 'jquery' ), $woocommerce->version, true );
    wp_enqueue_style( 'woocommerce_prettyPhoto_css', esc_url( $woocommerce->plugin_url() ) . '/assets/css/prettyPhoto.css' );
    }
  }
}

/**
 * pappaya Theme Functions - Theme Setup.
 * pappaya theme setup.
 * Loading text domain
**/
function pappaya_theme_setup(){
  load_theme_textdomain('pappaya', get_template_directory() . '/languages');
}

add_action('after_setup_theme', 'pappaya_theme_setup');


/**
 * pappaya Function - Load google font styles.
 *
 * Returning user selected google fonts .
 */
function pappaya_load_googlefont_styles(){
  $heading_typography = get_theme_mod('pappaya_heading_typography');
  $body_typography    = get_theme_mod('pappaya_body_typography');
  $bodyFont  = ($body_typography['font-family']!=null)?$body_typography['font-family']:'Roboto';
  $headFont  = ($heading_typography['font-family']!=null)?$heading_typography['font-family']:'Roboto';
  $bodyFont  = pappaya_check_system_fonts($bodyFont);
  $headFont  = pappaya_check_system_fonts($headFont);
  $fontArray = array($bodyFont,$headFont);
  $fontArray = array_filter(array_unique($fontArray));
  if($needleKey=array_search('none', $fontArray)){
    unset($fontArray[$needleKey]);
  }
  $finalFontArray=array();
  foreach ($fontArray as $fontKey => $fontValue) {
    $finalFontArray[]=pappaya_font_weights($fontValue);
  }
  $implodedGoogleFonts=implode("|", $finalFontArray);
  return $implodedGoogleFonts;
}

/**
 * pappaya Function - Font weights.
 *
 * Loading Font weights for predefined fonts.
 */
function pappaya_font_weights($tempFont){
  $presetFonts=array(
    "Open+Sans"=>array(300,400,600,700),
    "Roboto"  =>array(100,300,400,500,700),
    "Roboto Condensed" =>array(300,400,700),
    "Roboto Slab" => array(100,300,400,700),
    "Lato"    => array(100,300,400,700),
    "Oswald"  => array(300,400,700),
    "Raleway"   => array(100,300,400,500,700),
    "Droid Sans"=> array(400,700),
    "Ubuntu"  =>   array(300,400,500,700),
    "Montserrat" => array(400,700)
  );
  if(array_key_exists($tempFont, $presetFonts)){
    $tempFont=str_replace(' ','+', $tempFont);
    if(is_array($presetFonts[$tempFont])){
      $theFinalFont=$tempFont.":".implode(",", $presetFonts[$tempFont]);
    }
  }
  else{
    $gFile = pappaya_INC_PATH . '/googlefonts.php';
    $gFonts= include $gFile;
    if(array_key_exists($tempFont, $gFonts)){
      $tempFsize=array();
      foreach ($gFonts[$tempFont]['variants'] as $tempFkey => $tempFvalue) {
        $tempFsize[]=$tempFvalue['id'];
      }
      $finalSizeArray=array_map("pappaya_array_filter",$tempFsize);
      $finalSize=array_filter($finalSizeArray);
      $tempFont=str_replace(' ','+', $tempFont);
      if(is_array($finalSize)){
        $theFinalFont=$tempFont.":".implode(",", $finalSize);
      }
    }
    else{
      $tempFont=str_replace(' ','+', $tempFont); 
      $theFinalFont=$tempFont;
    }
  }
  return $theFinalFont;
}

/**
 * pappaya Function - Array Filter.
 *
 * Custom array filter for google font size .
 */
function pappaya_array_filter($item){
  $array=array("300","400","700");
  if(in_array($item, $array)){
    return $item;
  }

}

/**
 * pappaya Function - Check System Fonts.
 *
 * Checking if a particular fonts is a system font .
 */
function pappaya_check_system_fonts($font){
  $systemFonts=array(
    "arial",
    "verdana",
    "trebuchet",
    "trebuchet ms",
    "georgia",
    "times",
    "tahoma",
    "helvetica"
    );
  if(!in_array($font, $systemFonts)){
    return $font;
  }
  return null;
}






/**
 *  pappaya excerpt more
 */
function pappaya_new_excerpt_more( $more ) {
  return '... <br/>&nbsp;<br/><a class="btn btn-white waves-effect waves-light" href="'. get_permalink( get_the_ID() ) . '">'.esc_html__("Read more","pappaya").'</a>';
}
add_filter('excerpt_more', 'pappaya_new_excerpt_more');


/**
 * pappaya Function - Custom Body Class.
 *
 * This function sets custom classes for "<body>" element.
 */
add_filter( 'body_class', 'pappaya_custom_body_class' );
function pappaya_custom_body_class( $classes ) {
    //if( class_exists('WooCommerce') ) {
      $classes[] = 'woocommerce';
    //}
    $classes[] = 'wn';
    return $classes;
}


/**
 *  pappaya menu
 */
function pappaya_register_my_menus() {
  register_nav_menus(
    array(
      'primary' => esc_html__( 'Main Menu','pappaya'),
    )
  );
}
add_action( 'init', 'pappaya_register_my_menus' );

function pappaya_add_search_to_wp_menu ( $items, $args ) {
  if( 'primary' === $args -> theme_location ) {
    $items .= '<li class="menu_search">';
    $items .= '<a href="javascript:void(0);"><i class="fa fa-search"></i></a>';
    $items .= '</li>';
  }
  return $items;
}
add_filter('wp_nav_menu_items','pappaya_add_search_to_wp_menu',10,2);


/**
 * pappaya Function - Pagination.
 * This function sets the pagination for post pages.
 */
function pappaya_pagination($pages = '', $range = 4, $ordinary=null) {

  // The Custom Pagination
  if(!isset($ordinary)){
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged))
      $paged = 1;
    if ($pages == '') {
      global $wp_query;
      $pages = $wp_query->max_num_pages;
      if (!$pages) {
        $pages = 1;
      }
    }   
    if (1 != $pages) {
      echo '<div class="wn-pagination"><ul>';
      if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
        echo '<a href="' . get_pagenum_link(1) . '">&laquo; '.esc_html__("First","pappaya").'</a>';
      if ($paged > 1 && $showitems < $pages)
        echo '<a href="' . get_pagenum_link($paged - 1) . '">&lsaquo; '.esc_html__("Previous","pappaya").'</a>';
      echo '<li>'.get_previous_posts_link('<i class="fa fa-angle-left"></i>').'</li>';
      for ($i = 1; $i <= $pages; $i++) {
        if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
          echo ($paged == $i) ? '<li><span class="current">' . $i . '</span></li>' : '<li><a href="' . get_pagenum_link($i) . '" class="waves-effect" >' . $i . '</a></li>';
        }
      }
      echo '<li>'.get_next_posts_link('<i class="fa fa-angle-right"></i>').'</li>';
      if ($paged < $pages && $showitems < $pages)
        echo '<a href="' . get_pagenum_link($paged + 1) . '">'.esc_html__("Next","pappaya").' &rsaquo;</a>';
      if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
        echo '<a href="' . get_pagenum_link($pages) . '">'.esc_html__("Last","pappaya").' &raquo;</a>';
      echo '</ul></div>';
    }
  }
  // The default wp pagination.
  else{
    if( get_next_posts_link() || get_previous_posts_link() ) {
      $label_previous = '&laquo; '.esc_html__("Previous Entries","pappaya");
      $label_next     = esc_html__("Next Entries","pappaya").' &raquo;';
      echo '<div class="pagination-centered">
        <ul class="pagination pagination-lg">
          <li>'.get_previous_posts_link($label_previous).'</li>
          <li>'.get_next_posts_link($label_next).'</li>
        </ul>
      </div>';
    }
  }
}


/**
 * pappaya Function - Is Default Editor Only.
 *
 * Check whether the page is using the default WordPress editor only
 * not the unyson shortcodes or pagebuilder .
 */

if( ! function_exists( 'pappaya_is_default_editor_only' ) ){
  function pappaya_is_default_editor_only(){
    $pageMeta=get_post_meta(get_the_ID(),'fw_options');
    if(isset($pageMeta[0]['page-builder']['builder_active'])){
      if($pageMeta[0]['page-builder']['builder_active'] == 1){
        return false;
      }
    }
    return true;
  }
}


/**
 * pappaya Function - Get page options.
 *
 * This function gets the page meta options.
 */

function pappaya_get_page_option($pageID,$pageOption){
  $allOptions= get_post_meta($pageID,'fw_options');
  $pageOptionData=(isset($allOptions[0][$pageOption]))?$allOptions[0][$pageOption]:false;
  return $pageOptionData;
}


/**
 * pappaya Function - Get RevSliders
 * This function gets the saved revolution sliders.
 */

function pappaya_get_rev_sliders (){
  if(!class_exists('RevSlider')){
    return false;
  }
  else{
    $theslider  = new RevSlider();
    $arrSliders = $theslider->getArrSliders();
    $arrA       = array();
    $arrT       = array();
    foreach($arrSliders as $slider){
      $arrA[]     = $slider->getAlias();
      $arrT[]     = $slider->getTitle();
    }
    if($arrA && $arrT){
      $result = array_combine($arrA, $arrT);
    }
    else
    {
      $result = false;
    }
    return $result;
  }
}


/**
 * pappaya Function - change Table Defaults
 * This function changes the default values for Unyson Shortcode "Table".
 */

add_filter('fw_option_type_table_defaults', 'pappaya_change_table_defaults');

function pappaya_change_table_defaults($table_defaults)
{
     $table_defaults['header_options'] = array(
                'table_purpose' => array(
                    'type'    => 'select',
                    'label'   => esc_html__( 'Table Styling', 'pappaya' ),
                    'help'    => esc_html__( 'Choose the table styling options', 'pappaya' ),
                    'choices' => array(
                        'pricing' => esc_html__( 'Use the table as a pricing table', 'pappaya' ),
                        'tabular' => esc_html__( 'Use the table to display tabular data', 'pappaya' ),
                    ),
                    'value'   => 'pricing',
                    'attr'    => array(
                        'data-allowed-rows' => json_encode( array(
                                'pricing' => 'default-row heading-row pricing-row button-row switch-row',
                                'tabular' => 'default-row heading-row'
                        ) ),
                        'data-allowed-cols' => json_encode( array(
                            'pricing' => 'default-col highlight-col desc-col primary-col secondary-col custom-1-col custom-2-col custom-3-col custom-4-col',
                            'tabular' => 'default-col desc-col'
                        ) ),
                    )
                ),
                'table_style_class' => array(
                    'type' => 'select',
                    'label' => esc_html__( 'Table Styling Class', 'pappaya' ),
                    'choices' => array(
                          'style-1' => 'Style 1',
                          'style-2' => 'Style 2'
                        ),
                    'value' => 'style-1',
                  )
               );
     $table_defaults['columns_options'] = array(
      'name' => array(
        'type'    => 'select',
        'label'   => false,
        'desc'    => false,
        'choices' => array(
          'default-col'   => esc_html__( 'Default column', 'pappaya' ),
          'desc-col'      => esc_html__( 'Description column', 'pappaya' ),
          'highlight-col' => esc_html__( 'Highlight column', 'pappaya' ),
          'primary-col'   => esc_html__( 'Primary Color column', 'pappaya' ),
          'secondary-col' => esc_html__( 'Secondary Color column', 'pappaya' ),
          'custom-1-col'  => esc_html__( 'Custom Color 1 column', 'pappaya' ),
          'custom-2-col'  => esc_html__( 'Custom Color 2 column', 'pappaya' ),
          'custom-3-col'  => esc_html__( 'Custom Color 3 column', 'pappaya' ),
          'custom-4-col'  => esc_html__( 'Custom Color 4 column', 'pappaya' )
        ),
      )
    );

      //*** some additional changes in the $table_defaults array ***//

   return $table_defaults;
}


/**
 * pappaya Function - Contact Action.
 *
 * This function sets the contact form ajax action.
 */

if( ! function_exists( 'pappaya_contact_action' ) ){
  function  pappaya_contact_action(){
    $admin_email = get_option("admin_email");
    $admin_email = (isset($admin_email))?$admin_email:null;
    $fromemail   = get_theme_mod('pappaya_from_email');
    $fromemail   = (isset($fromemail))?$fromemail:null;
    $to = "$admin_email";
    $cname=$_POST['c-name'];
    $cemail=$_POST['c-email'];
    $cmessage=$_POST['c-message'];
    $subject = $cname.esc_html__(" sends you a contact message","pappaya");
    $msg = "<table width=100% border=1 cellspacing=0 cellpadding=5><tr><td>&nbsp;".esc_html__('Name','pappaya')."</td><td>&nbsp;$cname</td></tr><tr><td>&nbsp;".esc_html__('Email','pappaya')."</td><td>&nbsp;$cemail</td></tr><tr><td>&nbsp;".esc_html__('Message','pappaya')."</td><td>&nbsp;$cmessage</td></tr></table>";
    if(isset($fromemail) && strlen($fromemail)>0){
      $headers = 'From: '.$cname.' <'.$fromemail.'>' . "\r\n".
      "Content-type: text/html; charset=iso-8859-1\r\n".
      "Reply-To: $cname" . "\r\n" .
      "X-Mailer: PHP/" . phpversion();
    }
    else {
      $headers = "Content-type: text/html; charset=iso-8859-1\r\n".
      "Reply-To: $cname" . "\r\n" .
      "X-Mailer: PHP/" . phpversion();
    }
    if(isset($to) && strlen($to)>0){
      if(wp_mail ($to, $subject, $msg, $headers)){
        esc_html_e("Contact Form Submitted Successfully","pappaya");
        die;
      }
    }
    else
    {
      esc_html_e("Please set your Admin Email","pappaya");
      die;
    }
  }
}

add_action( 'wp_ajax_pappaya_contact_action',  'pappaya_contact_action');
add_action( 'wp_ajax_nopriv_pappaya_contact_action',  'pappaya_contact_action');


/**
 * pappaya Function - ajax url.
 *
 * This function sets the ajaxurl.
 */

if( ! function_exists( 'pappaya_ajaxurl' ) ){
  function pappaya_ajaxurl() {
    ?>
    <script type="text/javascript">
      var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
    <?php
  }
}
add_action('wp_head','pappaya_ajaxurl');



// =========== Breadcrumb  =====================
  /**
   * pappaya Function - Breadcrumb
   * This function creates breadcrumbs for each page in header section
   */

  function pappaya_breadcrumb()
  {
    $blogID=(is_page())?get_the_ID():get_option('page_for_posts'); 
    if ( class_exists( 'WooCommerce' ) ) {
      if(is_home()|| is_singular('post')||is_singular('fw-portfolio')||is_archive()||is_page()||is_search() || is_product() || is_404() )
      {
        ?>
        <div class="breadcrumbs">
          <a href="<?php echo esc_url( home_url('/') ); ?>" class="breadcrumb"><?php esc_html_e('Home','pappaya'); ?></a>
          <?php 
          if(is_singular('post'))
          {
            //  front page is set to display a static page
            if ( 'page' === get_option( 'show_on_front' ) && get_option('page_for_posts') ) { ?>
              <a href='<?php echo get_permalink($blogID); ?>' class="breadcrumb"><?php echo get_the_title($blogID); ?></a>
            <?php } ?>
            

                <a href="#" class="breadcrumb"><?php echo get_the_title(); ?></a> <?php 

          }
          elseif(is_search())
          {
            echo'<a href="#" class="breadcrumb">'; esc_html_e('search results ','pappaya'); echo get_search_query().'</a>';
          }
          else if (is_singular('fw-portfolio')) { ?>
            <a href='<?php echo esc_url(get_post_type_archive_link('fw-portfolio')); ?>' class="breadcrumb"><?php  echo get_post_type_object('fw-portfolio')->label; ?></a>
            <a href="#" class="breadcrumb"><?php echo get_the_title(); ?></a> <?php 
          }
          else if( is_page() )
          { 
            // Standard page
            global $post,$parents;
            if( $post->post_parent ){        
              // If child page, get parents 
              $anc = get_post_ancestors( get_the_ID() );                  
              // Get parents in the right order
              $anc = array_reverse($anc);
              // Parent page loop
              foreach ( $anc as $ancestor ) {
                $parents .= '<a href="' . get_permalink($ancestor) . '" class="breadcrumb" >' . get_the_title($ancestor) . '</a>';
              }                  
              // Display parent pages
              echo wp_kses( $parents, array('a' => array('href' => array(),'class' => array()),));                
              // Current page
              echo '<a href="#" class="breadcrumb">' . get_the_title() . '</a>';
            }
            else {                   
              // Just display current page if not parents
              echo '<a href="#" class="breadcrumb">' . get_the_title() . '</a>';                   
            }
          }

          elseif(is_archive())
          {
            if ( is_category() ) { $title = single_cat_title( '', false );}
            elseif ( is_tag() )  { $title = single_tag_title( '', false );}
            elseif ( is_author()){ $title = get_the_author() ;}
            elseif (is_product_category()){ $title = single_cat_title( '', false );}
            elseif (is_shop())   { $title = woocommerce_page_title('', false);}
            elseif ( is_tax())   { $title = single_tag_title('', false);}
            else if ( is_day() ) { $title = get_the_date();}
            elseif ( is_month() ){ $title = get_the_date( 'F Y' );}
            elseif ( is_year() ) { $title = get_the_date( 'Y' );}
            elseif(is_archive()) { $title = post_type_archive_title('',false);}
            else { $title = esc_html__( 'Blog Archives', 'pappaya' );} ?>
            <a href="#" class="breadcrumb"><?php echo ($title); ?></a><?php 
          }
          elseif (is_product()) 
          {
            echo '<a href="#" class="breadcrumb">'.get_the_title().'</a>';
          }
          elseif ( is_404())
          {
            echo '<a href="#" class="breadcrumb">'.esc_html__("404","pappaya").'</a>';
          }
          else
          {
            echo '<a href="#" class="breadcrumb">'.get_the_title($blogID).'</a>';
          }                                       
          ?>
        </div> <?php
      }
    }
    else
    {
      if(is_home()|| is_singular('post')||is_singular('fw-portfolio')||is_archive()||is_page()||is_search() || is_404() )
      {
        ?>
        <div class="breadcrumbs">
          <a href="<?php echo esc_url( home_url('/') ); ?>" class="breadcrumb"><?php esc_html_e('Home','pappaya'); ?></a>
          <?php 
          if(is_singular('post'))
          {
            //  front page is set to display a static page
            if ( 'page' === get_option( 'show_on_front' ) && get_option('page_for_posts') ) { ?>
              <a href='<?php echo get_permalink($blogID); ?>' class="breadcrumb"><?php echo get_the_title($blogID); ?></a>
            <?php } ?>
            

                <a href="#" class="breadcrumb"><?php echo get_the_title(); ?></a> <?php 

          }
          elseif(is_search())
          {
            echo'<a href="#" class="breadcrumb">'; esc_html_e('search results ','pappaya'); echo get_search_query().'</a>';
          }
          else if (is_singular('fw-portfolio')) { ?>
            <a href='<?php echo esc_url(get_post_type_archive_link('fw-portfolio')); ?>' class="breadcrumb"><?php  echo get_post_type_object('fw-portfolio')->label; ?></a>
            <a href="#" class="breadcrumb"><?php echo get_the_title(); ?></a> <?php 
          }
          else if(is_page())
          {
            // Standard page
            global $post,$parents;
            if( $post->post_parent ){        
              // If child page, get parents 
              $anc = get_post_ancestors( get_the_ID() );                  
              // Get parents in the right order
              $anc = array_reverse($anc);
              // Parent page loop
              foreach ( $anc as $ancestor ) {
                $parents .= '<a href="' . get_permalink($ancestor) . '" class="breadcrumb" >' . get_the_title($ancestor) . '</a>';
              }                  
              // Display parent pages
              echo wp_kses( $parents, array('a' => array('href' => array(),'class' => array()),));                
              // Current page
              echo '<a href="#" class="breadcrumb">' . get_the_title() . '</a>';
            }
            else {                   
              // Just display current page if not parents
              echo '<a href="#" class="breadcrumb">' . get_the_title() . '</a>';                   
            }
          }
          elseif(is_archive())
          {
            if ( is_category() ) { $title = single_cat_title( '', false );}
            elseif ( is_tag() )  { $title = single_tag_title( '', false );}
            elseif ( is_author()){ $title = get_the_author() ;}
            elseif ( is_tax())   { $title = single_tag_title('', false);}
            else if ( is_day() ) { $title = get_the_date();}
            elseif ( is_month() ){ $title = get_the_date( 'F Y' );}
            elseif ( is_year() ) { $title = get_the_date( 'Y' );}
            elseif(is_archive()) { $title = post_type_archive_title('',false);}
            else { $title = esc_html__( 'Blog Archives', 'pappaya' );} ?>
            <a href="#" class="breadcrumb"><?php echo ($title); ?></a><?php 
          }
          elseif ( is_404())
          {
            echo '<a href="#" class="breadcrumb">'.esc_html__("404","pappaya").'</a>';
          }
          else
          {
            echo '<a href="#" class="breadcrumb">'.get_the_title($blogID).'</a>';
          }
          ?>
        </div> <?php
      }
    }
  }
// ========__/\_ Breadcrumb ends _/\_==========


// =========== Theme Retina Images =============
  /**
   * pappaya Function - Check Retina Display.
   * This function check whether the retina display is enabled in the theme settings.
   */

  if( ! function_exists( 'pappaya_checkRetinaDisplay' ) ){
    function pappaya_checkRetinaDisplay(){
      if(get_theme_mod('pappaya_theme_retina')==1){
        add_filter( 'wp_generate_attachment_metadata', 'pappaya_retinaAttachmentMeta', 10, 2 );
        add_filter( 'delete_attachment', 'pappaya_deleteRetinaImages' );
      }
    }
  }


  /**
   * pappaya function - Retina images.
   *
   * This function is attached to the 'wp_generate_attachment_metadata' filter hook.
   */

  if( ! function_exists( 'pappaya_retinaAttachmentMeta' ) ){
    function pappaya_retinaAttachmentMeta( $metadata, $attachment_id ) {
      foreach ( $metadata as $key => $value ) {
        if ( is_array( $value ) ) {
          foreach ( $value as $image => $attr ) {
            if ( is_array( $attr ) && (count($attr)>0) ){
              pappaya_createRetinaImages( get_attached_file( $attachment_id ), $attr['width'], $attr['height'], true );
            }
          }
        }
      }
      return $metadata;
    }
  }


  /**
   * pappaya Function - Create retina-ready images.
   *
   * Referenced via pappaya_retinaAttachmentMeta().
   */

  if( ! function_exists( 'pappaya_createRetinaImages' ) ){
    function pappaya_createRetinaImages( $file, $width, $height, $crop = false ) {
      if ( $width || $height ) {
        $resized_file = wp_get_image_editor( $file );
        if ( ! is_wp_error( $resized_file ) ) {
          $filename = $resized_file->generate_filename( $width . 'x' . $height . '@2x' );
          $resized_file->resize( $width * 2, $height * 2, $crop );
          $resized_file->save( $filename );
          $info = $resized_file->get_size();
          return array(
            'file'   => wp_basename( $filename ),
            'width'  => $info['width'],
            'height' => $info['height'],
          );
        }
      }
      return false;
    }
  }


  /**
   * pappaya Function - Delete retina-ready images.
   *
   * This function is attached to the 'delete_attachment' filter hook.
   */

  if( ! function_exists( 'pappaya_deleteRetinaImages' ) ){
    function pappaya_deleteRetinaImages( $attachment_id ) {

      $meta = wp_get_attachment_metadata( $attachment_id );
      $upload_dir = wp_upload_dir();
      $path = (isset($meta['file']))?pathinfo( $meta['file'] ):null;
      if((is_array($meta)) && count($meta)>0){
        foreach ( $meta as $key => $value ) {
          if ( 'sizes' === $key ) {
            foreach ( $value as $sizes => $size ) {
              $original_filename = $upload_dir['basedir'] . '/' . $path['dirname'] . '/' . $size['file'];
              $retina_filename = substr_replace( $original_filename, '@2x.', strrpos( $original_filename, '.' ), strlen( '.' ) );
              if ( file_exists( $retina_filename ) )
                unlink( $retina_filename );
            }
          }
        }
      }
    }
  }
// =========== _/\_ Theme Retina Images section ends _/\_ =============


// =========== TGM_Plugin =============

  /**
   * This file represents an example of the code that themes would use to register
   * the required plugins.
   *
   * It is expected that theme authors would copy and paste this code into their
   * functions.php file, and amend to suit.
   *
   * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
   *
   * @package    TGM-Plugin-Activation
   * @subpackage Example
   * @version    2.6.1
   * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
   * @copyright  Copyright (c) 2011, Thomas Griffin
   * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
   * @link       https://github.com/TGMPA/TGM-Plugin-Activation
   */

  /**
   * Include the TGM_Plugin_Activation class.
   *
   * Depending on your implementation, you may want to change the include call:
   *
   * Parent Theme:
   * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
   *
   * Child Theme:
   * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
   *
   * Plugin:
   * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php'; // change "dirname( __FILE__ )" to "get_template_directory()" for Themeforest standards.
   */
  require_once get_template_directory() . '/admin/class-tgm-plugin-activation.php';

  add_action( 'tgmpa_register', 'pappaya_register_required_plugins' );

  /**
   * Register the required plugins for this theme.
   *
   * In this example, we register five plugins:
   * - one included with the TGMPA library
   * - two from an external source, one from an arbitrary source, one from a GitHub repository
   * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
   *
   * The variables passed to the `tgmpa()` function should be:
   * - an array of plugin arrays;
   * - optionally a configuration array.
   * If you are not changing anything in the configuration array, you can remove the array and remove the
   * variable from the function call: `tgmpa( $plugins );`.
   * In that case, the TGMPA default settings will be used.
   *
   * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
   */
  function pappaya_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

      // This is an example of how to include a plugin bundled with a theme.
      array(
        'name'               => esc_html__( 'Revolution Slider', 'pappaya' ), // The plugin name.
        'slug'               => 'revslider', // The plugin slug (typically the folder name).
        'source'             => esc_url( get_stylesheet_directory() . '/admin/plugins/revslider.zip' ), // The plugin source.
        'required'           => true, // If false, the plugin is only 'recommended' instead of required.
        'version'            => '5.4.3.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
        ),
      array(
        'name'               => esc_html__( 'Layero Woocommerce Color Filter', 'pappaya' ),
        'slug'               => 'layero-woocommerce-color-filter',
        'source'             => esc_url( get_stylesheet_directory() . '/admin/plugins/layero-woocommerce-color-filter.zip' ),
        'required'           => false,
        'version'            => '1.0',
        ),
      // This is an example of how to include a plugin from the WordPress Plugin Repository.
      array(
        'name'      => esc_html__( 'Unyson', 'pappaya' ),
        'slug'      => 'unyson',
        'required'  => true,
        ),
      array(
        'name'      => esc_html__( 'WooCommerce', 'pappaya' ),
        'slug'      => 'woocommerce',
        'required'  => false,
        ),
      array(
        'name'      => esc_html__( 'MailChimp for WordPress', 'pappaya' ),
        'slug'      => 'mailchimp-for-wp',
        'required'  => true,
        ),
      array(
        'name'      => esc_html__( 'Kirki', 'pappaya' ),
        'slug'      => 'kirki',
        'required'  => true,
        ),

    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
      'id'           => 'pappaya',                 // Unique ID for hashing notices for multiple instances of TGMPA.
      'default_path' => '',                      // Default absolute path to bundled plugins.
      'menu'         => 'tgmpa-install-plugins', // Menu slug.
      'parent_slug'  => 'themes.php',            // Parent menu slug.
      'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
      'has_notices'  => true,                    // Show admin notices or not.
      'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
      'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
      'is_automatic' => false,                   // Automatically activate plugins after installation or not.
      'message'      => '',                      // Message to output right before the plugins table.

    );

    tgmpa( $plugins, $config );
  }

// =========== _/\_ TGM section ends _/\_ =============



// =========== Woocommerce =============

  /**
   *  Add theme support for woocommerce
   */
  add_action( 'after_setup_theme', 'pappaya_woocommerce_support' );
  function pappaya_woocommerce_support() {
      add_theme_support( 'woocommerce' );
  }

  /**
   * disable woocommerce style sheets
   */
  add_filter( 'woocommerce_enqueue_styles', '__return_false');

  /**
   * Change number or products per row to 3
   */
  add_filter('loop_shop_columns', 'pappaya_loop_columns');
  if (!function_exists('pappaya_loop_columns')) {
    function pappaya_loop_columns() {
      return 6; // 3 products per row
    }
  }

  /**
   * remove cross-sells from their normal place
   */
  remove_action( 'woocommerce_cart_collaterals','woocommerce_cross_sell_display' );

  /**
   * add them back in further up the page
   */
  add_action ('woocommerce_after_cart', 'woocommerce_cross_sell_display' ); // PLease dont remove it - checkout page botto  layout


  /**
   * pappaya Function - Woocommerce ajax cart.
   * This functions updates the ajac cart in the header to update itself while products has been added to cart.
   */

    add_filter( 'add_to_cart_fragments', 'pappaya_woocommerce_header_add_to_cart_fragment' );

    function pappaya_woocommerce_header_add_to_cart_fragment( $fragments ) {
      ob_start();
      ?>
      <a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php esc_html_e( 'View your shopping cart','pappaya'); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'pappaya' ), WC()->cart->cart_contents_count ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a> 
      <?php
      $fragments['a.cart-contents'] = ob_get_clean();
      return $fragments;
    }

  // Refresh Mini cart (@ sub header)
    add_filter( 'add_to_cart_fragments', 'pappaya_woocommerce_cart_add_to_cart_fragment' );

    function pappaya_woocommerce_cart_add_to_cart_fragment( $fragments ) {
      ob_start();
      ?>
        <div class='mini-cart'>
          <a href='javascript:void(0);' class='cart-btn waves-effect'>          
            <span class='cart-md'>
              <i class='fa fa-shopping-basket'></i>
              <span class='cart-count'><?php echo  WC()->cart->cart_contents_count; ?></span>
            </span>
            <span class='cart-sm'>
              <i class='fa fa-close'></i>
            </span>
          </a>
          <span class='cart-pointer'></span>
          <div class='dd-cart'>
            <div class='inner-scroll'>
              <?php  woocommerce_mini_cart(); ?>
              <span class='clearfix'></span>
            </div>
          </div>
        </div>
      <?php
      $fragments['div.mini-cart'] = ob_get_clean();
      return $fragments;
    }

  // Refresh Mini cart in menu
    add_filter( 'add_to_cart_fragments', 'pappaya_woocommerce_menu_cart_add_to_cart_fragment' );

    function pappaya_woocommerce_menu_cart_add_to_cart_fragment( $fragments ) {
      ob_start();
      ?>
        <ul class="mini-cart">
            <li class='menu_cart menu-overlay pappaya-mini-cart'>
                <a href='javascript:void(0);' class='cart-btn waves-effect'>          
                    <span class='cart-md mo-cart'>
                        <i class='fa fa-shopping-basket'></i>
                        <span class='cart-count'><?php echo WC()->cart->cart_contents_count; ?></span>
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
      <?php
      $fragments['ul.mini-cart'] = ob_get_clean();
      return $fragments;
    }



  /**
   * pappaya Function - Ajax mini shopping cart section.
   * This functions displays the ajax mini shopping cart widget(in the header) .
   */
  if(!function_exists('pappaya_mini_shopping_cart_section')){
    function pappaya_mini_shopping_cart_section(){
      if(class_exists('WooCommerce')){
        global $woocommerce; ?>
        <div class='mini-cart'>
          <a href='javascript:void(0);' class='cart-btn waves-effect'>          
            <span class='cart-md'>
              <i class='fa fa-shopping-basket'></i>
              <span class='cart-count'><?php echo  WC()->cart->cart_contents_count; ?></span>
            </span>
            <span class='cart-sm'>
              <i class='fa fa-close'></i>
            </span>
          </a>
          <span class='cart-pointer'></span>
          <div class='dd-cart'>
            <div class='inner-scroll'>
              <?php  woocommerce_mini_cart(); ?>
              <span class='clearfix'></span>
            </div>
          </div>
        </div>
        <?php
      }
    }
  }


  /**
   * pappaya Function - Clean Cart.
   * This functions check for empty-cart get param to clear the cart.
   */
  add_action( 'init', 'pappaya_woocommerce_clear_cart_url' );

  function pappaya_woocommerce_clear_cart_url() {
    global $woocommerce;

    if ( isset( $_GET['empty-cart'] ) ) {
      $woocommerce->cart->empty_cart(); 
    }
  }
// =========== _/\_ Woocommerce functions ends _/\_ =============




// =========== CUSTOMIZER =============

  /**
   * Recommend the Kirki plugin
   */
  require get_template_directory() . '/includes/include-kirki.php';

  /**
   * Load the Kirki Fallback class
   */
  require get_template_directory() . '/includes/kirki-fallback.php';

  /**
   * Customizer additions.
   */
  require get_template_directory() . '/includes/customizer.php';

  /**
   * Configuration sample for the Kirki Customizer.
   * The function's argument is an array of existing config values
   * The function returns the array with the addition of our own arguments
   * and then that result is used in the kirki/config filter
   *
   * @param $config the configuration array
   *
   * @return array
   */
  function pappaya_kirki_configuration_styling( $config ) {
    return wp_parse_args( array(
      'description'  => esc_attr__( 'The Customizer allows you to preview changes to your site before publishing them.
            You can also navigate to different pages on your site to preview them.
            You can publish the changes using "Save & Publish" button on customizer top portion(Appears only after making any change using customizer).', 'pappaya' ),
    ), $config );
  }
  add_filter( 'kirki/config', 'pappaya_kirki_configuration_styling' );

  /**
   * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
   */
  function pappaya_customize_preview_js() {
    wp_enqueue_script( 'pappaya_customizer', get_template_directory_uri() . '/js/pappaya-customizer.js', array( 'customize-preview' ), '20151215', true );
  }
  add_action( 'customize_preview_init', 'pappaya_customize_preview_js' );

  function pappaya_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
  }

// =========== _/\_ Customizer functions ends _/\_ =============