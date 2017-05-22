<!DOCTYPE html>
<html lang="sk">
<head>
<title>Prihlasovanie</title>
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
 //require('login.php');
 require('../config.php');
 session_start();
if(!(empty($_SESSION['username']))){
echo "<div id=vit><h2>Vítáme Vás : ".$_SESSION["name"]."</h2><input type='button' id='admin'  class='btn btn-success' value='Zobraziť admin.' />   <input type='button' id='odhlas'  class='btn btn-warning' value='Odhlásenie' /> </div> ";
echo $CURRENT_TIMESTAMP;

}
else
    header("Location:index.php");

?>

<script>
$("#admin").on('click', function (){
    window.location.href='admin.php';
    $("#stat").css("display", "block");
    $("#hist").css("display", "block");
});
$("#odhlas").on('click', function (){
    location.replace("logout.php"); 
});
</script>

</body> </html>