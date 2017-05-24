<!DOCTYPE html>
<html lang="sk">
<head>
<title>Prihlasovanie</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

	echo '<div class="table-responsive">
	<h1 style="text-align:center">Rozdelenie úloh</h1>
	<table class="table">
  <thead>
    <tr>
      <th>Meno</th>
      <th>Menu</th>
      <th>Footer/ Header</th>
	  <th>Pracov.</th>
      <th>Ost. str.</th>
	  <th>Tit. str.</th>
      <th>Kont.</th>
	  <th>Videá</th>
	  <th>Grafika</th>
      <th>Výskum/ Projekty</th>
	  <th>Fotog.</th>
      <th>Intranet-prihlas.</th>
	  <th>Github</th>
      <th>Aktuality</th>
	  <th>Médiá</th>
	  <th>Databáza</th>
	  <th>Intranet-záložky 1-4</th>
	  <th>Dochád.</th>
      <th>Nákupy</th>
      <th>Zák. temp.</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Viktória Molnár</th>
      <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green;"></i></td>
	  <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green;"></i></td>
	  <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green;"></i></td>
      <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green;"></i></td>
	  <td></td>
	  <td></td>
      <td></td>
	  <td></td>
	  <td></td>
      <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td style="font-style"></td>
    </tr>
    <tr>
      <th scope="row">Silvester Trajčík</th>
      <td></td>
	  <td></td>
	  <td></td>
      <td></td>
	  <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green"></i></td>
	  <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green;"></i></td>
	  <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green;"></i></td>
	  <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green;"></i></td>
	  <td></td>
	  <td></td>
	  <td></td>
      	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
      <td></td>
    </tr>
	<tr>
      <th scope="row">Róbert Román</th>
     <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
      <td></td>
	  <td></td>
	  <td></td>
	  <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green;"></i></td>
      <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green;"></i></td>
	  <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green;"></i></td>
	  <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green;"></i></td>
	  <td></td>
	  <td></td>
	  <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green"></i></td>
	  <td></td>
	  <td></td>
      <td></td>
	  <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green;"></i></td>
    </tr>
	<tr>
      <th scope="row">Roman Krajňák</th>
      <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
      	  <td></td>
          <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
      	  <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green"></i></td>
	  <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green"></i></td>
      <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green"></i></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
    </tr>,    <tr>
      <th scope="row">Oliver Kubica</th>
      <td></td>
	  <td></td>
      <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
	  <td></td>
      	  <td></td>
	  <td></td>
	  <td></td>
      <td></td>
	  <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green"></i></td>
	  <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green"></i></td>
	  <td style="text-align:center"><i class="fa fa-check-square" style="font-size:28px;color:green"></i></td>
	  <td></td>
    </tr>
  </tbody>
</table>
	</div>';
    
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