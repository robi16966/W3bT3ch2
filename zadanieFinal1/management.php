<?php include_once 'lang/lang.php';?>
<!DOCTYPE HTML>
<html lang="sk">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $lang['MENU_MANAGEMENT']; ?></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<?php include_once ('header/header.php');
include_once ('menu/menu.php');
?>

<style>

h2{
	text-align: center;
	margin: 15px;
}

h3{
	text-align: center;
	padding: 15px;
}

#management, .departments{
	position: relative;
	z-index: -1;
	width: 60%;
	margin: auto;
	text-align: left;
	background-color: white;
	border-radius: 2px;
	
}

table,th,td { 
  border: none; 
  height: 30px;
  text-align:left;
}
</style>

<br><br>
<h2>Vedenie ústavu</h2>
<div id="management">
	<table class="table table-bordered">
<thead>
	<tr>
	   <th>Funkcia</th><th>Meno</th>
	</tr>
</thead>
<tbody>
<tr><td>Riaditeľ ústavu</td><td>prof. Ing. Mikuláš Huba, PhD.</td></tr>
<tr><td>Zástupca riaditeľa ústavu pre vedeckú činnosť</td><td>prof. Ing. Justín Murín, DrSc.</td></tr>
<tr><td>Zástupca riaditeľa ústavu pre rozvoj ústavu</td><td>Zástupca riaditeľa ústavu pre rozvoj ústavu</td></tr>
<tr><td>Zástupca riaditeľa ústavu pre pedagogickú činnosť</td><td>doc. Ing. Katarína Žáková, PhD.</td></tr>
 
</tbody>
</table>
</div>

<br><br>
<h2>ODDELENIA ÚSTAVU AUTOMOBILOVEJ MECHATRONIKY</h2>
<div class="departments">
	<table class="table table-bordered">
<thead>
	<tr><h3>Oddelenie aplikovanej mechaniky a mechatroniky (OAMM)</h3></tr>
	<tr>
	   <th>Funkcia</th><th>Meno</th>
	</tr>
</thead>
<tbody>
<tr><td>Vedúci:</td><td>prof. Ing. Justín Murín, DrSc.</td></tr>
<tr><td>Zástupca: </td><td>doc. Ing. Vladimír Kutiš, PhD.</td></tr> 
</tbody>
</table>
</div>

<div class="departments">
	<table class="table table-bordered">
<thead>
	<tr><h3>Oddelenie informačných, komunikačných a riadiacich systémov (OIKR)</h3></tr>
	<tr>
	   <th>Funkcia</th><th>Meno</th>
	</tr>
</thead>
<tbody>
<tr><td>Vedúci:</td><td>doc. Ing. Danica Rosinová, PhD.</td></tr>
<tr><td>Zástupca: </td><td>doc. Ing. Katarína Žáková, PhD.</td></tr> 
</tbody>
</table>
</div>

<div class="departments">
	<table class="table table-bordered">
<thead>
	<tr><h3>Oddelenie elektroniky, mikropočítačov a PLC systémov (OEMP)</h3></tr>
	<tr>
	   <th>Funkcia</th><th>Meno</th>
	</tr>
</thead>
<tbody>
<tr><td>Vedúci:</td><td>prof. Ing. Štefan Kozák, PhD.</td></tr>
<tr><td>Zástupca: </td><td>Ing. Richard Balogh, PhD.</td></tr> 
</tbody>
</table>
</div>

<div class="departments">
	<table class="table table-bordered">
<thead>
	<tr><h3>Oddelenie E-mobility, automatizácie a pohonov (OEAP)</h3></tr>
	<tr>
	   <th>Funkcia</th><th>Meno</th>
	</tr>
</thead>
<tbody>
<tr><td>Vedúci:</td><td>prof. Ing. Mikuláš Huba, PhD.</td></tr>
<tr><td>Zástupca: </td><td>prof. Ing. Viktor Ferencey, CSc.</td></tr> 
</tbody>
</table>
</div>
<br>
<p>Organizačný poriadok Ústavu automobilovej mechatroniky <a href="organizacny_poriadok.pdf">link</a></p>
<br><br><br><br><br>
<?php include_once 'footer/footer.php';?>
</body>
</html>