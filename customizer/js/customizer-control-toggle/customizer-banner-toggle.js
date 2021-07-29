/*************************************/
// Banner Hide N Show control
/*************************************/
( function( $ ){
OPNControlTrigger.addHook( 'm-shop-toggle-control', function( argument, api ){
OPNCustomizerToggles ['m_shop_banner_layout'] = [
		     

		     {
				controls: [    
				'm_shop_bnr_1_img',
				'm_shop_bnr_1_url',
				'm_shop_bnr_2_img',
				'm_shop_bnr_2_url',
				'm_shop_bnr_3_img',
				'm_shop_bnr_3_url',
				'm_shop_bnr_4_img',
				'm_shop_bnr_4_url',
				'm_shop_bnr_5_img',
				'm_shop_bnr_5_url',
				
				],
				callback: function(layout){
					if(layout=='bnr-four'){
					return true;
					}else{
					return false;	
					}
				}
			},	
			{
				controls: [    
				'm_shop_bnr_1_img',
				'm_shop_bnr_1_url',
				'm_shop_bnr_2_img',
				'm_shop_bnr_2_url',
				'm_shop_bnr_3_img',
				'm_shop_bnr_3_url',
				'm_shop_bnr_4_img',
				'm_shop_bnr_4_url',
				
				],
				callback: function(layout){
					if(layout=='bnr-five' ||  layout=='bnr-four'){
					return true;
					}else{
					return false;	
					}
				}
			},	
		    {
				controls: [    
				'm_shop_bnr_1_img',
				'm_shop_bnr_1_url',
				'm_shop_bnr_2_img',
				'm_shop_bnr_2_url',
				'm_shop_bnr_3_img',
				'm_shop_bnr_3_url',
				
				],
				callback: function(layout){
					if(layout=='bnr-three' || layout=='bnr-four' || layout=='bnr-five'){
					return true;
					}else{
					return false;	
					}
				}
			},	
			{
				controls: [    
				'm_shop_bnr_1_img',
				'm_shop_bnr_1_url',
				'm_shop_bnr_2_img',
				'm_shop_bnr_2_url',
				
				],
				callback: function(layout){
					if(layout=='bnr-two'|| layout=='bnr-three' || layout=='bnr-four' || layout=='bnr-five' || layout=='bnr-six'){
					return true;
					}else{
					return false;	
					}
				}
			},	
			{
				controls: [    
				'm_shop_bnr_1_img',
				'm_shop_bnr_1_url',	
				],
				callback: function(layout){
					if(layout=='bnr-one' || layout=='bnr-two'|| layout=='bnr-three' || layout=='bnr-four' || layout=='bnr-five' || layout=='bnr-six'){
					return true;
					}else{
					return false;	
					}
				}
			},	
				
		];	
	});
})( jQuery );