<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>

</style>
</head>

<body>
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
$sql="SELECT * FROM fahrten";
$result = mysqli_query($con,$sql);

$func="showOneProduct(this.id)";
$class="scroll";

while ($row = mysqli_fetch_array($result)) {
    $id=$row['id'];
    
    echo   "<li id=$id onclick=$func >" .
           $row['abOrt'] .
           "<span class=$class>" .
           number_format($row['preis'], 2, ',', '.') . "€" .
           "</span>" .
           "</li>";
}

mysqli_close($con);
?>

</body>
</html>