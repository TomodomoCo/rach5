<?php get_header(); ?>
	
	<section id="posts">
	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<p class="info"><?php the_time(); ?> by <?php the_author(); ?></p>
				<?php the_content('Read More &raquo;'); ?>
				
			</article>
			
			<?php endwhile; ?>
			
			<section class="posts-nav">
				<span class="next-posts"><?php next_posts_link( 'Older Posts' ) ?></span>
				<span class="previous-posts"><?php previous_posts_link( 'Newer Posts' ) ?></span>
			</section>
			
		<?php else : ?>
		
			<h2>Sorry...</h2>
			<p>No posts were found.</p>
			
		<?php endif; ?>
		
	</section>

<?php get_footer(); ?>