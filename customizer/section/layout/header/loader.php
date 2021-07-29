<?php
//Enable Loader
$wp_customize->add_setting( 'm_shop_preloader_enable', array(
                'default'               => false,
                'sanitize_callback'     => 'm_shop_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'm_shop_preloader_enable', array(
                'label'                 => esc_html__('Enable Loader', 'm-shop'),
                'type'                  => 'checkbox',
                'section'               => 'm-shop-pre-loader',
                'settings'              => 'm_shop_preloader_enable',
                'priority'   => 1,
            ) ) );
// BG color
 $wp_customize->add_setting('m_shop_loader_bg_clr', array(
        'default'           => '#9c9c9c',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new M_Shop_Customizer_Color_Control($wp_customize,'m_shop_loader_bg_clr', array(
        'label'      => __('Background Color', 'm-shop' ),
        'section'    => 'm-shop-pre-loader',
        'settings'   => 'm_shop_loader_bg_clr',
        'priority'   => 2,
    ) ) 
 ); 
/*******************/ 
// Pre loader Image
/*******************/ 
$wp_customize->add_setting('m_shop_preloader_image_upload', array(
        'default'       => '',
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'm_shop_preloader_image_upload', array(
        'label'          => __('Pre Loader Image', 'm-shop'),
        'description'    => __('(You can also use GIF image.)', 'm-shop'),
        'section'        => 'm-shop-pre-loader',
        'settings'       => 'm_shop_preloader_image_upload',
 )));

/****************/
// doc link
/****************/
$wp_customize->add_setting('m_shop_loader_link_more', array(
    'sanitize_callback' => 'm_shop_sanitize_text',
    ));
$wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'm_shop_loader_link_more',
            array(
        'section'     => 'm-shop-pre-loader',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/m-shop/#pre-loader',
        'description' => esc_html__( 'To know more go with this', 'm-shop' ),
        'priority'   =>100,
    )));

// rtl
// $wp_customize->add_setting( 'm_shop_rtl', array(
//     'default'           => false,
//     'sanitize_callback' => 'm_shop_sanitize_checkbox',
//   ) );
// $wp_customize->add_control( new M_Shop_Toggle_Control( $wp_customize, 'm_shop_rtl', array(
//     'label'       => esc_html__( 'Enable', 'm-shop' ),
//     'section'     => 'm-shop-rtl',
//     'type'        => 'toggle',
//     'settings'    => 'm_shop_rtl',
//   ) ) );