<?php
function func1($data){
	
		require('config2.php');
		$conn = new mysqli($CONF_DB_HOST, $CONF_DB_USER, $CONF_DB_PASS, $CONF_DB_NAME);
		mysqli_set_charset($conn,"utf8");
		//$wow=explode(",",$data);
		
		$sql = "SELECT * FROM historia where State='$data'";
	$result = $conn->query($sql);
;

echo"<div>";
echo "<table>";

	echo "<thead>";
		echo"<th onclick='sortTable(0)'>State</th>";
			echo"<th onclick='sortTable(1)'>Place</th>";
				echo"<th onclick='sortTable(1)'>IP</th>";
			
				
		echo "</thead>";
    while($row = $result->fetch_assoc()) {
        echo"<tr>";
		echo "<td>";
		//$hop=strtolower(trim($row['Page']));
		echo $row["State"];
		echo "</td>";
		echo "<td>";
		echo $row["Place"];
		echo "</td>";
			echo "<td>";
		echo $row["IP"];
		echo "</td>";
		
		echo"</tr>";
	}


echo"</table>";
echo"</div>";
		
	
		
		 
		 
		
		

}

if (isset($_POST['callFunc1'])) {
        echo func1($_POST['callFunc1']);
    }


?>

