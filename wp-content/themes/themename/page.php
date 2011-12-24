<?php get_header(); ?>
	
	<section id="posts">
	
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<h2><?php the_title(); ?></h2>
				<?php the_content('Read More &raquo;'); ?>
				
			</article>
			
		<?php endwhile; ?>
			
		<?php else : ?>
		
			<h2>Sorry...</h2>
			<p>No posts were found.</p>
			
		<?php endif; ?>
		
	</section>

<?php get_footer(); ?>