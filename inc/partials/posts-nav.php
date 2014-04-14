<section class="posts-nav">
	<?php if (!is_single()) {
		echo '<div class="next-posts">'; previous_posts_link( '&lsaquo; Newer Posts' ); echo '</div>';
		echo '<div class="prev-posts">'; next_posts_link( 'Older Posts &rsaquo;' ); echo '</div>';
	} else {
		next_post_link('<div class="next-posts">%link</div>','&lsaquo; %title');
		previous_post_link('<div class="prev-posts">%link</div>','%title &rsaquo;');
	} ?> 
</section>
