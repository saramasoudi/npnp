<?php

	// PHP script for the  login() function
	// This function will take a username and a password. It will check the database for that user
	// and password and return the type of account that is being logged into so that the website can
	// direct the user to the right landing page. If the user does not exist in the table, it will
	// return an error.

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
	$query = "SELECT username, account_type FROM users WHERE username='$name' AND password='$pass'";
	$result = mysql_query($query) or die('Error querying database.');
	
	// Change page if the user exists, otherwise stay on the login page
	if ( ! mysql_num_rows($result) == 0 ) {	

		while ($row = mysql_fetch_assoc($result)) {
			if($row['account_type'] == 'MA') {
				header("Location:../MA_home.html");	
			} else {
				header("Location:../home.html");
			}
		}
		
	
	} else {	
		echo "<script type=\"text/javascript\">
			alert(\"Invalid Login.\");
			window.history.go(-1);	
		</script>";
	}

?>

