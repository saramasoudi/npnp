<?php

	// PHP script for the  upload_wo() function
	// This function will take a new user and insert them into the database.

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
	$query = "SELECT email, account_type FROM users";
	$result = mysql_query($query) or die('Error querying database.');

//echo "<script src='../js/scripts.js'></script>";

//	echo "<p>User Email	Account Type</p>";
	//Loop over the returned rows and access information by attribute if desired
	//while ($row = mysql_fetch_assoc($result)) {
	//	echo "<div class='viewUser'>
//                        ".$row['email']."	".$row['account_type']."<button class='redirectButton' onclick='deleteUser(".$row['email'].")'>Delete?</button>
//                    </div>";
		      
//	}

        $rows = array();
        while ($row = mysql_fetch_assoc($result)) {
	    $rows[] = $row;
        }
	echo json_encode($rows);

?>
