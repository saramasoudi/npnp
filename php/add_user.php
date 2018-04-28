<?php

	// PHP script for the  upload_wo() function
	// This function will take a new user and insert them into the database.

	// Code to retrieve variables sent from the html
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST["user_email"];
    $acct_type = $_POST["acct_type"];
  }

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
	// $query = "SELECT * FROM users";
	// $result = mysql_query($query) or die('Error querying database.');

	// Loop over the returned rows and access information by attribute if desired
	// while ($row = mysql_fetch_assoc($result)) {
	// 	print_r($row);
	// 	print_r($row['first_name'])
	//}

	$query = "INSERT INTO users (email, account_type) VALUES ('$user_email', '$acct_type')";
	$result = mysql_query($query) or die('Error querying database.');



?>
