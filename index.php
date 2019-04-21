<?php
		if (isset($_GET['uname'])) {
				
				$uname = $_GET['uname'];
			
				$servername = 'localhost';
				$username = 'root';
				$password = '';
				$dbname = 'codrive';
				$uname=$_GET['uname'];

				$con = mysqli_connect($servername, $username, $password, $dbname);
					if (!$con) {
					die('Could not connect: ' . mysqli_error($con));
					}

				mysqli_select_db($con,"codrive");
				$con->set_charset("utf8");

	
				$sql="SELECT id from nutzer WHERE username = '$uname'";
				//$sql="SELECT * FROM fahrten";
				$result = mysqli_query($con,$sql);
				$array = mysqli_fetch_array($result);
				$cookie_name = "userId";
				/*if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<br> id: ". $row["id"]. "<br>";
					}
				} else {
					echo "0 results";
				}*/

				$con->close();



			
			
				$cookie_value = $array["id"];
				
				
				
			
			
				setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/"); // 86400 = 1 day
			
				};
		if (!isset($_GET['Abfahrtsort'])) {
			$abOrt="%";
			}
			else {
				$abOrt = "%".strval($_GET['Abfahrtsort'])."%";
				};
		if (!isset($_GET['Zielort'])) {
			$zielort="%";
			}
			else {
				$zielort = "%".strval($_GET['Zielort'])."%";
				};
		if (!isset($_GET['Abfahrtsdatum'])) {
			$abDatum="%";
			}
			else {
				$abDatum = "%".strval($_GET['Abfahrtsdatum'])."%";
				};
		if (!isset($_GET['Abfahrtszeit'])) {
			$abZeit="%";
			}
			else {
				$abZeit = "%".strval($_GET['Abfahrtszeit'])."%";
				};
		if (!isset($_GET['Personenzahl'])) {
			$anzP="%";
			}
			else {
				$anzP = "%".strval($_GET['Personenzahl'])."%";
				};
		
			

		
		
	?>


<!DOCTYPE html>



<html>
<title>DHBW CoDrive</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link src="/php/set.php">
<script src="/dhbwCoDrive/js/js.js"></script>
	
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
	
	
	
	
	
	
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

	
	
	
	
	
	
</style>
<body class="w3-light-grey">


	
	


<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-large">
  <a href="#" class="w3-bar-item w3-button w3-red w3-mobile"><i class="	fas fa-map-marker-alt w3-margin-right"></i>DHBW CoDrive</a>
  <a href="#about" class="w3-bar-item w3-button w3-mobile">Über uns</a>
  <a href="#contact" class="w3-bar-item w3-button w3-mobile">Kontakt</a>
	<a href="#register" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Registrieren</a>
  <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;" class="w3-bar-item w3-button w3-right w3-light-grey w3-mobile">Anmelden</a>
</div>


<div id="id01" class="modal">
  
  <form class="modal-content animate" action="php/login.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
	
	
	
	
	
	
	
<!-- Header -->
<header class="w3-display-container w3-content" style="max-width:1500px;">
	
	
	
	
  <img class="w3-image" src="src/hotel.jpg" alt="The Hotel" style="min-width:1000px" width="100%" height="800">
  <div class="w3-display-left w3-padding w3-col l6 m8">
    <div class="w3-container w3-red">
      <h2><i class="fas fa-map-marker-alt w3-margin-right"></i>DHBW CoDrive</h2>
    </div>
    <div class="w3-container w3-white w3-padding-16">
      <form action="index.php" method="get" >
        <div class="w3-row-padding" style="margin:0 -16px;">
          <div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-calendar-o"></i> Abfahrtsort</label>
            <input class="w3-input w3-border" type="text" placeholder="Bsp. Hafenstraße 35, Mannheim" name="Abfahrtsort" value="<?php if (isset($_GET['Abfahrtsort'])) echo $_GET['Abfahrtsort'];?>" required>
          </div>
          <div class="w3-half">
            <label><i class="fa fa-calendar-o"></i> Zielort</label>
            <input class="w3-input w3-border" type="text" placeholder="Bsp. Coblitzalle 9, Mannheim" name="Zielort" value="<?php if (isset($_GET['Zielort'])) echo $_GET['Zielort'];?>" required>
          </div>
        </div>
        <div class="w3-row-padding" style="margin:8px -16px;">
          <div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-male"></i> Abfahrtsdatum</label>
            <input class="w3-input w3-border" type="date" placeholder="DD/MM/JJJ" name="Abfahrtsdatum" value="<?php if (isset($_GET['Abfahrtsdatum'])) echo $_GET['Abfahrtsdatum'];?>" required >
          </div>
		<div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-male"></i> Abfahrtszeit</label>
            <input class="w3-input w3-border" type="time" placeholder="hh:00" name="Abfahrtszeit" value="<?php if (isset($_GET['Abfahrtszeit'])) echo $_GET['Abfahrtszeit'];?>" required>
          </div>
          <div class="w3-half">
            <label><i class="fa fa-child"></i> Anzahl an Personen</label>
          <input class="w3-input w3-border" type="number" value="1" name="Personenzahl" value="<?php if (isset($_GET['Personenzahl'])) echo $_GET['Personenzahl'];?>" min="1" max="6" required>
          </div>
        </div>
        <button class="w3-button w3-dark-grey" type="submit" onclick=search()>
			<i class="fa fa-search w3-margin-right"></i>Nach Fahrten suchen</button>
      </form>

    </div>
  </div>
</header>
	

<!-- Page content -->
<div class="w3-content" style="max-width:1532px;">

  <div class="w3-container w3-margin-top" id="rooms">
    <h3>Verfügbare Fahrten</h3>
    <p>Hier sind die für dich passenden Fahrten aufgelistet.</p>
  </div>
  
  <!-- <div class="w3-row-padding">
    <div class="w3-col m3">
      <label><i class="fa fa-calendar-o"></i> Check In</label>
      <input class="w3-input w3-border" type="text" placeholder="DD MM YYYY">
    </div>
    <div class="w3-col m3">
      <label><i class="fa fa-calendar-o"></i> Check Out</label>
      <input class="w3-input w3-border" type="text" placeholder="DD MM YYYY">
    </div>
    <div class="w3-col m2">
      <label><i class="fa fa-male"></i> Adults</label>
      <input class="w3-input w3-border" type="number" placeholder="1">
    </div>
    <div class="w3-col m2">
      <label><i class="fa fa-child"></i> Kids</label>
      <input class="w3-input w3-border" type="number" placeholder="0">
    </div>
    <div class="w3-col m2">
      <label><i class="fa fa-search"></i> Search</label>
      <button class="w3-button w3-block w3-black">Search</button>
    </div>
  </div>
-->
<div class="w3-row-padding w3-padding-16">
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
	
		/*if($q=="Alles"){
			$sql="SELECT * FROM produkte";
		}
		else{
			$sql="SELECT * FROM produkte WHERE prod_kat = '".$q."'";
		}*/
		$sql="SELECT * FROM `fahrten` WHERE `zielort` LIKE '".$zielort."' AND `abOrt` LIKE '".$abOrt."' AND `abDatum` LIKE '".$abDatum."' AND `abZeit` LIKE '".$abZeit."'"  ;
		//$sql="SELECT * FROM fahrten";
		$result = mysqli_query($con,$sql);

		/*$func="showOneProduct(this.id)";
		$class="scroll";

		while ($row = mysqli_fetch_array($result)) {
			$id=$row['id'];

			echo   "<li id=$id onclick=$func >" .
				   $row['abOrt'] .
				   "<span class=$class>" .
				   number_format($row['preis'], 2, ',', '.') . "€" .
				   "</span>" .
				   "</li>";
		};*/
		while ($row = mysqli_fetch_array($result)) {
			$id=$row['id'];
			$func="book(this.id)";
			
			echo  	'<div class="w3-third w3-margin-bottom">' .
						'<div class="w3-container w3-white">' .
							"<h3>" . $row['abOrt'] . "</h3>" .
							"<h6>" . "nach" . "</h6>" .
							"<h3>" . $row['zielort'] . "</h3>" .
							'<h6 class="w3-opacity">' .
								"Preis: ".
								number_format($row['preis'], 2, ',', '.') . "€"."</h6>".
							"<p>"."am ".$row['abDatum']." um ".$row['abZeit']."</p>" .
							"<p>"."für ".$row['anzP']." Person(en)"."</p>" .
							"<button id=$id onclick=$func " . ' class="w3-button w3-block w3-black w3-margin-bottom">'." Buchen "."</button>".
						"</div>".
					"</div>";
		};
		mysqli_close($con);
	?>
	

</div>

  <div class="w3-row-padding" id="about">
    <div class="w3-col l4 12">
      <h3>Über uns</h3>
      <h6>Our hotel is one of a kind. It is truely amazing. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</h6>
    
    </div>
    <div class="w3-col l8 12">
      <!-- Image of location/map -->
      <img src="/dhbwCoDrive/src/hotel.jpg" class="w3-image w3-greyscale" style="width:100%;">
    </div>
  </div>
  
  <div class="w3-row-padding w3-large w3-center" style="margin:32px 0">
    <div class="w3-third"><i class="fa fa-map-marker w3-text-red"></i> Hafenstraße 35, 68159 Mannheim</div>
    <div class="w3-third"><i class="fa fa-phone w3-text-red"></i>Telefon: 0176 29328020</div>
    <div class="w3-third"><i class="fa fa-envelope w3-text-red"></i> Email: info@dhbw-codrive.de</div>
  </div>

  <div class="w3-panel w3-red w3-leftbar w3-padding-32">
    <h6><i class="fa fa-info w3-deep-orange w3-padding w3-margin-right"></i> Da wir uns momentan noch in der Startphase befinden, bitten wir etwaige Unannehmlichkeiten zu entschuldigen.</h6>
  </div>

	<!--
  <div class="w3-container">
    <h3>Our Hotels</h3>
    <h6>You can find our hotels anywhere in the world:</h6>
  </div>
  
  <div class="w3-row-padding w3-padding-16 w3-text-white w3-large">
    <div class="w3-half w3-margin-bottom">
      <div class="w3-display-container">
        <img src="/w3images/cinqueterre.jpg" alt="Cinque Terre" style="width:100%">
        <span class="w3-display-bottomleft w3-padding">Cinque Terre</span>
      </div>
    </div>
    <div class="w3-half">
      <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="/w3images/newyork2.jpg" alt="New York" style="width:100%">
            <span class="w3-display-bottomleft w3-padding">New York</span>
          </div>
        </div>
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="/w3images/sanfran.jpg" alt="San Francisco" style="width:100%">
            <span class="w3-display-bottomleft w3-padding">San Francisco</span>
          </div>
        </div>
      </div>
      <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="/w3images/pisa.jpg" alt="Pisa" style="width:100%">
            <span class="w3-display-bottomleft w3-padding">Pisa</span>
          </div>
        </div>
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="/w3images/paris.jpg" alt="Paris" style="width:100%">
            <span class="w3-display-bottomleft w3-padding">Paris</span>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  <div class="w3-container w3-padding-32 w3-black w3-opacity w3-card w3-hover-opacity-off" style="margin:32px 0;">
    <h2>Verpasse keine Neuigkeiten mehr!</h2>
    <p>Abboniere unseren Newsletter</p>
    <label>E-mail</label>
    <input class="w3-input w3-border" type="text" placeholder="Deine EMail Adresse">
    <button type="button" class="w3-button w3-red w3-margin-top">Abonnieren</button>
  </div>
	
	
	<form action="php/registered.php">
  <div id="register" class="w3-container w3-padding-32 w3-black w3-opacity w3-card w3-hover-opacity-off">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

	<label for="email"><b>Matrikelnummer</b></label>
    <input class="w3-input" type="text" placeholder="Gib hier deine Matrikelnummer ein" name="matnr" required>
	  
    <label for="email"><b>Benutzername</b></label>
    <input class="w3-input" type="text" placeholder="Gib hier deinen Benutzernamen ein" name="nutzer" required>

    <label for="psw"><b>Passwort</b></label>
    <input class="w3-input" type="password" placeholder="Passwort" name="pw" required>

    <label for="psw-repeat"><b>Passwort wiederholen</b></label>
    <input class="w3-input" type="password" placeholder="Passwort wiederholen" name="pw-repeat" required>
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="w3-button w3-red w3-margin-topregisterbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>
	

  <div class="w3-container" id="contact">
    <h2>Kontakt</h2>
    <p>Bei Fragen, Wünschen, Anmerkungen stehen wir Ihnen zur Verfügung!</p>
    <i class="fa fa-map-marker w3-text-red" style="width:30px"></i> Hafenstraße 35, 68159 Mannheim<br>
    <i class="fa fa-phone w3-text-red" style="width:30px"></i> Telefon: 0176 29328020<br>
    <i class="fa fa-envelope w3-text-red" style="width:30px"> </i> Email: info@dhbw-codrive.de<br>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Nachricht" required name="Message"></p>
      <p><button class="w3-button w3-black w3-padding-large" type="submit">NACHRICHT SENDEN</button></p>
    </form>
  </div>

<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-padding-32 w3-black w3-center w3-margin-top">
  <h5>Find Us On</h5>
  <div class="w3-xlarge w3-padding-16">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

<!-- Add Google Maps -->
<script>
function myMap() {
  myCenter=new google.maps.LatLng(41.878114, -87.629798);
  var mapOptions= {
    center:myCenter,
    zoom:12, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>
