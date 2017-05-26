<?php include_once 'lang/lang.php';?>
<!DOCTYPE HTML>
<html lang="sk">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $lang['MENU_HISTORY']; ?></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  #history{
	position: absolute;
	z-index: -1;
	text-align: left;
	padding: 40px;
	width: 50%;
}

#mechatr{
	position:absolute;
	top: 140px;
	float: left;
	}
</style>

</head>
<body>
<?php include_once ('header/header.php');
include_once ('menu/menu.php');
?>

<div id="history">
<h2>História</h2>
<article>
Ústav automobilovej mechatroniky bol zriadený k 1. júlu 2013 ako pedagogické a vedecko-výskumné pracovisko Fakulty elektrotechniky a informatiky STU v Bratislave. Zriadenie ústavu Automobilovej mechatroniky bolo logickým vyústením zámerov  vedenia Fakulty elektrotechniky a informatiky STU v Bratislave vytvoriť taký ústav, ktorý by zohľadňoval súčasné požiadavky a potreby automobilového priemyslu  na  Slovensku  s  hlavným  cieľom  pripravovať  absolventov bakalárskeho a  inžinierského štúdia pre oblasť automobilovej mechatroniky.
<br><br>
V súčasnosti Ústav automobilovej mechatroniky zabezpečuje výskum, vývoj a vzdelávanie  vo viacerých  oblastiach aplikovanej mechatroniky so špeciálnym dôrazom vo sfére  automobilovej mechatroniky  a  mechatronických  systémov  na  základe  integrácie  a synergie mechanických, elektronických,   informačných,   komunikačných   a   riadiacich   technológií   do   komplexných mechatronických systémov automobilov.
<br><br>
Ústav garantuje študijné programy vo všetkých stupňoch štúdia akreditovaných na STU v Bratislave. Pre  širokospektrálnu  oblasť  výučby  a  výskumu  zabezpečuje  integráciu  výskumníkov  a pedagógov  z  FEI STU do výskumného a výučbového procesu v jednotlivých študijných programoch.

</article>
</div>
<img id="mechatr" src="imgAbout/mechatronics.jpg" />
<br><br><br><br>

<?php include_once 'footer/footer.php';?>
</body>
</html>