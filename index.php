<?php
	session_start();
	
	// if the session exists 
	if ( isset($_SESSION) ) { 

	} 

?>

<html>
	<link rel="stylesheet" type="text/css" href="css/styles.css">

	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content="87351024214-6uo99d69pt45k5vb396ablsqag059g8k.apps.googleusercontent.com">

	<script src="js/scripts.js"></script>


	<body style="margin:0;">
		<div id="mainBody">
			<iframe src="index.html" id="mainFrame"></iframe>
		</div>
		<div class="g-signin2" data-onsuccess="onSignIn"></div>
	</body>
</html>
