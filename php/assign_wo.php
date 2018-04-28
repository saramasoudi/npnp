<?php

	// PHP script for the  assign_wo() function
     	// This function will take the user id of a maintenance assistant and the work order number.
	// The work order’s status will be changed to ‘assigned’ and the maintenance assistants id will be
	// added to the work order. If the function is passed ‘Null’, it will change the work order status
	// to unassigned.

	// Code to retrieve variables sent from the html
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		 $wo_id = $_POST["wo_id"];
 		 $ma_email = $_POST["ma_email"];
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
	$query = "UPDATE wo SET assigned_ma = $ma_email WHERE order_id = $wo_id";
	$result = mysql_query($query) or die('Error querying database.');

	// Loop over the returned rows and access information by attribute if desired
	while ($row = mysql_fetch_assoc($result)) {
		print_r($row);
		print_r($row['first_name'])
	}


?>
