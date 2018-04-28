<link rel="stylesheet" type="text/css" href="../css/columns.css">

<?php

	// PHP script for the  display_approved() function
	// This function will grab the approved work orders and display them in the
	// proper place on the page.

	// Code to retrieve variables sent from the html
	$user = $_POST["user"];

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
	$query = "SELECT * FROM users WHERE email = '$user'";
	$result = mysql_query($query) or die('Error querying database.');
	while ($usr = mysql_fetch_assoc($result)) {
	      $acc = Susr['account_type'];
	}

	// Query and the results. Rows are stored in the result variable
	// If the user is an MA, they can only see their own approved work orders
	if ($user != 'MA') {
	  $query = "SELECT * FROM wo WHERE status = 'approved'";
	} else {
	  $query = "SELECT * FROM wo WHERE status = 'approved' AND assigned_ma ='$user'";
	}
	$result = mysql_query($query) or die('Error querying database.');

	// Loop over the returned rows and display the wo's
	while ($wo = mysql_fetch_assoc($result)) {
		echo "<div class='workOrder'>
		     	  <div class='pdfPreview'></div>
		     	  <caption id='woID'>".$wo['order_id']."</caption></br>
			  <caption id='maID'>".$wo['assigned_ma']."</caption></br>
		      </div>";
	}

?>
