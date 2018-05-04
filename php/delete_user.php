<?php

	// PHP script for the delete_user() function
	// This function will delete a user from the database.

	// Code to retrieve variables sent from the html

	$user_email = $_POST["user_email"];

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

	$query1 = "DELETE FROM users WHERE email = '$user_email'";
	$result1 = mysql_query($query1) or die('Error querying database.');
?>
