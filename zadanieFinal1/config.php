<?php
$hostnameDb = "localhost";
$usernameDb = "****";
$passwordDb = "****";
$dbname = "zadanieFinal";
$adServer = "ldap.stuba.sk";
$adPort=389;

    $conn = new mysqli($hostnameDb, $usernameDb, $passwordDb, $dbname)or die("Error " . mysqli_connect_error($conn));
        // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
     mysqli_set_charset($conn,"utf8");
?>