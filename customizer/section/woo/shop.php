<?php 
$wp_customize->add_setting('m_shop_prd_view', array(
        'default'        => 'grid-view',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_select',
    ));
    $wp_customize->add_control('m_shop_prd_view', array(
        'settings' => 'm_shop_prd_view',
        'label'   => __('Display Product View','m-shop'),
        'description' => __('(Select layout to display products at shop page.)','m-shop'),
        'section' => 'm-shop-woo-shop-page',
        'type'    => 'select',
        'choices' => array(
        'grid-view'   => __('Grid','m-shop'), 
        'list-view'     => __('List','m-shop'),
        
        )
    ));
/************************/
//Shop product pagination
/************************/
   $wp_customize->add_setting('m_shop_pagination', array(
        'default'        => 'num',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_select',
    ));
    $wp_customize->add_control('m_shop_pagination', array(
        'settings' => 'm_shop_pagination',
        'label'   => __('Post Pagination','m-shop'),
        'section' => 'm-shop-woo-shop-page',
        'type'    => 'select',
        'choices' => array(
        'num'     => __('Numbered','m-shop'),
        'click'   => __('Load More (Pro)','m-shop'), 
        'scroll'  => __('Infinite Scroll (Pro)','m-shop'), 
        )
    ));

  
$wp_customize->add_setting('m_shop_pagination_loadmore_btn_text', array(
        'default'           => 'Load More',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'm_shop_sanitize_text',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('m_shop_pagination_loadmore_btn_text', array(
        'label'    => __('Load More Text', 'm-shop'),
        'section'  => 'm-shop-woo-shop-page',
        'settings' => 'm_shop_pagination_loadmore_btn_text',
         'type'    => 'text',
    ));
/****************/
// doc link
/****************/
$wp_customize->add_setting('m_shop_shop_page_more', array(
    'sanitize_callback' => 'm_shop_sanitize_text',
    ));
$wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'm_shop_shop_page_more',
            array(
        'section'     => 'm-shop-woo-shop-page',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/m-shop/#shop-page',
        'description' => esc_html__( 'To know more go with this', 'm-shop' ),
        'priority'   =>  100,
    )));