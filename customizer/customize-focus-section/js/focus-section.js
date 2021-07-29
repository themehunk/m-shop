/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
jQuery(document).ready(function($){
    $.mShop = {
        init: function () {
            this.focusForCustomShortcut();
        },
        focusForCustomShortcut: function (){
            var fakeShortcutClasses = [
                'm_shop_top_slider_section',
                'm_shop_category_tab_section',
                'm_shop_product_slide_section',
                'm_shop_cat_slide_section',
                'm_shop_product_slide_list',
                'm_shop_product_cat_list',
                'm_shop_ribbon',
                'm_shop_banner',
                'm_shop_highlight',
                'm_shop_product_tab_image',
                'm_shop_blog',
                'm_shop_testimonial',
                'm_shop_product_single_sec',
                'm_shop_1_custom_sec',
                'm_shop_2_custom_sec',
                'm_shop_3_custom_sec',
                'm_shop_4_custom_sec',          
            ];
            fakeShortcutClasses.forEach(function (element){
                $('.customize-partial-edit-shortcut-'+ element).on('click',function (){
                   wp.customize.preview.send( 'm-shop-customize-focus-section', element );
                });
            });
        }
    };
    $.mShop.init();

     $.mShopClr = {
        init: function () {
            this.focusForCustomShortcut();
        },
        focusForCustomShortcut: function (){
            var fakeShortcutClasses = [
                'm-shop-top-slider-color',
                'm_shop_ribbon_color',
                'm-shop-highlight-color',
                'm_shop_blog_color',
                'm_shop_testimonial_color',
                'm-shop-cat-slider-color',
                'm-shop-custom-one-color',
                'm_shop_single_product_color',        
            ];
            fakeShortcutClasses.forEach(function (element){
                $('.customize-partial-edit-shortcut-'+ element).on('click',function (){
                   wp.customize.preview.send( 'm-shop-customize-focus-color-section', element );
                });
            });
        }
    };
    $.mShopClr.init();
});