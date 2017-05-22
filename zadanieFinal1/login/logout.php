<?php
    require('../config.php');
  // print_r($_SESSION);
  session_start();
  print_r($_SESSION);
  unset($_SESSION["username"]);
  unset($_SESSION["name"]);
   unset($_SESSION["user"]);
   unset($_SESSION["hr"]);
   unset($_SESSION["reporter"]);
   unset($_SESSION["editor"]);
   unset($_SESSION["admin"]);

   
//Reset OAuth access token
   print_r($_SESSION);
   //Destroy entire session
session_destroy();
   print_r($_SESSION);
   //echo 'You have cleaned session';
   header('Location: index.php');
?>