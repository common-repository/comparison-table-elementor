<?php 

	/*
	Plugin Name: Comparison Table Elementor
	Plugin URI: https://dragwp.com/
	Description: Excellent Comparison tables from Elementor Page Builder.
	Tags: comparison, table, comparison table, elementor, table plugins, responsive comparison table, product comparison,
	Requires at least: 6.0
	Tested up to: 6.3
	Stable tag: 1.0.1
	Requires PHP: 7.0
	License: GPLv2 or later
	License URI: https://www.gnu.org/licenses/gpl-2.0.html
	Author: Drag WP
	Author URI: https://wppathfinder.com/
	Text Domain: comparison-table-elementor
	Version: 1.0.1
	*/

	if (! defined('ABSPATH') ) {
		exit;
	}

	if (!class_exists('CTE')) {

		require 'vendor/autoload.php';
		
		final class CTE {


			/*
			 * plugin version
			*/
			const version = '1.0.0';


			/**
			 *
			 *	Class Constructor
			 * 
			**/
			private function __construct() {

				$this->define_constants();				
				add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
			}

			/**
			 * Inisialize a singleton instnace 	
			 *
			 * @return \CTE
			**/
			public static function init(){
				static $instance = false;

				if ( $instance == false ) {
					$instance = new self();
				}

				return $instance;
			}

			/**
			 * define constractors
			 *
			 * @return void
			**/
			public function define_constants(){

				define('CTE_PREFIX', 'cte_' ); 
				define('CTE_VERSION', self::version ); 
				define('CTE_FILE', __FILE__ ); 
				define('CTE_BASENAME', plugin_basename( CTE_FILE ) );
				define('CTE_PATH', __DIR__ ); 
				define('CTE_DIR', dirname(CTE_FILE).'/' ); 
				define('CTE_URL', plugins_url('', CTE_FILE) ); 
				define('CTE_ASSETS', CTE_URL.'/assets' ); 
				define('CTE_INCLUDES', CTE_URL.'/includes' ); 
				define('CTE_TIME', time() ); 
			}


			/**
			 * Do stuff after plugin loaded
			 *
			 * @return void
			**/
			public function init_plugin (){

				new Cte\Admin();
				new Cte\Frontend();

			}

		}

		/**
		 * Inisialize the main plugin	
		 *
		 * @return \CTE
		**/
		function cte_init(){
			return CTE::init();
			
		}
	
		/*
		* Run the plugin
		*/
		cte_init();
	}
	