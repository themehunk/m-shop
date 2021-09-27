<?php
/**
 * big store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package M Shop
 * @since 1.0.0
 */
/**
 * Theme functions and definitions
 */
if ( ! function_exists( 'm_shop_setup' ) ) :
define( 'M_SHOP_THEME_VERSION','1.0.0');
define( 'M_SHOP_THEME_DIR', get_template_directory() . '/' );
define( 'M_SHOP_THEME_URI', get_template_directory_uri() . '/' );
define( 'M_SHOP_THEME_SETTINGS', 'm-shop-settings' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_m_shop_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function m_shop_setup(){
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'm-shop' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'woocommerce' );
	
		// Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Enqueue editor styles.
        add_editor_style( 'style-editor.css' );
        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		/**
		 * Add support for core custom logo.
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		// Add support for Custom Header.
		add_theme_support( 'custom-header', 

			apply_filters( 'm_shop_custom_header_args', array(
				'default-image' => '',
				'flex-height'   => true,
				'header-text'   => false,
				'video'          => false,
		) 


		) );
		// Add support for Custom Background.
         $args = array(
	    'default-color' => 'f1f1f1',
        );
        add_theme_support( 'custom-background',$args );
        
        $GLOBALS['content_width'] = apply_filters( 'm_shop_content_width', 640 );
        add_theme_support( 'woocommerce', array(
                                                 'thumbnail_image_width' => 320,
                                             ) );
        // Recommend plugins
        add_theme_support( 'recommend-plugins', array(
             'themehunk-customizer' => array(
                'name' => esc_html__( 'Themehunk Customizer', 'm-shop' ),
                'active_filename' => 'themehunk-customizer/themehunk-customizer.php',
                'slug'		=> 'themehunk-customizer',
            ),
            'woocommerce' => array(
                'name' => esc_html__( 'Woocommerce', 'm-shop' ),
                'active_filename' => 'woocommerce/woocommerce.php',
                'slug'			=>	'woocommerce',
            ),
            'th-advance-product-search' => array(
                'name' => esc_html__( 'TH Advance Product Search', 'm-shop' ),
                'active_filename' => 'th-advance-product-search/th-advance-product-search.php',
            ), 
            'th-variation-swatches' => array(
                'name' => esc_html__( 'TH Variation Swatches', 'm-shop' ),
                'active_filename' => 'th-variation-swatches/th-variation-swatches.php',
            ), 
            'yith-woocommerce-wishlist' => array(
                 'name' => esc_html__( 'YITH WooCommerce Wishlist', 'm-shop' ),
                 'active_filename' => 'yith-woocommerce-wishlist/yith-woocommerce-wishlist.php',
             ),
            'yith-woocommerce-compare' => array(
                 'name' => esc_html__( 'YITH WooCommerce Compare', 'm-shop' ),
                 'active_filename' => 'yith-woocommerce-compare/yith-woocommerce-compare.php',
             ),
            'lead-form-builder' => array(
                'name' => esc_html__( 'Lead Form Builder', 'm-shop' ),
                'active_filename' => 'lead-form-builder/lead-form-builder.php',
                'slug'			 =>	'lead-form-builder',
            ),
            'wp-popup-builder' => array(
                'name' => esc_html__( 'WP Popup Builder – Popup Forms & Newsletter', 'm-shop' ),
                'active_filename' => 'wp-popup-builder/wp-popup-builder.php',
                'slug'			=>	'wp-popup-builder',
            ), 
            'one-click-demo-import' => array(
                'name' => esc_html__( 'One Click Demo Import', 'm-shop' ),
                'active_filename' => 'one-click-demo-import/one-click-demo-import.php',
            ),
        ) );

           // Useful plugins
        add_theme_support( 'useful-plugins', array(
             'themehunk-megamenu-plus' => array(
                'name' => esc_html__( 'Megamenu plugin from Themehunk.', 'm-shop' ),
                'active_filename' => 'themehunk-megamenu-plus/themehunk-megamenu.php',
                'slug'			=>	'themehunk-megamenu-plus',
            )
        ) );
	}
endif;
add_action( 'after_setup_theme', 'm_shop_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 */
/**
 * Register widget area.
 */
function m_shop_widgets_init(){
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'm-shop' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your primary sidebar.', 'm-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="m-shop-widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header First Widget', 'm-shop' ),
		'id'            => 'top-header-widget-col1',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'm-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header Second Widget', 'm-shop' ),
		'id'            => 'top-header-widget-col2',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'm-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header Third Widget', 'm-shop' ),
		'id'            => 'top-header-widget-col3',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'm-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar(array(
		'name'          => esc_html__( 'Side Pan Widget One', 'm-shop' ),
		'id'            => 'side-pan-1-widget',
		'description'   => esc_html__( 'Add widgets here to appear in side pan.', 'm-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Side Pan Widget Two', 'm-shop' ),
		'id'            => 'side-pan-2-widget',
		'description'   => esc_html__( 'Add widgets here to appear in side pan.', 'm-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
    register_sidebar(array(
		'name'          => esc_html__( 'Footer Top First Widget', 'm-shop' ),
		'id'            => 'footer-top-first',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'm-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Top Second Widget', 'm-shop' ),
		'id'            => 'footer-top-second',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'm-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Top Third Widget', 'm-shop' ),
		'id'            => 'footer-top-third',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'm-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below First Widget', 'm-shop' ),
		'id'            => 'footer-below-first',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'm-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below Second Widget', 'm-shop' ),
		'id'            => 'footer-below-second',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'm-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below Third Widget', 'm-shop' ),
		'id'            => 'footer-below-third',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'm-shop' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	for ( $i = 1; $i <= 4; $i++ ){
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'Footer Widget Area %d', 'm-shop' ), $i ),
			'id'            => 'footer-' . $i,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	
}
add_action( 'widgets_init', 'm_shop_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function m_shop_scripts(){

	// enqueue css

	wp_enqueue_style( 'font-awesome', M_SHOP_THEME_URI . '/third-party/fonts/font-awesome/css/font-awesome.css', '', M_SHOP_THEME_VERSION );
	wp_enqueue_style( 'animate', M_SHOP_THEME_URI . '/css/animate.css','',M_SHOP_THEME_VERSION);
	wp_enqueue_style( 'owl.carousel-css', M_SHOP_THEME_URI . '/css/owl.carousel.css','',M_SHOP_THEME_VERSION);
	
    if((bool)get_theme_mod('m_shop_rtl')==true){
	wp_enqueue_style( 'm-shop-rtl-style', M_SHOP_THEME_URI . 'css/rtl.css','',M_SHOP_THEME_VERSION);	
	}else{
	wp_enqueue_style( 'm-shop-main-style', M_SHOP_THEME_URI . 'css/style.css','',M_SHOP_THEME_VERSION);	
	}	

	wp_enqueue_style( 'm-shop-style', get_stylesheet_uri(), array(), M_SHOP_THEME_VERSION );
	wp_add_inline_style('m-shop-style', m_shop_custom_style());
    //enqueue js
    wp_enqueue_script("jquery-effects-core",array( 'jquery' ));
    wp_enqueue_script( 'jquery-ui-autocomplete',array( 'jquery' ),'',true );
    wp_enqueue_script('imagesloaded');
    wp_enqueue_script('m-shop-menu-js', M_SHOP_THEME_URI .'/js/m-shop-menu.js', array( 'jquery' ), '1.0.0', true );
   
    wp_enqueue_script('owl.carousel-js', M_SHOP_THEME_URI .'/js/owl.carousel.js', array( 'jquery' ), '1.0.1', true );
   
    wp_enqueue_script('m-shop-accordian-menu-js', M_SHOP_THEME_URI .'/js/m-shop-accordian-menu.js', array( 'jquery' ), M_SHOP_THEME_VERSION , true );

    wp_enqueue_script( 'm-shop-custom-js', M_SHOP_THEME_URI .'/js/m-shop-custom.js', array( 'jquery' ), M_SHOP_THEME_VERSION , true );
     $mshoplocalize = array(
				'm_shop_top_slider_optn' => (bool)get_theme_mod('m_shop_top_slider_optn',false),
				'm_shop_move_to_top_optn' => (bool)get_theme_mod('m_shop_move_to_top',false),
				'm_shop_sticky_header_effect' => esc_html(get_theme_mod('m_shop_sticky_header_effect','scrldwmn')),
				'm_shop_slider_speed' => esc_html(get_theme_mod('m_shop_slider_speed','3000')),
				'm_shop_rtl' => (bool)get_theme_mod('m_shop_rtl'),
				
			);
    wp_localize_script( 'm-shop-custom-js', 'm_shop',  $mshoplocalize);
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'm_shop_scripts' );
/********************************************************/
// Adding Dashicons in WordPress Front-end
/********************************************************/
add_action( 'wp_enqueue_scripts', 'm_shop_load_dashicons_front_end' );
function m_shop_load_dashicons_front_end(){
  wp_enqueue_style( 'dashicons' );
}

/**
 * Load init.
 */
require_once trailingslashit(M_SHOP_THEME_DIR).'inc/init.php';

//custom function conditional check for blog page
function m_shop_is_blog (){
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}


if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}