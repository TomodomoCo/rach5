<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<?php get_template_part('head'); ?> 
<body <?php body_class(); ?>>
<?php get_header(); ?> 
	
	<section id="content">
		<?php
		
		if ( is_front_page() ) {
			get_template_part('frontpage');
		} elseif ( is_page() ) {
			get_template_part('loop', 'page');
		} else {
			get_template_part('loop', 'post');
		}
		
		?> 
	</section>

<?php get_footer(); ?>
</body>
</html>