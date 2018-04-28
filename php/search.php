<?php

	// PHP script for the  search() function
	// This function will take a variety of parameters and constraints and return the work orders that
	// satisfy those constraints. Constraints include, work order status, upload date, completed date,
	// and assigned maintenance assistant.

	// Code to retrieve variables sent from the html
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$unassigned = $_POST["unassigned"];
		$assigned = $_POST["assigned"];
		$submitted = $_POST["submitted"];
		$approved = $_POST["approved"];
		$ma_email = $_POST["ma_email"];
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

	// if no fields are selected
	if ($unassigned == 'False' && $assigned == 'False' && $submitted == 'False' && $approved == 'False' && $ma_email == NULL && $wo_id == NULL) {
		$query = "SELECT * FROM wo";
		$result = mysql_query($query) or die('Error querying database.');
	}

	// if WO ID is selected
	else if ($wo_id != NULL) {
		$query = "SELECT * FROM wo WHERE order_id = '$wo_id'";
		$result = mysql_query($query) or die('Error querying database.');
	}

	// check which other fields were selected
	else {
		if ($unassigned == 'True') {
			$query1 = "SELECT * FROM wo WHERE status = 'unassigned'";
			if ($ma_email != 	NULL) {
				$query1 .= " AND assigned_ma = '$ma_email'"
			}
			$result1 = mysql_query($query1) or die('Error querying database.');
		}
		if ($assigned == 'True') {
			$query2 = "SELECT * FROM wo WHERE status = 'assigned'";
			if ($ma_email != 	NULL) {
				$query2 .= " AND assigned_ma = '$ma_email'"
			}
			$result2 = mysql_query($query2) or die('Error querying database.');
		}
		if ($submitted == 'True') {
			$query3 = "SELECT * FROM wo WHERE status = 'submitted'";
			if ($ma_email != 	NULL) {
				$query3 .= " AND assigned_ma = '$ma_email'"
			}
			$result3 = mysql_query($query3) or die('Error querying database.');
		}
		if ($approved == 'True') {
			$query4 = "SELECT * FROM wo WHERE status = 'approved'";
			if ($ma_email != 	NULL) {
				$query4 .= " AND assigned_ma = '$ma_email'"
			}
			$result4 = mysql_query($query4) or die('Error querying database.');
		}
	}


	// Loop over the returned rows and access information by attribute if desired
	while ($row = mysql_fetch_assoc($result)) {
		print_r($row);
		print_r($row['first_name'])
	}


?>
