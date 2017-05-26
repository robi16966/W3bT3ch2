<?php
function func5($data){
	


	$wow=explode(",",$data);
	
	
require('config2.php');
$conn = new mysqli($CONF_DB_HOST, $CONF_DB_USER, $CONF_DB_PASS, "prvadb");
mysqli_set_charset($conn,"utf8");

echo "<button onclick=show_select()>Edit</button>";
echo "<button onclick=hide_select()>View</button>";

echo "<select name=Spn id=nepritomnost_select onchange=select_nepritomnost(this.value)>
<option value='none'>---</option>
 <option value='PN'>PN</option>
  <option value='OCR'>OCR</option>
   <option value='Dovolenka'>Dovolenka</option>
    <option value='Plan_Dovolenky'>Plan_Dovolenky</option>
	 <option value='Sluzobna_cesta'>Sluzobna_cesta</option>
	 	 <option value='DELETE'>DELETE</option>

</select>";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query = "SELECT *  FROM time_dimension WHERE year=$wow[0] AND month_name='$wow[1]'";
//echo $query;
//SELECT Meno,Den FROM Pracovnici join Zaznam_dochadzky on Zaznam_dochadzky.Id_pracovnika=Pracovnici.Id_pracovnika WHERE AIS_ID = '72188'
//SELECT * FROM Zaznam_dochadzky join Pracovnici on Zaznam_dochadzky.Id_pracovnika=Pracovnici.Id_pracovnika
				$pom=0;
				  $result = $conn->query($query);
				  echo"<table class=noselect>";
				  echo"<thead>";
				  
			
				   echo "<tr>";
				   echo"<th>NAME</th>";
				  while($row = $result->fetch_assoc()) {
						
						echo"<th>$row[day_name]</th>";
						//echo $row[day_name]."<br>";
						
					}
					 echo "</tr>";
					   $result = $conn->query($query);
					   
					     echo "<tr>";
						   echo"<th></th>";
				  while($row = $result->fetch_assoc()) {
						
						echo"<th>$row[day]</th>";
						//echo $row[day_name]."<br>";
						
					}
					 echo "</tr>";
					 echo"</thead>";
					//.....
					
					 echo "<tbody>";
				
					 $query4 = "SELECT * FROM Pracovnici";
					   $result = $conn->query($query4);
					  
					     while($row = $result->fetch_assoc()) {
							echo"<tr>";
								//echo $row[Meno];
							echo"<td>$row[Meno]</td>";
							
							  $query3 = "SELECT * FROM Zaznam_dochadzky join Pracovnici on Zaznam_dochadzky.Id_pracovnika=Pracovnici.Id_pracovnika WHERE Meno='$row[Meno]'";
							  $result3 = $conn->query($query3);
							  $query2 = "SELECT *  FROM time_dimension WHERE year='$wow[0]' AND month_name='$wow[1]'";
							  $result2 = $conn->query($query2);
							  
								//print_r($result3);
								//echo "<br>";
								//print_r($result2);
							  
					
							  while($row2 = $result2->fetch_assoc()) {
								
								 //echo $row2[db_date]."<br>";
									  while($row3 = $result3->fetch_assoc()) {
										 
											//echo $row3[Den]."<br>";
											
										  if("$row2[db_date]"=="$row3[Den]")
										  {	echo "<td class='$row3[Typ_nepritomnosti]' id='$row[Meno],$row2[db_date]'  onmouseover='paf(this.id)'>$row3[Typ_nepritomnosti]</td>";
												$pom=1;
											  break;
										  }
										  else { echo "";}
										
									  }
									  $result3 = $conn->query($query3);
									  if($pom===0)
										echo "<td id='$row[Meno],$row2[db_date]'    onmouseover='paf(this.id)' </td>";
									$pom=0;
								
							 
							  }
										echo"</tr>";
						
							  
						 }
						 
						  echo "</tbody>";
					
					
					//.....
						  echo "</table>";
						  
						  echo "<div id=errorlog></div>";
					    // $result = $conn->query($query);

		 
		
		

}

if (isset($_POST['callFunc5'])) {
        echo func5($_POST['callFunc5']);
    }
	
function func6($data){
	require('config2.php');
$conn = new mysqli($CONF_DB_HOST, $CONF_DB_USER, $CONF_DB_PASS, "prvadb");
mysqli_set_charset($conn,"utf8");
	
	$wow=explode(",",$data);
	$query = "SELECT Id_pracovnika  FROM Pracovnici WHERE Meno='$wow[0]'";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	//INSERT INTO `Zaznam_dochadzky` (`Id`, `Id_pracovnika`, `Typ_nepritomnosti`, `Den`) VALUES (NULL, '8', 'PN', '2017-05-09');
	//DELETE FROM `Zaznam_dochadzky` WHERE `Zaznam_dochadzky`.`Id` = 36
	echo $row[Id_pracovnika]."<br>";
	echo $data."<br>";
	echo $wow[0]."<br>";
	echo $wow[1]."<br>";
	echo $wow[2]."<br>";
	
	
	$sql = "INSERT INTO Zaznam_dochadzky (Id_pracovnika, Typ_nepritomnosti, Den) VALUES ('$row[Id_pracovnika]', '$wow[2]', '$wow[1]')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	
	
}
	
if (isset($_POST['callFunc6'])) {
        echo func6($_POST['callFunc6']);
}

function func7($data){
	
	require('config2.php');
$conn = new mysqli($CONF_DB_HOST, $CONF_DB_USER, $CONF_DB_PASS, "prvadb");
mysqli_set_charset($conn,"utf8");

$wow=explode(",",$data);
	$query = "SELECT Id_pracovnika  FROM Pracovnici WHERE Meno='$wow[0]'";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	//INSERT INTO `Zaznam_dochadzky` (`Id`, `Id_pracovnika`, `Typ_nepritomnosti`, `Den`) VALUES (NULL, '8', 'PN', '2017-05-09');
	//DELETE FROM `Zaznam_dochadzky` WHERE `Zaznam_dochadzky`.`Id` = 36
	//echo $row[Id_pracovnika]."<br>";
	//echo $wow[1]."<br>";
	//echo $wow[2]."<br>";
	
	$sql = "DELETE FROM Zaznam_dochadzky WHERE Id_pracovnika='$row[Id_pracovnika]' AND Den='$wow[1]'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}


	
	
}

if (isset($_POST['callFunc7'])) {
        echo func7($_POST['callFunc7']);
}
	


?>

