<?php
session_start();
echo '
<nav>
<ul class="menu">
<li class="menuLi"><a href="index.php">Prihlásenie</a></li>';
if(!(empty($_SESSION['username']))){ 
echo '<li class="menuLi"><a href="logout.php">Odhlásenie</a></li>';
echo '<li class="menuLi"><a href="rozdUloh.php">Rozdelenie úloh</a></li>';
if($_SESSION['admin']==true){ 
echo '<li class="menuLi"><a href="admin.php">Admin</a></li>';
echo '<li class="menuLi"><a href="photo.php">Photo</a></li>';
}
if($_SESSION['reporter']==true){ 
echo '<li class="menuLi"><a href="photo.php">Photo</a></li>';
}
}
echo'</ul>
</nav>';
?>