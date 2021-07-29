<?php
// exclude header category
function m_shop_get_category_id($arr='',$all=true){
    $cats = array();
    foreach ( get_categories($arr) as $categories => $category ){
       
        $cats[$category->term_id] = $category->name;
     }
     return $cats;
  }
$wp_customize->add_setting('m_shop_pan_cat_txt', array(
        'default' => __('Category','m-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'm_shop_pan_cat_txt', array(
        'label'    => __('Category Text', 'm-shop'),
        'section'  => 'm_shop_cat_pan',
         'type'    => 'text',
));
 if (class_exists( 'M_Shop_Customize_Control_Checkbox_Multiple')) {
   $wp_customize->add_setting('m_shop_sidepan_exclde_category', array(
        'default'           => '',
        'sanitize_callback' => 'm_shop_checkbox_explode'
    ));
    $wp_customize->add_control(new M_Shop_Customize_Control_Checkbox_Multiple(
            $wp_customize,'m_shop_sidepan_exclde_category', array(
        'settings'=> 'm_shop_sidepan_exclde_category',
        'label'   => __( 'Choose Categories To Exclude', 'm-shop' ),
        'section' => 'm_shop_cat_pan',
        'choices' => m_shop_get_category_id(array('taxonomy' =>'product_cat'),true),
        ) 
    ));

}  
// Row 1 setting
$wp_customize->add_setting('m_shop_pan_row1_set', array(
        'default'        => 'text',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_select',
    ));
$wp_customize->add_control( 'm_shop_pan_row1_set', array(
        'settings' => 'm_shop_pan_row1_set',
        'label'   => __('Choose Setting','m-shop'),
        'section' => 'm_shop_row1_pan',
        'type'    => 'select',
        'choices'    => array(
        'none'       => __('None','m-shop'),
        'text'       => __('Text','m-shop'),
        'callto'       => __('Call To','m-shop'),
        'widget'     => __('Widget','m-shop'),
        'social'     => __('Social Media','m-shop'), 
        'button'       => __('Button','m-shop'),    
        ),
    ));
// row1-text/html
$wp_customize->add_setting('m_shop_row1_texthtml', array(
        'default'           => __('Add your content here','m-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('m_shop_row1_texthtml', array(
        'label'    => __('Text', 'm-shop'),
        'section'  => 'm_shop_row1_pan',
        'settings' => 'm_shop_row1_texthtml',
         'type'    => 'textarea',
    ));
// row1 widget redirection
if (class_exists('M_Shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'm_shop_row1_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new M_Shop_Widegt_Redirect(
                $wp_customize, 'm_shop_row1_widget_redirect', array(
                    'section'      => 'm_shop_row1_pan',
                    'button_text'  => esc_html__( 'Go To Widget', 'm-shop' ),
                    'button_class' => 'focus-customizer-widget-redirect-row1',  
                )
            )
        );
} 
// row1 social media redirection
if (class_exists('M_Shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'm_shop_row1_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new M_Shop_Widegt_Redirect(
                $wp_customize, 'm_shop_row1_social_media_redirect', array(
                    'section'      => 'm_shop_row1_pan',
                    'button_text'  => esc_html__( 'Go To Social Media', 'm-shop' ),
                    'button_class' => 'focus-customizer-social_media-redirect-row1',  
                )
            )
        );
} 
/*****************/
// Call-to
/*****************/
$wp_customize->add_setting('m_shop_row1_calto_txt', array(
        'default' => __('Call To','m-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'm_shop_row1_calto_txt', array(
        'label'    => __('Call To Text', 'm-shop'),
        'section'  => 'm_shop_row1_pan',
         'type'    => 'text',
       
));
$wp_customize->add_setting('m_shop_row1_calto_num', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'm_shop_row1_calto_num', array(
        'label'    => __('Call To Number', 'm-shop'),
        'section'  => 'm_shop_row1_pan',
         'type'    => 'text',
));
$wp_customize->add_setting('m_shop_row1_calto_email', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'm_shop_row1_calto_email', array(
        'label'    => __('Email', 'm-shop'),
        'section'  => 'm_shop_row1_pan',
         'type'    => 'text',
));
//**************/
// BUTTON TEXT //
//**************/
$wp_customize->add_setting('m_shop_row1_btn_txt', array(
        'default' => __('Button Text','m-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'm_shop_row1_btn_txt', array(
        'label'    => __('Button Text', 'm-shop'),
        'section'  => 'm_shop_row1_pan',
         'type'    => 'text',

));
$wp_customize->add_setting('m_shop_row1_btn_lnk', array(
        'default' => __('#','m-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
        
));
$wp_customize->add_control( 'm_shop_row1_btn_lnk', array(
        'label'    => __('Button Link', 'm-shop'),
        'section'  => 'm_shop_row1_pan',
         'type'    => 'text',

));

// Row 2 setting
$wp_customize->add_setting('m_shop_pan_row2_set', array(
        'default'        => 'text',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_select',
    ));
$wp_customize->add_control( 'm_shop_pan_row2_set', array(
        'settings' => 'm_shop_pan_row2_set',
        'label'   => __('Choose Setting','m-shop'),
        'section' => 'm_shop_row2_pan',
        'type'    => 'select',
        'choices'    => array(
        'none'       => __('None','m-shop'),
        'text'       => __('Text','m-shop'),
        'callto'     => __('Call To','m-shop'),
        'widget'     => __('Widget','m-shop'),
        'social'     => __('Social Media','m-shop'), 
        'button'     => __('Button','m-shop'),    
        ),
    ));
// row2-text/html
$wp_customize->add_setting('m_shop_row2_texthtml', array(
        'default'           => __('Add your content here','m-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_textarea',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('m_shop_row2_texthtml', array(
        'label'    => __('Text', 'm-shop'),
        'section'  => 'm_shop_row2_pan',
        'settings' => 'm_shop_row2_texthtml',
         'type'    => 'textarea',
    ));
// row2 widget redirection
if (class_exists('M_Shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'm_shop_row2_widget_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new M_Shop_Widegt_Redirect(
                $wp_customize, 'm_shop_row2_widget_redirect', array(
                    'section'      => 'm_shop_row2_pan',
                    'button_text'  => esc_html__( 'Go To Widget', 'm-shop' ),
                    'button_class' => 'focus-customizer-widget-redirect-row1',  
                )
            )
        );
} 
// row2 social media redirection
if (class_exists('M_Shop_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'm_shop_row2_social_media_redirect', array(
            'sanitize_callback' => 'sanitize_text_field',
     )
);
$wp_customize->add_control(
            new M_Shop_Widegt_Redirect(
                $wp_customize, 'm_shop_row2_social_media_redirect', array(
                    'section'      => 'm_shop_row2_pan',
                    'button_text'  => esc_html__( 'Go To Social Media', 'm-shop' ),
                    'button_class' => 'focus-customizer-social_media-redirect-row1',  
                )
            )
        );
} 
/*****************/
// Call-to
/*****************/
$wp_customize->add_setting('m_shop_row2_calto_txt', array(
        'default' => __('Call To','m-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'm_shop_row2_calto_txt', array(
        'label'    => __('Call To Text', 'm-shop'),
        'section'  => 'm_shop_row2_pan',
         'type'    => 'text',
       
));
$wp_customize->add_setting('m_shop_row2_calto_num', array(
        'default' => __('+1800090098','m-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'm_shop_row2_calto_num', array(
        'label'    => __('Call To Number', 'm-shop'),
        'section'  => 'm_shop_row2_pan',
         'type'    => 'text',
));
$wp_customize->add_setting('m_shop_row2_calto_email', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'm_shop_row2_calto_email', array(
        'label'    => __('Email', 'm-shop'),
        'section'  => 'm_shop_row2_pan',
         'type'    => 'text',
));
//**************/
// BUTTON TEXT //
//**************/
$wp_customize->add_setting('m_shop_row2_btn_txt', array(
        'default' => __('Button Text','m-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'm_shop_row2_btn_txt', array(
        'label'    => __('Button Text', 'm-shop'),
        'section'  => 'm_shop_row2_pan',
         'type'    => 'text',

));
$wp_customize->add_setting('m_shop_row2_btn_lnk', array(
        'default' => __('#','m-shop'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
        
));
$wp_customize->add_control( 'm_shop_row2_btn_lnk', array(
        'label'    => __('Button Link', 'm-shop'),
        'section'  => 'm_shop_row2_pan',
         'type'    => 'text',

));