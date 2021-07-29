<?php

/**
 * This file stores all functions that return default content.
 *
 * @package  M Shop
 */
/**
 * Class M_Shop_Defaults_Models
 *
 * @package  M Shop
 */
class M_Shop_Defaults_Models extends M_Shop_Singleton{
/**
	 * Get default values for features section.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	
     /**
	 * Get default values for features section.

	 * @access public
	 */
	public function get_feature_default() {
		return apply_filters(
			'm_shop_highlight_default_content', json_encode(
				array(
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Free Shiping', 'm-shop' ),
						'subtitle'   => esc_html__( 'On all order over ', 'm-shop' ),
						
					),
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Free Shiping', 'm-shop' ),
						'subtitle'   => esc_html__( 'On all order over ', 'm-shop' ),
						
					),
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Free Shiping', 'm-shop' ),
						'subtitle'   => esc_html__( 'On all order over ', 'm-shop' ),
						
					),
					array(
						'icon_value' => 'fa-cog',
						'title'      => esc_html__( 'Free Shiping', 'm-shop' ),
						'subtitle'   => esc_html__( 'On all order over ', 'm-shop' ),
						
					),
				)
			)
		);
	}	
/**
	 * Get default values for Brands section.

	 * @access public
	 */
public function get_brand_default() {
		return apply_filters(
			'm_shop_brand_default_content', json_encode(
				array(
					array(
						'image_url' => '',
						'link'       => '#',
					),
					array(
						'image_url' => '',
						'link'       => '#',
					),
					array(
						'image_url' => '',
						'link'       => '#',
					),
					array(
						'image_url' => '',
						'link'       => '#',
					),
					array(
						'image_url' => '',
						'link'       => '#',
					),
					array(
						'image_url' => '',
						'link'       => '#',
					),
				)
			)
		);
	}


	/**
	 * Get default values for Testimonials section.

	 * @access public
	 */
public function get_testimonials_default() {
		return apply_filters(
			'm_shop_testimonials_default_content', json_encode(
				array(
					array(
						'image_url' =>	'',
						'title'     => esc_html__( 'Surbhi', 'm-shop' ),
						'subtitle'  => esc_html__( 'Business Owner', 'm-shop' ),
						'text'      => esc_html__( '"Nunc eu elementum libero. Etiam egestas leo eget urna ultrices, in finibus eros gravida. Donec scelerisque pulvinar dapibus. Nam pretium risus sed metus ultrices blandit. Pellentesque rhoncus est non nunc ultricies accumsan. Nullam gravida turpis et lacinia cursus. Fusce iaculis mattis consectetur."', 'm-shop' ),
						'link'		=>	'#',
						'id'        => 'customizer_repeater_56d7ea7f40d56',
					),
					array(
						'image_url' =>	'',
						'title'     => esc_html__( 'Nataliya', 'm-shop' ),
						'subtitle'  => esc_html__( 'Artist', 'm-shop' ),
						'text'      => esc_html__( '"Nunc eu elementum libero. Etiam egestas leo eget urna ultrices, in finibus eros gravida. Donec scelerisque pulvinar dapibus. Nam pretium risus sed metus ultrices blandit. Pellentesque rhoncus est non nunc ultricies accumsan. Nullam gravida turpis et lacinia cursus. Fusce iaculis mattis consectetur."', 'm-shop' ),
						'link'		=>	'#',
						'id'        => 'customizer_repeater_56d7ea7f40d66',
					),

					array(
						'image_url' =>'',
						'title'     => esc_html__( 'Ramedrin', 'm-shop' ),
						'subtitle'  => esc_html__( 'Business Owner', 'm-shop' ),
						'text'      => esc_html__( '"Nunc eu elementum libero. Etiam egestas leo eget urna ultrices, in finibus eros gravida. Donec scelerisque pulvinar dapibus. Nam pretium risus sed metus ultrices blandit. Pellentesque rhoncus est non nunc ultricies accumsan. Nullam gravida turpis et lacinia cursus. Fusce iaculis mattis consectetur."', 'm-shop' ),
						'link'		=>	'#',
						'id'        => 'customizer_repeater_56d7ea7f40d56',
					),
				)
			)
		);
	}

}