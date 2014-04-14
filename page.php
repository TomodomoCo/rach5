<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<h2 class="entry-title"><?php the_title(); ?></h2>
		</header>
		<div class="entry-content">
			<?php the_content('Read More &raquo;'); ?> 
		</div>
	</article>
<?php endwhile; endif; ?>
