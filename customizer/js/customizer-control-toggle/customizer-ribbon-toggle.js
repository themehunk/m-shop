/*************************************/
// Ribbon Hide N Show control
/*************************************/
( function( $ ){
OPNControlTrigger.addHook( 'm-shop-toggle-control', function( argument, api ){
OPNCustomizerToggles ['m_shop_ribbon_background'] = [
		     {
				controls:[    
				'm_shop_ribbon_bg_background_image',
				
				],
				callback: function(layout){
					if(layout=='image'){
					return true;
					}else{
					return false;	
					}
				}
			},	
			{
				controls: [  
				'm_shop_ribbon_video_poster_image',
				'm_shop_ribbon_bg_video', 
			    
				],
				callback: function(layout1){
					if(layout1 =='video'){
					return true;
					}else{
					return false;	
					}
				}
			},	
		];	
	});
})( jQuery );