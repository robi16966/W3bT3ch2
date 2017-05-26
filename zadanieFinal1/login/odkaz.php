<!DOCTYPE html>
<html lang="sk">
<head>
<title>Odkazy</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
</head>
<body>
<?php include_once 'header/header.php';
include_once 'menu/menu.php';
?>
<?php
 session_start();
if(!(empty($_SESSION['username']))){
 //require('login.php');
 require('../config.php');
 echo "<div class='table-responsive Kontajner'  id=Kontajner_Pedagogika>";
echo "<table class='table'>";
	echo "<thead>";
		echo"<th onclick='sortTable(0)'>Kategoria</th>";
			echo"<th onclick='sortTable(1)'>Odkaz</th>";
			
				
		echo "</thead>";
//..............nacitanie dokumentov z filu...............

require('../config.php');


$sql = "SELECT * FROM IDK";
	$result = $conn->query($sql);


    while($row = $result->fetch_assoc()) {
        echo"<tr>";
		echo "<td>";
		//$hop=strtolower(trim($row['Page']));
		echo $row["Kategoria"];
		echo "</td>";
		echo "<td>";
		echo "<a href='$row[Odkaz]'>$row[Nazov]</a>";//$row["Odkaz"];
		echo "</td>";
		
		echo"</tr>";
	}


echo "</table>";


echo "</div>"; 
    }
else
    header("Location:index.php");?>

 <?php include_once 'footer/footer.php';
?>
</body>
</html>
