<!DOCTYPE html>

<html>
<title>DHBW CoDrive</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
</style>
<body class="w3-light-grey">
	<?php
	
		$servername = 'localhost';
		$username = 'root';
		$password = '';
		$dbname = 'codrive';
		

		$con = mysqli_connect($servername, $username, $password, $dbname);
			if (!$con) {
			die('Could not connect: ' . mysqli_error($con));
			}

		mysqli_select_db($con,"codrive");
		$con->set_charset("utf8");
		$uname=$_GET['uname'];
		$password=$_GET['psw'];

		$sql="select * from nutzer where username='".$uname."'AND pw='".$password."' limit 1";

		$result=mysqli_query($con,$sql);

		if(mysqli_num_rows($result)==1){
			$aus= "Sie wurden erfolgreich eingeloggt";
			$sql="SELECT id from nutzer WHERE username = '$uname'";

				$result = mysqli_query($con,$sql);
				$array = mysqli_fetch_array($result);
				$cookie_name = "userId";
				$con->close();
				$cookie_value = $array["id"];	
				setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/"); // 86400 = 1 day
			//exit();
		}
		else{
			$aus= "Ihr Anmeldename oder Passwort waren leider fehlerhaft";
			//exit();
		}
?>
	
	<div class="w3-container">
		<div class="w3-panel w3-red w3-leftbar w3-padding-32">
    		<h6><i class="fa fa-info w3-deep-orange w3-padding w3-margin-right"></i> <?php echo $aus ?> </h6>
  		</div>
		<a href="/dhbwCoDrive/index.php"class="w3-button w3-red">zurück</a>
	</div>
	

	
	</body>
</html>

