<?php
	 // Code to retrieve variables sent from the html
 	$order_id = $_POST["order_id"];

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
	$query = "SELECT wo_pdf FROM wo WHERE order_id='$order_id'";
	$result = mysql_query($query) or die('Error querying database.');


	// If the user's email is in the table and their token is null, update it
	while ($row = mysql_fetch_assoc($result)) {
	      echo $row['wo_pdf'];
	}

?>

