<?php
/**
 * Register customizer panels & sections.
 */
/*************************/
/*WordPress Default Panel*/
/*************************/
/**
 * Category Section Customizer Settings
 */
if(!function_exists('m_shop_get_category_list')){
function m_shop_get_category_list($arr='',$all=true){
    $cats = array();
    foreach ( get_categories($arr) as $categories => $category ){
       
        $cats[$category->slug] = $category->name;
     }
     return $cats;
  }
}

$m_shop_shop_panel_default = new M_Shop_WP_Customize_Panel( $wp_customize,'m-shop-panel-default', array(
    'priority' => 1,
    'title'    => __( 'WordPress Default', 'm-shop' ),
  ));
$wp_customize->add_panel($m_shop_shop_panel_default);
$wp_customize->get_section( 'title_tagline' )->panel = 'm-shop-panel-default';
$wp_customize->get_section( 'static_front_page' )->panel = 'm-shop-panel-default';
$wp_customize->get_section( 'custom_css' )->panel = 'm-shop-panel-default';

$wp_customize->add_setting('m_shop_home_page_setup', array(
    'sanitize_callback' => 'm_shop_sanitize_text',
    ));
$wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'm_shop_home_page_setup',
            array(
        'section'    => 'static_front_page',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/m-shop/#homepage-setting',
        'description' => esc_html__( 'To know more go with this', 'm-shop' ),
        'priority'   =>100,
    )));
/************************/
// Background option
/************************/
$m_shop_shop_bg_option = new  M_Shop_WP_Customize_Section( $wp_customize, 'm-shop-bg-option', array(
    'title' =>  __( 'Background', 'm-shop' ),
    'panel' => 'm-shop-panel-default',
    'priority' => 10,
  ));
$wp_customize->add_section($m_shop_shop_bg_option);

/*************************/
/*Layout Panel*/
/*************************/
$wp_customize->add_panel( 'm-shop-panel-layout', array(
				'priority' => 3,
				'title'    => __( 'Layout', 'm-shop' ),
) );

// Header
$m_shop_section_header_group = new  M_Shop_WP_Customize_Section( $wp_customize, 'm-shop-section-header-group', array(
    'title' =>  __( 'Header', 'm-shop' ),
    'panel' => 'm-shop-panel-layout',
    'priority' => 2,
  ));
$wp_customize->add_section( $m_shop_section_header_group );

// above-header
$m_shop_above_header = new  M_Shop_WP_Customize_Section( $wp_customize, 'm-shop-above-header', array(
    'title'    => __( 'Above Header', 'm-shop' ),
    'panel'    => 'm-shop-panel-layout',
        'section'  => 'm-shop-section-header-group',
        'priority' => 3,
  ));
$wp_customize->add_section( $m_shop_above_header );
// main-header
$m_shop_shop_main_header = new  M_Shop_WP_Customize_Section( $wp_customize, 'm-shop-main-header', array(
    'title'    => __( 'Main Header', 'm-shop' ),
    'panel'    => 'm-shop-panel-layout',
    'section'  => 'm-shop-section-header-group',
    'priority' => 4,
  ));
$wp_customize->add_section( $m_shop_shop_main_header );

//Side pan
$m_shop_section_side_pan = new  M_Shop_WP_Customize_Section( $wp_customize,'m_shop_section_side_pan', array(
    'title' =>  __( 'Side Pan', 'm-shop' ),
    'panel' => 'm-shop-panel-layout',
    'priority' => 2,
  ));
$wp_customize->add_section($m_shop_section_side_pan);
// exclude category
$m_shop_cat_pan = new  M_Shop_WP_Customize_Section( $wp_customize, 'm_shop_cat_pan', array(
    'title'    => __( 'Category', 'm-shop' ),
    'panel'    => 'm-shop-panel-layout',
    'section'  => 'm_shop_section_side_pan',
    'priority' => 1,
  ));
$wp_customize->add_section( $m_shop_cat_pan );
$m_shop_row1_pan = new  M_Shop_WP_Customize_Section( $wp_customize, 'm_shop_row1_pan', array(
    'title'    => __( 'Row 1', 'm-shop' ),
    'panel'    => 'm-shop-panel-layout',
    'section'  => 'm_shop_section_side_pan',
    'priority' => 2,
  ));
$wp_customize->add_section( $m_shop_row1_pan );
$m_shop_row2_pan = new  M_Shop_WP_Customize_Section( $wp_customize, 'm_shop_row2_pan', array(
    'title'    => __( 'Row 2', 'm-shop' ),
    'panel'    => 'm-shop-panel-layout',
    'section'  => 'm_shop_section_side_pan',
    'priority' => 3,
  ));
$wp_customize->add_section( $m_shop_row2_pan );
//blog
$m_shop_section_blog_group = new  M_Shop_WP_Customize_Section( $wp_customize,'m-shop-section-blog-group', array(
    'title' =>  __( 'Blog', 'm-shop' ),
    'panel' => 'm-shop-panel-layout',
    'priority' => 2,
  ));
$wp_customize->add_section($m_shop_section_blog_group);

$m_shop_section_footer_group = new  M_Shop_WP_Customize_Section( $wp_customize, 'm-shop-section-footer-group', array(
    'title' =>  __( 'Footer', 'm-shop' ),
    'panel' => 'm-shop-panel-layout',
    'priority' => 3,
  ));
$wp_customize->add_section( $m_shop_section_footer_group);
// sidebar
$m_shop_section_sidebar_group = new  M_Shop_WP_Customize_Section( $wp_customize, 'm-shop-section-sidebar-group', array(
    'title' =>  __( 'Sidebar', 'm-shop' ),
    'panel' => 'm-shop-panel-layout',
    'priority' => 3,
  ));
$wp_customize->add_section($m_shop_section_sidebar_group);
// Scroll to top
$m_shop_move_to_top = new  M_Shop_WP_Customize_Section( $wp_customize, 'm-shop-move-to-top', array(
    'title' =>  __( 'Move To Top', 'm-shop' ),
    'panel' => 'm-shop-panel-layout',
    'priority' => 3,
  ));
$wp_customize->add_section($m_shop_move_to_top);
//above-footer
$m_shop_above_footer = new  M_Shop_WP_Customize_Section( $wp_customize, 'm-shop-above-footer',array(
    'title'    => __( 'Above Footer','m-shop' ),
    'panel'    => 'm-shop-panel-layout',
        'section'  => 'm-shop-section-footer-group',
        'priority' => 1,
));
$wp_customize->add_section( $m_shop_above_footer);
//widget footer
$m_shop_shop_widget_footer = new  M_Shop_WP_Customize_Section($wp_customize,'m-shop-widget-footer', array(
    'title'    => __('Widget Footer','m-shop'),
    'panel'    => 'm-shop-panel-layout',
    'section'  => 'm-shop-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $m_shop_shop_widget_footer);
//Bottom footer
$m_shop_shop_bottom_footer = new  M_Shop_WP_Customize_Section($wp_customize,'m-shop-bottom-footer', array(
    'title'    => __('Below Footer','m-shop'),
    'panel'    => 'm-shop-panel-layout',
    'section'  => 'm-shop-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $m_shop_shop_bottom_footer);
// rtl
$m_shop_rtl = new M_Shop_WP_Customize_Section( $wp_customize, 'm-shop-rtl', array(
    'title' =>  __( 'RTL', 'm-shop' ),
    'panel' => 'm-shop-panel-layout',
    'priority' => 6,
));
$wp_customize->add_section($m_shop_rtl);
/*************************/
/* Preloader */
/*************************/
$wp_customize->add_section( 'm-shop-pre-loader' , array(
    'title'      => __('Preloader','m-shop'),
    'priority'   => 30,
) );
/*************************/
/* Social   Icon*/
/*************************/
$m_shop_social_header = new M_Shop_WP_Customize_Section( $wp_customize, 'm-shop-social-icon', array(
    'title'    => __( 'Social Icon', 'm-shop' ),
    'priority' => 30,
  ));
$wp_customize->add_section( $m_shop_social_header );
/*************************/
/* Frontpage Panel */
/*************************/
$wp_customize->add_panel( 'm-shop-panel-frontpage', array(
                'priority' => 5,
                'title'    => __( 'Frontpage Sections', 'm-shop' ),
) );

$m_shop_top_slider_section = new M_Shop_WP_Customize_Section( $wp_customize, 'm_shop_top_slider_section', array(
    'title'    => __( 'Top Slider', 'm-shop' ),
    'panel'    => 'm-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $m_shop_top_slider_section );

$m_shop_highlight = new M_Shop_WP_Customize_Section( $wp_customize, 'm_shop_highlight', array(
    'title'    => __( 'Highlight', 'm-shop' ),
    'panel'    => 'm-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $m_shop_highlight );

$m_shop_category_tab_section = new M_Shop_WP_Customize_Section( $wp_customize, 'm_shop_category_tab_section', array(
    'title'    => __( 'Tabbed Product Carousel', 'm-shop' ),
    'panel'    => 'm-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $m_shop_category_tab_section );

$m_shop_cat_slide_section = new M_Shop_WP_Customize_Section( $wp_customize, 'm_shop_cat_slide_section', array(
    'title'    => __( 'Woo Category', 'm-shop' ),
    'panel'    => 'm-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $m_shop_cat_slide_section );
$m_shop_product_tab_image = new M_Shop_WP_Customize_Section( $wp_customize, 'm_shop_product_tab_image', array(
    'title'    => __( 'Product Tab Image Carousel', 'm-shop' ),
    'panel'    => 'm-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $m_shop_product_tab_image );
// ribbon
$m_shop_ribbon = new M_Shop_WP_Customize_Section( $wp_customize, 'm_shop_ribbon', array(
    'title'    => __( 'Ribbon', 'm-shop' ),
    'panel'    => 'm-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $m_shop_ribbon );

$m_shop_product_slide_section = new M_Shop_WP_Customize_Section( $wp_customize, 'm_shop_product_slide_section', array(
    'title'    => __( 'Product Carousel', 'm-shop' ),
    'panel'    => 'm-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $m_shop_product_slide_section );
// testimonial
$m_shop_testimonial = new M_Shop_WP_Customize_Section( $wp_customize, 'm_shop_testimonial', array(
    'title'    => __( 'Testimonial', 'm-shop' ),
    'panel'    => 'm-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $m_shop_testimonial );



$m_shop_product_slide_list = new M_Shop_WP_Customize_Section( $wp_customize, 'm_shop_product_slide_list', array(
    'title'    => __( 'Product List Carousel', 'm-shop' ),
    'panel'    => 'm-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $m_shop_product_slide_list );

$m_shop_banner = new M_Shop_WP_Customize_Section( $wp_customize, 'm_shop_banner', array(
    'title'    => __( 'Banner', 'm-shop' ),
    'panel'    => 'm-shop-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $m_shop_banner );
// blog
$m_shop_blog = new M_Shop_WP_Customize_Section( $wp_customize, 'm_shop_blog', array(
    'title'    => __( 'Blog', 'm-shop' ),
    'panel'    => 'm-shop-panel-frontpage',
    'priority' => 8,
  ));
$wp_customize->add_section( $m_shop_blog );
/******************/
// Color Option
/******************/
$wp_customize->add_panel( 'm-shop-panel-color-background', array(
        'priority' => 22,
        'title'    => __( 'Total Color & BG Options', 'm-shop' ),
    ) );
// Section gloab color and background
$wp_customize->add_section('m-shop-gloabal-color', array(
    'title'    => __('Global Colors', 'm-shop'),
    'panel'    => 'm-shop-panel-color-background',
    'priority' => 1,
));
//header
$m_shop_header_color = new  M_Shop_WP_Customize_Section($wp_customize,'m-shop-header-color', array(
    'title'    => __('Header', 'm-shop'),
    'panel'    => 'm-shop-panel-color-background',
    'priority' => 1,
));
$wp_customize->add_section( $m_shop_header_color );


$m_shop_main_header_clr = new  M_Shop_WP_Customize_Section($wp_customize,'m-shop-main-header-clr', array(
    'title'    => __('Main Header','m-shop'),
    'panel'    => 'm-shop-panel-color-background',
    'section'  => 'm-shop-header-color',
    'priority' => 2,
));
$wp_customize->add_section( $m_shop_main_header_clr);

/****************/
//footer
/****************/
$m_shop_footer_color = new  M_Shop_WP_Customize_Section($wp_customize,'m-shop-footer-color', array(
    'title'    => __('Footer', 'm-shop'),
    'panel'    => 'm-shop-panel-color-background',
    'priority' => 1,
));
$wp_customize->add_section( $m_shop_footer_color );

$m_shop_abv_footer_clr = new  M_Shop_WP_Customize_Section($wp_customize,'m-shop-abv-footer-clr', array(
    'title'    => __('Above Footer','m-shop'),
    'panel'    => 'm-shop-panel-color-background',
    'section'  => 'm-shop-footer-color',
    'priority' => 1,
));
$wp_customize->add_section( $m_shop_abv_footer_clr);

$m_shop_footer_widget_clr = new  M_Shop_WP_Customize_Section($wp_customize,'m-shop-footer-widget-clr', array(
    'title'    => __('Footer Widget','m-shop'),
    'panel'    => 'm-shop-panel-color-background',
    'section'  => 'm-shop-footer-color',
    'priority' => 2,
));
$wp_customize->add_section($m_shop_footer_widget_clr);

$m_shop_btm_footer_clr = new  M_Shop_WP_Customize_Section($wp_customize,'m-shop-btm-footer-clr', array(
    'title'    => __('Bottom Footer','m-shop'),
    'panel'    => 'm-shop-panel-color-background',
    'section'  => 'm-shop-footer-color',
    'priority' => 3,
));
$wp_customize->add_section( $m_shop_btm_footer_clr);

/*********************/
// Page Content Color
/*********************/
$m_shop_custom_page_content_color = new M_Shop_WP_Customize_Section($wp_customize,'m-shop-page-content-color', array(
    'title'    => __('Content Color', 'm-shop'),
    'panel'    => 'm-shop-panel-color-background',
    'priority' => 2,
));
$wp_customize->add_section($m_shop_custom_page_content_color);
/******************/
// Shop Page
/******************/
$m_shop_woo_shop = new M_Shop_WP_Customize_Section( $wp_customize, 'm-shop-woo-shop', array(
    'title'    => __( 'Product Style', 'm-shop' ),
     'panel'    => 'woocommerce',
     'priority' => 2,
));
$wp_customize->add_section( $m_shop_woo_shop );

$m_shop_woo_single_product = new M_Shop_WP_Customize_Section( $wp_customize, 'm-shop-woo-single-product', array(
    'title'    => __( 'Single Product', 'm-shop' ),
     'panel'    => 'woocommerce',
     'priority' => 3,
));
$wp_customize->add_section($m_shop_woo_single_product );

$m_shop_woo_cart_page = new M_Shop_WP_Customize_Section( $wp_customize, 'm-shop-woo-cart-page', array(
    'title'    => __( 'Cart Page', 'm-shop' ),
     'panel'    => 'woocommerce',
     'priority' => 4,
));
$wp_customize->add_section($m_shop_woo_cart_page);

$m_shop_woo_shop_page = new M_Shop_WP_Customize_Section( $wp_customize, 'm-shop-woo-shop-page', array(
    'title'    => __( 'Shop Page', 'm-shop' ),
     'panel'    => 'woocommerce',
     'priority' => 4,
));
$wp_customize->add_section($m_shop_woo_shop_page);