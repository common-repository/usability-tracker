<?php
add_action("admin_menu","usability_tracker_menu");
add_action("admin_init", "plugin_admin_init");

function plugin_admin_init()
{
	register_setting('UsabilityKey','UsabilityKey','UsabilityKey_validate');
	add_settings_section('plugin_main','Main Settings','plugin_section_text','plugin');
	add_settings_field('plugin_text_string','API Key','plugin_settings_string','plugin','plugin_main');
}
function plugin_settings_string()
{
$options = get_option('UsabilityKey');
echo "<input id='plugin_text_string' name='UsabilityKey' size='40' type='text' value=' ".$options."' />";
}
function UsabilityKey_validate($input)
{
$newinput = trim($input);
return $newinput;
}
function plugin_section_text(){
	//not needed yey
}
function usability_tracker_menu()
{
	add_options_page("Usability Tracker Configuration","Usability Tracker","manage_options","usabilitytracker", "usability_tracker_options");
}
function usability_tracker_options()
{
	if (!current_user_can('manage_options')) {
		wp_die(__('Acces denied!'));
	}
	?>
	<h2> Usability Tracker API key settings </h2>
	At this page you can enter your api key which you recieved at the usability tracker page. If you don't have a API key you can sign up for a free account at <a href="http://www.usabilitytracker.com">UsabilityTracker.com</a>
	<form action="options.php" method="post">
	<?php settings_fields('UsabilityKey');?>
	<?php do_settings_sections('plugin'); ?>
	
	<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
	</form>
	</div>
	<?php
}



?>