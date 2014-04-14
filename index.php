<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
		<header>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p>Posted at <time class="updated" datetime="<?php the_modified_time('c'); ?>" pubdate><?php the_time(); ?> on <?php the_time(get_option('date_format')); ?></time></p>
			<p class="byline author vcard">By <span class="fn"><?php the_author(); ?></span></p>
		</header>
		<div class="entry-content">
			<?php the_content('Read More &raquo;'); ?> 
		</div>
	</article>
<?php endwhile; ?> 
	<?php get_template_part('inc/partials/posts-nav.php'); ?>
<?php endif; ?> 
