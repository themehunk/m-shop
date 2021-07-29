<?php
/******************/
//Global Option
/******************/

// theme color
 $wp_customize->add_setting('m_shop_theme_clr', array(
        'default'        => '#E32E00',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'m_shop_theme_clr', array(
        'label'      => __('Theme Color', 'm-shop' ),
        'section'    => 'm-shop-gloabal-color',
        'settings'   => 'm_shop_theme_clr',
        'priority' => 1,
    ) ) 
 );  
// link color
 $wp_customize->add_setting('m_shop_link_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'m_shop_link_clr', array(
        'label'      => __('Link Color', 'm-shop' ),
        'section'    => 'm-shop-gloabal-color',
        'settings'   => 'm_shop_link_clr',
        'priority' => 2,
    ) ) 
 );  
// link hvr color
 $wp_customize->add_setting('m_shop_link_hvr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'m_shop_link_hvr_clr', array(
        'label'      => __('Link Hover Color', 'm-shop' ),
        'section'    => 'm-shop-gloabal-color',
        'settings'   => 'm_shop_link_hvr_clr',
        'priority' => 3,
    ) ) 
 );

// text color
 $wp_customize->add_setting('m_shop_text_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'m_shop_text_clr', array(
        'label'      => __('Text Color', 'm-shop' ),
        'section'    => 'm-shop-gloabal-color',
        'settings'   => 'm_shop_text_clr',
        'priority' => 4,
    ) ) 
 );
 // title color
 $wp_customize->add_setting('m_shop_title_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'m_shop_title_clr', array(
        'label'      => __('Title Color', 'm-shop' ),
        'section'    => 'm-shop-gloabal-color',
        'settings'   => 'm_shop_title_clr',
        'priority' => 4,
    ) ) 
 );  
// gloabal background option
$wp_customize->get_control( 'background_color' )->section = 'm-shop-gloabal-color';
$wp_customize->get_control( 'background_color' )->priority = 6;
$wp_customize->get_control( 'background_image' )->section = 'm-shop-gloabal-color';
$wp_customize->get_control( 'background_image' )->priority = 7;
$wp_customize->get_control( 'background_preset' )->section = 'm-shop-gloabal-color';
$wp_customize->get_control( 'background_preset' )->priority = 8;
$wp_customize->get_control( 'background_position' )->section = 'm-shop-gloabal-color';
$wp_customize->get_control( 'background_position' )->priority = 8;
$wp_customize->get_control( 'background_repeat' )->section = 'm-shop-gloabal-color';
$wp_customize->get_control( 'background_repeat' )->priority = 9;
$wp_customize->get_control( 'background_attachment' )->section = 'm-shop-gloabal-color';
$wp_customize->get_control( 'background_attachment' )->priority = 10;
$wp_customize->get_control( 'background_size' )->section = 'm-shop-gloabal-color';
$wp_customize->get_control( 'background_size' )->priority = 11;
/****************/
//doc link
/****************/
$wp_customize->add_setting('m_shop_global_clr_more', array(
    'sanitize_callback' => 'm_shop_sanitize_text',
    ));
$wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'm_shop_global_clr_more',
            array(
        'section'     => 'm-shop-gloabal-color',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/m-shop/#color-background',
        'description' => esc_html__( 'To know more go with this', 'm-shop' ),
        'priority'   =>100,
    )));