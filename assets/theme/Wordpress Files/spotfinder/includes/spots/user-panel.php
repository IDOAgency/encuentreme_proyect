<?php

	//////////////////////////////////////////////////
	//////////////////////////////////////////////////
	/////
	///// THIS PAGE DOES NOT DISPLAY ANYTHING BUT
	///// LOADS APPROPRIATE TEMPLATES INSTEAD.
	/////
	//////////////////////////////////////////////////
	//////////////////////////////////////////////////
	
	$current_user = wp_get_current_user();
	$template = 'user-panel'; $_error = '';
	
	
	//////////////////////////////////////////////////
	//// IF THE ACTION IS ADD-NEW OR EDIT
	//// CHECK IF WE CAN DO ANY
	//////////////////////////////////////////////////
	if(isset($_GET['action']) && $current_user) {
		
		//// IF IT'S ADD NEW
		if($_GET['action'] == 'add-new') {
			
			//// CHECKS IF PUBLIC SUBMISSIONS ARE OPEN
			//// CHECKS IF USER CAN STILL SUBMIT
			$posts_by_user = get_posts(array('post_type' => 'spot','posts_per_page' => -1,'author' => $current_user->ID,'post_status' => array('publish', 'pending', 'draft')));
			
			//// IF USER CAN ADD NEW
			if(ddp('public_submissions') == 'on') {
				
				//// IF USER HAS ENOUGH SUBMISSIONS TO ADD
				if(count((array)$posts_by_user) < ddp('pbl_count')) {
					
					$template = 'add-new';
					
				} else { $_error = new WP_Error('submission_exceed', __('You have exceeded your submission limit.', 'btoa')); }
				
			} else { $_error = new WP_Error('submission_off', __('Public submissions are now closed.', 'btoa')); }
			
		}
		
		//// IF WE ARE EDITING
		if($_GET['action'] == 'edit' && isset($_GET['id'])) {
			
			//// IF WE CAN EDIT
			if(ddp('pbl_enable_editing') == 'on') { 
			
			//// GETS THE POST BY THIS ID
			if($editing_post = get_post($_GET['id'])) {
				
				//// IF POST IS NOT IN TRASH
				if($editing_post->post_status != 'trash') {
				
					//// VERIFIES IT'S BY THE CURRENT USER
					if($editing_post->post_author == $current_user->ID) {
						
						$template = 'edit';
						
					} else { $_error = new WP_Error('submission_exceed', __('Oops! You do not have enough permissions to edit this.', 'btoa')); }
				
				} else {
					
					$_error = new WP_Error('edit_not_found', __('Sorry, we could not find what you are trying to edit.', 'btoa'));
					
				}
				
			} else { $_error = new WP_Error('edit_not_found', __('Sorry, we could not find what you are trying to edit.', 'btoa')); }
			
			} else { $_error = new WP_Error('edit_not_allowed', __('Editing is not allowed after your submission has been approved.', 'btoa')); }
			
		}
		
	}
	
	
	//// DISPLAYS USER PANEL
	include(locate_template('includes/spots/markup-'.$template.'.php'));

?>