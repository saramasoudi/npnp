<link rel="stylesheet" type="text/css" href="../css/columns.css">

<?php	

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
	$query = "SELECT * FROM wo WHERE status = 'unassigned'";
	$result = mysql_query($query) or die('Error querying database.');

	// Loop over the returned rows and access information by attribute if desired
	while ($wo = mysql_fetch_assoc($result)) {
		echo "<div class='workOrder'>
		     	  <div class='pdfPreview'></div>
		     	  <caption id='woID'>".$row['order_id']."</caption>
		      </div>";		
		
		//print_r($row['first_name'])
	}
	
?>
