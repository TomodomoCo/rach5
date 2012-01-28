<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<html>
<?php get_template_part('head'); ?> 
<body <?php body_class(); ?>>
<?php get_header(); ?> 

	<section id="posts"><?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2><?php the_title(); ?></h2>
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
	
	<?php endif; ?></section>

<?php get_footer(); ?> 
</body>
</html>