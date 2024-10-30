<?php 
namespace Cte\Admin;

/**
 * Admin Notice Class
 */
class AdminNotice
{
	
	function __construct()
	{
		self::ElementorMissingNotice();
	}

	function ElementorMissingNotice(){

		if ( !did_action( 'elementor/loaded' ) ) {
		    add_action( 'admin_notices', [$this,'cte_slider_fail_load'] );
		    return;
		}
	}

	/**
	 * Check Elementor installed and activated correctly
	 */
	function cte_slider_fail_load()
	{
	    $screen = get_current_screen();
	    if ( isset( $screen->parent_file ) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id ) {
	        return;
	    }
	    $plugin = 'elementor/elementor.php';
	    
	    if ( $this->_is_elementor_installed() ) {
	        if ( !current_user_can( 'activate_plugins' ) ) {
	            return;
	        }
	        $activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
	        $admin_message = '<p>' . esc_html__( 'Ops! Comparison Table Elementor Plugins not working because you need to activate the Elementor plugin first.', 'cte' ) . '</p>';
	        $admin_message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $activation_url, esc_html__( 'Activate Elementor Now', 'cte' ) ) . '</p>';
	    } else {
	        if ( !current_user_can( 'install_plugins' ) ) {
	            return;
	        }
	        $install_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
	        $admin_message = '<p>' . esc_html__( 'Ops! Comparison Table Elementor Plugins not working because you need to install the Elementor plugin', 'cte' ) . '</p>';
	        $admin_message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $install_url, esc_html__( 'Install Elementor Now', 'cte' ) ) . '</p>';
	    }
	    
	    echo  '<div class="error">' . esc_html($admin_message) . '</div>' ;
	}
	
	/**
	 * Check the elementor installed or not
	 */
	
	    function _is_elementor_installed()
	    {
	        $file_path = 'elementor/elementor.php';
	        $installed_plugins = get_plugins();
	        return isset( $installed_plugins[$file_path] );
	    }
}