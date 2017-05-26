<?php
session_start();
echo '
<nav>
<ul class="menu">';
if((empty($_SESSION['username'])))
echo '<li class="menuLi"><a href="index.php">Prihlásenie</a></li>';
if(!(empty($_SESSION['username']))){ 
if($_SESSION['admin']==true){ 
echo '<li class="menuLi"><a href="admin.php">Admin</a></li>';
echo '<li class="menuLi"><a href="photo.php">Foto</a></li>';
}
else{
if($_SESSION['reporter']==true){ 
echo '<li class="menuLi"><a href="photo.php">Foto</a></li>';
}
if($_SESSION['hr']==true){ 
echo '<li class="menuLi"><a href="admin.php">Admin</a></li>';
}
if($_SESSION['editor']==true){ 
}
if($_SESSION['user']==true){ 
}
}
echo '<li class="menuLi"><a href="pedag.php">Pedagogika</a></li>';
echo '<li class="menuLi"><a href="sluzCest.php">Služobné cesty</a></li>';
echo '<li class="menuLi"><a href="publik.php">Publikácia</a></li>';
echo '<li class="menuLi"><a href="doktor.php">Doktorandi</a></li>';
echo '<li class="menuLi"><a href="odkaz.php">Odkazy</a></li>';
echo '<li class="menuLi"><a href="nakupy.php">Nákupy</a></li>';
echo '<li class="menuLi"><a href="dochad.php">Dochádzka</a></li>';
echo '<li class="menuLi"><a href="aktuality.php">Aktuality</a></li>';
echo '<li class="menuLi"><a href="rozdUloh.php">Rozdelenie úloh</a></li>';
echo '<li class="menuLi"><a href="logout.php">Odhlásenie</a></li>';
}
echo'</ul>
</nav>';
?>