<?php

/**

 * pappaya Theme Customizer.

 *

 * @package WordPress

 * @subpackage pappaya

 * @since pappaya 1.0

 * @param WP_Customize_Manager $wp_customize Theme Customizer object.

 *

 */





function pappaya_customize_register( $wp_customize ) {



	///  Add postMessage support for site title and description for the Theme Customizer.

    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';

	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    $wp_customize->get_setting( 'header_textcolor' )->default   = '#ffffff';





    ///  General Settings Panel

    $wp_customize->add_panel( 'general_settings', array(

        'priority'    => 1,

        'title'       => esc_html__( 'General Settings', 'pappaya' ),

        'description' => esc_html__( 'This panel contains the controls logo, boxed lay out, preloader etc.', 'pappaya' ),

    ) );



        //  Theme Logo Section

        $wp_customize->add_section('pappaya_theme_logo', array(

            'title'       =>  esc_html__('Theme Logo','pappaya'),

            'priority'    =>  10,

            'panel'       =>  'general_settings',

            'description' =>  esc_html__('Change theme logo','pappaya'),

            ));

            $wp_customize->add_setting('pappaya_theme_logo', array(

                'type'              =>  'theme_mod',

                'sanitize_callback' => 'esc_url_raw',

            ));

                $wp_customize->add_control(new WP_Customize_Image_Control(

                       $wp_customize,

                       'pappaya_theme_logo',

                       array(

                           'label'      =>  esc_html__('Please Upload theme logo', 'pappaya'),

                           'section'    => 'pappaya_theme_logo',

                           'settings'   => 'pappaya_theme_logo',

                           'context'    => 'my-custom-logo',

                       )

                ));



        //  Fav Icon  Section   

        $wp_customize->add_section('pappaya_site_icon', array(

            'title'       =>  esc_html__('Favicon', 'pappaya'),

            'priority'    =>  11,

            'panel'       =>  'general_settings',

            'description' =>  esc_html__('Change Favicon', 'pappaya'),

            ));

            $wp_customize->get_control('site_icon')->section =  esc_html__('pappaya_site_icon','pappaya'); // inbuilt siteicon to pappaya custom favicon section

            $wp_customize->get_control('site_icon')->default =  get_template_directory_uri() .'/img/fav_icon.png';



        //   Retina Images

        $wp_customize->add_section('pappaya_theme_retina', array(

            'title'       =>  esc_html__('Retina Images', 'pappaya'),

            'priority'    =>  12,

            'panel'       =>  'general_settings',

            'description' =>  esc_html__('Enable Retina Images','pappaya'),

        ));



        //   Pre Loader

        $wp_customize->add_section('pappaya_theme_preloader', array(

            'title'       =>  esc_html__('Pre Loader', 'pappaya'),

            'priority'    =>  13,

            'panel'       =>  'general_settings',

            'description' =>  esc_html__('Enable Pre Loader','pappaya'),

        ));



        //   Sticky Header

        $wp_customize->add_section('pappaya_theme_sticky_header', array(

            'title'       =>  esc_html__('Sticky Header', 'pappaya'),

            'priority'    =>  14,

            'panel'       =>  'general_settings',

            'description' =>  esc_html__('Enable Sticky Header','pappaya'),

        ));


        //   Hide Sub Header

        $wp_customize->add_section('pappaya_theme_hide_sub_header', array(

            'title'       =>  esc_html__('Hide Sub Header', 'pappaya'),

            'priority'    =>  15,

            'panel'       =>  'general_settings',

            'description' =>  esc_html__('Hide Sub-Header','pappaya'),

        ));



        //   Google Map API Key 

        $wp_customize->add_section('pappaya_googlemap_api', array(

            'title'       =>  esc_html__('Google-map API Key', 'pappaya'),

            'priority'    =>  16,

            'panel'       =>  'pappaya_contact_settings',

            'description' =>  esc_html__('Enter Google-map API Key for the site','pappaya'),

        ));

            $wp_customize->add_setting( 'pappaya_googlemap_api', array(

            'options_type' => 'theme_mod',

            'capability'   => 'edit_theme_options',

            'sanitize_callback' => 'pappaya_sanitize_text',

            ) );

                $wp_customize->add_control('pappaya_googlemap_api', array(

                    'type'        => 'text',

                    'setting'     => 'pappaya_googlemap_api',

                    'label'       =>  esc_html__( 'Google-map API Key', 'pappaya' ),

                    'description' =>  esc_html__( 'Enter Google-map API Key for the site', 'pappaya' ),

                    'section'     => 'pappaya_googlemap_api',

                    'priority'    => 10,

                ) );



    

    ///  Color Settings

    $wp_customize->get_section('colors')->priority =  2;// inbuilt colors section priority changed to 2



        //   Theme Primary Color Setting    

        $wp_customize->add_setting('pappaya_theme_pri_color', array(

          'sanitize_callback' => 'sanitize_hex_color',

        ));



        //   Theme Secondary Color Setting    

        $wp_customize->add_setting('pappaya_theme_sec_color', array(

          'sanitize_callback' => 'sanitize_hex_color',

        ));



        //   Theme Custom Color 1 Setting    

        $wp_customize->add_setting('pappaya_theme_custom_color_1', array(

          'sanitize_callback' => 'sanitize_hex_color',

        ));



        //   Theme Custom Color 2 Setting    

        $wp_customize->add_setting('pappaya_theme_custom_color_2', array(

          'sanitize_callback' => 'sanitize_hex_color',

        ));



        //   Theme Custom Color 3 Setting    

        $wp_customize->add_setting('pappaya_theme_custom_color_3', array(

          'sanitize_callback' => 'sanitize_hex_color',

        ));



        //   Theme Custom Color 4 Setting    

        $wp_customize->add_setting('pappaya_theme_custom_color_4', array(

          'sanitize_callback' => 'sanitize_hex_color',

        ));

 






    ///  Typography Settings Pannel

    $wp_customize->add_panel( 'typography_settings', array(

        'priority'    => 3,

        'title'       =>  esc_html__( 'Typography', 'pappaya' ),

        'description' =>  esc_html__( 'This panel contains site typography & text-color settings', 'pappaya' ),

    ) );





    ///  Contact

    $wp_customize->add_panel( 'pappaya_contact_settings', array(

        'title'       =>  esc_html__('Contact and Map', 'pappaya'),

        'priority'    =>  4,

        'description' =>  esc_html__('This panel contains the controls of Contact informations for "Pappaya Contact and Map" shortcode','pappaya'),

    ) );

        //  Contact and Map shortcode - Contact section Background Image

        $wp_customize->add_setting('pappaya_footer_top_contact_background', array(

            'type'      =>  'theme_mod',

            'sanitize_callback' => 'esc_url_raw',

        ));

        $wp_customize->add_control(new WP_Customize_Image_Control(

               $wp_customize,

               'pappaya_footer_top_contact_background',

               array(

                   'label'      =>  esc_html__( 'Choose the background for your Contact form in "Pappaya Contact and Map" shortcode.', 'pappaya' ),

                   'section'    => 'pappaya_contact_details',

                   'settings'   => 'pappaya_footer_top_contact_background',

                   'priority'   =>  30,

                   'default'    =>  '',

               )

        ));

        //  Contact and Map shortcode - Contact Phone Image/Icon

        $wp_customize->add_setting('pappaya_footer_top_contact_phone_img', array(

            'type'      =>  'theme_mod',

            'sanitize_callback' => 'esc_url_raw',

            'default'    =>  get_template_directory_uri() .'/img/Icon-phone.jpg',

        ));

        $wp_customize->add_control(new WP_Customize_Image_Control(

               $wp_customize,

               'pappaya_footer_top_contact_phone_img',

               array(

                   'label'      =>  esc_html__( 'Choose the image for your Contact form Phone-number in "Pappaya Contact and Map" shortcode', 'pappaya' ),

                   'section'    => 'pappaya_contact_details',

                   'settings'   => 'pappaya_footer_top_contact_phone_img',

                   'priority'   =>  31,

               )

        ));

        //  Contact and Map shortcode - Contact Email Image/Icon

        $wp_customize->add_setting('pappaya_footer_top_contact_email_img', array(

            'type'      =>  'theme_mod',

            'sanitize_callback' => 'esc_url_raw',

            'default'    =>  get_template_directory_uri() .'/img/Icon-email.jpg',

        ));

        $wp_customize->add_control(new WP_Customize_Image_Control(

               $wp_customize,

               'pappaya_footer_top_contact_email_img',

               array(

                   'label'      =>  esc_html__( 'Choose the image for your Contact form Email-Id in "Pappaya Contact and Map" shortcode', 'pappaya' ),

                   'section'    => 'pappaya_contact_details',

                   'settings'   => 'pappaya_footer_top_contact_email_img',

                   'priority'   =>  32,

               )

        ));

        //  Contact and Map shortcode - Contact Address Image/Icon

        $wp_customize->add_setting('pappaya_footer_top_contact_address_img', array(

            'type'      =>  'theme_mod',

            'sanitize_callback' => 'esc_url_raw',

            'default'    =>  get_template_directory_uri() .'/img/Icon-address.jpg',

        ));

        $wp_customize->add_control(new WP_Customize_Image_Control(

               $wp_customize,

               'pappaya_footer_top_contact_address_img',

               array(

                   'label'      =>  esc_html__( 'Choose the image for your Contact form Address in "Pappaya Contact and Map" shortcode.', 'pappaya' ),

                   'section'    => 'pappaya_contact_details',

                   'settings'   => 'pappaya_footer_top_contact_address_img',

                   'priority'   =>  33,

               )

        ));


        //  Footer-Top Contact Phone Image/Icon

        $wp_customize->add_setting('pappaya_footer_top_contact_widget_phone_img', array(

            'type'      =>  'theme_mod',

            'sanitize_callback' => 'esc_url_raw',

            'default'    =>  get_template_directory_uri() .'/img/icon-phone-2.png',

        ));

        $wp_customize->add_control(new WP_Customize_Image_Control(

               $wp_customize,

               'pappaya_footer_top_contact_widget_phone_img',

               array(

                   'label'      =>  esc_html__( 'Choose the image for your Contact form Phone-number in "Pappaya Contact Address" widget (footer contact).', 'pappaya' ),

                   'section'    => 'pappaya_contact_details',

                   'settings'   => 'pappaya_footer_top_contact_widget_phone_img',

                   'priority'   =>  41,

               )

        ));

        //  Footer-Top Contact Email Image/Icon

        $wp_customize->add_setting('pappaya_footer_top_contact_widget_email_img', array(

            'type'      =>  'theme_mod',

            'sanitize_callback' => 'esc_url_raw',

            'default'    =>  get_template_directory_uri() .'/img/icon-envelope.png',

        ));

        $wp_customize->add_control(new WP_Customize_Image_Control(

               $wp_customize,

               'pappaya_footer_top_contact_widget_email_img',

               array(

                   'label'      =>  esc_html__( 'Choose the image for your Contact form Email-Id in "Pappaya Contact Address" widget (footer contact).', 'pappaya' ),

                   'section'    => 'pappaya_contact_details',

                   'settings'   => 'pappaya_footer_top_contact_widget_email_img',

                   'priority'   =>  42,

               )

        ));

        //  Footer-Top Contact Address Image/Icon

        $wp_customize->add_setting('pappaya_footer_top_widget_contact_address_img', array(

            'type'      =>  'theme_mod',

            'sanitize_callback' => 'esc_url_raw',

            'default'    =>  get_template_directory_uri() .'/img/icon-location.png',

        ));

        $wp_customize->add_control(new WP_Customize_Image_Control(

               $wp_customize,

               'pappaya_footer_top_widget_contact_address_img',

               array(

                   'label'      =>  esc_html__( 'Choose the image for your Contact form Address in "Pappaya Contact Address" widget (footer contact).', 'pappaya' ),

                   'section'    => 'pappaya_contact_details',

                   'settings'   => 'pappaya_footer_top_widget_contact_address_img',

                   'priority'   =>  43,

               )

        ));





    ///  Miscellaneous





    ///  Footer Options

    $wp_customize->add_panel( 'pappaya_footer_settings', array(

        'title'       =>  esc_html__('Footer Settings', 'pappaya'),

        'priority'    =>  6,

        'description' =>  esc_html__('This panel contains the controls of Copyright text, Footer background and footer logo','pappaya'),

    ) );

        //  Footer Top Settings

        $wp_customize->add_section( 'pappaya_footer_top_settings', array(

            'title'       =>  esc_html__('Footer Top Settings', 'pappaya'),

            'panel'       =>  'pappaya_footer_settings',

            'priority'    =>  10,

            'description' =>  esc_html__('This Section contains the controls of Footer-Top(widget area) background and color','pappaya'),

        ) );

            //  Footer-Top Background Image

            $wp_customize->add_setting('pappaya_footer_top_background', array(

                'default'   =>  '',

                'type'      =>  'theme_mod',

                'sanitize_callback' => 'esc_url_raw',

            ));

            $wp_customize->add_control(new WP_Customize_Image_Control(

                   $wp_customize,

                   'pappaya_footer_top_background',

                   array(

                       'label'      =>  esc_html__( 'Choose the background for your footer-Top', 'pappaya' ),

                       'description'=>  esc_html__( 'If you choose to use an image then please use a blurry image so that it does not distract users from the widgets you have on your footer.', 'pappaya' ),

                       'section'    => 'pappaya_footer_top_settings',

                       'settings'   => 'pappaya_footer_top_background',

                       'priority'   =>  10,

                       'context'    => 'my-custom-logo',

                   )

            ));



            //  Footer-Top Background Color

            $wp_customize->add_setting('pappaya_footer_top_bg_color', array(

                'type'      =>  'theme_mod',

                'sanitize_callback' => 'sanitize_hex_color',

            ));



            //  Footer-Top Heading Text Color

            $wp_customize->add_setting('pappaya_footer_top_heading_color', array(

                'type'      =>  'theme_mod',

                'sanitize_callback' => 'sanitize_hex_color',

            ));



            //  Footer-Top Text Color

            $wp_customize->add_setting('pappaya_footer_top_text_color', array(

                'type'      =>  'theme_mod',

                'sanitize_callback' => 'sanitize_hex_color',

            ));



        //  Footer Bottom Settings

        $wp_customize->add_section( 'pappaya_footer_bottom_settings', array(

            'title'       =>  esc_html__('Footer Bottom Settings', 'pappaya'),

            'panel'       =>  'pappaya_footer_settings',

            'priority'    =>  15,

            'description' =>  esc_html__('This Section contains the controls of Copyright text, Footer background and footer logo','pappaya'),

        ) );

            //  Footer small logo

            $wp_customize->add_setting('pappaya_footer_small_logo', array(

                'default'   =>  '',

                'type'      =>  'theme_mod',

                'sanitize_callback' => 'esc_url_raw',

            ));

            $wp_customize->add_control(new WP_Customize_Image_Control(

                   $wp_customize,

                   'pappaya_footer_small_logo',

                   array(

                       'label'      =>  esc_html__( 'Choose the footer small logo ', 'pappaya' ),               

                       'section'    => 'pappaya_footer_bottom_settings',

                       'settings'   => 'pappaya_footer_small_logo',

                       'priority'   =>  10,

                       'context'    => 'my-custom-logo',

                   )

            ));



}

add_action( 'customize_register', 'pappaya_customize_register' );





///  General Settings

    // Retina Images

    pappaya_Kirki::add_config( 'pappaya_theme_retina', array(

    'options_type' => 'theme_mod',

    'capability'   => 'edit_theme_options',

    ) );

    pappaya_Kirki::add_field('pappaya_theme_retina', array(

        'type'        => 'switch',

        'setting'     => 'pappaya_theme_retina',

        'label'       =>  esc_html__( 'Enable Retina Images', 'pappaya' ),

        'description' =>  esc_html__( 'Switch "On" to enable retina display for your theme. Additional retina images for each image size will be formed in the uploads folder', 'pappaya' ),

        'section'     => 'pappaya_theme_retina',

        'default'     => 1,

        'priority'    => 10,

        'choices'     => array(

                              1  =>  esc_html__( 'On', 'pappaya' ),

                              0  =>  esc_html__( 'Off', 'pappaya' ),

                              ),

    ));



    //   Enable Pre Loader

    pappaya_Kirki::add_config( 'pappaya_theme_preloader', array(

    'options_type' => 'theme_mod',

    'capability'   => 'edit_theme_options',

    ) );

    pappaya_Kirki::add_field('pappaya_theme_preloader', array(

        'type'        => 'switch',

        'setting'     => 'pappaya_theme_preloader',

        'label'       =>  esc_html__( 'Enable Pre Loader', 'pappaya' ),

        'description' =>  esc_html__( 'Select to Preloader for the theme', 'pappaya' ),

        'section'     => 'pappaya_theme_preloader',

        'default'     => 0,

        'priority'    => 10,

        'choices'     => array(

                              'on'  =>  esc_html__( 'On', 'pappaya' ),

                              'off' =>  esc_html__( 'Off', 'pappaya' ),

                              ),

    ) );



    //   Sticky Header

    pappaya_Kirki::add_config( 'pappaya_theme_sticky_header', array(

    'options_type' => 'theme_mod',

    'capability'   => 'edit_theme_options',

    ) );

    pappaya_Kirki::add_field('pappaya_theme_sticky_header', array(

        'type'        => 'switch',

        'setting'     => 'pappaya_theme_sticky_header',

        'label'       =>  esc_html__( 'Enable Sticky Header', 'pappaya' ),

        'description' =>  esc_html__( 'Select to Sticky Header for the theme', 'pappaya' ),

        'section'     => 'pappaya_theme_sticky_header',

        'default'     => 0,

        'priority'    => 10,

        'choices'     => array(

                              'on'  =>  esc_html__( 'On', 'pappaya' ),

                              'off' =>  esc_html__( 'Off', 'pappaya' ),

                              ),

    ) );


    //   Hide Sub Header

    pappaya_Kirki::add_config( 'pappaya_theme_hide_sub_header', array(

    'options_type' => 'theme_mod',

    'capability'   => 'edit_theme_options',

    ) );

    pappaya_Kirki::add_field('pappaya_theme_hide_sub_header', array(

        'type'        => 'switch',

        'setting'     => 'pappaya_theme_hide_sub_header',

        'label'       =>  esc_html__( 'Hide Sub Header', 'pappaya' ),

        'description' =>  esc_html__( 'Hide Sub-Header (The section just below menu contains Page Title & Breadcrumb)', 'pappaya' ),

        'section'     => 'pappaya_theme_hide_sub_header',

        'default'     => 0,

        'priority'    => 10,

        'choices'     => array(

                              'on'  =>  esc_html__( 'On', 'pappaya' ),

                              'off' =>  esc_html__( 'Off', 'pappaya' ),

                              ),

    ) );



    //Blog and Shop Layout

    pappaya_Kirki::add_section( 'pappaya_layout_section', array(

        'title'       =>  esc_html__('Layout', 'pappaya'),

        'priority'    =>  16,

        'capability'  => 'edit_theme_options',

        'panel'       => 'general_settings',

        'description' => esc_html__('Blog and Shop section Layout Settings','pappaya'),

    ) );

        //  Blog

        pappaya_Kirki::add_config( 'pappaya_blog_layout_setting', array(

        'options_type' => 'theme_mod',

        'capability'   => 'edit_theme_options',

        ) );

            pappaya_Kirki::add_field('pappaya_blog_layout_setting', array(

                'type'        => 'radio-image',

                'setting'     => 'pappaya_blog_layout',

                'label'       =>  esc_html__( 'Blog page Layout', 'pappaya' ),

                'description' =>  esc_html__( 'Select Blog page Layout (Fullwidth,Left,Right,Both)', 'pappaya' ),

                'section'     => 'pappaya_layout_section',

                'default'     => 'right',

                'priority'    => 10,

                'choices'     => array(

                                      'full'  =>  get_template_directory_uri() . '/img/blogFull.png',

                                      'left'  =>  get_template_directory_uri() . '/img/blogLeft.png',

                                      'right' =>  get_template_directory_uri() . '/img/blogRight.png',

                                      'both'  =>  get_template_directory_uri() . '/img/blogBoth.png',

                                      ),

            ) );

        //  Shop

        pappaya_Kirki::add_config( 'pappaya_shop_layout_setting', array(

        'options_type' => 'theme_mod',

        'capability'   => 'edit_theme_options',

        ) );

            pappaya_Kirki::add_field('pappaya_shop_layout_setting', array(

                'type'        => 'radio-image',

                'setting'     => 'pappaya_shop_layout',

                'label'       =>  esc_html__( 'Shop page Layout', 'pappaya' ),

                'description' =>  esc_html__( 'Select Shop page Layout (Fullwidth,Left,Right)', 'pappaya' ),

                'section'     => 'pappaya_layout_section',

                'default'     => 'right',

                'priority'    => 10,

                'choices'     => array(

                                      'full'  =>  get_template_directory_uri() . '/img/blogFull.png',

                                      'left'  =>  get_template_directory_uri() . '/img/blogLeft.png',

                                      'right' =>  get_template_directory_uri() . '/img/blogRight.png',

                                      ),

                ) );





/// Color Settings

    //   Primery Color using Field

    pappaya_Kirki::add_field('pappaya_theme_pri_color', array(

            'type'        => 'color',

            'setting'     => 'pappaya_theme_pri_color',

            'label'       =>  esc_html__( 'Theme Primary color', 'pappaya' ),

            'description' =>  esc_html__( 'From this panel you control the theme primary color', 'pappaya' ),

            'section'     => 'colors',

            'priority'    => 1,

            'default'     => '#ff5722',

            'transport'   => 'postMessage',

            'alpha'       => true,

            'js_vars'     => array(

               

                                array(

                                    'element'  =>   'a,

                                                    #header #nav ul li .mega-menu ul li > ul li a:hover,

                                                    .breadcrumbs a:last-child,

                                                    .tab-nav ul.tabs li a.active,

                                                    .tab-wrap .fw-tabs-container .fw-tabs ul li a.active,

                                                    .wn .fw-package .fw-pricing-row,

                                                    .bar-chart-count,

                                                    .wn .blog-sidebar .widget ul li > a:hover,

                                                    .wn .widget_layered_nav ul li > a:hover,

                                                    .wn .widget_product_categories ul li > a:hover,



                                                    .wn .highlight-col .fw-package .fw-heading-row span:after,

                                                    .wn .highlight-col .fw-package .fw-button-row a,



                                                    ul.filter_nav li.active,



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

                                                    textarea.materialize-textarea:focus:not([readonly]) + label,



                                                    .wn ul.products li.product .price .amount,

                                                    .wn ul.product_list_widget li .amount,

                                                    .sidebar .widget ul li a:hover,

                                                    .wn div.product p.price .amount,

                                                    .wn div.product span.price .amount,

                                                    .wn table.shop_table td .amount,



                                                    .btn-text.btn-primary,

                                                    .btn-text.btn',

                                    'function' => 'css',

                                    'property' => 'color',

                                ),

                                array(

                                    'element'  =>  '.bg-primary,

                                                    .sticky-header .sticky,

                                                    #header #nav ul li .mega-menu > ul.mega-menu-row > li.mega-menu-col a.fa:after,

                                                    #header #nav ul li .mega-menu > ul.mega-menu-row > li.mega-menu-col a.fa:before,

                                                    #header #nav ul li .mega-menu ul.mega-menu-row ul.sub-menu li a:after,

                                                    .btn, .btn-large, .btn-flat,

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



                                                    .materialize-red.lighten-2,

                                                    .materialize-red-text.text-lighten-2,

                                                    nav,



                                                    .pagination li.active,

                                                    .side-nav .collapsible-body li.active,

                                                    .side-nav.fixed .collapsible-body li.active,



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

                                                    .timeline-nav .current .ts-item,



                                                    .btn-primary,

                                                    .btn-text.btn:hover,



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

                                                    .woocommerce input.button.alt:disabled[disabled]:hover',

                                    'function' => 'css',

                                    'property' => 'background',

                                ),

                                array(

                                    'element'  => '.tab-wrap .fw-tabs-container .fw-tabs ul li a.active,



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

                                                    textarea.materialize-textarea:focus:not([readonly])',

                                    'function' => 'css',

                                    'property' => 'border-bottom-color',

                                ),

                                array(

                                    'element'  =>  'input:not([type]):focus:not([readonly]),

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

                                                    textarea.materialize-textarea:focus:not([readonly])',

                                    'function' => 'css',

                                    'property' => 'box-shadow',

                                ),

                                array(

                                    'element'  => '#header ul.menu .mega-menu ul.sub-menu,

                                                   #header ul.menu ul.sub-menu',

                                    'function' => 'css',

                                    'property' => 'border-left-color',

                                ),



                             ),

        )

    );



    //    Secondary Color

    pappaya_Kirki::add_field('pappaya_theme_sec_color',array(

            'type'        => 'color',

            'setting'     => 'pappaya_theme_sec_color',

            'label'       =>  esc_html__( 'Theme Secondary color', 'pappaya' ),

            'description' =>  esc_html__( 'From this panel you control the theme secondary color', 'pappaya' ),

            'section'     => 'colors',

            'priority'    => 2,

            'default'     => '#ffca28',

            'transport'   => 'postMessage',

            'alpha'       => true,

            'js_vars'     => array(

                              array(

                                    'element'  =>  '.bg-secondary,

                                                    .collapsible-colored li:nth-child(2n) .collapsible-header,

                                                    .alert-secondary,

                                                    .wn a.add_to_cart_button:hover,

                                                    .wn #respond input#submit:hover, 

                                                    .wn a.button:hover, 

                                                    .wn button.button:hover, 

                                                    .wn input.button:hover,

                                                    .wn a.button.checkout,



                                                    .btn:hover,

                                                    .btn-large:hover,



                                                    .wn #respond input#submit, 

                                                    .wn #respond input#submit.alt, 

                                                    .wn a.button.alt:hover, 

                                                    .wn button.button.alt:hover, 

                                                    .wn input.button.alt:hover,



                                                    .btn-secondary,

                                                    .btn-text.btn-secondary:hover,

                                                    .wn .added_to_cart,

                                                    .wn ul.products li.product .product-item a.added_to_cart,

                                                    .wn .widget_price_filter .price_slider_amount .button:hover',

                                    'function' => 'css',

                                    'property' => 'background',

                                   ),

                              array(

                                    'element'  =>  '[type="radio"]:checked + label:after,



                                                    [type="radio"].with-gap:checked + label:before,



                                                    [type="radio"].with-gap:checked + label:after',

                                    'function' => 'css',

                                    'property' => 'border-color',

                                   ),

                              array(

                                    'element'  =>  '[type="radio"]:checked + label:after,

                                                    

                                                    [type="radio"].with-gap:checked + label:after',

                                    'function' => 'css',

                                    'property' => 'background-color',

                                   ),

                              array(

                                    'element'  => '[type="checkbox"]:checked + label:before',

                                    'function' => 'css',

                                    'property' => 'border-right-color',

                                   ),

                              array(

                                    'element'  => '[type="checkbox"]:checked + label:before',

                                    'function' => 'css',

                                    'property' => 'border-bottom-color',

                                   ),

                              array(

                                    'element'  => '.btn-text.btn-secondary',

                                    'function' => 'css',

                                    'property' => 'color',

                                   ),

                              

                            ),

        )

    );



    //    Custom Color 1

    pappaya_Kirki::add_field('pappaya_theme_custom_color_1',array(

            'type'        => 'color',

            'setting'     => 'pappaya_theme_custom_color_1',

            'label'       =>  esc_html__( 'Custom color 1', 'pappaya' ),

            'description' =>  esc_html__( 'From this panel you control the theme custom color 1.', 'pappaya' ),

            'section'     => 'colors',

            'priority'    => 3,

            'default'     => '#42a5f5',

            'transport'   => 'postMessage',

            'alpha'       => true,

            'js_vars'     => array(

                              array(

                                    'element'  =>  '.bg-custom-1,

                                                    .collapsible-colored li:nth-child(3n) .collapsible-header,

                                                    .alert-custom1',

                                    'function' => 'css',

                                    'property' => 'background',

                                   ),

                              array(

                                    'element'  =>  '#header ul.menu .mega-menu ul ul.sub-menu,

                                                    #header ul.menu ul ul.sub-menu',

                                    'function' => 'css',

                                    'property' => 'border-left-color',

                                   ),

                            ),

        )

    );



    //    Custom Color 2

    pappaya_Kirki::add_field('pappaya_theme_custom_color_2',array(

            'type'        => 'color',

            'setting'     => 'pappaya_theme_custom_color_2',

            'label'       =>  esc_html__( 'Custom color 2', 'pappaya' ),

            'description' =>  esc_html__( 'From this panel you control the theme custom color 2.', 'pappaya' ),

            'section'     => 'colors',

            'priority'    => 4,

            'default'     => '#66bb6a',

            'transport'   => 'postMessage',

            'alpha'       => true,

            'js_vars'     => array(

                              array(

                                    'element'  =>  '.bg-custom-2,

                                                    .collapsible-colored li:nth-child(4n) .collapsible-header,

                                                    .alert-custom2,

                                                    .wn span.onsale',

                                    'function' => 'css',

                                    'property' => 'background',

                                   ),

                            ),

        )

    );



    //    Custom Color 3

    pappaya_Kirki::add_field('pappaya_theme_custom_color_3',array(

            'type'        => 'color',

            'setting'     => 'pappaya_theme_custom_color_3',

            'label'       =>  esc_html__( 'Custom color 3', 'pappaya' ),

            'description' =>  esc_html__( 'From this panel you control the theme custom color 3.', 'pappaya' ),

            'section'     => 'colors',

            'priority'    => 5,

            'default'     => '#44525a',

            'transport'   => 'postMessage',

            'alpha'       => true,

            'js_vars'     => array(

                              array(

                                    'element'  =>  '.bg-custom-3,

                                                    .collapsible-colored li:nth-child(5n) .collapsible-header,

                                                    .alert-custom3',

                                    'function' => 'css',

                                    'property' => 'background',

                                   ),

                            ),

        )

    );



    //    Custom Color 4

    pappaya_Kirki::add_field('pappaya_theme_custom_color_4',array(

            'type'        => 'color',

            'setting'     => 'pappaya_theme_custom_color_4',

            'label'       =>  esc_html__( 'Custom color 4', 'pappaya' ),

            'description' =>  esc_html__( 'From this panel you control the theme custom color 4.', 'pappaya' ),

            'section'     => 'colors',

            'priority'    => 6,

            'default'     => '#eee',

            'transport'   => 'postMessage',

            'alpha'       => true,

            'js_vars'     => array(

                              array(

                                    'element'  =>  '.bg-light,



                                                    .cart-bottom .cart_totals,



                                                    .btn-light,

                                                    .btn-text.btn-light:hover,



                                                    .btn-text.btn-light',

                                    'function' => 'css',

                                    'property' => 'background',

                                   ),

                            ),

        )

    );





/// Typography Settings Pannel

    

    //   Heading Typography

    pappaya_Kirki::add_config( 'pappaya_theme_heading_typography', array(

        'option_type' => 'theme_mod',

        'capability'  => 'edit_theme_options',

    ) );

    pappaya_Kirki::add_section( 'pappaya_heading_typography_section', array(

        'title'       =>  esc_html__('Heading Typography', 'pappaya'),

        'priority'    =>  10,

        'capability'  => 'edit_theme_options',

        'panel'       => 'typography_settings',

        'description' => esc_html__('Heading Typography Settings','pappaya'),

    ) );

        pappaya_Kirki::add_field( 'pappaya_theme_heading_typography', array(

            'type'        => 'typography',

            'settings'    => 'pappaya_heading_typography',

            'label'       => esc_attr__( 'Heading Typography', 'pappaya' ),

            'description' => esc_attr__( 'Select the main typography options for your site headings.', 'pappaya' ),

            'help'        => esc_attr__( 'The typography options you set here apply to all heading tags(h1,h2,...,h6). Font size is options for each tag can set from the below section. Font weight for h6 is normally lesser than other headings so we gave an option for that too.', 'pappaya' ),

            'section'     => 'pappaya_heading_typography_section',

            'priority'    => 10,

            'default'     => array(

                'font-family'    => 'Roboto',

                'variant'        => '400',

                'color'          => '#37474f',

            ),

            'transport'   => 'postMessage',

            'js_vars'     => array(

                array(

                    'element'    => 'h1, h2, h3, h4, h5, h6,

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

                                    .wn .cart-collaterals .cart_totals table.shop_table th,



                                    .btn-white,

                                    .wn input.btn-white,

                                    .btn-text.btn-white:hover,

                                    .wn input.btn-white:hover,

                                    .wn .widget_price_filter .price_slider_amount .button,



                                    .btn-light,

                                    .btn-text.btn-light:hover,



                                    .btn-text.btn-white,



                                    .btn-text.btn-dark,



                                    .woocommerce table.shop_table_responsive tr td:before,

                                    .woocommerce-page table.shop_table_responsive tr td:before',

                    'function'   => 'css',

                    'property'   => 'color',

                ),

                array(

                    'element'    => '.middle .fw-heading:after,

                                    .page-name:after,

                                    .tab-contents h1:after,

                                    .tab-contents h2:after,

                                    .tab-contents h3:after,

                                    .tab-contents h4:after,

                                    .tab-contents h5:after,

                                    .tab-contents h6:after,

                                    .wn .fw-package .fw-heading-row span:after,



                                    .wn nav.wn-pagination ul li a:focus,

                                    .wn nav.wn-pagination ul li a:hover,

                                    .wn nav.wn-pagination ul li span.current,

                                    .wn #respond input#submit:hover,

                                    .wn #respond input#submit.alt:hover,



                                    .btn-dark,

                                    .btn-text.btn-dark:hover,

                                    .wn a.button.checkout:hover',

                    'function'   => 'css',

                    'property'   => 'background',

                ),

                array(

                    'element'    => '.header-searchform .searchform input[type=text]:focus:not([readonly])',

                    'function'   => 'css',

                    'property'   => 'border-bottom-color',

                ),

                array(

                    'element'    => '.header-searchform .searchform input[type=text]:focus:not([readonly])',

                    'function'   => 'css',

                    'property'   => 'box-shadow',

                ),



            ),

        ) );

    // H1 Font-Size

    pappaya_Kirki::add_config( 'pappaya_h1_size', array(

        'option_type' => 'theme_mod',

        'capability'  => 'edit_theme_options',

    ) );

        pappaya_Kirki::add_field( 'pappaya_h1_size', array(

            'type'      => 'slider',

            'settings'  => 'pappaya_h1_size',

            'label'     =>  esc_html__( 'Choose h1  size', 'pappaya' ),

            'section'   => 'pappaya_heading_typography_section',

            'default'   => 2.4,

            'priority'  => 21,

            'choices'   => array(

                'min'   => 1,

                'max'   => 5,

                'step'  => 0.1,

            ),

            'transport' => 'postMessage',

            'js_vars'   => array(

                            array(

                                'element'  => 'h1',

                                'function' => 'css',

                                'property' => 'font-size',

                                'units'    => 'rem',

                            ),

                           ),

        ) );

    // H2 Font-Size

    pappaya_Kirki::add_config( 'pappaya_h2_size', array(

        'option_type' => 'theme_mod',

        'capability'  => 'edit_theme_options',

    ) );

        pappaya_Kirki::add_field( 'pappaya_h2_size', array(

            'type'      => 'slider',

            'settings'  => 'pappaya_h2_size',

            'label'     =>  esc_html__( 'Choose h2  size', 'pappaya' ),

            'section'   => 'pappaya_heading_typography_section',

            'default'   => 2,

            'priority'  => 22,

            'choices'   => array(

                'min'   => 1,

                'max'   => 5,

                'step'  => 0.1,

            ),

            'transport' => 'postMessage',

            'js_vars'   => array(

                            array(

                                'element'  => 'h2',

                                'function' => 'css',

                                'property' => 'font-size',

                                'units'    => 'rem',

                            ),

                           ),

        ) );

    // H3 Font-Size

    pappaya_Kirki::add_config( 'pappaya_h3_size', array(

        'option_type' => 'theme_mod',

        'capability'  => 'edit_theme_options',

    ) );

        pappaya_Kirki::add_field( 'pappaya_h3_size', array(

            'type'      => 'slider',

            'settings'  => 'pappaya_h3_size',

            'label'     =>  esc_html__( 'Choose h3  size', 'pappaya' ),

            'section'   => 'pappaya_heading_typography_section',

            'default'   => 1.7,

            'priority'  => 23,

            'choices'   => array(

                'min'   => 1,

                'max'   => 5,

                'step'  => 0.1,

            ),

            'transport' => 'postMessage',

            'js_vars'   => array(

                            array(

                                'element'  => 'h3',

                                'function' => 'css',

                                'property' => 'font-size',

                                'units'    => 'rem',

                            ),

                           ),

        ) );

    // H4 Font-Size

    pappaya_Kirki::add_config( 'pappaya_h4_size', array(

        'option_type' => 'theme_mod',

        'capability'  => 'edit_theme_options',

    ) );

        pappaya_Kirki::add_field( 'pappaya_h4_size', array(

            'type'      => 'slider',

            'settings'  => 'pappaya_h4_size',

            'label'     =>  esc_html__( 'Choose h4  size', 'pappaya' ),

            'section'   => 'pappaya_heading_typography_section',

            'default'   => 1.6,

            'priority'  => 24,

            'choices'   => array(

                'min'   => 1,

                'max'   => 5,

                'step'  => 0.1,

            ),

            'transport' => 'postMessage',

            'js_vars'   => array(

                            array(

                                'element'  => 'h4',

                                'function' => 'css',

                                'property' => 'font-size',

                                'units'    => 'rem',

                            ),

                           ),

        ) );

    // H5 Font-Size

    pappaya_Kirki::add_config( 'pappaya_h5_size', array(

        'option_type' => 'theme_mod',

        'capability'  => 'edit_theme_options',

    ) );

        pappaya_Kirki::add_field( 'pappaya_h5_size', array(

            'type'      => 'slider',

            'settings'  => 'pappaya_h5_size',

            'label'     =>  esc_html__( 'Choose h5  size', 'pappaya' ),

            'section'   => 'pappaya_heading_typography_section',

            'default'   => 1.46,

            'priority'  => 25,

            'choices'   => array(

                'min'   => 1,

                'max'   => 5,

                'step'  => 0.1,

            ),

            'transport' => 'postMessage',

            'js_vars'   => array(

                            array(

                                'element'  => 'h5',

                                'function' => 'css',

                                'property' => 'font-size',

                                'units'    => 'rem',

                            ),

                           ),

        ) );

    // H6 Font-Size

    pappaya_Kirki::add_config( 'pappaya_h6_size', array(

        'option_type' => 'theme_mod',

        'capability'  => 'edit_theme_options',

    ) );

        pappaya_Kirki::add_field( 'pappaya_h6_size', array(

            'type'      => 'slider',

            'settings'  => 'pappaya_h6_size',

            'label'     =>  esc_html__( 'Choose h6  size', 'pappaya' ),

            'section'   => 'pappaya_heading_typography_section',

            'default'   => 1.3,

            'priority'  => 26,

            'choices'   => array(

                'min'   => 1,

                'max'   => 5,

                'step'  => 0.1,

            ),

            'transport' => 'postMessage',

            'js_vars'   => array(

                            array(

                                'element'  => 'h6',

                                'function' => 'css',

                                'property' => 'font-size',

                                'units'    => 'rem',

                            ),

                           ),

        ) );

    // H6 Font-weight

    pappaya_Kirki::add_config( 'pappaya_h6_weight', array(

        'option_type' => 'theme_mod',

        'capability'  => 'edit_theme_options',

    ) );

        pappaya_Kirki::add_field( 'pappaya_h6_weight', array(

            'type'        => 'slider',

            'settings'    => 'pappaya_h6_weight',

            'label'       =>  esc_html__( 'Choose h6  font-weight', 'pappaya' ),

            'description' =>  esc_attr__( 'Choose Font weight for h6 (it is normally lesser than other headings).', 'pappaya' ),

            'section'     => 'pappaya_heading_typography_section',

            'default'     => 300,

            'priority'    => 27,

            'choices'     => array(

                                'min'   => 100,

                                'max'   => 900,

                                'step'  => 100,

                             ),

            'transport' => 'postMessage',

            'js_vars'   => array(

                            array(

                                'element'  => 'h6',

                                'function' => 'css',

                                'property' => 'font-weight',

                            ),

                           ),

        ) );





    //   Boady Typography

    pappaya_Kirki::add_config( 'pappaya_theme_body_typography', array(

        'option_type' => 'theme_mod',

        'capability'  => 'edit_theme_options',

    ) );

    pappaya_Kirki::add_section( 'pappaya_body_typography_section', array(

        'title'       =>  esc_html__('Body Typography', 'pappaya'),

        'priority'    =>  15,

        'capability'  => 'edit_theme_options',

        'panel'       => 'typography_settings',

        'description' => esc_html__('Body Typography Settings','pappaya'),

    ) );

        pappaya_Kirki::add_field( 'pappaya_theme_body_typography', array(

            'type'        => 'typography',

            'settings'    => 'pappaya_body_typography',

            'label'       => esc_attr__( 'Boady Typography', 'pappaya' ),

            'description' => esc_attr__( 'Select the main typography options for your site content.', 'pappaya' ),

            'section'     => 'pappaya_body_typography_section',

            'priority'    => 10,

            //'transport'   => 'postMessage',

            'default'     => array(

                'font-family'    => 'Roboto',

                'variant'        => 'normal',

                'font-size'      => '14px',

                'color'          => '#757575',

            ),

            'js_vars'      => array(

                array(

                    'element'    => 'html,

                                    body,

                                    .collapsible-body,



                                    .btn-text.btn-gray',

                    'function'   => 'css',

                    'property'   => 'color',

                ),

                array(

                    'element'    => '.btn-gray,

                                    .btn-text.btn-gray:hover',

                    'function'   => 'css',

                    'property'   => 'background',

                ),

                array(

                    'element'    => 'html,

                                     body',

                    'function'   => 'css',

                    'property'   => 'font-size',

                ),

                array(

                    'element'    => 'html,

                                     body',

                    'function'   => 'css',

                    'property'   => 'font-weight',

                ),

            ),

        ) );



/// Contact & Map



    ///   Contact Details

    pappaya_Kirki::add_section('pappaya_contact_details', array(

        'title'       =>  esc_html__('Contact Details', 'pappaya'),

        'priority'    =>  40,

        'panel'       =>  'pappaya_contact_settings',

        'description' =>   esc_html__('Contact informations','pappaya'),

    ));

        

        //Contact Phone

        pappaya_Kirki::add_config( 'pappaya_contact_phone_config', array(

        'options_type' => 'theme_mod',

        'capability'   => 'edit_theme_options',

        ) );

            pappaya_Kirki::add_field( 'pappaya_contact_phone_config', array(

            'type'        => 'text',

            'settings'    => 'pappaya_contact_phone',

            'label'       =>  esc_html__( 'Contact Phone', 'pappaya' ),

            'help'        =>  esc_html__( 'Enter your Contact Phone-number for "Pappaya Contact and Map" shortcode.', 'pappaya' ),

            'section'     => 'pappaya_contact_details',


            'default'     => '',

            'priority'    => 10,

            ) );

        //Contact Email

        pappaya_Kirki::add_config( 'pappaya_contact_email_config', array(

        'options_type' => 'theme_mod',

        'capability'   => 'edit_theme_options',

        ) );

            pappaya_Kirki::add_field( 'pappaya_contact_email_config', array(

            'type'        => 'text',

            'settings'    => 'pappaya_contact_email',

            'label'       =>  esc_html__( 'Contact Email', 'pappaya' ),

            'help'        =>  esc_html__( 'Enter your Contact Email-Id for "Pappaya Contact and Map" shortcode.', 'pappaya' ),

            'section'     => 'pappaya_contact_details',


            'default'     => '',

            'priority'    => 10,

            ) );

        //Contact Address

        pappaya_Kirki::add_config( 'pappaya_contact_address_config', array(

        'options_type' => 'theme_mod',

        'capability'   => 'edit_theme_options',

        ) );

            pappaya_Kirki::add_field( 'pappaya_contact_address_config', array(

            'type'        => 'textarea',

            'settings'    => 'pappaya_contact_address',

            'label'       =>  esc_html__( 'Contact Address', 'pappaya' ),

            'help'        =>  esc_html__( 'Enter your Contact Address for "Pappaya Contact and Map" shortcode.', 'pappaya' ),

            'section'     => 'pappaya_contact_details',


            'default'     => '',

            'priority'    => 10,

            ) );

        //  From Email

        pappaya_Kirki::add_config( 'pappaya_from_email_config', array(

        'options_type' => 'theme_mod',

        'capability'   => 'edit_theme_options',

        ) );

            pappaya_Kirki::add_field( 'pappaya_from_email_config', array(

            'type'        => 'text',

            'settings'    => 'pappaya_from_email',

            'label'       =>  esc_html__( 'From Email', 'pappaya' ),

            'help'        =>  esc_html__( 'Enter your From Email-Id. (When the user send a message, an email with details send to admin email. Its From email will be this one.)', 'pappaya' ),

            'section'     => 'pappaya_contact_details',


            'default'     => '',

            'priority'    => 15,

            ) );





    ///   Google Map coordinates

    pappaya_Kirki::add_section('pappaya_map_details', array(

        'title'       =>  esc_html__('Map coordinates', 'pappaya'),

        'priority'    =>  40,

        'panel'       =>  'pappaya_contact_settings',

        'description' =>   esc_html__('Google Map coordinates for "Pappaya Contact and Map" shortcode.','pappaya'),

    ));

        // Latitude 

        pappaya_Kirki::add_config( 'pappaya_google_map_lat', array(

        'options_type' => 'theme_mod',

        'capability'   => 'edit_theme_options',

        ) );

            pappaya_Kirki::add_field( 'pappaya_google_map_lat', array(

            'type'        => 'text',

            'settings'    => 'pappaya_google_map_lat',

            'label'       =>  esc_html__( 'Google map Latitude', 'pappaya' ),

            'description' =>  esc_html__( 'Enter your Google map Latitude Text here', 'pappaya' ),

            'help'        =>  wp_kses(__( 'On clicking on your location in google map, it shows some details in which something like this "10.013515,76.330498" Latitude is the first number, In this example "10.013515" ', 'pappaya' ), array(""=>array())),

            'section'     => 'pappaya_map_details',


            'default'     => '',

            'priority'    => 10,

            ) );

        // Longitude

        pappaya_Kirki::add_config( 'pappaya_google_map_lng', array(

        'options_type' => 'theme_mod',

        'capability'   => 'edit_theme_options',

        ) );

            pappaya_Kirki::add_field( 'pappaya_google_map_lng', array(

            'type'        => 'text',

            'settings'    => 'pappaya_google_map_lng',

            'label'       =>  esc_html__( 'Google map Longitude', 'pappaya' ),

            'description' =>  esc_html__( 'Enter your Google map Longitude Text here', 'pappaya' ),

            'help'        =>  wp_kses(__( 'On clicking on your location in google map, it shows some details in which something like this "10.013515,76.330498" Longitude is the second number, In this example "76.330498" ', 'pappaya' ),array(""=>array())),

            'section'     => 'pappaya_map_details',


            'default'     => '',

            'priority'    => 10,

            ) );







/// Miscellaneous

pappaya_Kirki::add_section( 'pappaya_miscellaneous_settings', array(

        'title'       =>  esc_html__('Miscellaneous', 'pappaya'),

        'priority'    =>  5,

        'description' =>  esc_html__('This panel contains the controls of custom css','pappaya'),

    ) );

    //  Custom Css

    pappaya_Kirki::add_config( 'pappaya_custom_css', array(

        'options_type'  => 'theme_mod',

        'capability'    => 'edit_theme_options',


    ) );

        pappaya_Kirki::add_field( 'pappaya_custom_css', array(

            'type'        => 'code',

            'settings'    => 'pappaya_custom_css',

            'label'       =>  esc_html__( 'Custom Css', 'pappaya' ),

            'help'        =>  esc_html__( 'This is a simple code control.Here is a CSS editor with the pappaya theme.', 'pappaya' ),

            'description' =>  esc_html__( 'Custom Css for theme.', 'pappaya' ),

            'section'     => 'pappaya_miscellaneous_settings',


            'default'     => '',

            'priority'    => 10,

            'choices'     => array(

                'language' => 'css',

                'theme'    => 'monokai',

                'height'   => 250,

            ),

        ) );



/// Footer



    /// Footer Top

        //  Footer Top Backgroun Color

        pappaya_Kirki::add_field('pappaya_footer_top_bg_color',array(

            'type'        => 'color',

            'setting'     => 'pappaya_footer_top_bg_color',

            'label'       =>  esc_html__( 'Footer Top Background Color', 'pappaya' ),

            'description' =>  esc_html__( 'Background color will apply to footer-Top if there is no Background Image assigned.', 'pappaya' ),

            'section'     => 'pappaya_footer_top_settings',

            'priority'    => 11,

            'default'     => '#212121',

            'transport'   => 'postMessage',

            'alpha'       => true,

            'js_vars'     => array(

                              array(

                                    'element'  =>  '.footer-top',

                                    'function' => 'css',

                                    'property' => 'background',

                                   ),

                            ),

        ) );

        //  Footer Top Heading Text Color

        pappaya_Kirki::add_field('pappaya_footer_top_heading_color',array(

            'type'        => 'color',

            'setting'     => 'pappaya_footer_top_heading_color',

            'label'       =>  esc_html__( 'Footer Top Heading Color', 'pappaya' ),

            'description' =>  esc_html__( 'Footer-Top Headings Text color.', 'pappaya' ),

            'section'     => 'pappaya_footer_top_settings',

            'priority'    => 12,

            'default'     => '#FFFFFF',

            'transport'   => 'postMessage',

            'alpha'       => true,

            'js_vars'     => array(

                              array(

                                    'element'  =>  '.footer-top h5',

                                    'function' => 'css',

                                    'property' => 'color',

                                   ),

                            ),

        ) );

        //  Footer Top Text Color

        pappaya_Kirki::add_field('pappaya_footer_top_text_color',array(

            'type'        => 'color',

            'setting'     => 'pappaya_footer_top_text_color',

            'label'       =>  esc_html__( 'Footer Top Text Color', 'pappaya' ),

            'description' =>  esc_html__( 'Footer-Top Text color.', 'pappaya' ),

            'section'     => 'pappaya_footer_top_settings',

            'priority'    => 13,

            'default'     => '#878787',

            'transport'   => 'postMessage',

            'alpha'       => true,

            'js_vars'     => array(

                              array(

                                    'element'  =>  '.footer-top,

                                                    .footer-top p,

                                                    .footer-top li a',

                                    'function' => 'css',

                                    'property' => 'color',

                                   ),

                            ),

        ) );







    /// Footer Bottom

        ///   Social

        //  Facebook

        pappaya_Kirki::add_config( 'pappaya_fb_url', array(

        'options_type' => 'theme_mod',

        'capability'   => 'edit_theme_options',

        ) );

            pappaya_Kirki::add_field( 'pappaya_fb_url', array(

            'type'        => 'text',

            'settings'    => 'pappaya_fb_url',

            'label'       =>  esc_html__( 'Facebook URL', 'pappaya' ),

            'help'        =>  esc_html__( 'Facebook icon in "pappaya social share widget" points to this URL', 'pappaya' ),

            'section'     => 'pappaya_footer_bottom_settings',

            'priority'    => 20,

            ) );

        //  Twitter

        pappaya_Kirki::add_config( 'pappaya_twitter_url', array(

        'options_type' => 'theme_mod',

        'capability'   => 'edit_theme_options',

        ) );

            pappaya_Kirki::add_field( 'pappaya_twitter_url', array(

            'type'        => 'text',

            'settings'    => 'pappaya_twitter_url',

            'label'       =>  esc_html__( 'Twitter URL', 'pappaya' ),

            'help'        =>  esc_html__( 'Twitter icon in "pappaya social share widget" points to this URL', 'pappaya' ),

            'section'     => 'pappaya_footer_bottom_settings',

            'priority'    => 21,

            ) );

        //  LinkedIn

        pappaya_Kirki::add_config( 'pappaya_linkedin_url', array(

        'options_type' => 'theme_mod',

        'capability'   => 'edit_theme_options',

        ) );

            pappaya_Kirki::add_field( 'pappaya_linkedin_url', array(

            'type'        => 'text',

            'settings'    => 'pappaya_linkedin_url',

            'label'       =>  esc_html__( 'LinkedIn URL', 'pappaya' ),

            'help'        =>  esc_html__( 'LinkedIn icon in "pappaya social share widget" points to this URL', 'pappaya' ),

            'section'     => 'pappaya_footer_bottom_settings',

            'priority'    => 22,

            ) );

        //  Youtube

        pappaya_Kirki::add_config( 'pappaya_youtube_url', array(

        'options_type' => 'theme_mod',

        'capability'   => 'edit_theme_options',

        ) );

            pappaya_Kirki::add_field( 'pappaya_youtube_url', array(

            'type'        => 'text',

            'settings'    => 'pappaya_youtube_url',

            'label'       =>  esc_html__( 'Youtube URL', 'pappaya' ),

            'help'        =>  esc_html__( 'Youtube icon in "pappaya social share widget" points to this URL', 'pappaya' ),

            'section'     => 'pappaya_footer_bottom_settings',

            'priority'    => 23,

            ) );

        //  Google Plus

        pappaya_Kirki::add_config( 'pappaya_googleplus_url', array(

        'options_type' => 'theme_mod',

        'capability'   => 'edit_theme_options',

        ) );

            pappaya_Kirki::add_field( 'pappaya_googleplus_url', array(

            'type'        => 'text',

            'settings'    => 'pappaya_googleplus_url',

            'label'       =>  esc_html__( 'Google Plus URL', 'pappaya' ),

            'help'        =>  esc_html__( 'Google Plus icon in "pappaya social share widget" points to this URL', 'pappaya' ),

            'section'     => 'pappaya_footer_bottom_settings',

            'priority'    => 24,

            ) );

        //  Pinterest

        pappaya_Kirki::add_config( 'pappaya_pinterest_url', array(

        'options_type' => 'theme_mod',

        'capability'   => 'edit_theme_options',

        ) );

            pappaya_Kirki::add_field( 'pappaya_pinterest_url', array(

            'type'        => 'text',

            'settings'    => 'pappaya_pinterest_url',

            'label'       =>  esc_html__( 'Pinterest URL', 'pappaya' ),

            'help'        =>  esc_html__( 'Pinterest icon in "pappaya social share widget" points to this URL', 'pappaya' ),

            'section'     => 'pappaya_footer_bottom_settings',

            'priority'    => 25,

            ) );

        //  Instagram

        pappaya_Kirki::add_config( 'pappaya_instagram_url', array(

        'options_type' => 'theme_mod',

        'capability'   => 'edit_theme_options',

        ) );

            pappaya_Kirki::add_field( 'pappaya_instagram_url', array(

            'type'        => 'text',

            'settings'    => 'pappaya_instagram_url',

            'label'       =>  esc_html__( 'Instagram URL', 'pappaya' ),

            'help'        =>  esc_html__( 'Instagram icon in "pappaya social share widget" points to this URL', 'pappaya' ),

            'section'     => 'pappaya_footer_bottom_settings',

            'priority'    => 26,

            ) );



    //  Footer Copyright Text

    pappaya_Kirki::add_config( 'pappaya_footer_copy', array(

    'options_type' => 'theme_mod',

    'capability'   => 'edit_theme_options',

    ) );

        pappaya_Kirki::add_field( 'pappaya_footer_copy', array(

        'type'        => 'text',

        'settings'    => 'pappaya_footer_copy',

        'label'       =>  esc_html__( 'Footer Copyright Text', 'pappaya' ),

        'help'        =>  esc_html__( 'Enter your Footer Copyright Text here', 'pappaya' ),

        'section'     => 'pappaya_footer_bottom_settings',

        'priority'    => 11,

        ) );