<?php include_once 'lang/lang.php';?>
<!DOCTYPE html>
<html lang="sk">
<head>
<title>Prihlasovanie</title>
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
<h1>Prihlásenie do systému cez LDAP</h1>
<?php 
    require('config.php');
    date_default_timezone_set('Slovakia/Bratislava');
   session_start();
    if (isset($_POST['login']) && $_POST['username']!="" && $_POST['password']!="" ) {
         $ldapconn = ldap_connect($adServer, $adPort);
    
          $username = $_POST['username'];
          $password = $_POST['password'];
    
          $dn  = 'ou=People, DC=stuba, DC=sk';
          $ldaprdn  = "uid=".$username.", $dn";   
          ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
          ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
    
          $bind = @ldap_bind($ldapconn, $ldaprdn, $password);
          $filter="(uid=$username)";
          if($bind){
                $_SESSION['username'] = $username;
                $_SESSION['user'] = true;
                $sr = ldap_search($ldapconn, $ldaprdn, $filter);
                $entry = ldap_first_entry($ldapconn, $sr);
                $usrId = ldap_get_values($ldapconn, $entry, "uisid")[0];
                //echo($usrId); echo "<br />";
                $usrName = ldap_get_values($ldapconn, $entry, "givenname")[0];
                //echo($usrName); echo "<br />";
                $usrSurname = ldap_get_values($ldapconn, $entry, "sn")[0];
                //echo($usrSurname); echo "<br />";                
                $_SESSION['name'] = $usrName." ".$usrSurname;
                $query = "SELECT * FROM uzivatelia WHERE prihmeno='".$username."'";
                $result = $conn->query($query);
                if ($result->num_rows < 1){
                    $query2 = "INSERT INTO uzivatelia VALUES (NULL, '".$_POST['username']."',1,0,0,0,0)";
                }
                else{
                    while($row = $result->fetch_assoc()) {
                        $_SESSION['hr'] = $row[hr];
                        $_SESSION['reporter'] = $row[reporter];
                        $_SESSION['editor'] = $row[editor];
                        $_SESSION['admin'] = $row[admin];
                    }
                }             
                $result = $conn->query($query2);
                header('Location: login/logined.php ');
            }
            else{
              echo "<script> alert('Neplatné prihlásenie!!!'); </script>";
                    @ldap_close($ldap);
            }        
    } 
    

?> <!-- /container -->
      
      <div class = "container" id="prih">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password " required><br>
               </select><br>
                     
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Prihlásiť sa</button>
         </form>                 
         <br>
      </div> 
<?php include_once 'footer/footer.php';
?>
</body>
</html>