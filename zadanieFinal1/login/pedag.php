<!DOCTYPE html>
<html lang="sk">
<head>
<title>Admin</title>
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
echo"<th>Dokument</th>";
echo"<th>Priloha</th>";
echo "</thead>";
//..............nacitanie dokumentov z filu...............

$dir = "uploads/Kontajner_Pedagogika/";
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
		echo "<a href=uploads/Kontajner_Pedagogika/".$file."/".$file2.">".$file2."</a><br><br>";

		
		
	}
	 echo"</td>";
		  echo"</tr>";
	
	
  }
}


echo "</table>";

//..............nacitanie dokumentov z filu...............//

echo "</div>"; 

echo "</div>"; 
echo "<div style='margin: 0 0 0 40%'><h4>Pridať dokument:</h4><br><form action='uploadO.php' method='post' enctype='multipart/form-data' id=upload_file>
    Vyber subor: <input type='file' name='file'>  Zvoľ dokument:  <input type='text' name='kategoria' required>  <input type='submit' value='Upload' name='submit'>
</form>
Zvoľ záložku:
<select name='Kontajner_select' form='upload_file' required>
  <option selected value='Kontajner_Pedagogika'>Pedagogika</option>
</select></div>";
echo "<div style='margin: 0 0 5% 40%'><br>Vymazať: "."<select name='Select_delete' onchange=hop(this.value) >
  <option>-----</option>
  <option value='Kontajner_Pedagogika'>Pedagogika</option>
  </select>";
  
  echo "<div id=cpp></div></div>";
    }else
    header("Location:index.php");?>
 <?php include_once 'footer/footer.php';
?>
</body>
</html>