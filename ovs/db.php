
<?php
	// variable declaration
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname    = "ovs";
	//createconnection
	$conn = new mysqli($servername, $username, $password, $dbname);
	//checkconnection
	if ($conn->connect_error) {
		die("Connection Error 420" . $conn->connect_error);
	
	}
	
	$logged=false;
	if(!empty($_SESSION['login_true'])){
		$logged=true;
	}
	
	
?>