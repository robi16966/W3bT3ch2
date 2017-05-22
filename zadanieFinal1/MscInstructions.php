<?php include_once 'lang/lang.php';?>
<!DOCTYPE HTML>
<html lang="sk">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $lang['PAGE_TITLE']; ?></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<style>
#main{
	position: relative;
	z-index: -1;
	text-align: left;
	margin: auto;
	width: 60%;
}

table,th,td { 
  border: none; 
  height: 30px;
  text-align:left;
}

</style>
</head>
<body>
<?php include_once ('header/header.php');
include_once ('menu/menu.php');
?>

<br><br>
<div id="main">
<h2>Pokyny - Diplomové práce</h2>

<table class="table table-bordered">
<thead>
<tr><th colspan="2">Ukončovanie predmetov DP1, DP2, DP3, DZP</th></tr>
</thead>
      <tbody>
      <tr>
        <td colspan="2"><b>Diplomový projekt 1</b></td>
      </tr>
	<tr>
        <td>Zodpovedný:</td>
	<td>prof. Ing. Mikuláš Huba, PhD.</td>
      </tr>
      <tr>
        <td>Hodnotenie predmetu: </td>
        <td>klasifikovaný zápočet</td>
        </tr>
	<tr>
        <td>Štandardný čas plnenia: </td>
	<td>1. roč. inžinierskeho štúdia, letný semester</td>
      </tr>
	<tr>
        <td colspan="2">Pre získanie klasifikovaného zápočtu musí študent odovzdať technickú dokumentáciu svojmu vedúcemu práce v nim špecifikovanom rozsahu najneskôr do 20.júna daného roku. Prácu na projekte hodnotí vedúci práce.</td>
      </tr>

	<tr>
        <td colspan="2"><b>Diplomový projekt 2</b></td>
      </tr>
	<tr>
        <td>Zodpovedný:</td>
	<td>prof. Ing. Mikuláš Huba, PhD.</td>
      </tr>
      <tr>
        <td>Hodnotenie predmetu: </td>
        <td>klasifikovaný zápočet</td>
        </tr>
	<tr>
        <td>Štandardný čas plnenia: </td>
	<td>2. roč. inžinierskeho štúdia, zimný semester</td>
      </tr>
	<tr>
        <td colspan="2">Pre získanie klasifikovaného zápočtu musí študent odovzdať technickú dokumentáciu svojmu vedúcemu práce v nim špecifikovanom rozsahu najneskôr do 20.januára daného roku a obhájiť svoje priebežné výsledky pred minimálne 2-člennou komisiou (jej členom by mal byť vedúci práce). Prácu na projekte hodnotí komisia pri obhajobe, ktorá zoberie do úvahy hodnotenie vedúceho práce.</td>
      </tr>

	<tr>
        <td colspan="2"><b>Diplomový projekt 3</b></td>
      </tr>
	<tr>
        <td>Zodpovedný:</td>
	<td>prof. Ing. Mikuláš Huba, PhD.</td>
      </tr>
      <tr>
        <td>Hodnotenie predmetu: </td>
        <td>klasifikovaný zápočet</td>
        </tr>
	<tr>
        <td>Štandardný čas plnenia: </td>
	<td>2. roč. inžinierskeho štúdia, letný semester</td>
      </tr>
	<tr>
        <td colspan="2">Pre získanie klasifikovaného zápočtu musí študent do dátumu špecifikovanom v harmonograme štúdia FEI STU odovzdať diplomovú prácu:
		<ol>
			<li>v elektronickej forme do AIS </li>
			<li>v tlačenej forme v počte 2 kusy Ing. Sedlárovi? (A803)</li>
		</ol>
	alebo odovzdať technickú dokumentáciu svojmu vedúcemu práce v nim špecifikovanom rozsahu najneskôr do 20.júna daného roku. 
	Prácu na projekte hodnotí vedúci práce.
	</td>
      </tr>

	<tr>
        <td colspan="2"><b>Diplomová záverečná práca</b></td>
      </tr>
	<tr>
        <td>Zodpovedný:</td>
	<td>prof. Ing. Mikuláš Huba, PhD.</td>
      </tr>
      <tr>
        <td>Hodnotenie predmetu: </td>
        <td>skúška</td>
        </tr>
	<tr>
        <td>Štandardný čas plnenia: </td>
	<td>2. roč. inžinierskeho štúdia, letný semester</td>
      </tr>
	<tr>
        <td colspan="2">Pre získanie skúšky musí študent obhájiť tému svojej diplomovej práce pred štátnicovou komisiou, ktorá zároveň udeľuje známku za obhajobu.</td>
      </tr>
	
    </tbody>
  </table>

</div>
<br><br><br><br>
<?php include_once 'footer/footer.php';?>
</body>