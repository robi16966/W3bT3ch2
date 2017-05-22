<?php
if(isset($_POST["submit"])) {
    require('../config.php');
    $target_dir = "../albums/".$_POST['folder']."/";
    mkdir($target_dir, 0777);
    echo $_POST["datum"]."   ".$_POST["titleSk"]."   ".$_POST["titleEn"]."   ".$_POST["folder"];
    $query2 = "INSERT INTO photoGalery VALUES ('".$_POST['datum']."', '".$_POST['titleSk']."', '".$_POST['titleEn']."', '".$_POST['folder']."')"; 
echo  $query2 ;    
                $result = $conn->query($query2);
   header("Location:photo.php");
}
else
     header("Location:photo.php");
?>