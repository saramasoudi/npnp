<!DOCTYPE html>
<html>

<?php
	echo "test?";

	$user = 'snturskey';
	$password = 'npnp';
	$server_name = 'studentdb-maria.gl';
	 	
	$conn = mysqli_connect($server_name, $user, $password);
	
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully";
?>


<head>
	<link rel="stylesheet" type="text/css" href="styles.css">

	<script>
		function login() {
			var user_name = document.getElementById("user_name");
			var password = document.getElementById("password");
			//alert("Logging in..."); 
			window.location.href = 'home.html';
		}
		function noAccount() {
			alert("That sucks");
		}
	</script>
	
</head>

<body style="text-align:center">
	<div id="loginBox">
		<h1>Welcome to the UMBC Facilities MAPS</h1>
		<span style="padding:5px;">
			User Name: <input type="text" id="user_name"></input></br></br>
			Password: <input type="text" id="password"></input></br></br>
			<button class="redirectButton" onclick="login()">Login</button>
		</span>
	</div>

	<p onclick="noAccount()">Don't already have an account?</p>
</body>

</html>
