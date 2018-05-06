"
<?php

	// PHP script for the delete_user() function
	// This function will delete a user from the database.

	$ma_email = $_POST["ma_email"];

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

	$query = "SELECT * FROM users WHERE email = '$ma_email'"
  	$result = mysql_query($query) or die('Error querying database.');
  	if (mysql_num_rows($result) == 0) {
    	   echo "<script> console.log('You cannot delete an account that does not exist');</script>";
  	}

	$query1 = "DELETE FROM users WHERE email = '$ma_email'";
	$result1 = mysql_query($query1) or die('Error querying database.');



?>
