<div class="submission-field-text">

	<?php
	
		//// LETS GET THE FRONT END MARKUP
		$markup = str_replace('%%', get_post_meta($post_id, '_sf_submission_field_'.get_the_ID(), true), htmlspecialchars_decode(get_post_meta(get_the_ID(), 'markup', true)));
		
		//// REPLACES LINKS
		$text = preg_replace('#(script|about|applet|activex|chrome):#is', "\\1:", $markup);
		
		$ret = ' ' . $text;
		$ret = preg_replace("#(^|[\n ])([\w]+?://[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"\\2\" target=\"_blank\" rel=\"nofollow\">\\2</a>", $ret);
		$ret = preg_replace("#(^|[\n ])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is", "\\1<a href=\"http://\\2\" target=\"_blank\" rel=\"nofollow\">\\2</a>", $ret);
		$ret = preg_replace("#(^|[\n ])([a-z0-9&\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i", "\\1<a href=\"mailto:\\2@\\3\">\\2@\\3</a>", $ret);
		$ret = substr($ret, 1);
		
		echo $ret;
	
	?>

</div>
<!-- .submission-field-text -->