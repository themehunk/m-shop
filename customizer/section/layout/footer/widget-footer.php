<?php

/******************/
//Widegt footer
/******************/
if(class_exists('M_Shop_WP_Customize_Control_Radio_Image')){
               $wp_customize->add_setting(
               'm_shop_bottom_footer_widget_layout', array(
               'default'           => 'ft-wgt-none',
               'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new M_Shop_WP_Customize_Control_Radio_Image(
                $wp_customize, 'm_shop_bottom_footer_widget_layout', array(
                    'label'    => esc_html__( 'Layout','m-shop'),
                    'section'  => 'm-shop-widget-footer',
                    'choices'  => array(
                       'ft-wgt-none'   => array(
                            'url' => M_SHOP_FOOTER_WIDGET_LAYOUT_NONE,
                        ),
                        'ft-wgt-one'   => array(
                            'url' => M_SHOP_FOOTER_WIDGET_LAYOUT_1,
                        ),
                        'ft-wgt-two' => array(
                            'url' => M_SHOP_FOOTER_WIDGET_LAYOUT_2,
                        ),
                        'ft-wgt-three' => array(
                            'url' => M_SHOP_FOOTER_WIDGET_LAYOUT_3,
                        ),
                        'ft-wgt-four' => array(
                            'url' => M_SHOP_FOOTER_WIDGET_LAYOUT_4,
                        ),
                        'ft-wgt-five' => array(
                            'url' => M_SHOP_FOOTER_WIDGET_LAYOUT_5,
                        ),
                        'ft-wgt-six' => array(
                            'url' => M_SHOP_FOOTER_WIDGET_LAYOUT_6,
                        ),
                        'ft-wgt-seven' => array(
                            'url' => M_SHOP_FOOTER_WIDGET_LAYOUT_7,
                        ),
                        'ft-wgt-eight' => array(
                            'url' => M_SHOP_FOOTER_WIDGET_LAYOUT_8,
                        ),
                    ),
                )
            )
        );
    } 
/******************************/
/* Widget Redirect
/****************************/
if (class_exists('M_Shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'm_shop_bottom_footer_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new M_Shop_Widegt_Redirect(
                $wp_customize, 'm_shop_bottom_footer_widget_redirect', array(
                    'section'      => 'm-shop-widget-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'm-shop' ),
                    'button_class' => 'focus-customizer-widget-redirect',  
                )
            )
        );
} 
/****************/
//doc link
/****************/
$wp_customize->add_setting('m_shop_ftr_wdgt_learn_more', array(
    'sanitize_callback' => 'm_shop_sanitize_text',
    ));
$wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'm_shop_ftr_wdgt_learn_more',
            array(
        'section'    => 'm-shop-widget-footer',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/m-shop/#widget-footer',
        'description' => esc_html__( 'To know more go with this', 'm-shop' ),
        'priority'   =>100,
    )));