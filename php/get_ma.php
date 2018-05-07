<?php

	// PHP script for the  get_ma() function
	// This function will return the emails of all the MA users

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
	$query = "SELECT email FROM users WHERE account_type = 'MA'";
	$result = mysql_query($query) or die('Error querying database.');

        $rows = array();
        while ($row = mysql_fetch_assoc($result)) {
	    $rows[] = $row;
        }
	echo json_encode($rows);

?>
