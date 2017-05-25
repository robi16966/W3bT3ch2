<!DOCTYPE html>
<html lang="sk">
<head>
<title>Admin</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php include_once 'header/header.php';
include_once 'menu/menu.php';
?>
<?php
 //require('login.php');
 require('../config.php');
 session_start();
if(!(empty($_SESSION['username'])) && $_SESSION['admin']==true){ 
if (isset($_POST['prihmeno']) && $_POST['prihmeno']!="") {    
            $user=$_POST['user']== "" ? 0 : 1;
            $hr=$_POST['hr']== "" ? 0 : 1;
            $editor=$_POST['editor']== "" ? 0 : 1;
            $reporter=$_POST['reporter']== "" ? 0 : 1;
            $admin=$_POST['admin']== "" ? 0 : 1;
            
            $sql = "UPDATE uzivatelia SET user =". $user .",  hr =". $hr .",editor =". $editor .",reporter =". $reporter .",admin = ".$admin ." WHERE prihmeno ='". $_POST['prihmeno']."'";
        $result = $conn->query($sql);
            
        }
echo "<div id=vit><h2>Vítáme Vás : ".$_SESSION["name"]."</h2></div> ";

$sql = "SELECT * FROM uzivatelia";
        $result = $conn->query($sql);
        echo "<div id= 'prihPouz' class='table-responsive'>
                <table class='table table-responsive'>
                    <thead>
                        <tr>
                            <th>Prihlasovacie meno</th><th>user</th><th>hr</th><th>reporter</th><th>editor</th><th>admin</th><th>Uložiť</th>
                        </tr>
                    </thead>
                    <tbody>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<form action='".$_SERVER['PHP_SELF']."' id='uploadForm' method='post'>". "<tr>
                <td><input type='hidden' name='prihmeno' value='".$row["prihmeno"]."'>".$row["prihmeno"]."</td>
                <td>"."<input type='checkbox' ".($row["user"] == true ? 'checked' : ''). " name='user' ></td>
                <td>"."<input type='checkbox' ".($row["hr"] == true ? 'checked' : '')." name='hr'  ></td>
                <td>"."<input type='checkbox' ".($row["reporter"] == true ? 'checked' : '')." name='reporter'  ></td>
                <td>"."<input type='checkbox' ".($row["editor"] == true ? 'checked' : '')." name='editor'  ></td>
                <td>"."<input type='checkbox' ".($row["admin"] == true ? 'checked' : '')." name='admin'  ></td>
                <td><button class = 'btn-xs btn-primary btn-block' type = 'submit' name = 'save'>Uložiť</button></td>
                </tr></form>";
            }
        } 
        else {
            echo "0 results";
        }
        echo "</tbody></table>";
        
        
    }
else
    header("Location:index.php");
?>
<script>
    $("#stat").css("display", "block");
    $("#hist").css("display", "block");
$("#odhlas").on('click', function (){
    location.replace("logout.php"); 
});
</script>
<?php include_once 'footer/footer.php';
?>
</body>
</html>