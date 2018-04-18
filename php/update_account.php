// PHP script for the  update_account() function
// This function will takes a worker id and an account type and changes that employees account type.

<?php
	
	// Code to retrieve variables sent from the html
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		 $name = $_POST["user_name"];
 		 $pass = $_POST["password"];
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
	$query = "SELECT * FROM users";
	$result = mysql_query($query) or die('Error querying database.');

	// Loop over the returned rows and access information by attribute if desired
	while ($row = mysql_fetch_assoc($result)) {
		print_r($row);
		print_r($row['first_name'])
	}


?>

