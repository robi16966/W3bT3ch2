<?php include_once 'lang/lang.php';?>
<!DOCTYPE HTML>
<html lang="sk">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $lang['MENU_BIO_MECH']; ?></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  #imgMot{
    margin: 2% 10% 10% 10%;
	z-index: -2;
	width: 80%;
}

</style>

</head>
<body>
<?php include_once ('header/header.php');
include_once ('menu/menu.php');
?>

<img id="imgMot" alt="Biomecharonics" src="imgAbout/biomechatronika.jpg" />


<?php include_once 'footer/footer.php';?>
</body>
</html>