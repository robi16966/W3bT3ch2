<!DOCTYPE html>
<html lang="sk">
<head>
<title>Foto</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<?php include_once 'header/header.php';
include_once 'menu/menu.php';
require('../config.php');
?>
<?php
 //require('login.php');
 require('../config.php');
 session_start();
if(!(empty($_SESSION['username'])) && ($_SESSION['admin']==true || $_SESSION['reporter']==true)){ 
echo"<h1>Pridať fotky alebo vytvoriť nový album</h1>";
$dir    = '../albums';
$files1 = scandir($dir);
$files2 = scandir($dir, 1);

echo '
    Chcete vytvoriť nový album?

<input type="radio" value="Ano" name="album"  onclick="kontrolProg(this.value)"> Áno
<input type="radio" value="Nie" checked name="album"  onclick="kontrolProg(this.value)"> Nie 
<div id="newAlb"> 
<form action="newAlbum.php" class="form-vertical well" method="post" enctype="multipart/form-data">
<div class="form-group">
Zadajte dátum: <input type="date" placeholder="2017-05-20" required name="datum"> <br>
</div>
<div class="form-group">
Zadajte názov albumu po slovensky: <input type="text" required name="titleSk"> <br>
</div>
<div class="form-group">
Zadajte názov albumu po anglicky: <input type="text" required name="titleEn"> <br>
</div>
<div class="form-group">
Zadajte názov súboru: <input type="text" required name="folder"> <br>
</div>
<div class="form-group">
<input type="submit" class="btn btn-primary" value="Vytvoriť" name="submit"></form>
</div>
</form></div>
<div id="uploadPhoto"> 
<form action="upload.php" class="form-vertical well" method="post" enctype="multipart/form-data">
<div class="form-group">
Vyberte album: <select name="album">';
for($i=2;$i<count($files1);$i++){
     echo'<option value="'.$files1[$i].'">';
    $sql = "SELECT titleSk FROM photoGalery where folder='".$files1[$i]."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
        echo reset($result->fetch_assoc()).'</option>';
    else
        echo $files1[$i].'</option>';
}
echo '</select></div>
<div class="form-group"><input type="file" name="fileToUpload" id="fileToUpload"></div>
<div class="form-group">';

echo'<input type="submit" class="btn btn-primary" value="Pridať do albumu" name="submit"></div></form></div>';

    }
else
    header("Location:index.php");
?>

<?php include_once 'footer/footer.php';
?>
</body>
  <script type="text/javascript">
  function kontrolProg(value)
{
  if(value=="Ano")
  {
    document.getElementById("newAlb").style.display = 'block';
    document.getElementById("uploadPhoto").style.display = 'none';
  }
  else
  {
    document.getElementById("newAlb").style.display = 'none';
    document.getElementById("uploadPhoto").style.display = 'block';
  }
}
  </script>
</html>