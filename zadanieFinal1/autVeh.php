<?php include_once 'lang/lang.php';?>
<!DOCTYPE HTML>
<html lang="sk">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $lang['MENU_AUT_VEH']; ?></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  #text{
	position: absolute;
	z-index: -1;
	text-align: left;
	padding: 40px;
	width: 50%;
}

#mechatr{
	position:absolute;
	margin: 3%;
	float: left;
    z-index: -2;
	}
</style>

</head>
<body>
<?php include_once ('header/header.php');
include_once ('menu/menu.php');
?>

<div id="text">
<h2><?php echo $lang['MENU_AUT_VEH'];?></h2>
<article>
<h4>Technické údaje:</h4>
<ul>
  <li>Hmotnosť: 12,5kg</li>
  <li>Rozmery (d x š x v): 614 x 495 x 269 mm</li>
  <li>Spôsob ovládania: Diaľkové ovlá­danie, riadené mikroprocesorom</li>
  <li>Pohon: 6×6, každé koleso samostatne riadené</li>
  <li>BLDC elektromotorom</li>
  <li>Celkový výkon elektromotorov: 6x 175W</li>
  <li>Napájanie motorov: 6x DC/​AC menič</li>
  <li>Zdroj el. prúdu: 4x Li-​Pol akumulátory</li>
  <li>Celková kapacita akumulátorov: 13,2 Ah</li>
</ul>  
</article>
</div>
<img id="mechatr" alt="Autonomous vehicle" width="35%" src="imgAbout/eleVeh.jpg" />


<?php include_once 'footer/footer.php';?>
</body>
</html>