<?php 
/**
 * all customizer setting includeed
 *
 * @param  
 * @return mixed|string
 */
function m_shop_customize_register( $wp_customize ){
//view pro feature
//Registered panel and section
require M_SHOP_THEME_DIR . '/customizer/register-panels-and-sections.php';	
//site identity
require M_SHOP_THEME_DIR . '/customizer/section/layout/header/set-identity.php';
require M_SHOP_THEME_DIR . '/customizer/section/layout/header/header.php';	
//Header
require M_SHOP_THEME_DIR . '/customizer/section/layout/header/main-header.php';
require M_SHOP_THEME_DIR . '/customizer/section/layout/header/loader.php';
//Footer
require M_SHOP_THEME_DIR . '/customizer/section/layout/footer/above-footer.php';
require M_SHOP_THEME_DIR . '/customizer/section/layout/footer/widget-footer.php';
require M_SHOP_THEME_DIR . '/customizer/section/layout/footer/bottom-footer.php';

//sidepan
require M_SHOP_THEME_DIR . '/customizer/section/layout/side-pan/sidepan.php';
//section ordering
require M_SHOP_THEME_DIR . '/customizer/section-ordering.php';
//social Icon
require M_SHOP_THEME_DIR . '/customizer/section/layout/social-icon/social-icon.php';
//Blog
require M_SHOP_THEME_DIR . '/customizer/section/layout/blog/blog.php';
//Color Option
require M_SHOP_THEME_DIR . '/customizer/section/color/global-color.php';

//woo-product
require M_SHOP_THEME_DIR . '/customizer/section/woo/product.php';
require M_SHOP_THEME_DIR . '/customizer/section/woo/single-product.php';
require M_SHOP_THEME_DIR . '/customizer/section/woo/cart.php';
require M_SHOP_THEME_DIR . '/customizer/section/woo/shop.php';

// scroller
if ( class_exists('M_Shop_Customize_Control_Scroll')){
      $scroller = new M_Shop_Customize_Control_Scroll();
  }
}
add_action('customize_register','m_shop_customize_register');
function m_shop_is_json( $string ){
    return is_string( $string ) && is_array( json_decode( $string, true ) ) ? true : false;
}