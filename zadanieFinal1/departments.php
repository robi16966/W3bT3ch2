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

</head>
<body>
<?php include_once ('header/header.php');
include_once ('menu/menu.php');
?>

<p><a href="oamm.php">Oddelenie aplikovanej mechaniky a mechatroniky (OAMM)</a></p>
<p><a href="oikr.php">Oddelenie informačných, komunikačných a riadiacich systémov (OIKR)</a></p>
<p><a href="oemp.php">Oddelenie elektroniky, mikropočítačov a PLC systémov (OEMP)</a></p>
<p><a href="oeap.php">Oddelenie E-mobility, automatizácie a pohonov (OEAP)</a></p>

<?php include_once 'footer/footer.php';?>
</body>
</html>