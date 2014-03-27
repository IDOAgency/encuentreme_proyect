
<div class="wrap">
	
    <?php screen_icon(); ?>
    
	<form action="options.php" method="post" id="dbc_option_form" name="<?php echo $plugin_id; ?>_options_form">
    
	<?php settings_fields($plugin_id.'_options'); ?>
    
    <h2>WP Dashboard Customizer</h2>
    
	<div class="widefat bdc_panel">
		<div class="dbc_panel_head" >
			<a id="customize_dashbord_toggle" class="inactive toggler" href="#">Toggle</a>
			<h3 class="dbc_title" >Customize Dashboard</h3>
			<input type="submit" name="submit" value="Save Settings" class="button-primary bdc_submit" />
		</div>
		
		<div id="customize_dashbord_body" class="dbc_panel" >
			<label for="">
				<p><label><input class="admin_checkbox" type="checkbox" name="dbc_screen_options" <?php if(get_option('dbc_screen_options')): echo 'checked'; else: echo 'unchecked'; endif;?> />Hide Screen Options Tab</label></p>
				
				<p><label><input class="admin_checkbox" type="checkbox" name="dbc_help_tab" <?php if(get_option('dbc_help_tab')): echo 'checked'; else: echo 'unchecked'; endif;?> />Hide Help Tab</label></p>
				
				 <p><label><input class="admin_checkbox" type="checkbox" name="dbc_right_now" <?php if(get_option('dbc_right_now')): echo 'checked'; else: echo 'unchecked'; endif;?> />Remove Right Now</label></p>
				 
				 <p><label><input class="admin_checkbox" type="checkbox" name="dbc_recent_comments" <?php if(get_option('dbc_recent_comments')): echo 'checked'; else: echo 'unchecked'; endif;?> />Remove Recent Comments</label></p>
				 
				 <p><label><input class="admin_checkbox" type="checkbox" name="dbc_recent_drafts" <?php if(get_option('dbc_recent_drafts')): echo 'checked'; else: echo 'unchecked'; endif;?> />Remove Recent Drafts</label></p>
				 
				 <p><label><input class="admin_checkbox" type="checkbox" name="dbc_remove_plugins" <?php if(get_option('dbc_remove_plugins')): echo 'checked'; else: echo 'unchecked'; endif;?> />Remove Plugins</label></p>
				 
				 <p><label><input class="admin_checkbox" type="checkbox" name="dbc_incoming_links" <?php if(get_option('dbc_incoming_links')): echo 'checked'; else: echo 'unchecked'; endif;?> />Remove Incoming Links</label></p>
				 
				 <p><label><input class="admin_checkbox" type="checkbox" name="dbc_remove_quickpress" <?php if(get_option('dbc_remove_quickpress')): echo 'checked'; else: echo 'unchecked'; endif;?> />Remove Quickpress</label></p>
				 
				 <p><label><input class="admin_checkbox" type="checkbox" name="dbc_remove_wpblog" <?php if(get_option('dbc_remove_wpblog')): echo 'checked'; else: echo 'unchecked'; endif;?> />Remove WordPress Blog</label></p>
				 
				 <p><label><input class="admin_checkbox" type="checkbox" name="dbc_other_wp_news" <?php if(get_option('dbc_other_wp_news')): echo 'checked'; else: echo 'unchecked'; endif;?> />Remove Other WordPress News</label></p>
			</label>
		</div>
	</div>
    
	
	<div class="widefat bdc_panel">
		<div class="dbc_panel_head" >
			<a id="customize_admin_bar_toggle" class="inactive toggler" href="#">Toggle</a>
			<h3 class="dbc_title" >Customize Admin Bar</h3>
			<input type="submit" name="submit" value="Save Settings" class="button-primary bdc_submit" />
		</div>
		
		<div id="customize_admin_body" class="dbc_panel" >
			<label for="">
				<p><label><input class="admin_checkbox" type="checkbox" name="dbc_remove_admin_bar" <?php if(get_option('dbc_remove_admin_bar')): echo 'checked'; else: echo 'unchecked'; endif;?> />Remove Admin Bar ( Excerpt Admin )</label></p>
					 
				<p><label><input class="admin_checkbox" type="checkbox" name="dbc_remove_wp_logo" <?php if(get_option('dbc_remove_wp_logo')): echo 'checked'; else: echo 'unchecked'; endif;?> />Remove WordPress Logo</label></p>

				<p><label><input class="admin_checkbox" type="checkbox" name="dbc_remove_about_wplink" <?php if(get_option('dbc_remove_about_wplink')): echo 'checked'; else: echo 'unchecked'; endif;?> />Remove About WordPress Link</label></p>

				<p><label><input class="admin_checkbox" type="checkbox" name="dbc_remove_wporg_link" <?php if(get_option('dbc_remove_wporg_link')): echo 'checked'; else: echo 'unchecked'; endif;?> />Remove WordPress.org Link</label></p>

				<p><label><input class="admin_checkbox" type="checkbox" name="dbc_remove_doc_link" <?php if(get_option('dbc_remove_doc_link')): echo 'checked'; else: echo 'unchecked'; endif;?> />Remove Documentation Link</label></p>

				<p><label><input class="admin_checkbox" type="checkbox" name="dbc_remove_support_link" <?php if(get_option('dbc_remove_support_link')): echo 'checked'; else: echo 'unchecked'; endif;?> />Remove Support Forums Link</label></p>

				<p><label><input class="admin_checkbox" type="checkbox" name="dbc_remove_feedback_link" <?php if(get_option('dbc_remove_feedback_link')): echo 'checked'; else: echo 'unchecked'; endif;?> />Remove Feedback Link</label></p>
			</label>
		</div>
	</div>
	
	<div class="widefat bdc_panel">
		<div class="dbc_panel_head" >
			<a id="customize_user_permission_toggle" class="inactive toggler" href="#">Toggle</a>
			<h3 class="dbc_title" >Customize User Permissions</h3>
			<input type="submit" name="submit" value="Save Settings" class="button-primary bdc_submit" />
		</div>
		
		<div id="customize_user_permission_body" class="dbc_panel" >
			<label for="">
				<p><label><input class="admin_checkbox" type="checkbox" name="dbc_restrict_post_view" <?php if(get_option('dbc_restrict_post_view')): echo 'checked'; else: echo 'unchecked'; endif;?> />Restrict author to view all posts</label></p>
					 
				<p><label><input class="admin_checkbox" type="checkbox" name="dbc_restrict_media_view" <?php if(get_option('dbc_restrict_media_view')): echo 'checked'; else: echo 'unchecked'; endif;?> />Restrict author to view all media</label></p>

				<p><label><input class="admin_checkbox" type="checkbox" name="dbc_thumb_in_dash" <?php if(get_option('dbc_thumb_in_dash')): echo 'checked'; else: echo 'unchecked'; endif;?> />Show Thumbnail in Dashboard</label></p>

				<p><label><input class="admin_checkbox" type="checkbox" name="dbc_display_cut_paste" <?php if(get_option('dbc_display_cut_paste')): echo 'checked'; else: echo 'unchecked'; endif;?> />Display Cut Copy Button in WordPress Editor</label></p>
			</label>
		</div>
	</div>
	
	<div class="widefat bdc_panel">
		<div class="dbc_panel_head" >
			<a id="customize_login_page_toggle" class="inactive toggler" href="#">Toggle</a>
			<h3 class="dbc_title" >Customize Login Page</h3>
			<input type="submit" name="submit" value="Save Settings" class="button-primary bdc_submit" />
		</div>
		
		<div id="customize_login_page_body" class="dbc_panel" >
			<label for="">
				<span class='upload'>
					<p><label>Custom Login Logo</label></p>
					<input type='text' id='dbc_upload_input' class='regular-text text-upload' name='dbc_login_logo' value='<?php echo get_option('dbc_login_logo'); ?>'/>
					<input type='button' class='button button-upload' value='Upload'/></br>
					<?php if (get_option('dbc_login_logo')): ?><img src='<?php echo get_option('dbc_login_logo'); ?>' class='preview-upload'/><?php endif;?>
				</span>
					
				<p>Custom Message on Login Page</p>
				<textarea id='dbc_custom_login_message' name='dbc_custom_login_message' ><?php echo get_option('dbc_custom_login_message'); ?></textarea>
				
				<p>Custom Message on Registration Page</p>
				<textarea id='dbc_custom_reg_message' name='dbc_custom_reg_message' ><?php echo get_option('dbc_custom_reg_message'); ?></textarea>
				
			</label>
		</div>
	</div>
	

	</div>
	
	</form>
    
</div>