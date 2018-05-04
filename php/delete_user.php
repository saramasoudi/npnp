<?php

	// PHP script for the delete_user() function
	// This function will delete a user from the database.

	// Code to retrieve variables sent from the html
  //if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST["user_email"];
  //}

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

  $query = "SELECT * FROM users WHERE email = '$user_email'"
  $result = mysql_query($query) or die('Error querying database.');
  if (mysql_num_rows($result) == 0) {
    echo "<script> console.log('You cannot delete an account that does not exist');</script>";
  }

	$query1 = "DELETE FROM users WHERE email = '$user_email'";
	$result1 = mysql_query($query1) or die('Error querying database.');



?>
