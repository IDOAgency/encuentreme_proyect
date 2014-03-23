<?php

	if(get_post_meta($post->ID, 'rating', true) != '' && get_post_meta($post->ID, 'rating', true) != '0') :
	
		
		$title = __('Overall rating of ', 'btoa');
		$title .= '<span itemprop="ratingValue">'.get_post_meta($post->ID, 'rating', true).'</span>';
		if(get_post_meta($post->ID, 'rating_count', true) == 1) {
			$title .= ' based on <span itemprop="reviewCount">1</span> review.';
		} else {
			$title .= ' based on <span itemprop="reviewCount">'.get_post_meta($post->ID, 'rating_count', true).'</span> reviews.';
		}

?>

<div class="spot-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">

	<?php echo sf_get_rating_html(get_post_meta($post->ID, 'rating', true)); ?>
	
	<p><?php echo $title ?></p>

</div>
<!-- .spot-rating -->

<?php endif; ?>