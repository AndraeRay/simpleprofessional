<?php

/** Theme options page*/


function theme_settings_page() {
    ?>
	    <div class="wrap">
	    <h1>Theme Settings</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}

function add_theme_menu_item()
{
	add_menu_page("Theme Settings", "Theme Settings", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");


function display_linkedin_element() {
	?>
    	<input type="text" name="linkedin_url" id="linkedin_url" value="<?php echo get_option('linkedin_url'); ?>" />
    <?php
}

function display_github_element()
{
	?>
    	<input type="text" name="github_url" id="github_url" value="<?php echo get_option('github_url'); ?>" />
    <?php
}

function display_sidebar_position_element()
{
	$options['sidebar-position'] = get_option('sidebar-position', 'left')
	?>
    	<input type="radio" name="sidebar-position" id="sidebar-position" value="left" <?php checked( $options['sidebar-position'], 'left' ); ?>> Left Side
    	<input type="radio" name="sidebar-position" id="sidebar-position" value="right" <?php checked( $options['sidebar-position'], 'right' ); ?>> Right Side
    <?php
}

function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");
	
	add_settings_field("linkedin_url", "LinkedIn Profile Url", "display_linkedin_element", "theme-options", "section");
    add_settings_field("github_url", "GitHub Profile Url", "display_github_element", "theme-options", "section");
    add_settings_field("sidebar-position", "Sidebar position", "display_sidebar_position_element", "theme-options", "section");

    register_setting("section", "linkedin_url");
    register_setting("section", "github_url");
    register_setting("section", "sidebar-position");
}

add_action("admin_init", "display_theme_panel_fields");