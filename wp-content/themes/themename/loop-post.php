<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<p>Posted at <time class="updated" datetime="<?php the_modified_time('c'); ?>" pubdate><?php the_time(); ?> on <?php the_time(get_option('date_format')); ?></time></p>
				<p class="byline author vcard">By <span class="fn"><?php the_author(); ?></span></p>
			</header>
			<div class="entry-content">
				<?php the_content('Read More &raquo;'); ?> 
			</div>
		</article><?php endwhile; ?> 
		
		<section class="posts-nav">
			<?php if (is_single()) {
				echo '<div class="prev-posts">'; next_posts_link( '&laquo; Older Posts' ); echo '</div>';
				echo '<div class="next-posts">'; previous_posts_link( 'Newer Posts &raquo;' ); echo '</div>';
			} else {
				next_post_link('<div class="next-posts">%link</div>','%title &raquo;');
				previous_post_link('<div class="prev-posts">%link</div>','&laquo; %title');
			} ?>
		</section>
	<?php else : ?> 
		<h2>Sorry...</h2>
		<p>No posts were found.</p>
	<?php endif; ?>