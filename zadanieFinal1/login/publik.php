<!DOCTYPE html>
<html lang="sk">
<head>
<title>Publikácie</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
echo"<th>Dokument</th>";
echo"<th>Priloha</th>";
echo "</thead>";
//..............nacitanie dokumentov z filu...............

$dir = "uploads/Kontajner_Publikacie/";
$files = scandir($dir);
foreach($files as $file) {
  
  if(!is_dir($file)){
	  
		  echo"<tr>";
	  echo"<td>";
	  echo $file;
	 echo"</td>";
	//echo $file. "<br>";
	$files2 = scandir($dir.$file);
	 echo"<td>";
	foreach($files2 as $file2) {
		if(!is_dir($file2))
		echo "<a href=uploads/Kontajner_Publikacie/".$file."/".$file2.">".$file2."</a><br><br>";

		
		
	}
	 echo"</td>";
		  echo"</tr>";
	
	
  }
}


echo "</table>";

//..............nacitanie dokumentov z filu...............//

echo "</div>"; 
    }
else
    header("Location:index.php");?>
 <?php include_once 'footer/footer.php';
?>
</body>
</html>