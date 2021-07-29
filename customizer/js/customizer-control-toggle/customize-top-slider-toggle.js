( function( $ ){
//**********************************/
// Slider settings
//**********************************/
OPNControlTrigger.addHook( 'm-shop-toggle-control', function( argument, api ){
		OPNCustomizerToggles['m_shop_top_slide_layout'] = [
		    {
				controls: [    
				'm_shop_top_slider_2_title',
				'm_shop_lay2_adimg',
				'm_shop_lay2_url',
				'm_shop_lay2_adimg2',
				'm_shop_lay2_url2',
				'm_shop_top_slider_2_title2',
				'm_shop_lay2_adimg3',
				'm_shop_lay2_url3',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-1' || slideroptn =='slide-layout-6'){
					return false;
					}
					return true;
				}
			},	
			{
				controls: [    
				'm_shop_top_slide_content',
				'm_shop_top_slider_2_title',
				'm_shop_lay2_adimg',
				'm_shop_lay2_url',
				'm_shop_lay2_adimg2',
				'm_shop_lay2_url2',
				'm_shop_top_slider_2_title2',
				'm_shop_lay2_adimg3',
				'm_shop_lay2_url3',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-2'){
					return true;
					}
					return false;
				}
			},	
			
			
			{
				controls: [    
				'm_shop_top_slide_content',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-1' || slideroptn =='slide-layout-6' || slideroptn =='slide-layout-2' || slideroptn =='slide-layout-3' || slideroptn =='slide-layout-4' || slideroptn =='slide-layout-5'){
					return true;
					}
					return false;
				}
			},
				{
				controls: [    
				'm_shop_lay2_adimg',
				'm_shop_lay2_url',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-4' ||  slideroptn =='slide-layout-2' ||  slideroptn =='slide-layout-5'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'm_shop_lay2_adimg2',
				'm_shop_lay2_url2',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-5' ||  slideroptn =='slide-layout-2' ){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'm_shop_lay6_1_bg_clr',
				'm_shop_lay6_2_bg_clr',
				'm_shop_lay6_3_bg_clr',
				'm_shop_lay6_4_bg_clr',
				'm_shop_lay6_5_bg_clr',
				],
				callback: function(slideroptn){
					if(slideroptn =='slide-layout-6'){
					return true;
					}
					return false;
				}
			},
	 
		];	
            OPNCustomizerToggles['m_shop_top_slider_optn'] = [
		    {
				controls: [    
				'm_shop_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			},
			
			];
			OPNCustomizerToggles['m_shop_cat_slider_optn'] = [
		    {
				controls: [    
				'm_shop_cat_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			},
			
			];
			OPNCustomizerToggles['m_shop_product_slider_optn'] = [
		    {
				controls: [    
				'm_shop_product_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			},
			];	
			OPNCustomizerToggles['m_shop_category_slider_optn'] = [
		    {
				controls: [    
				'm_shop_category_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			}
			
			];

			OPNCustomizerToggles['m_shop_product_list_slide_optn'] = [
		    {
				controls: [    
				'm_shop_product_list_slide_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			}
			
			];
			OPNCustomizerToggles['m_shop_feature_product_slider_optn'] = [
		    {
				controls: [    
				'm_shop_feature_product_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			}
			
			];
			OPNCustomizerToggles['m_shop_cat_tb_lst_slider_optn'] = [
		    {
				controls: [    
				'm_shop_cat_tb_lst_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			}
			
			];
			OPNCustomizerToggles['m_shop_brand_slider_optn'] = [
		    {
				controls: [    
				'm_shop_brand_slider_speed',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == true){
					return true;
					}
					return false;
				}
			}
			
		];


    });
})( jQuery );