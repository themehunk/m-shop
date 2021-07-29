<?php
//General Section
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
// product animation
$wp_customize->add_setting('m_shop_woo_product_animation', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_select',
    ));
$wp_customize->add_control( 'm_shop_woo_product_animation', array(
        'settings'=> 'm_shop_woo_product_animation',
        'label'   => __('Product Image Hover Style','m-shop'),
        'section' => 'm-shop-woo-shop',
        'type'    => 'select',
        'choices'    => array(
        'none'            => __('None','m-shop'),
        'zoom'            => __('Zoom','m-shop'),
        'swap'            => __('Fade Swap (Pro)','m-shop'), 
        'slide'           => __('Slide Swap (Pro)','m-shop'),            
        ),
    ));
/*******************/
//Quick view
/*******************/
$wp_customize->add_setting('m_shop_woo_quickview_enable', array(
                'default'               => true,
                'sanitize_callback'     => 'm_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'m_shop_woo_quickview_enable', array(
                'label'         => esc_html__('Enable Quick View.', 'm-shop'),
                'type'          => 'checkbox',
                'section'       => 'm-shop-woo-shop',
                'settings'      => 'm_shop_woo_quickview_enable',
            ) ) );

$wp_customize->add_setting('m_shop_frnt_prd_shw_no', array(
            'default'           =>'20',
            'capability'        =>'edit_theme_options',
            'sanitize_callback' =>'open_shop_sanitize_number',
        )
    );
$wp_customize->add_control('m_shop_frnt_prd_shw_no', array(
            'type'        => 'number',
            'section'     => 'm-shop-woo-shop',
            'label'       => __('No. of product to show in Front Page', 'm-shop' ),
            'input_attrs' => array(
                'min'  => 10,
                'step' => 1,
                'max'  => 1000,
            ),
        )
    ); 
/****************/
// doc link
/****************/
$wp_customize->add_setting('m_shop_product_style_link_more', array(
    'sanitize_callback' => 'm_shop_sanitize_text',
    ));
$wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'm_shop_product_style_link_more',
            array(
        'section'     => 'm-shop-woo-shop',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/m-shop/#style-product',
        'description' => esc_html__( 'To know more go with this', 'm-shop' ),
        'priority'   =>100,
    )));