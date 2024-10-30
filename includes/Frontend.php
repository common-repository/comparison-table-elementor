<?php 
namespace Cte;

/**
 * Cte Frontend Main Class
 */
class Frontend 
{
	
	function __construct()
	{
		self::ElementorAddons();
	}

	function ElementorAddons(){

		if (did_action('elementor/loaded')) {
			new Frontend\ElementorWidgets();
		}
	}


}