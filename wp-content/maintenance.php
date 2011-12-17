<?php
$protocol = $_SERVER["SERVER_PROTOCOL"];
if ( 'HTTP/1.1' != $protocol && 'HTTP/1.0' != $protocol )
        $protocol = 'HTTP/1.0';
header( "$protocol 503 Service Unavailable", true, 503 );
header( 'Content-Type: text/html; charset=utf-8' );

// Redefining the bloginfo function, for forward compatibility
function bloginfo($name) {
	// Name your site
	echo 'Website Name';
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title><?php bloginfo('name'); ?> Coming Soon</title>
		<link rel="stylesheet" type="text/css" href="http://cdn.vanpattenmedia.com/css/style.css" media="all" />
		<link rel="stylesheet" href="http://cdn.vanpattenmedia.com/js/libs/formalize/css/formalize.css" />
		<script type="text/javascript">
		
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-XXXXXX-XX']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		
		</script>
	</head>
	<body>
		<div id="wrap">
			<div id="top">
				<h1><?php bloginfo('name'); ?></h1>
				<h2>Coming soon...</h2>
			</div>
			<!-- <form name="waiting_list" id="waiting_list" method="post" action="<?php bloginfo('template_directory'); ?>/action.php">
				<label for="email">Get an email when this website launches...</label>
				<div id="form">
					<input type="text" id="email" name="email" placeholder="email@address.com" />
					<input type="submit" value="Submit" id="submit" />
				</div>
				<div id="done">Thanks! We'll email you when the site is live.</div>
			</form> -->
			<h4 id="by"><a href="http://www.vanpattenmedia.com/">website by <span>Van Patten Media</span></a></h4>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js" type="text/javascript"></script>
		
		<script src="http://cdn.vanpattenmedia.com/js/libs/formalize/js/jquery.formalize.min.js"></script>
		<script src="http://cdn.vanpattenmedia.com/js/libs/jquery.placeholder.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#submit').click(function () {        
					var email = $('#email');
					var emailReg = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
					
					if (email.val() == '') {
						$('label').html("Oops, you forgot to enter your email address.").css('color','red');
						$('form').effect('shake', {times: 4, distance: 7}, 50);
						return false;
					} else if (!emailReg.test(email.val())) {
						$('label').html("That doesn't look like a real email address.").css('color','red');
						$('form').effect('shake', {times: 4, distance: 7}, 50);
						return false;
					}
					
					var data = 'email=' + email.val();
					
					$('#email').attr('disabled','true');
					$('#submit').attr('disabled','true');
					$('.loading').show();
			         
					$.ajax({
						url: "action.php",
						type: "GET",
						data: data,
						cache: false,
						success: function (html) {
							if (html==1) {
								$('#email').attr('disabled','true');
								$('#submit').attr('disabled','true');
								$('label').html('');
								$('#done').fadeIn('slow');
							} else alert('Sorry, unexpected error. Please try again later.');
						}
					});
			        return false;
			    }); 
			}); 
		</script>
	</body>
</html>
<?php die(); ?>