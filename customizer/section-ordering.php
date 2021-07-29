<?php
/*********************/
// Move To Top
/********************/
 $wp_customize->add_setting( 'm_shop_move_to_top', array(
    'default'           => false,
    'sanitize_callback' => 'm_shop_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new M_Shop_Toggle_Control( $wp_customize, 'm_shop_move_to_top', array(
    'label'       => esc_html__( 'Enable', 'm-shop' ),
    'section'     => 'm-shop-move-to-top',
    'type'        => 'toggle',
    'settings'    => 'm_shop_move_to_top',
  ) ) );

  // BG color
  if ( class_exists( 'M_Shop_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'm_shop_move_to_top_size', array(
                'sanitize_callback' => 'm_shop_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new M_Shop_WP_Customizer_Range_Value_Control(
                $wp_customize, 'm_shop_move_to_top_size', array(
                    'label'       => esc_html__( 'Icon Size', 'm-shop' ),
                    'section'     => 'm-shop-move-to-top',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 5,
                        'step' => 0.1,
                    ),
                     'media_query' => true,
                     'sum_type'    => true,
                )
        )
);
}
 $wp_customize->add_setting('m_shop_move_to_top_bg_clr', array(
        'default'           => '#141415',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new M_Shop_Customizer_Color_Control($wp_customize,'m_shop_move_to_top_bg_clr', array(
        'label'      => __('Background Color', 'm-shop' ),
        'section'    => 'm-shop-move-to-top',
        'settings'   => 'm_shop_move_to_top_bg_clr',
    ) ) 
 );  

$wp_customize->add_setting('m_shop_move_to_top_icon_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'m_shop_move_to_top_icon_clr', array(
        'label'      => __('Icon Color', 'm-shop' ),
        'section'    => 'm-shop-move-to-top',
        'settings'   => 'm_shop_move_to_top_icon_clr',
    ) ) 
 );

/****************/
//doc link
/****************/
$wp_customize->add_setting('m_shop_movetotop_learn_more', array(
    'sanitize_callback' => 'm_shop_sanitize_text',
    ));
$wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'm_shop_movetotop_learn_more',
            array(
        'section'    => 'm-shop-move-to-top',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/m-shop/#back-top',
        'description' => esc_html__( 'To know more go with this', 'm-shop' ),
        'priority'   =>100,
)));