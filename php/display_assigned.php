<?php

	// PHP script for the  display_assigned() function
	// This function will grab the assigned work orders and display them in the
	// proper place on the page.

	// Code to retrieve variables sent from the html
	$email = $_POST["user"];
	echo $email;

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

	$acc;
	// Query the users to see what type of user is currently logged in
	$query = "SELECT * FROM users WHERE email = '$email'";
	$result = mysql_query($query) or die('Error querying database.');

	while ($usr = mysql_fetch_assoc($result)) {
	      $acc = $usr['account_type'];
	}

	// Query and the results. Rows are stored in the result variable
	// If the user is an MA, they can only see their own assigned work orders
	if ($acc != 'MA') {
	  $query = "SELECT * FROM wo WHERE status = 'assigned'";
	} else {
	  $query = "SELECT * FROM wo WHERE status = 'assigned' AND assigned_ma ='$email'";
	}
	$result = mysql_query($query) or die('Error querying database.');

        $rows = array();
        while ($wo = mysql_fetch_assoc($result)) {
	  $rows[] = $wo;
	}
        echo json_encode($rows);

?>
