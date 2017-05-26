<!DOCTYPE html>
<html lang="sk">
<head>
<title>Nákupy</title>
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
		echo "<form method='post' action='nakupy.php' id=add_row>";
		echo "<input type='submit' value='add' name='submit4'>";
		
		echo "</form>";
		echo "<form method='post' action='nakupy.php' id=delete_row>";
		echo "<input type='submit' value='remove' name='submit88'>";
		
		echo "</form>";
		
		if(isset($_POST['submit88']))
		{
			require('../config.php');
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

$sql = "INSERT INTO php_interview_questions (id,question,answer,row_order)VALUES ($k+1,' ',' ',$k+1)";
	if ($conn->query($sql) === TRUE) {
	echo "<meta http-equiv='refresh' content='0'>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}		
}
//..

    }
else
    header("Location:index.php");

echo "</div>";
 include_once 'footer/footer.php';
?>
</body>
</html>