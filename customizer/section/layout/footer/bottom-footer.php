<?php
/******************/
//Bootm footer
/******************/
//choose col layout
if(class_exists('M_Shop_WP_Customize_Control_Radio_Image')){
               $wp_customize->add_setting(
               'm_shop_bottom_footer_layout', array(
                'default'           => 'ft-btm-one',
                'sanitize_callback' => 'sanitize_text_field',
            )
        );
$wp_customize->add_control(
            new M_Shop_WP_Customize_Control_Radio_Image(
                $wp_customize, 'm_shop_bottom_footer_layout', array(
                    'label'    => esc_html__('Layout','m-shop'),
                    'section'  => 'm-shop-bottom-footer',
                    'choices'  => array(
                       'ft-btm-none'   => array(
                            'url' => M_SHOP_TOP_HEADER_LAYOUT_NONE,
                        ),
                        'ft-btm-one'   => array(
                            'url' => M_SHOP_TOP_HEADER_LAYOUT_1,
                        ),
                        'ft-btm-two' => array(
                            'url' => M_SHOP_TOP_HEADER_LAYOUT_2,
                        ),
                        'ft-btm-three' => array(
                            'url' => M_SHOP_TOP_HEADER_LAYOUT_3,
                        ),
                    ),
                )
            )
        );
    } 
//********************************/
// col1-setting
//*******************************/
$wp_customize->add_setting('m_shop_bottom_footer_col1_set', array(
        'default'        => 'text',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('m_shop_bottom_footer_col1_set', array(
        'settings' => 'm_shop_bottom_footer_col1_set',
        'label'    => __('Column 1','m-shop'),
        'section'  => 'm-shop-bottom-footer',
        'type'     => 'select',
        'choices'  => array(
        'none'             => __('None','m-shop'),
        'text'             => __('Text','m-shop'),
        'menu'             => __('Menu','m-shop'),
        'widget'           => __('Widget','m-shop'),
        'social'           => __('Social Media','m-shop'),   
    ),
));
//col1-text/html
$wp_customize->add_setting('m_shop_footer_bottom_col1_texthtml', array(
        'default'           => __('Copyright | M Shop| Developed by ThemeHunk','m-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('m_shop_footer_bottom_col1_texthtml', array(
        'label'    => __('Text', 'm-shop'),
        'section'  => 'm-shop-bottom-footer',
        'settings' => 'm_shop_footer_bottom_col1_texthtml',
         'type'    => 'textarea',
    ));
// col1 widget redirection
if (class_exists('M_Shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'm_shop_footer_bottom_col1_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new M_Shop_Widegt_Redirect(
                $wp_customize,'m_shop_footer_bottom_col1_widget_redirect', array(
                    'section'      => 'm-shop-bottom-footer',
                    'button_text'  => esc_html__('Go To Widget','m-shop'),
                    'button_class' => 'focus-customizer-widget-redirect-col1',  
                )
            )
        );
} 
// col1 menu redirection
if (class_exists('M_Shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'm_shop_footer_bottom_col1_menu_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new M_Shop_Widegt_Redirect(
                $wp_customize,'m_shop_footer_bottom_col1_menu_redirect', array(
                    'section'      => 'm-shop-bottom-footer',
                    'button_text'  => esc_html__('Go To Menu','m-shop'),
                    'button_class' => 'focus-customizer-menu-redirect-col1',  
                )
            )
        );
} 
// col1 social media redirection
if (class_exists('M_Shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'm_shop_footer_bottom_col1_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new M_Shop_Widegt_Redirect(
                $wp_customize, 'm_shop_footer_bottom_col1_social_media_redirect', array(
                    'section'      => 'm-shop-bottom-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'm-shop' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col1',  
                )
            )
        );
} 
/***************************************/
// col2
/***************************************/
$wp_customize->add_setting('m_shop_bottom_footer_col2_set',array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control( 'm_shop_bottom_footer_col2_set',array(
        'settings' => 'm_shop_bottom_footer_col2_set',
        'label'   => __('Column 2','m-shop'),
        'section' => 'm-shop-bottom-footer',
        'type'    => 'select',
        'choices'    => array(
        'none'             => __('None','m-shop'),
        'text'             => __('Text','m-shop'),
        'menu'             => __('Menu','m-shop'),
        'search'           => __('Search','m-shop'),
        'widget'           => __('Widget','m-shop'),
        'social'           => __('Social Media','m-shop'),     
        ),
    ));
// col2-text/html
$wp_customize->add_setting('m_shop_bottom_footer_col2_texthtml', array(
        'default'           => __('Add your content here','m-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_textarea', 
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control('m_shop_bottom_footer_col2_texthtml', array(
        'label'    => __('Text', 'm-shop'),
        'section'  => 'm-shop-bottom-footer',
        'settings' => 'm_shop_bottom_footer_col2_texthtml',
         'type'    => 'textarea',
    ));
// col2 widget redirection
if (class_exists('M_Shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'm_shop_bottom_footer_col2_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new M_Shop_Widegt_Redirect(
                $wp_customize,'m_shop_bottom_footer_col2_widget_redirect', array(
                    'section'      => 'm-shop-bottom-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'm-shop' ),
                    'button_class' => 'focus-customizer-widget-redirect-col2',  
                )
            )
        );
}  
// col2 menu redirection
if (class_exists('M_Shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'm_shop_bottom_footer_col2_menu_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new M_Shop_Widegt_Redirect(
                $wp_customize,'m_shop_bottom_footer_col2_menu_redirect', array(
                    'section'      => 'm-shop-bottom-footer',
                    'button_text'  => esc_html__( 'Go To Menu', 'm-shop' ),
                    'button_class' => 'focus-customizer-menu-redirect-col2',  
                )
            )
        );
}    
// col2 social media redirection
if (class_exists('M_Shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'm_shop_bottom_footer_col2_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new M_Shop_Widegt_Redirect(
                $wp_customize, 'm_shop_bottom_footer_col2_social_media_redirect', array(
                    'section'      => 'm-shop-bottom-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'm-shop' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col2',  
                )
            )
        );
} 
// col3
$wp_customize->add_setting('m_shop_bottom_footer_col3_set', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
$wp_customize->add_control('m_shop_bottom_footer_col3_set', array(
        'settings' => 'm_shop_bottom_footer_col3_set',
        'label'   => __('Column 3','m-shop'),
        'section' => 'm-shop-bottom-footer',
        'type'    => 'select',
        'choices' => array(
        'none'             => __('None','m-shop'),
        'text'             => __('Text','m-shop'),
        'menu'             => __('Menu','m-shop'),
        'search'           => __('Search','m-shop'),
        'widget'           => __('Widget','m-shop'),
        'social'           => __('Social Media','m-shop'),   
        ),
    ));
// col3-text/html
$wp_customize->add_setting('m_shop_bottom_footer_col3_texthtml', array(
        'default'          => __('Add your content here','m-shop'),
        'capability'       => 'edit_theme_options',
        'sanitize_callback'=> 'm_shop_sanitize_textarea',  
        'transport'         => 'postMessage', 
    ));
$wp_customize->add_control('m_shop_bottom_footer_col3_texthtml', array(
        'label'    => __('Text', 'm-shop'),
        'section'  => 'm-shop-bottom-footer',
        'settings' => 'm-shop_bottom_footer_col3_texthtml',
        'type'     => 'textarea',
    ));
// col3 social media redirection
if (class_exists('M_Shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'm_shop_bottom_footer_col3_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new M_Shop_Widegt_Redirect(
                $wp_customize, 'm_shop_bottom_footer_col3_social_media_redirect', array(
                    'section'      => 'm-shop-bottom-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'm-shop' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col3',  
                )
            )
        );
} 
// col3 widget redirection
if (class_exists('M_Shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'm_shop_bottom_footer_col3_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new M_Shop_Widegt_Redirect(
                $wp_customize,'m_shop_bottom_footer_col3_widget_redirect', array(
                    'section'      => 'm-shop-bottom-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'm-shop' ),
                    'button_class' => 'focus-customizer-widget-redirect-col3',  
                )
            )
        );
}
// col3 widget redirection
if (class_exists('M_Shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'm_shop_bottom_footer_col3_menu_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new M_Shop_Widegt_Redirect(
                $wp_customize,'m_shop_bottom_footer_col3_menu_redirect', array(
                    'section'      => 'm-shop-bottom-footer',
                    'button_text'  => esc_html__( 'Go To Menu', 'm-shop' ),
                    'button_class' => 'focus-customizer-menu-redirect-col3',  
                )
            )
        );
}
/****************************/
// common option
/****************************/
if ( class_exists( 'M_Shop_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'm_shop_btm_ftr_hgt', array(
                'sanitize_callback' => 'm_shop_sanitize_range_value',
                'default'           => '40',
                 'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new M_Shop_WP_Customizer_Range_Value_Control(
                $wp_customize, 'm_shop_btm_ftr_hgt', array(
                    'label'       => esc_html__( 'Height', 'm-shop' ),
                    'section'     => 'm-shop-bottom-footer',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 30,
                        'max'  => 1000,
                        'step' => 1,
                    ),
                      'media_query' => true,
                    'sum_type'    => true,
                )
           )
    );
}
// above bottom-border
if ( class_exists( 'M_Shop_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'm_shop_btm_ftr_botm_brd', array(
                'sanitize_callback' => 'm_shop_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new M_Shop_WP_Customizer_Range_Value_Control(
                $wp_customize, 'm_shop_btm_ftr_botm_brd', array(
                    'label'       => esc_html__( 'Top Border', 'm-shop' ),
                    'section'     => 'm-shop-bottom-footer',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 200,
                        'step' => 1,
                    ),
                      'media_query' => true,
                    'sum_type'    => true,
                )
            )
        );
    }
// border-color
 $wp_customize->add_setting('m_shop_bottom_frt_brdr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new M_Shop_Customizer_Color_Control($wp_customize,'m_shop_bottom_frt_brdr_clr', array(
        'label'      => __('Border Color', 'm-shop' ),
        'section'    => 'm-shop-bottom-footer',
        'settings'   => 'm_shop_bottom_frt_brdr_clr',
    ) ) 
 );  


/****************/
//doc link
/****************/
$wp_customize->add_setting('m_shop_ftr_blw_learn_more', array(
    'sanitize_callback' => 'm_shop_sanitize_text',
    ));
$wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'm_shop_ftr_blw_learn_more',
            array(
        'section'     => 'm-shop-bottom-footer',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/m-shop/#below-footer',
        'description' => esc_html__( 'To know more go with this', 'm-shop' ),
        'priority'    =>100,
    )));

$wp_customize->selective_refresh->add_partial('m_shop_footer_bottom_col1_texthtml', array(
        'selector' => '.below-footer-col1 .content-html',
) );