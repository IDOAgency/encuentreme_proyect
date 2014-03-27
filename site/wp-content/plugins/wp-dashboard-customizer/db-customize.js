jQuery(document).ready(function(){

	jQuery('.dbc_panel_head a').click(
		function(){jQuery(this).parent().next().slideToggle();}
	);

	
	jQuery('#customize_dashbord_toggle').toggle(
		function(){jQuery(this).attr('class','active');},
		function(){jQuery(this).attr('class','inactive');}
	);
	
	jQuery('#customize_admin_bar_toggle').toggle(
		function(){jQuery(this).attr('class','active');},
		function(){jQuery(this).attr('class','inactive');}
	);
	
	
	jQuery('#customize_user_permission_toggle').toggle(
		function(){jQuery(this).attr('class','active');},
		function(){jQuery(this).attr('class','inactive');}
	);
	
	jQuery('#customize_login_page_toggle').toggle(
		function(){jQuery(this).attr('class','active');},
		function(){jQuery(this).attr('class','inactive');}
	);	

	
});

