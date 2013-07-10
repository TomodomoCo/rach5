<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<title><?php wp_title(''); ?></title>

	<link rel="author" href="/humans.txt">
	<link rel="stylesheet" type="text/css" href="/assets/stylesheets/style.css">

	<script type="text/javascript" src="/assets/javascripts/script.js"></script>
	<!--[if lt IE 9]>
	<script src="/assets/javascripts/ie.js"></script>
	<![endif]-->

	<?php /* WordPress head injection */
	wp_head(); ?>

	<?php /* Google Analytics */
	$urlParts = explode('.', $_SERVER['HTTP_HOST']);
	if ($urlParts[0] != 'staging') : ?>

	<script type="text/javascript">
		var _gaq = _gaq || [];

		_gaq.push(['_setAccount', 'UA-XXXXXX-XX']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script><?php endif; ?>
</head>
