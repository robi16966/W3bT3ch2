<!DOCTYPE html>
<html lang="sk">
<head>
<meta charset="UTF-8">
<title>First_Task</title>
<link rel="stylesheet" href="css1.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="script.js"></script>

</head>

<body>





<?php

echo "<form method='post' action='dochadzka.php'>
    
	Login:
	<input type='text' name='login' required> <br>
	HESLO:
	<input type='text' name='pw' required> <br>
	
    <input type='submit' value='Upload' name='submit2'>
	
</form>";

function prihlasenie()
{
echo "<div id=Kontajner_Dochadzka>";

$adServer = "ldap.stuba.sk"; 
		$port= "389"; 
		$ldap = ldap_connect($adServer,$port); 
		$login = $_POST[login]; 
		$password = $_POST[pw]; 
		$ldaprdn = 'uid='.$login.',ou=People,DC=stuba,DC=sk'; 
		
		ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3); 
		$bind = ldap_bind($ldap, $ldaprdn, $password); 
		
		$date = date("Y-m-d h:i");
		
		if ($bind) { 
		
		 echo "Bind successful!";
	  $ldapFilter = array("uid", "userPassword", "employeetype", "uisid", "cn", "sn", "givenname");
	 $ldapSearchResult = @ldap_search($ldap, $ldaprdn, 'uid='.$login, $ldapFilter);
	 $entries = ldap_get_entries($ldap, $ldapSearchResult);

	echo "Vytaj ".$entries[0][cn][0]."<br>";
	echo "id= ".$entries[0][uisid][0];
	$mmeno=$entries[0][cn][0];
	$id2=$entries[0][uisid][0];
	
	require('config2.php');
$conn = new mysqli($CONF_DB_HOST, $CONF_DB_USER, $CONF_DB_PASS, "prvadb");
mysqli_set_charset($conn,"utf8");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



		$query = "SELECT * FROM Pracovnici WHERE Meno='".$entries[0][cn][0]."'";
                $result = $conn->query($query);
                if ($result->num_rows < 1){
                    $sql= "INSERT INTO Pracovnici (Meno,AIS_ID) VALUES ('$mmeno',$id2)";
						if ($conn->query($sql) === TRUE) {
					echo "<br>";
				} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
					}
                }
				
				
				
				
				
	//echo "<form method='post' id=kalendar action='dochadzka.php' target=votar> ";
    
				  $query = "SELECT DISTINCT year  FROM time_dimension WHERE year>= 2000 AND year <= 2024";
				  $result = $conn->query($query);
				  echo "<select name='kalendar_rok' onchange=set_rok(this.value);zobraz_kalendar($id2)>";
				  echo "<option>-----</option>";
				  while($row = $result->fetch_assoc()) {
					  echo $row[year]."<br>";
					  echo "<option value=$row[year]>$row[year]</option>";
				  }
				   echo "</select>";
				   echo "<br>";
				   $query = "SELECT DISTINCT month_name  FROM time_dimension";
				   $result = $conn->query($query);
				   
				   echo "<select name='kalendar_mesiac' onchange=set_mesiac(this.value);zobraz_kalendar($id2)>";
				 echo "<option>-----</option>";
				  while($row = $result->fetch_assoc()) {
					  echo $row[month_name]."<br>";
					   echo "<option value=$row[month_name]>$row[month_name]</option>";
				  }
				   echo "</select>";
	
					
					echo "<div id=kalendar1></div>";

}

echo "</div>";
}



if(isset($_POST['submit2']))
{
   prihlasenie();
}
?>



</body>
</html>