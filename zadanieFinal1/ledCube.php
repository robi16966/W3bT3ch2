<?php include_once 'lang/lang.php';?>
<!DOCTYPE HTML>
<html lang="sk">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $lang['MENU_3D_LED_CUBE']; ?></title>
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
	}
</style>

</head>
<body>
<?php include_once ('header/header.php');
include_once ('menu/menu.php');
?>

<div id="text">
<h2><?php echo $lang['MENU_3D_LED_CUBE'];?></h2>
<article>
<?php echo $lang['LED_CUBE_TEXT'];?>
</article>
</div>
<img id="mechatr" alt="Led cube" width="40%" src="imgAbout/ledKocka.png" />


<?php include_once 'footer/footer.php';?>
</body>
</html>