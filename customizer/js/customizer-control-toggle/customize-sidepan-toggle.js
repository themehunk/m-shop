/****************/
// Main header	
/****************/
( function( $ ) {
//**********************************/
// Main Header settings
//**********************************/
OPNControlTrigger.addHook( 'm-shop-toggle-control', function( argument, api ){
		OPNCustomizerToggles ['m_shop_pan_row1_set'] = [
		    {
				controls: [    
				'm_shop_row1_texthtml', 
				'm_shop_row1_widget_redirect',
				'm_shop_row1_social_media_redirect',
				'm_shop_row1_calto_txt',
				'm_shop_row1_calto_num',
				'm_shop_row1_calto_email',
				'm_shop_row1_btn_txt',
				'm_shop_row1_btn_lnk'
				],
				callback: function(optn){
					if (optn =='none'){
					return false;
					}
					return true;
				}
			},	
			 {
				controls: [    
				'm_shop_row1_texthtml',
				],
				callback: function(layout){
					if(layout=='text'){
					return true;
					}
					return false;
				}
			},
			 {
				controls: [    
				'm_shop_row1_btn_txt',
				'm_shop_row1_btn_lnk'
				],
				callback: function(layout){
					if(layout=='button'){
					return true;
					}
					return false;
				}
			},
			 {
				controls: [    
				'm_shop_row1_calto_txt',
				'm_shop_row1_calto_num',
				'm_shop_row1_calto_email',
				],
				callback: function(layout){
					if(layout=='callto'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'm_shop_row1_widget_redirect',
				],
				callback: function(layout){
					if(layout=='widget'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'm_shop_row1_social_media_redirect',
				],
				callback: function(layout){
					if(layout=='social'){
					return true;
					}
					return false;
				}
			},
			 
		];	
		OPNCustomizerToggles ['m_shop_pan_row2_set'] = [
		    {
				controls: [    
				'm_shop_row2_texthtml', 
				'm_shop_row2_widget_redirect',
				'm_shop_row2_social_media_redirect',
				'm_shop_row2_calto_txt',
				'm_shop_row2_calto_num',
				'm_shop_row2_calto_email',
				'm_shop_row2_btn_txt',
				'm_shop_row2_btn_lnk'
				],
				callback: function(optn){
					if (optn =='none'){
					return false;
					}
					return true;
				}
			},	
			 {
				controls: [    
				'm_shop_row2_texthtml',
				],
				callback: function(layout){
					if(layout=='text'){
					return true;
					}
					return false;
				}
			},
			 {
				controls: [    
				'm_shop_row2_btn_txt',
				'm_shop_row2_btn_lnk'
				],
				callback: function(layout){
					if(layout=='button'){
					return true;
					}
					return false;
				}
			},
			 {
				controls: [    
				'm_shop_row2_calto_txt',
				'm_shop_row2_calto_num',
				'm_shop_row2_calto_email',
				],
				callback: function(layout){
					if(layout=='callto'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'm_shop_row2_widget_redirect',
				],
				callback: function(layout){
					if(layout=='widget'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'm_shop_row2_social_media_redirect',
				],
				callback: function(layout){
					if(layout=='social'){
					return true;
					}
					return false;
				}
			},
			 
		];	
		OPNCustomizerToggles ['m_shop_sticky_header'] = [
		    {
				controls: [    
				'm_shop_sticky_header_effect', 
				],
				callback: function(headeroptn){
					if (headeroptn == true){
					return true;
					}
					return false;
				}
			},	
		];	
    });
})( jQuery );