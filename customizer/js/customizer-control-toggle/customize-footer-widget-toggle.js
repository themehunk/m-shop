/*****************************************************************************/
/**********************customizer control setting*************************/
/*****************************************************************************/
( function( $ ) {
//**********************************/
// Footer widget hide and show settings
//**********************************/
OPNControlTrigger.addHook( 'm-shop-toggle-control', function( argument, api ){
		OPNCustomizerToggles ['m_shop_bottom_footer_widget_layout'] = [
			{
				controls: [
					
					
					'm_shop_bottom_footer_widget_redirect',
				],
				callback: function(layout){
					if ('ft-wgt-none'== layout){
						return false;
					}
					return true;
				}
			},
				
		];	
 });
})( jQuery );