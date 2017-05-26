<?php include_once 'lang/lang.php';?>
<!DOCTYPE HTML>
<html lang="sk">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $lang['MENU_HOME']; ?></title>
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
	
			
					
<h2><?php echo $lang['TITLE_PAGE_GREET']; ?></h2><br><br>
				
<img src="uamt.png" alt="UAMT" style="width:934px;height:129px;">
<br><br>
<h3>
<b><?php echo $lang['TITLE_PAGE_CREATE']; ?></b>
<ul>
  <ol>Robert Román</ol>
  <ol>Viktória Molnár</ol>
  <ol>Oliver Kubica</ol>
  <ol>Roman Krajňák</ol>
  <ol>Silvester Trajcsík</ol>
</ul>
</h3>
<h1><?php echo $lang['INDEX_TITLE']; ?></h1>

<?php include_once 'footer/footer.php';?>
</body>