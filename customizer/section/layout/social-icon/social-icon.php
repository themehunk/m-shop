<?php 
//Enable Loader
$wp_customize->add_setting( 'm_shop_social_original_color', array(
                'default'               => false,
                'sanitize_callback'     => 'm_shop_sanitize_checkbox',
            ));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'm_shop_social_original_color', array(
                'label'       => esc_html__('Show Original Color', 'm-shop'),
                'type'        => 'checkbox',
                'section'     => 'm-shop-social-icon',
                'settings'    => 'm_shop_social_original_color',
)));
$wp_customize->add_setting('social_shop_link_facebook', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('social_shop_link_facebook', array(
        'label'    => __('Facebook URL', 'm-shop'),
        'section'  => 'm-shop-social-icon',
        'settings' => 'social_shop_link_facebook',
         'type'       => 'text',
        
        ));

$wp_customize->add_setting('social_shop_link_linkedin', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('social_shop_link_linkedin', array(
        'label'    => __('LinkedIn URL', 'm-shop'),
        'section'  => 'm-shop-social-icon',
        'settings' => 'social_shop_link_linkedin',
         'type'       => 'text',
        
        ));
$wp_customize->add_setting('social_shop_link_pintrest', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('social_shop_link_pintrest', array(
        'label'    => __('Pinterest URL', 'm-shop'),
        'section'  => 'm-shop-social-icon',
        'settings' => 'social_shop_link_pintrest',
         'type'       => 'text',
        
        ));
$wp_customize->add_setting('social_shop_link_twitter', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_shop_link_twitter', array(
        'label'    => __('Twitter URL', 'm-shop'),
        'section'  => 'm-shop-social-icon',
        'settings' => 'social_shop_link_twitter',
         'type'       => 'text',
        ));
$wp_customize->add_setting('social_shop_link_insta', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_shop_link_insta', array(
        'label'    => __('Instagram URL', 'm-shop'),
        'section'  => 'm-shop-social-icon',
        'settings' => 'social_shop_link_insta',
         'type'       => 'text',
        ));
$wp_customize->add_setting('social_shop_link_tumblr', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_shop_link_tumblr', array(
        'label'    => __('Tumblr URL', 'm-shop'),
        'section'  => 'm-shop-social-icon',
        'settings' => 'social_shop_link_tumblr',
         'type'       => 'text',
        ));
$wp_customize->add_setting('social_shop_link_youtube', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_shop_link_youtube', array(
        'label'    => __('Youtube URL', 'm-shop'),
        'section'  => 'm-shop-social-icon',
        'settings' => 'social_shop_link_youtube',
         'type'       => 'text',
        ));
$wp_customize->add_setting('social_shop_link_stumbleupon', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_shop_link_stumbleupon', array(
        'label'    => __('Stumbleupon URL', 'm-shop'),
        'section'  => 'm-shop-social-icon',
        'settings' => 'social_shop_link_stumbleupon',
        'type'     => 'text',
        ));
        $wp_customize->add_setting('social_shop_link_dribble', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_shop_link_dribble', array(
        'label'    => __('Dribble URL', 'm-shop'),
        'section'  => 'm-shop-social-icon',
        'settings' => 'social_shop_link_dribble',
        'type'     => 'text',
        ));

         $wp_customize->add_setting('social_shop_link_skype', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('social_shop_link_skype', array(
        'label'    => __('Skype URL', 'm-shop'),
        'section'  => 'm-shop-social-icon',
        'settings' => 'social_shop_link_skype',
        'type'     => 'text',
        ));

/****************/
//body doc link
/****************/
$wp_customize->add_setting('m_shop_social_link_more', array(
    'sanitize_callback' => 'm_shop_sanitize_text',
    ));
$wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'm_shop_social_link_more',
            array(
        'section'     => 'm-shop-social-icon',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/m-shop/#social-icon',
        'description' => esc_html__( 'To know more go with this', 'm-shop' ),
        'priority'   =>100,
    )));