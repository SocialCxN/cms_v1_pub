(function($) { 
"use strict"; 
    
    var winWidth = jQuery(window).width();
    // Main Navigation
    function responsiveNav() {
        var winWidth = jQuery(window).width();
        // menu SlideDown 
        if(winWidth > 991) {
            jQuery('.nav').find('li').mouseenter(function() {
                if(jQuery(this).hasClass('menu-item-has-children')){
                    jQuery(this).addClass('menu-visible');
                }
                if(jQuery(this).hasClass('menu-item-has-mega-menu') || jQuery(this).parents('li').hasClass('menu-item-has-mega-menu')){
                    jQuery(this).find('.mega-menu').stop().fadeIn();
                } else  {
                    jQuery(this).children('ul').stop().fadeIn();
                }
            })
            jQuery('.nav').find('li').mouseleave(function() {
                if(jQuery(this).hasClass('menu-item-has-mega-menu') || jQuery(this).parents('li').hasClass('menu-item-has-mega-menu')){
                    jQuery(this).removeClass('menu-visible').find('.mega-menu').stop().fadeOut();
                } else {
                    jQuery(this).children('ul').stop().fadeOut();
                }
                jQuery(this).removeClass('menu-visible');
            })
        } else {
            jQuery('.nav').find('li').children('span').click(function(event){
                jQuery(this).toggleClass('menu-open').next('.sub-menu, .mega-menu').stop().slideToggle();
            });
        }
        // mega menu
        if(winWidth > 991) {
            jQuery(function ($) {
                function hoverIn() {
                    var a = $(this);
                    var nav = a.closest('.nav-wrap');
                    var mega = a.find('.mega-menu');
                    var offset = rightSide(nav) - leftSide(a);
                    mega.width(Math.min(rightSide(nav), columns(mega)*285));
                    mega.css('left', Math.min(0, offset - mega.width()));
                }
                function hoverOut() {}
                function columns(mega) {
                    var columns = 0;
                    mega.children('.mega-menu-row').each(function () {
                        columns = Math.max(columns, $(this).children('.mega-menu-col').length);
                    });
                    return columns;
                }
                function leftSide(elem) {
                    return elem.offset().left;
                }
                function rightSide(elem) {
                    return elem.offset().left + elem.width();
                }
                $('.nav .menu-item-has-mega-menu').hover(hoverIn, hoverOut);
            });
        }
    }

    function columnHeight() {
        if(winWidth > 767) {
            var parentHeight = jQuery('.equal-height').height();
            jQuery('.equal-height').find('.col').animate({'min-height':parentHeight});
            jQuery('.map-wrap').css({'height':parentHeight})
        }
    }

    // Material waves effect
    function wavesEffect() {
        var btn = jQuery('.button');
        btn.each(function(){
            if(!jQuery(this).hasClass('waves-effect')){
                jQuery(this).addClass('waves-effect waves-light');
            }
        });
        jQuery('.woocommerce-pagination').find('a').addClass('waves-effect waves-light');
        jQuery('.owl-nav > div, .posts_nav a').addClass('waves-effect');
    }

    // Slider fluid navigation
    function sliderNav() {
        jQuery('.outer-navigation').each(function(){
            var sliderWidth = jQuery(this).width();
            jQuery(this).css({'width':sliderWidth})
            if(sliderWidth < winWidth) {
                var negativePosition = winWidth - sliderWidth - 60
                var position = negativePosition/2
                jQuery(this).find('.slider-nav').css({'left':-position, 'right':-position})
            }
        });
    }

    // Header padding
    // function headerPadding() {
    //     var navHeight = jQuery('.sticky-header').find('.nav').outerHeight();
    //     if(!jQuery('.').hasClass('header-overlay')){
    //         jQuery('.sticky-header').css({'padding-top':navHeight});
    //     }
    // }

    // Full  height section
    function  fullHeight() {
        var wnHeight = jQuery(window).height();
        //if(winWidth > 767 & wnHeight > 599) {
            jQuery('.cover-section').each(function() {
                jQuery('.cover-section').animate({'min-height': wnHeight}).addClass('covered');
            });

            // Centered elements
            jQuery('.cover-section').each(function() {
                var centered    = jQuery(this).find('.centered');
                var thisHeight  = jQuery(centered).height();
                if(jQuery(this).hasClass('no-padding')) {
                    var paddingTop   = 0;
                } else {
                    var paddingTop   = 72;
                }
                if(thisHeight < wnHeight) {
                    var margin = wnHeight - thisHeight - paddingTop;
                    centered.animate({'padding-top': margin/2})
                }        
            });
        //}
    }

    function  outerNav() {
        // Outer nav - Arrange the slider navs to sides
        jQuery('.outer-nav').each(function(){
            var sliderWidth = jQuery(this).width();
            if(sliderWidth < winWidth) {
                var negativePosition = winWidth - sliderWidth
                var position = negativePosition/2
                jQuery(this).find('.slider-nav').css({'left':-position, 'right':-position})
            }
        });
    }

    // Checking for contact form validation errors.
    function contactErrorCheck(){
        var errorFlag=0;
        clearContactErrors();
        if((jQuery("#c-name").val() == null || jQuery("#c-name").val() == "") ){
            jQuery(".pappaya-c-name").fadeIn().html("Enter your name");
            errorFlag=1;
        }
        if((jQuery("#c-email").val() == null || jQuery("#c-email").val() == "") ){
            jQuery(".pappaya-c-email").fadeIn().html("Enter your email");
            errorFlag=1;
        }
        if((jQuery("#c-message").val() == null || jQuery("#c-message").val() == "") ){
            jQuery(".pappaya-c-message").fadeIn().html("Enter your message");
            errorFlag=1;
        }
        return errorFlag;
    }

    // validate email function
    function validateEmail(email) {
        var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        return re.test(email);
    }

    // Clearing contact validation errors.
    function clearContactErrors(){
        jQuery(".pappaya-c-name").fadeOut().html("");
        jQuery(".pappaya-c-email").fadeOut().html("");
        jQuery(".pappaya-c-message").fadeOut().html("");
    }

    // Sticky header        
    function stickyNav() {
        if(winWidth > 991) {
            var winHeight = jQuery(window).height();
            if (jQuery(window).scrollTop() >= 10) {
                jQuery('.nav').addClass('beep');
            } else {
                jQuery('.nav').removeClass('beep'); 
            };
            if (jQuery(window).scrollTop() >= winHeight) {
                jQuery('.nav').addClass('sticky');
            } else {
                jQuery('.nav').removeClass('sticky'); 
            };
        }
    }
    jQuery(document).ready(function() {
        var winWidth = jQuery(window).width();
        var winHeight = jQuery(window).height();

        stickyNav();
        responsiveNav();// Responsive navigation
        sliderNav();// Sliders outer navigation
        fullHeight();// fullHeight
        outerNav() // Arrange the left right navs to the sides

        jQuery('.menu-overlay').on('click',function(){
            jQuery('.dd-cart').fadeToggle();
        });

        // Search form
        var searchForm = jQuery('.header-searchform');
        jQuery(window).click(function() {
            searchForm.fadeOut().removeClass('search-visible');
        });
        searchForm.click(function(event){
            event.stopPropagation();
        });
        jQuery('.menu_search').click(function(event){
            event.stopPropagation();
            if(searchForm.hasClass('search-visible')){
                searchForm.fadeOut().removeClass('search-visible');
            } else {
                searchForm.fadeIn().addClass('search-visible');   
                searchForm.find('input[type="text"]').focus();
            }
        });

        jQuery('.alert-close').click(function(){
            jQuery(this).parent('.alert').fadeOut().remove();
        })



        // functuions on Window scroll        
        jQuery(window).scroll(function() {
            stickyNav(); // sticky nav funcion
            //lmCenter(); // logo and menu Vertically align center   
            outerNav() // Arrange the left right navs to the sides
        })

        // functuions on Window resize
        jQuery(window).resize(function() {
            winWidth = jQuery(window).width();
            sliderNav(); // slider outer navigation
            //headerPadding(); // first section padding
            fullHeight(); // fullHeight        
            //lmCenter(); // logo and menu Vertically align center 
            outerNav() // Arrange the left right navs to the sides
        })

        // multi slider
        jQuery('.slider-wrapper').each(function(){
            var carousel_slider = jQuery(this).find('.carousel-slider');
            var carousel_thumb = jQuery(this).find('.thumb-nav'),
            flag = false,
            duration = 300;

            var $items = carousel_slider.data('items');
            var $items_md = $items;
            var $items_sm = $items;
            var $items_xs = $items;
            var $items_md = carousel_slider.data('items-md');
            var $items_sm = carousel_slider.data('items-sm');
            var $items_xs = carousel_slider.data('items-xs');
            var $navType = carousel_slider.data('nav');
            var $navDots = carousel_slider.data('dots');
            var $navAuto = carousel_slider.data('auto');
            var $navLoop = carousel_slider.data('loop');
            carousel_slider.owlCarousel({
                autoplayTimeout:2000,
                autoplayHoverPause:true,
                singleItem:true,
                items:$items,
                autoplay:$navAuto,
                autoplay:false,
                loop: $navLoop,//owl.children().length > 1,
                dots:$navDots,
                nav: $navType,//owl.children().length > 1,
                responsive : {
                    0 : {
                        items: $items_xs
                    },
                    600 : {
                        items: $items_sm
                    },
                    992 : {
                        items: $items_md
                    },
                    1199 : {
                        items: $items
                    }
                }
            }).on('changed.owl.carousel', syncPosition)

            var $thumb_items = carousel_thumb.data('items');
            carousel_thumb.owlCarousel({
                items:$thumb_items,
                center: false,
                responsiveClass:true,
                dots:false,
                nav:false,
                afterInit : function(el){
                  el.find(".owl-item").eq(0).addClass("synced");
                }
            })
            .on('click', '.owl-item', function () {
                carousel_slider.trigger('to.owl.carousel', [jQuery(this).index(), duration, true]);
            })
            .on('changed.owl.carousel', function (e) {
                if (!flag) {
                    flag = true;        
                    carousel_slider.trigger('to.owl.carousel', [e.item.index, duration, true]);
                    flag = false;
                }
            });
            carousel_thumb.find('.owl-item:first-child').addClass("current");
            function syncPosition(el) {
                //if you set loop to false, you have to rmuta this next line
                //var current = el.item.index;

                //if you disable loop you have to comment this block
                if (!flag) {
                    flag = true;
                    carousel_thumb.trigger('to.owl.carousel', [el.item.index, duration, true]);
                    flag = false;
                }
                var count = el.item.count-1;
                var current = Math.round(el.item.index);
                if(current < 0){
                  current = count;
                }
                if(current > count){
                  current = 0;
                }
                //end block

                carousel_thumb
                  .find(".owl-item")
                  .removeClass("current")
                  .eq(current)
                  .addClass("current");
            }


            // Custom Navigation Events
            jQuery(".nav-left").click(function(){
                var carousel_slider = jQuery(this).parents('.slider-wrapper').find(".carousel-slider");
                carousel_slider.trigger('prev.owl.carousel');
            })
            jQuery(".nav-right").click(function(){
                var carousel_slider = jQuery(this).parents('.slider-wrapper').find(".carousel-slider");
                carousel_slider.trigger('next.owl.carousel');
            });
        });

        jQuery('select').material_select();

        // Dropdown Cart
        if(winWidth > 992) {
            // header cart widget 
            jQuery('body').on('mouseenter', '.mini-cart', function(){
                jQuery(this).addClass('cw-visible');
                jQuery(this).find('.dd-cart').stop().slideDown()               
            });
            jQuery('body').on('mouseleave', '.mini-cart', function() {
                jQuery(this).removeClass('cw-visible');
                jQuery('.dd-cart').stop().slideUp()
            });
        } else {
            jQuery('body').on('click', '.cart-btn', function(){
                if(jQuery(this).parent('.mini-cart').hasClass('cw-active')) {
                    jQuery(this).parent('.mini-cart').removeClass('cw-active')
                    jQuery(this).parent('.mini-cart').find('.dd-cart').stop().slideUp() 
                } else {
                    jQuery(this).parent('.mini-cart').addClass('cw-active')
                    jQuery(this).parent('.mini-cart').find('.dd-cart').stop().slideDown() 
                }
                //jQuery('body').css({"overflow":'hidden'});
            });
        }

        // Dynamic content 
        jQuery("body").bind("DOMNodeInserted", function() {
            // Custom checkbox 
            jQuery('.place-order').find('.wc-terms-and-conditions').addClass('custom-checkbox');
        });

        // Input field classes
        jQuery('.comment-form-comment, .comment-form-author, .comment-form-email, .comment-form-url').addClass('input-field field-holder');
        jQuery('textarea').addClass('materialize-textarea');

        jQuery('#menu-toggle').click(function(){
            jQuery(this).toggleClass('open');
            jQuery('#navigation').toggleClass('menu-visible');
            jQuery('body').toggleClass('nav-open');
        });

        /*
        Add to cart fly effect with jQuery. - May 05, 2013
        (c) 2013 @ElmahdiMahmoud - fikra-masri.by
        license: http://www.opensource.org/licenses/mit-license.php
        */   
        jQuery('.ajax_add_to_cart').on('click', function () {
            var cart = jQuery('.mini-cart');
            var imgtodrag = jQuery(this);
            setTimeout(function(){
                if (imgtodrag) {
                    var imgclone = imgtodrag.clone()
                        .offset({
                        top: imgtodrag.offset().top,
                        left: imgtodrag.offset().left
                    }).css({
                        'opacity': '1',
                            'position': 'absolute',
                            'z-index': '9999'
                    }).addClass('btn btn-primary btn-fly loading')
                        .appendTo(jQuery('body'))
                        .animate({
                        'top': cart.offset().top + 10,
                            'left': cart.offset().left + 10,
                    }, 1000, 'easeInOutExpo');
                    
                    setTimeout(function () {
                        cart.addClass("glow");
                    }, 1500);
                    setTimeout(function () {
                        cart.removeClass("glow");
                    }, 2500);

                    imgclone.addClass('cart-reached').animate({
                        opacity:'0'
                    }, function () {
                        jQuery(this).detach()
                    });
                }
            }, 100);
        });

        // Counter
        jQuery('.wn-counter').each(function(){
            jQuery(this).appear(function(){
                var count = jQuery(this).data('count');
                percent   = count+('%');
                jQuery(this).find('.count-to').animate({ Counter: count}, {
                    duration: 800,
                    easing: 'swing',
                    step: function () {
                        jQuery(this).text(Math.ceil(this.Counter));
                    }
                })
            });
        });

        // Contact Submit
        jQuery(".pappaya-contact-form").submit(function(e){
            e.preventDefault();
            if(contactErrorCheck()==0){
                jQuery.ajax({
                    type: 'POST',
                    url:ajaxurl,
                    data: jQuery(".pappaya-contact-form").serialize()+'&action=pappaya_contact_action',
                    success: function( result ) {
                        jQuery(".pappaya-contact-success").html("Your query submitted succesfully!");
                        jQuery(".pappaya-contact-success").fadeIn();
                    }
                });
            }
        });

    }); // End of document.ready

    
    jQuery(window).load(function(){
        // Preloder
        if( (jQuery('.preloader-wrap').length) >0){
            setTimeout(function(){
                jQuery('.preloader-wrap').fadeOut();
            }, 1000);
        }
    });

    //Counter JS
    jQuery('.countdown').each(function () {
        jQuery(this).appear(function() {
            var $this = jQuery(this);
            jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
                duration: 3000,
                easing: 'swing',
                step: function () {
                    $this.text(Math.ceil(this.Counter));
                }
            });
        });
    });

})(jQuery);


