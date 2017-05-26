<?php include_once 'lang/lang.php';?>
<!DOCTYPE HTML>
<html lang="sk">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $lang['PAGE_TITLE']; ?></title>
<meta charset="utf-8">
<meta name="keywords" content="mapa google">
	<link rel="stylesheet" href="./assets/css/style.css" media="screen" type="text/css">
<!-- Latest compiled and minified CSS za tieto chyby nemozem su sucastou kniznice -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
 		window.jQuery || document.write("<script src=\"./assets/js/jquery/jquery.min.js\" type=\"text/javascript\"><\/script>");
	</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./assets/css/style.css" media="screen" type="text/css">
<link rel="stylesheet" type="text/css" href="css/styly.css">
<style>
#wrapper{
	position: relative;
	z-index: -1;
	width: 100%;
}

#googlemap{
	position: relative;
	margin: auto;
	width: 80%;
}
</style>

</head>
<body>
<?php include_once ('header/header.php');
include_once ('menu/menu.php');
?> 
<div id="wrapper">
<address>
 <font size="4">
<br>
 <?php echo $lang['ADDRESS']; ?>
<br>
<a href="mailto:katarina.kermietova@stuba.sk?Subject=New%20mail" target="_top">katarina.kermietova@stuba.sk</a><br>
<a href="tel:+421 265 429 734">+421 265 429 734</a> <br>
<a href="tel:+421 260 291 598">+421 260 291 598</a> <br><br>
</font>
</address>


		<div class="container">
			<div id="googlemap">

			</div>
			<!-- <div id="streetview"></div> -->
		</div>

	<script src="http://maps.googleapis.com/maps/api/js?API=AIzaSyCvOu-ckUI0T1fS9zphcAMP9JBEHU1A2TY&amp;libraries=geometry,places&amp;sensor=true" type="text/javascript"></script>
	<script src="./assets/js/markerwithlabel.js" type="text/javascript"></script>
	<script src="./assets/js/main.js" type="text/javascript"></script>
<br><br><br><br><br><br>
<?php include_once 'footer/footer.php';?>
</body>
</html>