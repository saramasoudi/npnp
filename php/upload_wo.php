<?php
	
	ini_set('display_errors',1);
	error_reporting(E_ALL);

	print_r($GLOBALS);

	// PHP script for the  upload_wo() function
	// This function will take a new work order and insert it into the database.

	// Code to retrieve variables sent from the html
	$pdf_wo = $_POST["pdf_wo"];
 	$wo_id = $_POST["wo_id"];		
	//$wo_id = 9;

	
	$pdf_wo = json_encode($pdf_wo);
	
	echo "<script>console.log('file count=', count($_FILES),'\n');</script>";

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

	$query = "INSERT INTO wo (order_id, wo_pdf) VALUES ('$wo_id', '$pdf_wo')";
	$result = mysql_query($query) or die('Error querying database.');
	
	if (mysql_num_rows($result) == 0) {
		echo "false";
	} else {
		echo "true";
	}
	
?>

