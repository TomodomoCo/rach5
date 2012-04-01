<head>
	<meta charset="UTF-8">
	<title><?php wp_title(''); ?></title>
	
	<?php /* humans.txt credits */
	?><link rel="author" href="/humans.txt">
	
	<?php /* CSS */
	
	// Global Stylesheet
	stylesheet_link_tag('/global.css', true, 0, true);
		
	// Formalize
	stylesheet_link_tag('http://cdn.vanpattenmedia.com/js/libs/formalize/css/formalize.css', false, 1, false); ?>
	
	<?php /* Mobile viewport lock */
	?><meta name="viewport" content="width=device-width; initial-scale=1.0">
	
	<?php /* HTML5 Shiv for <IE9 */
	?><!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php /* JavaScript */
	?><script type="text/javascript" src="http://cdn.vanpattenmedia.com/js/libs/LAB.min.js"></script>
	<script type="text/javascript">
		$LAB
		.script('http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js').wait()
		.script('http://cdn.vanpattenmedia.com/js/libs/formalize/js/jquery.formalize.min.js').wait()
		.script('<?php bloginfo('template_directory'); ?>/js/script.js').wait();
	</script>
	
	<?php /* WordPress head injection */
	wp_head(); ?>
	
	<?php /* Google Analytics */
	$urlParts = explode('.', $_SERVER['HTTP_HOST']);
	if ($urlParts[0] != 'staging') : ?>
	
	<script type="text/javascript">
		var _gaq = _gaq || [];
		
		_gaq.push(['_setAccount', 'UA-575101-19']);
		_gaq.push(['_setDomainName', 'vanpattenmedia.com']);
		_gaq.push(['_trackPageview']);
		
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script><?php endif; ?> 
</head>