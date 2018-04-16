<?php
	//echo "test?";
	//print_r($_POST);

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		 $name = $_POST["user_name"];
 		 $pass = $_POST["password"];
   	}	

	//echo $name;
	//echo $pass;

	$user = 'snturskey';
	$password = 'npnp';
	$server_name = 'studentdb-maria.gl';
	 	
	$conn = mysql_connect($server_name, $user, $password);
	$db = mysql_select_db('snturskey',$conn);	

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully";

	$query = "SELECT first_name FROM users WHERE user_name='kdillon' AND password='pass'";
	$result = mysql_query($query) or die('Error querying database.');

	echo $result; 

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

