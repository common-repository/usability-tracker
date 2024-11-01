<?php
/*
Plugin Name: Usability Tracker 
Description: Does your website has usability problems? By installing the Usability Tracker we will check if your visitors encounter usability problems. 
Version: 1.2
Author: Laurens Koot
Author URI: http://www.usabilitytracker.com/
Plugin URI: http://www.usabilitytracker.com/install-the-plugin
*/


/**
 * Define some useful constants
 **/
define('IC_USABILITYPLUGIN_VERSION', '1.2');
define('IC_USABILITYPLUGIN_DIR', plugin_dir_path(__FILE__));
define('IC_USABILITYPLUGIN_URL', plugin_dir_url(__FILE__));


/**
 * Load files
 * 
 **/
function ic_usability_load(){
		
    if(is_admin()) //load admin files only in admin
       require_once(IC_USABILITYPLUGIN_DIR.'includes/admin.php');
        
    require_once(IC_USABILITYPLUGIN_DIR.'includes/core.php');
}

ic_usability_load();
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'ic_usability_settings_link' );

/**
 * Activation, Deactivation and Uninstall Functions
 * 
 **/
register_activation_hook(__FILE__, 'ic_usability_activation');
register_deactivation_hook(__FILE__, 'ic_usability_deactivation');


function ic_usability_activation() {
    
	//actions to perform once on plugin activation go here    
    
	
    //register uninstaller
    register_uninstall_hook(__FILE__, 'ic_usability_uninstall');
}

function ic_usability_deactivation() {
    
	// actions to perform once on plugin deactivation go here
	    
}

function ic_usability_uninstall(){
    
    //actions to perform once on plugin uninstall go here
	    
}
function ic_usability_settings_link($links){
  $settings_link = '<a href="options-general.php?page=usabilitytracker">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}



?>