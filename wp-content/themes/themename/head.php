<head>
	<meta charset="UTF-8">
	<title><?php wp_title(''); ?></title>
	
	<?php /* Credits */ ?>
	<link rel="author" href="humans.txt">
	
	<?php /* CSS */ ?>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" media="all">
	
	<?php /* JavaScript Fun For Everyone! */ ?>
	<script type="text/javascript" src="http://cdn.vanpattenmedia.com/js/libs/LAB.min.js"></script>
	<script type="text/javascript">
		$LAB
		.script('http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js').wait()
		.script('http://cdn.vanpattenmedia.com/js/libs/jquery.placeholder.min.js').wait()
		.script('http://cdn.vanpattenmedia.com/js/libs/formalize/js/jquery.formalize.min.js').wait()
		.script('<?php bloginfo('template_directory'); ?>/js/script.js').wait();
	</script>
	
	<?php wp_head(); ?>
	
	<?php /* OpenGraph */ ?>
	<meta property="og:locale" content="en_US">
	<meta property="fb:admins" content="1366500013">
	<meta property="og:title" content="<?php wp_title(''); ?>">
	<meta property="og:url" content="<?php bloginfo('url'); ?>">
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
	<meta property="og:type" content="article">
	<meta property="og:description" content="<?php bloginfo('description'); ?>">
	<meta property="og:image" content="<?php bloginfo('template_directory'); ?>/img/opengraph.png">
	
	<?php /* Analytics */ ?>
	<script type="text/javascript">
	
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'XX-XXXXXX-XX']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
</head>