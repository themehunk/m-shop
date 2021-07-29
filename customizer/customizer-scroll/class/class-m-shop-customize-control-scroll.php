<?php
if( ! class_exists( 'WP_Customize_Control' ) ){
	return;
}
/**
 * Scroll to section.
 *
 * @since  1.1.45
 * @access public
 */
class M_Shop_Customize_Control_Scroll{
	/**
	 *Hunk_Companion_Customize_Control_Scroll constructor.
	 */
	public function __construct(){
		add_action( 'customize_controls_init', array( $this, 'enqueue' ) );
		add_action( 'customize_preview_init', array( $this, 'helper_script_enqueue' ) );
		
	}
	/**
	 * The priority of the control.
	 * @since 1.1.45
	 * @var   string
	 */
	  public $priority = 0;
	 /**
	 * Loads the customizer script.
	 *
	 * @since  1.1.45
	 * @access public
	 * @return void
	 */
	public function enqueue(){
		wp_enqueue_script( 'm-shop-scroller-script', M_SHOP_THEME_URI . 'customizer/customizer-scroll/js/script.js', array( 'jquery'),'',true);
		
	}
	
	public function helper_script_enqueue(){
		wp_enqueue_script( 'm-shop-scroller-addon-script', M_SHOP_THEME_URI . 'customizer/customizer-scroll/js/customizer-addon-script.js', array('jquery'),'',true);

	}
}