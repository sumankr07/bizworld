<?php
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly
}

final class BizworldventuresRegisterShortcode{
	public function __construct() {
		add_action('wp_enqueue_scripts', array($this, 'loadScripts') );
		add_shortcode('bizworldventures_tickets', array($this, 'bizworldventures_tickets'));
	}

	function loadScripts(){
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-tabs'); //load tabs
	}
	
	function bizworldventures_tickets(){
	    ob_start();
	    wp_enqueue_style('tickets_css',get_template_directory_uri().'/includes/admin/asset/css/tickets.css', false, '4.6.3', 'all' );
		wp_enqueue_script('tickets_js', get_template_directory_uri().'/includes/admin/asset/js/tickets.js', array('jquery'), '', true);
		wp_localize_script('tickets_js', 'tickets_ajax_data', array('tickets_ajax_url' => admin_url( 'admin-ajax.php')));
	    include_once('tickets/tickets.php' );
	    return ob_get_clean();
	}

	
	
}
$GLOBALS['BizworldventuresRegisterShortcode'] =new BizworldventuresRegisterShortcode();
?>