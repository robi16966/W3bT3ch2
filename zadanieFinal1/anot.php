<?php include_once 'lang/lang.php';?>
<!DOCTYPE HTML>
<html lang="sk">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $lang['PAGE_ANOT']; ?></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<?php include_once ('header/header.php');
include_once ('menu/menu.php');
?>

<?php
include ("config.php");
if(isset($_GET['id']) && !empty($_GET['id'])){
$sql = "SELECT * FROM projects WHERE id=".$_GET['id'];
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div id='anot'>";
                echo "<h3><div id='anotTitle'>".(($_GET['lang']=='en') ? $row[titleEN] : $row[titleSK])."</div></h3><br>";
                echo "<h4>".$lang['PROJ_TABLE_2C'].":</h4>".(($_GET['lang']=='en') ? $row[titleEN] : $row[titleSK]);
                echo "<h4>".$lang['PROJ_TABLE_1C'].":</h4>".$row[number];
                echo "<h4>".$lang['PROJ_TABLE_3C'].":</h4>".$row[duration];
                echo "<h4>".$lang['PROJ_TABLE_4C'].":</h4>".$row[coordinator];
                echo "<h4>".$lang['PROJ_TABLE_5C'].":</h4>".$row[projectType];
                echo "<h4>".$lang['ANOT'].":</h4>".(($_GET['lang']=='en') ? $row[annotationEN] : $row[annotationSK])."<br></div><br><br>";
            }
        } 
        else
            header("Location:project.php");
        //print_r($arrayMed1);
}
else
    header("Location:project.php");
?>
<?php include_once 'footer/footer.php';?>
</body>
