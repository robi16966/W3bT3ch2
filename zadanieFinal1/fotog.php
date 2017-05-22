<?php include_once 'lang/lang.php';?>
<!DOCTYPE html>
<html lang="sk">
<head>
<title>Foto</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/styly.css">
<script src="json/pictures.json"></script>
<script type="text/javascript" src="scripts/fotog_script.js"></script>

</head>
<body>
<?php include_once 'header/header.php';
include_once 'menu/menu.php';
?>

<h1><?php echo $lang['PHOTOG_TITLE'];?></h1>
<?php
if($_GET["udalost"]){
echo '<script>showImages("'.htmlspecialchars($_GET["udalost"]).'");</script>';
}
else
    echo '<script type="text/javascript">albums();</script>';
?>
<a href="fotog.php"><?php echo $lang['PHOTOG_BACK'];?></a>
<div class="site" >
<div id='row' class="row">
</div>
</div>

<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div id='modalContent' class="modal-content">

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    <a class="start" id="start"  onclick="start(1)">&#9655;</a>
    <a class="pause" onclick="start(0)">&#10073;&#10073;</a>  
  </div>
</div>
<?php include_once 'footer/footer.php';
?>
</body>

