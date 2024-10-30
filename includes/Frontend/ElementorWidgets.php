<?php 
namespace Cte\Frontend;

/**
 * Elementor Widgets Register Class
 */
class ElementorWidgets
{
	
	function __construct()
	{

		add_action('elementor/widgets/widgets_registered', [$this, 'init_widgets']);
		add_action('elementor/elements/categories_registered', [$this, 'register_new_category']);
		add_action('elementor/frontend/after_enqueue_styles', [$this, 'frontend_widget_styles']);
		add_action("elementor/frontend/after_enqueue_scripts", [$this, 'frontend_assets_scripts']);
	}

	public function init_widgets()
	{
		// Posts Categories Filter
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Viola() );

	}

	public function register_new_category($elements_manager)
	{
		$elements_manager->add_category('cte', [
			'title' => esc_html__('CTE Table', 'comparison-table-elementor'),
			'icon' => 'eicon-table',
		]);
	}


	/**
	 * Add style and scripts
	 *
	 * Add the plugin style and scripts for this
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	/*
	plugin css
	*/
	function frontend_widget_styles()
	{
		wp_enqueue_style("cte-style-css", CTE_ASSETS . '/css/cte-style.css', array(), CTE_VERSION, 'all');
		wp_enqueue_style("font-awesome-css", CTE_ASSETS . '/css/font-awesome.min.css', array(), CTE_VERSION, 'all');
	}


	/*
	plugin js
	*/
	function frontend_assets_scripts()
	{

	}


}