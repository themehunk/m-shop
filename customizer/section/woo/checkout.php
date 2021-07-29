<?php 
/**
 *
 *
 * @package      M Shop
 * @author       M Shop
 * @copyright   Copyright (c) 2019,  M Shop
 * @since        M Shop1.0.0
 */
//General Section
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
/***************/
// Checkout
/***************/
$wp_customize->add_setting('m_shop_woo_checkout_distraction_enable', array(
                'default'               => false,
                'sanitize_callback'     => 'm_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'m_shop_woo_checkout_distraction_enable', array(
                'label'         => esc_html__('Enable Distraction Free Checkout.', 'm-shop'),
                'type'          => 'checkbox',
                'section'       => 'm-shop-woo-checkout-page',
                'settings'      => 'm_shop_woo_checkout_distraction_enable',
            ) ) );

/****************/
// doc link
/****************/
$wp_customize->add_setting('m_shop_checkout_link_more', array(
    'sanitize_callback' => 'm_shop_sanitize_text',
    ));
$wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'm_shop_checkout_link_more',
            array(
        'section'     => 'm-shop-woo-checkout-page',
        'type'        => 'custom_message',
        'description' => sprintf( wp_kses(__( 'To know more go with this <a target="_blank" href="%s">Doc</a> !', 'm-shop' ), array(  'a' => array( 'href' => array(),'target' => array() ) ) ), esc_url('https://themehunk.com/docs/m-shop-theme/#checkout-page')),
        'priority'   =>30,
    )));