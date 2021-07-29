<?php 
/**
 * Custom Style for M ShopTheme.
 * @package     M Shop
 * @author      ThemeHunk
 * @copyright   Copyright (c) 2019, M Shop
 * @since       M Shop1.0.0
 */
function m_shop_custom_style(){
$m_shop_style=""; 
$m_shop_style.= m_shop_responsive_slider_funct( 'm_shop_logo_width', 'm_shop_logo_width_responsive');
/**************************/
// Above Fooetr
/**************************/
    $m_shop_above_frt_brdr_clr = esc_html(get_theme_mod('m_shop_above_frt_brdr_clr','#fff'));  
    $m_shop_style.=".top-footer{border-bottom-color:{$m_shop_above_frt_brdr_clr}}";
    $m_shop_style.= m_shop_responsive_slider_funct( 'm_shop_above_ftr_hgt', 'm_shop_top_footer_height_responsive');
    $m_shop_style.= m_shop_responsive_slider_funct( 'm_shop_abv_ftr_botm_brd', 'm_shop_top_footer_border_responsive');
/**************************/
// Below Fooetr
/**************************/
    $m_shop_bottom_frt_brdr_clr = esc_html(get_theme_mod('m_shop_bottom_frt_brdr_clr'));  
    $m_shop_style.=".below-footer{border-top-color:{$m_shop_bottom_frt_brdr_clr}}";
    $m_shop_style.= m_shop_responsive_slider_funct( 'm_shop_btm_ftr_hgt', 'm_shop_below_footer_height_responsive');
    $m_shop_style.= m_shop_responsive_slider_funct( 'm_shop_btm_ftr_botm_brd', 'm_shop_below_footer_border_responsive');
/**************************/
// Move to top
/**************************/
$m_shop_style.= m_shop_responsive_slider_funct( 'm_shop_move_to_top_size', 'm_shop_move_to_top_size_responsive');

/*********************/
// Global Color Option
/*********************/ 
$m_shop_theme_clr = esc_html(get_theme_mod('m_shop_theme_clr','#E32E00'));
$m_shop_style.=".thunk-woo-product-list .thunk-product-wrap .opn-quick-view-text:hover,.thunk-woo-product-list .thunk-product-wrap:hover a.add_to_cart_button,.thunk-woo-product-list .thunk-product-wrap:hover .thunk-product-content a.th-button, .woocommerce .thunk-product-content .added_to_cart, .woocommerce .thunk-product-wrap:hover .thunk-product-content a.add_to_cart_button, .woocommerce .thunk-product-wrap:hover .thunk-product-content .added_to_cart,.woocommerce .thunk-woo-product-list .onsale, .woocommerce ul.products li.product .onsale,.thunk-slide .owl-nav button.owl-prev:hover, .thunk-slide .owl-nav button.owl-next:hover,.open-cart p.buttons a:hover,.single_add_to_cart_button.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button, .woocommerce div.product form.cart .button,.woocommerce .woocommerce-error .button:hover, .woocommerce .woocommerce-info .button:hover, .woocommerce .woocommerce-message .button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.header-support-icon .menu-toggle:hover .icon-bar,#search-box #search-button:hover,.slider-content-caption a.slide-btn,article.thunk-post-article .thunk-readmore.button, .woocommerce #respond input#submit, #comments .submit,button, .button, input[type='button'], input[type='reset'], input[type='submit'],.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,.cart-close-btn:hover:before, .cart-close-btn:hover:after,.woocommerce #content div.product div.summary .prev_next_buttons a:hover,.woocommerce.widget_shopping_cart .buttons a,.off-canvas-button:hover span,.product_cat_view a:hover,.ribbon-btn:hover,.slider-content-caption a.slide-btn, .slider-content-caption6 a.slide-btn {background:{$m_shop_theme_clr};} 

.woocommerce .thunk-woo-product-list .star-rating, .woocommerce .thunk-woo-product-list .star-rating:before, .woocommerce ul.products li.product .star-rating a, .woocommerce ul.products li.product .star-rating a:before,.thunk-hglt-icon,.thunk-woo-product-list .thunk-product .yith-wcwl-wishlistexistsbrowse:before, .thunk-woo-product-list .thunk-product .yith-wcwl-wishlistaddedbrowse:before, .thunk-compare .compare-button a.compare.button.added,.breadcrumbs a:hover,.woocommerce .woocommerce-message .button,a:hover, a:focus, .thunk-icon .cart-icon a:hover,.woocommerce .thunk-woo-product-list .star-rating,
.woocommerce .thunk-woo-product-list .star-rating:before,
.woocommerce ul.products li.product .star-rating a,
.woocommerce ul.products li.product .star-rating a:before,
.widget.woocommerce .product_list_widget .star-rating,
.widget.woocommerce .product_list_widget .star-rating:before,
.woocommerce .star-rating,header #open-cart .cart-close-btn:hover,.header-icon a:hover{color:{$m_shop_theme_clr};}

.open-cart p.buttons a:hover,.woocommerce .woocommerce-message .button,.thunk-slide .owl-nav button.owl-prev:hover, .thunk-slide .owl-nav button.owl-next:hover,.woocommerce #respond input#submit, #comments .submit,button, .button, input[type='button'], input[type='reset'], input[type='submit'],.woocommerce #content div.product div.summary .prev_next_buttons a:hover,.woocommerce.widget_shopping_cart .buttons a,.product_cat_view a:hover{border-color:{$m_shop_theme_clr};}
.loader {
    border-right: 4px solid {$m_shop_theme_clr};
    border-bottom: 4px solid {$m_shop_theme_clr};
    border-left: 4px solid {$m_shop_theme_clr};}";
//header image
  $m_shop_header_background_image = esc_html( get_theme_mod('header_image'));
  $m_shop_style.=".main-header{background-image:url($m_shop_header_background_image)}";

// loader
$m_shop_loader_bg_clr = esc_html(get_theme_mod('m_shop_loader_bg_clr','#9c9c9'));
$m_shop_style.=".m_shop_overlayloader{background-color:{$m_shop_loader_bg_clr}}";
//Move to top 
$m_shop_move_to_top_bg_clr      = esc_html(get_theme_mod('m_shop_move_to_top_bg_clr'));
$m_shop_move_to_top_icon_clr    = esc_html(get_theme_mod('m_shop_move_to_top_icon_clr'));
$m_shop_style.="#move-to-top{background:{$m_shop_move_to_top_bg_clr};color:{$m_shop_move_to_top_icon_clr}}";
    // ribbon
    $m_shop_ribbon_bg_img_url          = esc_url(get_theme_mod('m_shop_ribbon_bg_img_url',''));
    $m_shop_ribbon_bg_background_repeat        = esc_html(get_theme_mod('m_shop_ribbon_bg_background_repeat','no-repeat'));
   $m_shop_ribbon_bg_background_position       = esc_html(get_theme_mod('m_shop_ribbon_bg_background_position','center center'));
   $m_shop_ribbon_bg_background_size           = esc_html(get_theme_mod('m_shop_ribbon_bg_background_size','auto'));
   $m_shop_ribbon_bg_background_attach         = esc_html(get_theme_mod('m_shop_ribbon_bg_background_attach','scroll'));
   
   $m_shop_style.="section.thunk-ribbon-section{background-image:url($m_shop_ribbon_bg_img_url);
    background-repeat:{$m_shop_ribbon_bg_background_repeat};
    background-position:{$m_shop_ribbon_bg_background_position};
    background-size:{$m_shop_ribbon_bg_background_size};
    background-attachment:{$m_shop_ribbon_bg_background_attach};}";

$m_shop_style.= m_shop_responsive_slider_funct( 'm_shop_ribbon_top_padding', 'm_shop_ribbon_top_padding_responsive');
$m_shop_style.= m_shop_responsive_slider_funct( 'm_shop_ribbon_btm_padding', 'm_shop_ribbon_btm_padding_responsive');

//Hide yith if WPC SMART Icon 
if( (class_exists( 'WPCleverWoosw' ))){
$m_shop_style.=" .woocommerce .entry-summary .yith-wcwl-add-to-wishlist{
  display:none;
}
";
}
if( (class_exists( 'WPCleverWooscp' ))){
$m_shop_style.=" .woocommerce .entry-summary a.compare.button{
  display:none;
}
";
}

// global page option
$m_shop_link_clr       = esc_html(get_theme_mod('m_shop_link_clr'));
$m_shop_link_hvr_clr   = esc_html(get_theme_mod('m_shop_link_hvr_clr'));
$m_shop_text_clr       = esc_html(get_theme_mod('m_shop_text_clr'));
$m_shop_title_clr   = esc_html(get_theme_mod('m_shop_title_clr'));
$m_shop_style.=".page-head h1{color{$m_shop_title_clr};} .primary-content-wrap article,.breadcrumb-m_shop_trail{color:{$m_shop_text_clr};} .primary-content-wrap a{color:{$m_shop_link_clr};}  .primary-content-wrap a:hover{color:{$m_shop_link_hvr_clr};}";
  return $m_shop_style;
}
//start logo width
function m_shop_logo_width_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.thunk-logo img,.sticky-header .logo-content img{
    max-width: ' . $v3 . 'px;
  }';
  $custom_css = m_shop_add_media_query( $dimension, $custom_css );
  return $custom_css;
}

// top footer height
function m_shop_top_footer_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-footer .top-footer-bar{
    line-height: ' . $v3 . 'px;
  }';
  $custom_css = m_shop_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
function m_shop_top_footer_border_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-footer{
    border-bottom-width: ' . $v3 . 'px;
  }';
  $custom_css = m_shop_add_media_query( $dimension, $custom_css );
  return $custom_css;
}

// below footer height
function m_shop_below_footer_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.below-footer .below-footer-bar{
    line-height: ' . $v3 . 'px;
  }';
  $custom_css = m_shop_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
function m_shop_below_footer_border_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.below-footer{
    border-top-width: ' . $v3 . 'px;
  }';
  $custom_css = m_shop_add_media_query( $dimension, $custom_css );
  return $custom_css;
}

function m_shop_move_to_top_size_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '#move-to-top{
    font-size: ' . $v3 . 'rem;
  }';
  $custom_css = m_shop_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
  // ribbon padding
  function m_shop_ribbon_top_padding_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.thunk-ribbon-content{
    padding-top: ' . $v3 . 'rem;
  }';
  $custom_css = m_shop_add_media_query( $dimension, $custom_css );
  return $custom_css;
}

function m_shop_ribbon_btm_padding_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.thunk-ribbon-content{
    padding-bottom: ' . $v3 . 'rem;
  }';
  $custom_css = m_shop_add_media_query( $dimension, $custom_css );
  return $custom_css;
}