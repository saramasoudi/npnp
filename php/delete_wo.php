<?php

	// PHP script for the  delete_wo() function
	// This function will remove an entry in the work order table.

	// Code to retrieve variables sent from the html
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		 $wo_id = $_POST["wo_id"];
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
	$query = "DELETE FROM wo WHERE order_id = $wo_id";
 
	$result = mysql_query($query) or die('Error querying database.');

?>
