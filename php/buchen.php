<?php
$servername = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'codrive';
		$fahrt=$_GET['fahrt'];
		$userId=intval($_COOKIE['userId']);

		$con = mysqli_connect($servername, $username, $password, $dbname);
			if (!$con) {
			die('Could not connect: ' . mysqli_error($con));
			}

		mysqli_select_db($con,"codrive");
		$con->set_charset("utf8");
	
		/*if($q=="Alles"){
			$sql="SELECT * FROM produkte";
		}
		else{
			$sql="SELECT * FROM produkte WHERE prod_kat = '".$q."'";
		}*/
		$sql="INSERT INTO buchungen (fahrt, mitfahrer) VALUES ($fahrt, $userId)";
		//$sql="SELECT * FROM fahrten";
		$result = mysqli_query($con,$sql);
?>