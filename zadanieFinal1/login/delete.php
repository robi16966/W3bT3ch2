<?php
function func2($data){
	
	//echo $data."<br>";
	$files = scandir($data);
	echo "<form method='post' action='index.php' id=delete_file>";
	echo "vymaz:"."<select name='Select_delete3'>";
	   echo "<option>-----</option>";
	foreach($files as $file) {
	
	  if(!is_dir($file)){
	$pom=realpath($file);
	echo $pom;
  echo "<option value=$data/$file>$file</option>";
  }
    }
    echo "<input type='submit' value='Delete' name='submit2'>";
	 echo "</select>";
	echo "</form>";
 
 if(isset($_POST['submit2']))
{
 //unlink("/home/xkubicao/public_html/SEMESTRALKA/uploads/Kontajner_Pedagogika/lolofon/72188_navrh_databazy.pdf");
  
}
}

if (isset($_POST['callFunc2'])) {
    echo func2($_POST['callFunc2']);
    }


function func1($data){

	//echo $data;
	
$dir = "uploads/"."$data"."/";
$files = scandir($dir);


//echo "<form method='post' action='delete.php' id=delete_file>";

echo "vymaz:"."<select  onchange=hop2(this.value) >";
  echo "<option>-----</option>";
foreach($files as $file) {
	
	  if(!is_dir($file)){
	
  echo "<option value=$dir$file>$file</option>";
  
	  }
	
	
}
 echo "</select>";
// echo "<input type='submit' value='Delete' name='submit'>";
//echo "</form>";
}

if (isset($_POST['callFunc1'])) {
    echo func1($_POST['callFunc1']);
    }


?>

