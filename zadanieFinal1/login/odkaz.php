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
 echo "<br><div style='margin: 0 10%'><form method='post' action='odkaz.php'>
    
	Pridaj kategóriu odkazu:
	<input  required type='text' name='kategoria' required>   
	Pridaj názov odkazu:
	<input required type='text' name='nazov' required>   
	Pridaj URL odkazu:
	<input required type='text' name='url' required>
	<input type='hidden' name='Kontajner_select' value='Kontajner_Odkazy'>
    <input type='submit' value='Upload' name='submit2'>
	
</form></div>";
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

function display()
{
//echo "hello ".$_POST["kategoria"];
require('../config.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO IDK (Kategoria,Nazov,Odkaz) VALUES ('$_POST[kategoria]','$_POST[nazov]','$_POST[url]')";
	if ($conn->query($sql) === TRUE) {
    echo "<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "<meta http-equiv='refresh' content='0'>";
	//header("location:javascript://history.go(-1)");
}
if(isset($_POST['submit2']))
{
   display();
}
    }
else
    header("Location:index.php");?>

 <?php include_once 'footer/footer.php';
?>
</body>
</html>
