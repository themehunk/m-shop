( function( $ ) {
//**********************************/
// Slider settings
//**********************************/
OPNControlTrigger.addHook( 'm-shop-toggle-control', function( argument, api ){
         OPNCustomizerToggles ['m_shop_pagination'] = [
		    {
				controls: [    
				'm_shop_pagination_loadmore_btn_text',
				],
				callback: function(sliderspdoptn){
					if(sliderspdoptn == 'click'){
					return true;
					}
					return false;
				}
			},
			
			];


    });
})( jQuery );