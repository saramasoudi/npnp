// PHP script for the  login() function
// This function will take a username and a password. It will check the database for that user
// and password and return the type of account that is being logged into so that the website can
// direct the user to the right landing page. If the user does not exist in the table, it will
// return an error.

<?php

	//echo "test?";
	//print_r($_POST);

	// Code to retrieve variables sent from the html
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		 $name = $_POST["user_name"];
 		 $pass = $_POST["password"];
   	}	

	//echo $name;
	//echo $pass;

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
	echo "Connected successfully";

	// Query and the results. Rows are stored in the result variable
	$query = "SELECT first_name FROM users WHERE user_name='kdillon' AND password='pass'";
	$result = mysql_query($query) or die('Error querying database.');

	echo $result; 
	
	// Loop over the returned rows and access information by attribute if desired
	// query will only return first name
	while ($row = mysql_fetch_assoc($result)) {
		/*print_r($row);

		if ($name == $row['first_name']) {
			header("Location:home.html");
		} else {
			echo "no";
		}*/

		header("Location:home.html");
	}


?>

