/**************/
// MShopLib
/**************/
(function ($) {
    var MShopLib = {
        init: function (){
             this.bindEvents();
        },
        bindEvents: function (){  
             var $this = this;
             $this.pre_loader();
             $this.CatMenu();
             $this.DefaultMenu();
             $this.MainMenu(); 
             $this.MobileMenuFunction();
             $this.mobile_menu_with_woocat();
             $this.sidebar_menu_with_woocat();
             
             $this.TopFullSlide();
             if(m_shop.m_shop_move_to_top_optn){
                  $this.MoveToTop();
             }
             if($('.header__cat__item.dropdown').length!==0){
             $this.cat_toggle();
             }
             $this.MobilenavBar();
             $this.TestimonialSlider();
             $this.Sidepan();
             $this.SidepanOpen();
        },
        SidepanOpen:function(){
             jQuery('.pan-icon').click(function (e){
              e.preventDefault();
              jQuery('body').toggleClass('side-pan-active');
  
            });
        },
        Sidepan:function(){
          $(window).bind("load resize", function() {

            if ($(window).width() > 1024) {
              var sidepanwgthgt    =  $(".sidebar-nav-widget").outerHeight();
              var sidepannavhgt    =  $(".sidebar-nav-tabs").outerHeight();
              var sidepanhgt       =  $(".m-shop-sidebar").outerHeight();
              if($('body').hasClass('logged-in')){
                var headerhgt   =   $("header").outerHeight() + $("#wpadminbar").outerHeight();
                }else{
                var headerhgt   =   $("header").outerHeight();
                }
                var caluheight1 = sidepanhgt  - sidepannavhgt;
                var caluheight2 = caluheight1 - sidepanwgthgt;
                var caluheight3 = caluheight2 - headerhgt;
                $(".m-shop-sidebar").css('top',headerhgt + "px");
                
                $('#sidebar-nav-tab-category').css('height',caluheight3 + "px");
                $('#sidebar-nav-tab-menu').css('height',caluheight3 + "px"); 
                $('#sidebar-primary .sidebar-main').css({ 'height': 'calc(100vh - ' + headerhgt+ 'px)' });    
              }
            });             
        },
        TestimonialSlider:function(){
                  var owl = jQuery('.th-testimonial.owl-carousel');
                      owl.owlCarousel({
                        items: 1,
                        nav:true,
                        navText: ["<i class='fa fa-long-arrow-left'></i>", 
                        "<i class='fa fa-long-arrow-right'></i>"],
                        margin:0,
                        loop: false,
                        dots: true,
                        smartSpeed: 1800, 
                        autoHeight: false,
                        margin: 0,
                      })
            
                    }, 
          cat_toggle : function (){
                    $('.header__cat__item.dropdown').on('click', function (e) {
                    e.preventDefault();
                    $(this).toggleClass('open');
                    });

          },
          pre_loader : function (){
                               if(!$('body').hasClass('elementor-editor-active')){
                                $(window).on('load', function(){
                                setTimeout(removeLoader); //wait for page load PLUS two seconds.
                                });
                                function removeLoader(){
                                    $( ".m_shop_overlayloader" ).fadeOut(700, function(){
                                      // fadeOut complete. Remove the loading div
                                   $(".m-shop-pre-loader img" ).hide(); //makes page more lightweight
                                    });  
                                  }
                                }

          },  
        CatMenu : function () {
                 // category toggle
                              $(".cat-toggle").click(function(){
                              $(".product-cat-list").slideToggle();
                              $(".toggle-icon", this).toggleClass("icon-circle-arrow-down");
                              });
                           
                             $("#mobile-nav-tab-category .mobile").ThunkCatMenu({
                                 resizeWidth:'1024', // Set the same in Media query       
                                 animationSpeed:'fast', //slow, medium, fast
                                 accoridonExpAll:true//Expands all the accordion menu on click
                             });
                             $("#sidebar-nav-tab-category").ThunkCatMenu({
                                 resizeWidth:'', // Set the same in Media query       
                                 animationSpeed:'fast', //slow, medium, fast
                                 accoridonExpAll:true//Expands all the accordion menu on click
                             });
                             $(".product-cat-list").ThunkCatMenu({
                                 resizeWidth:'767', // Set the same in Media query       
                                 animationSpeed:'fast', //slow, medium, fast
                                 accoridonExpAll:true//Expands all the accordion menu on click
                             });
                              $(".thunk-product-cat-list.slider").ThunkCatMenu({
                                 resizeWidth:'767', // Set the same in Media query       
                                 animationSpeed:'fast', //slow, medium, fast
                                 accoridonExpAll:true//Expands all the accordion menu on click
                             });
        },
        DefaultMenu: function(){
                 $("#menu-all-pages.m-shop-menu").bigStoreResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
                 });
                 $("#mobile-nav-tab-menu #menu-all-pages.m-shop-menu").bigStoreResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
                 });
                 $("#sidebar-nav-tab-menu #menu-all-pages.m-shop-menu").bigStoreResponsiveMenu({
                 resizeWidth:'2400', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
                 });
        },
        MainMenu : function(){
                
                $("#mobile-nav-tab-menu #m-shop-menu").bigStoreResponsiveMenu({
                 resizeWidth:'1024', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
                });
                $("#sidebar-nav-tab-menu #m-shop-menu").bigStoreResponsiveMenu({
                 resizeWidth:'2400', // Set the same in Media query       
                 animationSpeed:'medium', //slow, medium, fast
                 accoridonExpAll:true//Expands all the accordion menu on click
                });
        },
        MobileMenuFunction : function(){
                    // close-button-active
                     $('body').find('.m-shop-side-nav-wrap .sidebar-nav-bar').prepend('<div class="menu-close"><a href="#" class="menu-close-btn">close</a></div>');
                        $('.menu-close-btn').removeAttr("href");
                        //Menu close
                        $('.menu-close-btn,.m-shop-menu li a span.m-shop-menu-link').click(function(){
                        $('body').removeClass('mobile-menu-active');
                        
                        });
                         $('.menu-close-btn,.m-shop-menu li a span.m-shop-menu-link').keypress(function(){
                        $('body').removeClass('mobile-menu-active');
                        
                        });
                        // Esc key close menu
                      document.addEventListener( 'keydown', function( event ){
                      if ( event.keyCode === 27 ){
                        event.preventDefault();
                        document.querySelectorAll( '.mobile-menu-active' ).forEach( function( element ) {
                          jQuery('body').removeClass('mobile-menu-active');
                        }.bind( this ) ); 
                      }
                    }.bind( this ) );
                    //ToggleBtn main menu Click
                    $('#menu-btn,#mob-menu-btn').click(function (e){
                       e.preventDefault();
                       $('body').addClass('mobile-menu-active');
                       $('#m-shop-menu').removeClass('hide-menu');
                       $('.sider.above').addClass('m-shop-menu-hide');  
                       $('.sider.main').removeClass('m-shop-menu-hide');
                       mshopmenu.modalMenu.init();     
                    });
                    // default page
                    $('#menu-btn,#mob-menu-btn').click(function (e){
                       e.preventDefault();
                       $('body').addClass('mobile-menu-active');
                       $('#menu-all-pages').removeClass('hide-menu');  
                       mshopmenu.modalMenu.init();   
                    });           
        },
        mobile_menu_with_woocat: function () {
                    $(document).ready(function() {
                        $('.mobile-nav-tabs li a').click(function(){
  
                         $('.panel').hide();
                         $('.mobile-nav-tabs li a.active').removeClass('active');
                         $(this).addClass('active');
                         
                         var panel = $(this).attr('href');
                         $(panel).fadeIn(1000);
                         
                         return false;  // prevents link action
                        
                          });  // end click 

                         $('.mobile-nav-tabs li:first a').click();
                            
                });
                         
        }, 
        sidebar_menu_with_woocat: function () {
                    $(document).ready(function() {
                         $('.sidebar-nav-tabs li a').click(function(){
                         $('.panel').hide();
                         $('.sidebar-nav-tabs li a.active').removeClass('active');
                         $(this).addClass('active'); 
                         var panel = $(this).attr('href');
                         $(panel).fadeIn(1000); 
                         return false;// prevents link action
                          });// end click 
                         $('.sidebar-nav-tabs li:first a').click();              
                });                   
        }, 
       
           TopFullSlide:function(){
                if(m_shop.m_shop_rtl==true){
                  var mshp_rtl = true;
                }else{
                  var mshp_rtl = false;
                }
                if(m_shop.m_shop_top_slider_optn == true){
                var sld_atply_p = true;
                }else{
                var sld_atply_p = false; 
                }
                
                var owl = $('.thunk-slider-full-slide');
                     owl.owlCarousel({
                        rtl:mshp_rtl,
                       items:1,
                       nav: false,
                       loop:sld_atply_p,
                       dots: true,
                       smartSpeed: 1800,
                       autoHeight: false,
                       margin:0,
                       autoplay:sld_atply_p,
                       autoplayHoverPause: true, // Stops autoplay
                       autoplayTimeout: 3000,
                       responsive:{
                        0:{
                                           items:1,
                                           
                                       },
                                       768:{
                                           items:1,
                                       },
                                       900:{
                                           items:1,
                                       },
                                       1025:{
                                           items:1,
                         }
                   }
                });

           },

            MoveToTop:function(){
                      /**************************************************/
                      // Show-hide Scroll to top & move-to-top arrow
                      /**************************************************/
                        jQuery("body").prepend("<a id='move-to-top' class='animate' href='#'><i class='fa fa-angle-up'></i></a>"); 
                        var scrollDes = 'html,body';  
                        /*Opera does a strange thing if we use 'html' and 'body' together so my solution is to do the UA sniffing thing*/
                        if(navigator.userAgent.match(/opera/i)){
                          scrollDes = 'html';
                        }
                        //show ,hide
                        jQuery(window).scroll(function (){
                          if(jQuery(this).scrollTop() > 160){
                            jQuery('#move-to-top').addClass('filling').removeClass('hiding');
                          }else{
                            jQuery('#move-to-top').removeClass('filling').addClass('hiding');
                          }
                        });
                        jQuery('#move-to-top').click(function(){
                            jQuery("html, body").animate({ scrollTop: 0 }, 600);
                            return false;
                        });
                     
                },
                

               MobilenavBar:function(){
                 //show ,hide
                        jQuery(window).scroll(function (){
                          if(jQuery(this).scrollTop() > 160){
                            jQuery('#mshop-mobile-bar').addClass('active').removeClass('hiding');
                              if($(window).scrollTop() + window.innerHeight >= document.body.scrollHeight){
                                  jQuery('#mshop-mobile-bar').removeClass('active');
                                }
                                $('window').on('touchmove', function(event) {
    //Prevent the window from being scrolled.
    event.preventDefault();

   if($(window).scrollTop() + window.innerHeight >= document.body.scrollHeight){
                                  jQuery('#mshop-mobile-bar').removeClass('active');
                                }
});
                          }else{
                            jQuery('#mshop-mobile-bar').removeClass('active').addClass('hiding');
                          }

                        });
                   },     
    }
/* -----------------------------------------------------------------------------------------------
  Modal Menu
--------------------------------------------------------------------------------------------------- */
var mshopmenu = mshopmenu || {};
mshopmenu.modalMenu = {
  init: function(){
    this.keepFocusInModal();
  },
    keepFocusInModal: function(){
    var _doc = document;
    _doc.addEventListener( 'keydown', function( event ){
      var toggleTarget, modal, selectors, elements, menuType, bottomMenu, activeEl, lastEl, firstEl, tabKey, shiftKey,
        toggleTarget = '.mobile-nav-bar.sider';
        if(jQuery('.mobile-menu-active').length!=''){   
        selectors = 'a,.arrow';
        modal = _doc.querySelector( toggleTarget );
        elements = modal.querySelectorAll( selectors );
        elements = Array.prototype.slice.call( elements );
        if ( '.mobile-nav-bar.sider' === toggleTarget ){
          menuType = window.matchMedia( '(min-width: 1024px)' ).matches;
          menuType = menuType ? '.expanded-menu' : '.mobile-nav-tab-menu .m-shop-menu';
          elements = elements.filter( function( element ) {
            return null !== element.closest( menuType ) && null !== element.offsetParent;
          } );
          elements.unshift( _doc.querySelector( '.mobile-nav-bar .menu-close-btn' ) );
           $('.mobile-nav-tab-menu .m-shop-menu a,.mobile-nav-bar .menu-close-btn,.mobile-nav-bar .arrow').attr('tabindex',0); 
        }
        lastEl = elements[ elements.length - 1 ];
        firstEl = elements[0];
        activeEl = _doc.activeElement;
        tabKey = event.keyCode === 9;
        shiftKey = event.shiftKey;

        if ( ! shiftKey && tabKey && lastEl === activeEl ) {
          event.preventDefault();
          firstEl.focus();
        }

        if ( shiftKey && tabKey && firstEl === activeEl ) {
          event.preventDefault();
          lastEl.focus();
        }
      }

    } );
  }
}; // mshopmenu.modalMenu   
   
MShopLib.init();
  $(".menu-close-btn").click(function(){
    // focus and select
   $('.menu-toggle .menu-btn').focus().select();
   $('.m-shop-menu a,.menu-close,.arrow').attr('tabindex',-1);
});
$(".menu-close-btn").keypress(function(){
   
    // focus and select
   $('.menu-toggle .menu-btn').focus().select();
   $('.m-shop-menu a,.menu-close,.arrow').attr('tabindex',-1);
});
})(jQuery);


