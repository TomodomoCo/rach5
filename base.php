<?php $base = rach5_template_base(); ?><!DOCTYPE html>
<!--[if lte IE 7 ]> <html lang="en" class="no-js ie-no"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<?php get_template_part('head'); ?>
<body <?php body_class(); ?>>
<?php get_header( $base ); ?>

	<section id="content">
		<?php include rach5_template_path(); ?>
	</section>

<?php get_footer( $base ); ?>
</body>
</html>
