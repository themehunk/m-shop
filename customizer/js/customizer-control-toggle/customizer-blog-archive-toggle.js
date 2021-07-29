/*************************************/
// Blog Archive Hide and Show control
/*************************************/
( function( $ ){
OPNControlTrigger.addHook( 'm-shop-toggle-control', function( argument, api ){
OPNCustomizerToggles ['m_shop_blog_post_content'] = [
		    {
				controls: [    
				'm_shop_blog_expt_length',
				'm_shop_blog_read_more_txt',
				],
				callback: function(layout){
					if(layout=='full'|| layout=='nocontent'){
					return false;
					}
					return true;
				}
			},	
		];	
	});
})( jQuery );