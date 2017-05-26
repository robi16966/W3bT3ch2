<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$result = $db_handle->executeUpdate("UPDATE php_interview_questions set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  id=".$_POST["id"]);;
?>