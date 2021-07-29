/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ){
/**
 * Dynamic Internal/Embedded Style for a Control
 */
function m_shop_add_dynamic_css( control, style ){
      control = control.replace( '[', '-' );
      control = control.replace( ']', '' );
      jQuery( 'style#' + control ).remove();

      jQuery( 'head' ).append(
            '<style id="' + control + '">' + style + '</style>'
      );
}
/**
 * Responsive Spacing CSS
 */
function m_shop_responsive_spacing( control, selector, type, side ){
	wp.customize( control, function( value ){
		value.bind( function( value ){
			var sidesString = "";
			var spacingType = "padding";
			if ( value.desktop.top || value.desktop.right || value.desktop.bottom || value.desktop.left || value.tablet.top || value.tablet.right || value.tablet.bottom || value.tablet.left || value.mobile.top || value.mobile.right || value.mobile.bottom || value.mobile.left ) {
				if ( typeof side != undefined ) {
					sidesString = side + "";
					sidesString = sidesString.replace(/,/g , "-");
				}
				if ( typeof type != undefined ) {
					spacingType = type + "";
				}
				// Remove <style> first!
				control = control.replace( '[', '-' );
				control = control.replace( ']', '' );
				jQuery( 'style#' + control + '-' + spacingType + '-' + sidesString ).remove();

				var desktopPadding = '',
					tabletPadding = '',
					mobilePadding = '';

				var paddingSide = ( typeof side != undefined ) ? side : [ 'top','bottom','right','left' ];

				jQuery.each(paddingSide, function( index, sideValue ){
					if ( '' != value['desktop'][sideValue] ) {
						desktopPadding += spacingType + '-' + sideValue +': ' + value['desktop'][sideValue] + value['desktop-unit'] +';';
					}
				});

				jQuery.each(paddingSide, function( index, sideValue ){
					if ( '' != value['tablet'][sideValue] ) {
						tabletPadding += spacingType + '-' + sideValue +': ' + value['tablet'][sideValue] + value['tablet-unit'] +';';
					}
				});

				jQuery.each(paddingSide, function( index, sideValue ){
					if ( '' != value['mobile'][sideValue] ) {
						mobilePadding += spacingType + '-' + sideValue +': ' + value['mobile'][sideValue] + value['mobile-unit'] +';';
					}
				});

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '-' + spacingType + '-' + sidesString + '">'
					+ selector + '	{ ' + desktopPadding +' }'
					+ '@media (max-width: 768px) {' + selector + '	{ ' + tabletPadding + ' } }'
					+ '@media (max-width: 544px) {' + selector + '	{ ' + mobilePadding + ' } }'
					+ '</style>'
				);

			} else {
				wp.customize.preview.send( 'refresh' );
				jQuery( 'style#' + control + '-' + spacingType + '-' + sidesString ).remove();
			}

		} );
	} );
}
/**
 * Apply CSS for the element
 */
function m_shop_css( control, css_property, selector, unit ){

	wp.customize( control, function( value ) {
		value.bind( function( new_value ) {

			// Remove <style> first!
			control = control.replace( '[', '-' );
			control = control.replace( ']', '' );

			if ( new_value ){
				/**
				 *	If ( unit == 'url' ) then = url('{VALUE}')
				 *	If ( unit == 'px' ) then = {VALUE}px
				 *	If ( unit == 'em' ) then = {VALUE}em
				 *	If ( unit == 'rem' ) then = {VALUE}rem.
				 */
				if ( 'undefined' != typeof unit) {
					if ( 'url' === unit ) {
						new_value = 'url(' + new_value + ')';
					} else {
						new_value = new_value + unit;
					}
				}

				// Remove old.
				jQuery( 'style#' + control ).remove();

				// Concat and append new <style>.
				jQuery( 'head' ).append(
					'<style id="' + control + '">'
					+ selector + '	{ ' + css_property + ': ' + new_value + ' }'
					+ '</style>'
				);

			} else {

				wp.customize.preview.send( 'refresh' );

				// Remove old.
				jQuery( 'style#' + control ).remove();
			}

		} );
	} );
}
/*******************************/
// Range slider live customizer
/*******************************/
function bigStoreGetCss( arraySizes, settings, to ) {
    'use strict';
    var data, desktopVal, tabletVal, mobileVal,
        className = settings.styleClass, i = 1;

    var val = JSON.parse( to );
    if ( typeof( val ) === 'object' && val !== null ) {
        if ('desktop' in val) {
            desktopVal = val.desktop;
        }
        if ('tablet' in val) {
            tabletVal = val.tablet;
        }
        if ('mobile' in val) {
            mobileVal = val.mobile;
        }
    }

    for ( var key in arraySizes ) {
        // skip loop if the property is from prototype
        if ( ! arraySizes.hasOwnProperty( key )) {
            continue;
        }
        var obj = arraySizes[key];
        var limit = 0;
        var correlation = [1,1,1];
        if ( typeof( val ) === 'object' && val !== null ) {

            if( typeof obj.limit !== 'undefined'){
                limit = obj.limit;
            }

            if( typeof obj.correlation !== 'undefined'){
                correlation = obj.correlation;
            }

            data = {
                desktop: ( parseInt(parseFloat( desktopVal ) / correlation[0]) + obj.values[0]) > limit ? ( parseInt(parseFloat( desktopVal ) / correlation[0]) + obj.values[0] ) : limit,
                tablet: ( parseInt(parseFloat( tabletVal ) / correlation[1]) + obj.values[1] ) > limit ? ( parseInt(parseFloat( tabletVal ) / correlation[1]) + obj.values[1] ) : limit,
                mobile: ( parseInt(parseFloat( mobileVal ) / correlation[2]) + obj.values[2] ) > limit ? ( parseInt(parseFloat( mobileVal ) / correlation[2]) + obj.values[2] ) : limit
            };
        } else {
            if( typeof obj.limit !== 'undefined'){
                limit = obj.limit;
            }

            if( typeof obj.correlation !== 'undefined'){
                correlation = obj.correlation;
            }
            data =( parseInt( parseFloat( to ) / correlation[0] ) ) + obj.values[0] > limit ? ( parseInt( parseFloat( to ) / correlation[0] ) ) + obj.values[0] : limit;
        }
        settings.styleClass = className + '-' + i;
        settings.selectors  = obj.selectors;

        bigStoreSetCss( settings, data );
        i++;
    }
}
function bigStoreSetCss( settings, to ){
    'use strict';
    var result     = '';
    var styleClass = jQuery( '.' + settings.styleClass );
    if ( to !== null && typeof to === 'object' ){
        jQuery.each(
            to, function ( key, value ) {
                var style_to_add;
                if ( settings.selectors === '.container' ){
                    style_to_add = settings.selectors + '{ ' + settings.cssProperty + ':' + value + settings.propertyUnit + '; max-width: 100%; }';
                } else {
                    style_to_add = settings.selectors + '{ ' + settings.cssProperty + ':' + value + settings.propertyUnit + '}';
                }
                switch ( key ) {
                    case 'desktop':
                        result += style_to_add;
                        break;
                    case 'tablet':
                        result += '@media (max-width: 767px){' + style_to_add + '}';
                        break;
                    case 'mobile':
                        result += '@media (max-width: 544px){' + style_to_add + '}';
                        break;
                }
            }
        );
        if ( styleClass.length > 0 ) {
            styleClass.text( result );
        } else {
            jQuery( 'head' ).append( '<style type="text/css" class="' + settings.styleClass + '">' + result + '</style>' );
        }
    } else {
        jQuery( settings.selectors ).css( settings.cssProperty, to + 'px' );
    }
}
//*****************************/
// Logo
//*****************************/
wp.customize(
    'm_shop_logo_width', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'max-width',
                    propertyUnit: 'px',
                    styleClass: 'open-logo-width'
                };

                var arraySizes = {
                    size3: { selectors:'.thunk-logo img,.sticky-header .logo-content img', values: ['','',''] }
                };
                bigStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);

/****************/
// footer
/****************/
wp.customize('m_shop_footer_col1_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col1 .content-html').text(to);
         });
     });
 wp.customize('m_shop_above_footer_col2_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col2 .content-html').text(to);
         });
     });
 wp.customize('m_shop_above_footer_col3_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col3 .content-html').text(to);
         });
     });
m_shop_css( 'm_shop_above_frt_brdr_clr','border-bottom-color', 'body.m-shop-dark .top-footer,.top-footer');
wp.customize(
    'm_shop_above_ftr_hgt', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.top-footer .top-footer-bar', values: ['','',''] }
                };
                bigStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'm_shop_abv_ftr_botm_brd', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'border-bottom-width',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.top-footer', values: ['','',''] }
                };
                bigStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);

 wp.customize('m_shop_footer_bottom_col1_texthtml', function(value){
         value.bind(function(to) {
             $('.below-footer-col1 .content-html').text(to);
         });
     });
 wp.customize('m_shop_bottom_footer_col2_texthtml', function(value){
         value.bind(function(to) {
             $('.below-footer-col2 .content-html').text(to);
         });
     });
 wp.customize('m_shop_bottom_footer_col3_texthtml', function(value){
         value.bind(function(to) {
             $('.below-footer-col3 .content-html').text(to);
         });
     });
m_shop_css( 'm_shop_bottom_frt_brdr_clr','border-top-color', '.below-footer,body.m-shop-dark .below-footer');
wp.customize(
    'm_shop_btm_ftr_hgt', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.below-footer .below-footer-bar', values: ['','',''] }
                };
                bigStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'm_shop_btm_ftr_botm_brd', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'border-top-width',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.below-footer', values: ['','',''] }
                };
                bigStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);
// move to top
wp.customize(
    'm_shop_move_to_top_size', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'font-size',
                    propertyUnit: 'rem',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'#move-to-top', values: ['','',''] }
                };
                bigStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);
// loader
m_shop_css( 'm_shop_loader_bg_clr','background-color','.m_shop_overlayloader');
//*****************************/
// Global Color Custom Style
//*****************************/
wp.customize( 'm_shop_theme_clr', function( setting ){
        setting.bind( function( cssval ){
                var dynamicStyle = '';
                 dynamicStyle += '.woocommerce .thunk-woo-product-list .star-rating, .woocommerce .thunk-woo-product-list .star-rating:before, .woocommerce ul.products li.product .star-rating a, .woocommerce ul.products li.product .star-rating a:before,.thunk-hglt-icon,.thunk-woo-product-list .thunk-product .yith-wcwl-wishlistexistsbrowse:before, .thunk-woo-product-list .thunk-product .yith-wcwl-wishlistaddedbrowse:before, .thunk-compare .compare-button a.compare.button.added,.breadcrumbs a:hover,.woocommerce .woocommerce-message .button,a:hover, a:focus, .thunk-icon .cart-icon a:hover,.woocommerce .thunk-woo-product-list .star-rating,.woocommerce .thunk-woo-product-list .star-rating:before,.woocommerce ul.products li.product .star-rating a,.woocommerce ul.products li.product .star-rating a:before,.widget.woocommerce .product_list_widget .star-rating,.widget.woocommerce .product_list_widget .star-rating:before,.woocommerce .star-rating,header #open-cart .cart-close-btn:hover{ color: ' + cssval + '} ';
                 dynamicStyle += '.thunk-woo-product-list .thunk-product-wrap .opn-quick-view-text:hover,.thunk-woo-product-list .thunk-product-wrap:hover a.add_to_cart_button, .woocommerce .thunk-product-content .added_to_cart, .woocommerce .thunk-product-wrap:hover .thunk-product-content a.add_to_cart_button, .woocommerce .thunk-product-wrap:hover .thunk-product-content .added_to_cart,.woocommerce .thunk-woo-product-list .onsale, .woocommerce ul.products li.product .onsale,.thunk-slide .owl-nav button.owl-prev:hover, .thunk-slide .owl-nav button.owl-next:hover,.open-cart p.buttons a:hover,.single_add_to_cart_button.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button, .woocommerce div.product form.cart .button,.woocommerce .woocommerce-error .button:hover, .woocommerce .woocommerce-info .button:hover, .woocommerce .woocommerce-message .button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.header-support-icon .menu-toggle:hover .icon-bar,#search-box #search-button:hover,.ribbon-btn,.slider-content-caption a.slide-btn,article.thunk-post-article .thunk-readmore.button, .woocommerce #respond input#submit, #comments .submit,button, .button, input[type="button"], input[type="reset"], input[type="submit"],.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,.cart-close-btn:hover:before, .cart-close-btn:hover:after,.woocommerce #content div.product div.summary .prev_next_buttons a:hover{ background: ' + cssval + '} ';
                 dynamicStyle += '.open-cart p.buttons a:hover,.woocommerce .woocommerce-message .button,.thunk-slide .owl-nav button.owl-prev:hover, .thunk-slide .owl-nav button.owl-next:hover,.woocommerce #respond input#submit, #comments .submit,button, .button, input[type="button"], input[type="reset"], input[type="submit"],.woocommerce #content div.product div.summary .prev_next_buttons a:hover{border-color: ' + cssval + '} ';
                m_shop_add_dynamic_css( 'm_shop_theme_clr', dynamicStyle );

        } );
    } );

m_shop_css( 'm_shop_text_clr','color','body,.woocommerce-error, .woocommerce-info, .woocommerce-message');
m_shop_css( 'm_shop_title_clr','color','.site-title span a,.sprt-tel b,.widget.woocommerce .widget-title, .open-widget-content .widget-title, .widget-title,.thunk-title .title,.thunk-hglt-box h6,h2.thunk-post-title a, h1.thunk-post-title ,#reply-title,h4.author-header,.page-head h1,.woocommerce div.product .product_title, section.related.products h2, section.upsells.products h2, .woocommerce #reviews #comments h2,.woocommerce table.shop_table thead th, .cart-subtotal, .order-total,.cross-sells h2, .cart_totals h2,.woocommerce-billing-fields h3,.page-head h1 a');
m_shop_css( 'm_shop_link_clr','color','a,#open-above-menu.m-shop-menu > li > a');
m_shop_css( 'm_shop_link_hvr_clr','color','a:hover,#open-above-menu.m-shop-menu > li > a:hover,#open-above-menu.m-shop-menu li a:hover');

//move to top
m_shop_css( 'm_shop_move_to_top_bg_clr','background', '#move-to-top');
m_shop_css( 'm_shop_move_to_top_icon_clr','color', '#move-to-top');

//ribbon
wp.customize('m_shop_ribbon_text', function(value){
         value.bind(function(to) {
             $('.thunk-ribbon-content-col1 h3').text(to);
         });
     });
wp.customize('m_shop_ribbon_btn_text', function(value){
         value.bind(function(to) {
             $('a.ribbon-btn').text(to);
         });
     });
wp.customize('m_shop_ribbon_bg_img_url', function (value){
value.bind(function (to){
    $('section.thunk-ribbon-section').css('background-image', 'url( '+ to +')');
    });
});
m_shop_css( 'm_shop_ribbon_bg_background_repeat','background-repeat', 'section.thunk-ribbon-section');
m_shop_css( 'm_shop_ribbon_bg_background_position','background-position', 'section.thunk-ribbon-section');
m_shop_css( 'm_shop_ribbon_bg_background_size','background-size', 'section.thunk-ribbon-section');
m_shop_css( 'm_shop_ribbon_bg_background_attach','background-attachment', 'section.thunk-ribbon-section');

wp.customize(
    'm_shop_ribbon_top_padding', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'padding-top',
                    propertyUnit: 'rem',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.thunk-ribbon-content', values: ['','',''] }
                };
                bigStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'm_shop_ribbon_btm_padding', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'padding-bottom',
                    propertyUnit: 'rem',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.thunk-ribbon-content', values: ['','',''] }
                };
                bigStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);

// heading

 wp.customize('m_shop_cat_tab_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-tab-section h4.thunk-title').text(to);
         });
     });
  wp.customize('m_shop_cat_slider_heading', function(value){
         value.bind(function(to) {
             $('.thunk-category-slide-section h4.thunk-title').text(to);
         });
     });

 wp.customize('m_shop_product_img_sec_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-image-tab-section h4.thunk-title').text(to);
         });
     });

  wp.customize('m_shop_product_slider_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-slide-section h4.thunk-title').text(to);
         });
     });

   wp.customize('m_shop_product_list_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-list-section h4.thunk-title').text(to);
         });
     });
   wp.customize('m_shop_blog_heading', function(value){
         value.bind(function(to) {
             $('.thunk-blog-section h4.thunk-title').text(to);
         });
     });
})( jQuery );