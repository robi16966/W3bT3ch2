<?php include_once 'lang/lang.php';?>
<!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="UTF-8">
<title><?php echo $lang['intranet']; ?></title>
<link rel="stylesheet" href="css1.css" type="text/css">
<link rel="stylesheet" type="text/css" href="css/styly.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="script.js"></script>

</head>

<body>
<?php include_once ('header/header.php');
include_once ('menu/menu.php');
?>

<?php echo $lang['intranet']; ?>




<?php

//.......................................................PRE PRVE $ ZALOZKY.........................................................//
/*............zalozky.............*/
echo"<h2>ZALOZKY</h2>";
echo"<ul>";
 echo" <li><a onclick=Zobraz('Kontajner_Pedagogika');>Pedagogika</a></li>";
 echo" <li><a onclick=Zobraz('Kontajner_Doktorandi');>Doktorandi</a></li>";
 echo" <li><a onclick=Zobraz('Kontajner_Publikacie');>Publikacie</a></li>";
 echo" <li><a onclick=Zobraz('Kontajner_Sluzobne_cesty');>Sluzobne cesty</a></li>";
 echo" <li><a onclick=Zobraz('Kontajner_Odkazy');>Odkazy</a></li>";
 echo" <li><a href=dochadzka.php>Dochadzka</a></li>";
 echo" <li><a onclick=Zobraz('Kontajner_Nakupy');>Nakupy</a></li>";
 echo" <li><a onclick=Zobraz('Kontajner_Rozdelenie_uloh');>Rozdelenie uloh</a></li>";
echo"</ul>";
/*............zalozky.............*/



/*............Divko pre kazdu zalozku.............*/
echo "<div class=Kontajner id=Kontajner_Pedagogika>";
echo "<table>";
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

echo "<div class=Kontajner id=Kontajner_Doktorandi>";

echo "<table>";
echo "<thead>";
echo"<th>Dokument</th>";
echo"<th>Priloha</th>";
echo "</thead>";
//..............nacitanie dokumentov z filu...............

$dir = "uploads/Kontajner_Doktorandi/";
echo $dir;
$files = scandir($dir);

foreach($files as $file) {
  
  if(!is_dir($file)){
	  
		  echo"<tr>";
	  echo"<td>";
	  echo $file;
	 echo"</td>";
	echo $file. "<br>";
	$files2 = scandir($dir.$file);
	 echo"<td>";
	foreach($files2 as $file2) {
		if(!is_dir($file2))
            echo "<a href=uploads/Kontajner_Doktorandi/".$file."/".$file2.">".$file2."</a><br><br>";	
	}
	 echo"</td>";
		  echo"</tr>";
	
	
  }
}


echo "</table>";
//..............nacitanie dokumentov z filu...............

echo "</div>";


echo "<div class=Kontajner id=Kontajner_Publikacie>";

echo "<table>";
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
//..............nacitanie dokumentov z filu...............

echo "</div>";


echo "<div class=Kontajner id=Kontajner_Sluzobne_cesty>";

echo "<table>";
echo "<thead>";
echo"<th>Dokument</th>";
echo"<th>Priloha</th>";
echo "</thead>";
//..............nacitanie dokumentov z filu...............

$dir = "uploads/Kontajner_Sluzobne_cesty/";
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
		echo "<a href=uploads/Kontajner_Sluzobne_cesty/".$file."/".$file2.">".$file2."</a><br><br>";

		
		
	}
	 echo"</td>";
		  echo"</tr>";
	
	
  }
}


echo "</table>";
//..............nacitanie dokumentov z filu...............

echo "</div>";





echo "<div class=Kontajner id=Kontajner_Nakupy>";

//..
require_once('dbcontroller.php');
			$db_handle = new DBController();
			$sql = 'SELECT * from php_interview_questions';
			$faq = $db_handle->runQuery($sql);
	 echo"<table class='tbl-qa'>";
		  echo"<thead>";
			 echo" <tr>";
				echo"<th class='table-header' width='10%'>CISLO</th>";
				echo"<th class='table-header'>TEXT</th>";
				//echo"<th class='table-header'>Answer</th>";
			  echo"</tr>";
		  echo"</thead>";
		 echo" <tbody>";
		
		  
		  
		  foreach($faq as $k=>$v) {
					//echo "($faq[$k][question])";
			 echo" <tr class='table-row'>";
					echo"<td>".($k+1)."</td>";
				echo"<td contenteditable=true onBlur=saveToDatabase(this,'question',".$faq[$k][id].") onclick=showEdit(this)>".$faq[$k][question]."</td>";
				//echo"<td contenteditable=true onBlur=saveToDatabase(this,'answer',".$faq[$k][id].") onclick=showEdit(this)>".$faq[$k][answer]."</td>";
			  echo"</tr>";
		
		}
	
		 echo" </tbody>";
		echo"</table>";
		echo "<form method='post' action='index2.php' id=add_row>";
		echo "<input type='submit' value='add' name='submit4'>";
		
		echo "</form>";
		echo "<form method='post' action='index2.php' id=delete_row>";
		echo "<input type='submit' value='remove' name='submit88'>";
		
		echo "</form>";
		
		if(isset($_POST['submit88']))
		{
			require('../config.php');
		$conn = new mysqli($CONF_DB_HOST, $CONF_DB_USER, $CONF_DB_PASS, 'prvadb');
		mysqli_set_charset($conn,"utf8");
			$sql="delete from php_interview_questions order by id desc limit 1";
				if ($conn->query($sql) === TRUE) {
		echo "<meta http-equiv='refresh' content='0'>";
		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
		}
		
		if(isset($_POST['submit4']))
		{
//$sql = "INSERT INTO nakupy (id,question,answer,row_order)VALUES (7,' ',' ',6)";

//STR_TO_DATE('1-01-2012', '%d-%m-%Y')
require('../config.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO php_interview_questions (question,answer,row_order)VALUES (' ',' ',$k+1)";
	if ($conn->query($sql) === TRUE) {
	echo "<meta http-equiv='refresh' content='0'>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}		
}
//..



echo "</div>";


echo "<div class=Kontajner id=Kontajner_Rozdelenie_uloh>";

echo "</div>";

echo "<div class=Kontajner id=Kontajner_Odkazy>";

require('../config.php');


$sql = "SELECT * FROM IDK";
	$result = $conn->query($sql);
	
	echo"<table>";
	echo "<thead>";
		echo"<th onclick='sortTable(0)'>Kategoria</th>";
			echo"<th onclick='sortTable(1)'>Odkaz</th>";
			
				
		echo "</thead>";
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
	echo"</table>";

echo "</div>";


/*............Divko pre kazdu zalozku.............*/


/*............Upload.............*/
echo "<form action='uploadO.php' method='post' enctype='multipart/form-data' id=upload_file>
    Vyber subor:
    <input type='file' name='file'>
	<br>
	Zvol kategoriu:
	<input type='text' name='kategoria' required>
    <input type='submit' value='Upload' name='submit'>
</form>
Zvol zalozku:
<select name='Kontajner_select' form='upload_file' required>
  <option>-----</option>
  <option value='Kontajner_Pedagogika'>Pedagogika</option>
  <option value='Kontajner_Doktorandi'>Doktorandi</option>
  <option value='Kontajner_Publikacie'>Publikacie</option>
  <option value='Kontajner_Sluzobne_cesty'>Sluzobne_cesty</option>
</select>";

echo "<form method='post' action='index2.php'>
    
	Pridaj Kategoriu odkazu:
	<input type='text' name='kategoria' required> <br>
	Pridaj Nazov odkazu:
	<input type='text' name='nazov' required> <br>
	Pridaj URL odkazu:
	<input type='text' name='url' required>
	<input type='hidden' name='Kontajner_select' value='Kontajner_Odkazy'>
    <input type='submit' value='Upload' name='submit2'>
	
</form>";


//deletefile
/* vygeneruj pomocou php select vsetkych suborov. podla toho ktory sa vybere sa dalej vygeneruje jeho obsah ptm pomocou ajaxu zapisuj do divka najdene ktor najdes easy*/



echo "vymaz:"."<select name='Select_delete' onchange=hop(this.value) >
  <option>-----</option>
  <option value='Kontajner_Pedagogika'>Pedagogika</option>
  <option value='Kontajner_Doktorandi'>Doktorandi</option>
  <option value='Kontajner_Publikacie'>Publikacie</option>
  <option value='Kontajner_Sluzobne_cesty'>Sluzobne_cesty</option>
  </select>";
  
  echo "<div id=cpp></div>";




if(unlink(realpath($_POST['Select_delete3'])))
{
	echo "file uspesne zmazany";
	
	
}
//deletefile

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
/*............Upload.............*/



//.......................................................PRE PRVE $ ZALOZKY.........................................................//

//.......................................................Dochadzka........................................................//


/*
echo "<table class=noselect>";
echo "<thead>";
		echo"<th onclick='sortTable(0)'>Kategoria</th>";
			echo"<th onclick='sortTable(1)'>Odkaz</th>";
			echo"<th onclick='sortTable(1)'>peokola</th>";
			
				
		echo "</thead>";

for ($i=0;$i<10;$i++)
{
	echo"<tr>";
	echo "<td id='a$i' class='target' onmouseover='paf(this.id)'>";
	echo "<a >muhehehe</a><br><br><br>";
	echo "</td>";
	echo "<td id='b$i' class='target' onmouseover='paf(this.id)'>";
	echo "<a >muhehehe</a><br><br><br>";
	echo "</td>";
	echo "<td id='c$i' class='target' onmouseover='paf(this.id)'>";
	echo "<a >muhehehe</a><br><br><br>";
	echo "</td>";
	echo"</tr>";
	
}
	


echo"</table>";
*/


//.......................................................Dochadzka........................................................//








?>
 <!--//.......................................................NAKUPy........................................................//-->



 <!--//.......................................................NAKUPy........................................................//-->

<?php include_once 'footer/footer.php';?>
</body>
</html>