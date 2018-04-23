<?php
	 // Code to retrieve variables sent from the html
 	$email = $_POST["email"];
	$token = $_POST["token"];

	// Credentials for accessing the database
	$user = 'snturskey';
	$password = 'npnp';
	$server_name = 'studentdb-maria.gl';

	// Connecting to the database
	$conn = mysql_connect($server_name, $user, $password);
	$db = mysql_select_db('snturskey',$conn);	

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Query and the results. Rows are stored in the result variable
	$query = "SELECT id_token, email, account_type FROM users WHERE email='$email'";
	$result = mysql_query($query) or die('Error querying database.');

	$at = "invalid";

	// If the user's email is in the table and their token is null, update it
	while ($row = mysql_fetch_assoc($result)) {
		if ($row['id_token'] == null) {
	      		$query = "UPDATE users SET id_token='$token' WHERE email='$email'";
			$update_result = mysql_query($query) or die('Error updating database.');
	      }
		$at = $row['account_type'];
	}

	
	if ($at != 'invalid') {
		session_start();	
		$_SESSION['token'] = $token;	
	}	

	echo $at;
?>

