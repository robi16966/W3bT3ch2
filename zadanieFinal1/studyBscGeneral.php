<?php include_once 'lang/lang.php';?>
<!DOCTYPE HTML>
<html lang="sk">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $lang['MENU_BSC']; ?></title>
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
<h2>Bakalárske štúdium</h2>
<h3>Všeobecné informácie</h3>

<table class="table table-bordered">
<thead>
<tr><th colspan="2">Harmonogram bakalárskeho štúdia</th></tr>
</thead>
      <tbody>
      <tr>
        <td colspan="2"><b>Zimný semester</b></td>
      </tr>
	<tr>
        <td>Začiatok výučby v semestri</td>
	<td>19. 09. 2016</td>
      </tr>
      <tr>
        <td>Prázdniny</td>
        <td>31. 10. 2016<br>
		18. 11. 2016<br>
		23. 12. 2016 – 01. 01. 2017
	</td>
        </tr>
	<tr>
        <td>Začiatok skúškového obdobia</td>
	<td>02. 01. 2017</td>
      </tr>
	<tr>
        <td>Ukončenie skúškového obdobia</td>
	<td>12. 02. 2017</td>
      </tr>

	<tr>
        <td colspan="2"><b>Letný semester</b></td>
      </tr>
	<tr>
        <td>Začiatok výučby v semestri</td>
	<td>13. 02. 2017</td>
      </tr>
      <tr>
        <td>Prázdniny</td>
        <td>14. 04. 2017 – 18. 04. 2017
	</td>
        </tr>
	<tr>
        <td>Začiatok skúškového obdobia</td>
	<td>22. 05. 2017</td>
      </tr>
	<tr>
        <td>Ukončenie skúškového obdobia</td>
	<td>02. 07. 2017</td>
      </tr>

	<tr>
        <td colspan="2"><b>Záver bakalárskeho štúdia</b></td>
      </tr>
	<tr>
        <td>Zadanie záverečnej práce</td>
	<td>13. 02. 2017</td>
      </tr>
      <tr>
        <td>Odovzdanie záverečnej práce</td>
        <td>19. 05. 2017</td>
        </tr>
	<tr>
        <td>Štátne skúšky bakalárskeho štúdia</td>
	<td>06. 07. 2017 – 07. 07. 2017</td>
      </tr>
	<tr>
        <td>Promócie absolventov bakalárskeho štúdia </td>
	<td>14. 09. 2016</td>
      </tr>

    </tbody>
  </table>

<br>
<p>Študijný plán 2016-2017 <a href="SP20162017b.pdf">link</a></p>
<p>Študijný poriadok <a href="studijny_poriadok.pdf">link</a></p>
<p>Klasifikačná stupnica <a href="klasifikacna_stupnica.pdf">link</a></p>

</div>
<br><br><br><br>
<?php include_once 'footer/footer.php';?>
</body>