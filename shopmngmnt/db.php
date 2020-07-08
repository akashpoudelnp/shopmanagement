<?php
session_start();
?>
<?php
    $servername ="localhost";
	$username = "root";
	$password = "";
	$dbname    = "shop";
	//createconnection
	$conn = new mysqli($servername, $username, $password, $dbname);
	//checkconnection
	if ($conn->connect_error) {
		die("Connection Error 420" . $conn->connect_error);
	
	}
	$shopset=0;
			if($shopset==0)
			{
				$shp = $conn->query("SELECT * FROM `shop_details` WHERE `shop_set`='1'");
				if($shp->num_rows>0)
						{
							$shpdet = $shp->fetch_assoc();
							$shopset=true;
							$shop_main_name=$shpdet['shopname'];
							$shop_main_color=$shpdet['shop_color'];
						}

				
				
			}

    
	$logged=false;
	if(!empty($_SESSION['login_true'])){
        $logged=true;
        $nam = $_SESSION['username'];
		// check from database
		$usr = $conn->query("SELECT * FROM `userinfo` WHERE `username`='$nam'");
		$usrinfo = $usr->fetch_assoc();
		$menam=$usrinfo['name'];
		$uuid=$usrinfo['uid'];
   
    }
    
    ?>