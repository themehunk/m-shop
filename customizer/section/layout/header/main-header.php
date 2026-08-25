<?php
/******************/
// Disable in Mobile
/******************/
$wp_customize->add_setting( 'm_shop_whislist_mobile_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'm_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'm_shop_whislist_mobile_disable', array(
                'label'                 => esc_html__('Check to disable whislist icon in mobile device', 'm-shop'),
                'type'                  => 'checkbox',
                'section'               => 'm-shop-section-header-group',
                'settings'              => 'm_shop_whislist_mobile_disable',
                'priority'   => 12,
            ) ) );

$wp_customize->add_setting( 'm_shop_account_mobile_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'm_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'm_shop_account_mobile_disable', array(
                'label'                 => esc_html__('Check to disable account icon in mobile device', 'm-shop'),
                'type'                  => 'checkbox',
                'section'               => 'm-shop-section-header-group',
                'settings'              => 'm_shop_account_mobile_disable',
                'priority'   => 13,
            ) ) );

$wp_customize->add_setting( 'm_shop_cart_mobile_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'm_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'm_shop_cart_mobile_disable', array(
                'label'                 => esc_html__('Check to disable cart icon in mobile device', 'm-shop'),
                'type'                  => 'checkbox',
                'section'               => 'm-shop-section-header-group',
                'settings'              => 'm_shop_cart_mobile_disable',
                'priority'   => 14,
            ) ) );

/****************/
//doc link
/****************/
$wp_customize->add_setting('m_shop_main_header_doc_learn_more', array(
    'sanitize_callback' => 'm_shop_sanitize_text',
    ));
$wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'm_shop_main_header_doc_learn_more',
            array(
        'section'    => 'm-shop-section-header-group',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/m-shop/#main-header',
        'description' => esc_html__( 'To know more go with this', 'm-shop' ),
        'priority'   =>100,
    )));


$wp_customize->add_setting('m_shop_mobile_menu_style_type', array(
        'default'        => 'side-icon',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_select',
    ));
$wp_customize->add_control( 'm_shop_mobile_menu_style_type', array(
        'settings' => 'm_shop_mobile_menu_style_type',
        'label'   => __('Choose Style','m-shop'),
        'section' => 'm-shop-section-mobile-menu',
        'type'    => 'select',
        'choices'    => array(
        'side-icon'       => __('Side Icon','m-shop'),
        'in-header'       => __('In Header','m-shop'),   
        ),
    ));