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
}
if($_SESSION['editor']==true){ 
}
if($_SESSION['user']==true){ 
}
}
echo '<li class="menuLi"><a href="rozdUloh.php">Rozdelenie úloh</a></li>';
echo '<li class="menuLi"><a href="logout.php">Odhlásenie</a></li>';
}
echo'</ul>
</nav>';
?>