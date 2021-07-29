<?php
/**
 *Blog Option
 /*******************/
//blog post content
/*******************/
    $wp_customize->add_setting('m_shop_blog_post_content', array(
        'default'        => 'excerpt',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('m_shop_blog_post_content', array(
        'settings' => 'm_shop_blog_post_content',
        'label'   => __('Blog Post Content','m-shop'),
        'section' => 'm-shop-section-blog-group',
        'type'    => 'select',
        'choices'    => array(
        'full'   => __('Full Content','m-shop'),
        'excerpt' => __('Excerpt Content','m-shop'), 
        'nocontent' => __('No Content','m-shop'), 
        ),
         'priority'   =>9,
    ));
    // excerpt length
    $wp_customize->add_setting('m_shop_blog_expt_length', array(
			'default'           =>'30',
            'capability'        => 'edit_theme_options',
			'sanitize_callback' =>'m_shop_sanitize_number',
		)
	);
	$wp_customize->add_control('m_shop_blog_expt_length', array(
			'type'        => 'number',
			'section'     => 'm-shop-section-blog-group',
			'label'       => __( 'Excerpt Length', 'm-shop' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 3000,
			),
             'priority'   =>10,
		)
	);
	// read more text
    $wp_customize->add_setting('m_shop_blog_read_more_txt', array(
			'default'           =>'Read More',
            'capability'        => 'edit_theme_options',
			'sanitize_callback' =>'m_shop_sanitize_text',
            'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control('m_shop_blog_read_more_txt', array(
			'type'        => 'text',
			'section'     => 'm-shop-section-blog-group',
			'label'       => __( 'Read More Text', 'm-shop' ),
			'settings' => 'm_shop_blog_read_more_txt',
             'priority'   =>11,
			
		)
	);
    /*********************/
    //blog post pagination
    /*********************/
   $wp_customize->add_setting('m_shop_blog_post_pagination', array(
        'default'        => 'num',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr',
    ));
    $wp_customize->add_control('m_shop_blog_post_pagination', array(
        'settings' => 'm_shop_blog_post_pagination',
        'label'   => __('Post Pagination','m-shop'),
        'section' => 'm-shop-section-blog-group',
        'type'    => 'select',
        'choices' => array(
        'num'     => __('Numbered','m-shop'),
        'click'   => __('Load More (Pro)','m-shop'), 
        'scroll'  => __('Infinite Scroll (Pro)','m-shop'), 
        ),
        'priority'   =>13,
    ));
  
/****************/
//blog doc link
/****************/
$wp_customize->add_setting('m_shop_blog_arch_learn_more', array(
    'sanitize_callback' => 'm_shop_sanitize_text',
    ));
$wp_customize->add_control(new M_Shop_Misc_Control( $wp_customize, 'm_shop_blog_arch_learn_more',
            array(
        'section'    => 'm-shop-section-blog-group',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/m-shop/#blog-setting',
        'description' => esc_html__( 'To know more go with this', 'm-shop' ),
        'priority'   =>100,
    )));