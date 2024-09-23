<?php
if (!defined('ABSPATH')){
	exit; // Exit if accessed directly
}
final class BizworldventuresRegister
{
	public function __construct()
	{
        add_action('admin_enqueue_scripts', array( $this, 'BizworldventuresLoadScripts') );
		add_action('admin_menu', array($this,'custom_menu_page'));
	}
        
        function BizworldventuresLoadScripts(){
              wp_enqueue_script('jquery');
		    }
                
	function custom_menu_page(){
	    add_menu_page(__('All Ticket','bizworldventures'), __('All Ticket','bizworldventures'), 'manage_options', 'manage-ticket', array($this,'all_tickets'), 'dashicons-tickets', '22.56');
		add_submenu_page('manage-ticket', __('Add Ticket','bizworldventures'), __('Add Ticket','bizworldventures'), 'manage_options', 'create-new-ticket', array($this,'create_new_ticket') );
	}
	function all_tickets()
	{
          
        echo 'Hiiiiiiii';
      
	}
	function create_new_ticket(){
	    echo 'Hiiiiiiiiiii';
	}
}
$GLOBALS['BizworldventuresRegister']=new BizworldventuresRegister();
?>