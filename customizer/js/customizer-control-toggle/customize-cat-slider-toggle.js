( function( $ ) {
//**********************************/
// Slider settings
//**********************************/
OPNControlTrigger.addHook( 'm-shop-toggle-control', function( argument, api ){
		OPNCustomizerToggles ['m_shop_cat_slide_layout'] = [
		    {
				controls: [    
				'm_shop_category_slider_optn', 
				],
				callback: function(layout){
					if(layout =='cat-layout-1'){
					return true;
					}
					return false;
				}
			},	
				
			
			 
		];	
    });
})( jQuery );