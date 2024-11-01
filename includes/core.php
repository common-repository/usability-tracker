<?php
function loadUsabilityScript()
{
 $apikey = get_option("UsabilityKey");
 $apikey = $apikey;
 $url =  "//cdn.usabilitytracker.com/Client.aspx?key=";


 if (!is_admin() && strlen($apikey) > 0)
	{
	  wp_enqueue_script('ic_usability_script', $url.$apikey,null,null);
	}
}
add_action('wp_print_scripts', 'loadUsabilityScript');

?>