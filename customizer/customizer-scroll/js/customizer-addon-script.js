/**
 * Script fort the customizer sections scroll function.
 *
 * @since    1.1.43
 * @package  M Shop
 *
 * @author  ThemeHunk
 */
/* global wp */
jQuery(document).ready(function() {
var thunk_customizer_section_scroll = function ( $ ) {
	'use strict';
	$( function () {
				var customize = wp.customize;
				customize.preview.bind('clicked-customizer', function( data ) {

						var sectionClass = '';
						    switch (data) {
							case'sub-accordion-section-m_shop_top_slider_section':
							sectionClass = 'section.thunk-slider-section';
							break;
							case'sub-accordion-section-m_shop_category_tab_section':
							sectionClass = 'section.thunk-product-tab-section';
							break;
							case'sub-accordion-section-m_shop_product_slide_section':
							sectionClass = 'section.thunk-product-slide-section';
							break;
							case'sub-accordion-section-m_shop_cat_slide_section':
							sectionClass = 'section.thunk-category-slide-section';
							break;
							case'sub-accordion-section-m_shop_product_slide_list':
							sectionClass = 'section.thunk-product-list-section';
							break;
							case'sub-accordion-section-m_shop_product_cat_list':
							sectionClass = 'section.thunk-product-tab-list-section';
							break;
							case'sub-accordion-section-m_shop_banner':
							sectionClass = 'section.thunk-banner-section';
							break;
							case'sub-accordion-section-m_shop_ribbon':
							sectionClass = 'section.thunk-ribbon-section';
							break;
							case'sub-accordion-section-m_shop_brand':
							sectionClass = 'section.thunk-brand-section';
							break;
							case'sub-accordion-section-m_shop_highlight':
							sectionClass = 'section.thunk-product-highlight-section';
							break;
							case'sub-accordion-section-m_shop_product_tab_image':
							sectionClass = 'section.thunk-product-image-tab-section';
							break;
							case'sub-accordion-section-m_shop_product_big_feature':
							sectionClass = 'section.thunk-feature-product-section';
							break;
							case'sub-accordion-section-m_shop_1_custom_sec':
							sectionClass = 'section.thunk-custom-one-section';
							break;
							case'sub-accordion-section-m_shop_2_custom_sec':
							sectionClass = 'section.thunk-custom-two-section';
							break;
							case'sub-accordion-section-m_shop_3_custom_sec':
							sectionClass = 'section.thunk-custom-three-section';
							break;
							case'sub-accordion-section-m_shop_4_custom_sec':
							sectionClass = 'section.thunk-custom-four-section';
							break;
							case'sub-accordion-section-m_shop_testimonial':
							sectionClass = 'section.testimonial-section';
							break;
							case'sub-accordion-section-m_shop_blog':
							sectionClass = 'section.thunk-blog-section';
							break;
							case'sub-accordion-section-m_shop_product_single_sec':
							sectionClass = 'section.thunk-single-product-slide-section';
							break;
							
							default:
							sectionClass = 'section.' + data;
							break;
						}
						if ( $( sectionClass ).length > 0) {
							$( 'html, body' ).animate(
								{
									scrollTop: $(sectionClass).offset().top - 0
								}, 1000
							);
						}
					}
				);
		}
	);
};
thunk_customizer_section_scroll( jQuery );
});
