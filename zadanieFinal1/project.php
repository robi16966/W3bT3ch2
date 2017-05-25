<?php include_once 'lang/lang.php';?>
<!DOCTYPE HTML>
<html lang="sk">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $lang['MENU_PROJECTS']; ?></title>
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

<h1><?php echo $lang['PROJ_TITLE']; ?></h1>
<?php
include ("classes/projects.php");
include ("config.php");

    $arrayVeg1=array();
    $arrayKeg1=array();
    $arrayDom1=array();
    $arrayApvv1=array();
    $arrayMed1=array();
    
            $url= explode('/',$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        $URL='';
        for($i=0;$i<sizeof($url)-1;$i++)
            $URL=$URL.$url[$i].'/';
        
$sql = "SELECT * FROM projects";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                //Projekt($id,$projectType,$number,$titleSK,$titleEN,$duration,$coordinator,$category){
                if($row[projectType]=='VEGA'){
                    $arrayVeg1[]=new Projects($row[id],$row[projectType],$row[number],$row[titleSK],$row[titleEN],$row[duration],$row[coordinator],'VEGA');
                }
                else if($row[projectType]=='APVV'){
                    $arrayApvv1[]=new Projects($row['id'],$row['projectType'],$row['number'],$row['titleSK'],$row['titleEN'],$row['duration'],$row['coordinator'],'APVV');
                }
                else if($row[projectType]=='KEGA'){
                    $arrayKeg1[]=new Projects($row[id],$row[projectType],$row[number],$row[titleSK],$row[titleEN],$row[duration],$row[coordinator],'KEGA');
                }
                else if((string)$row['projectType'][5].$row['projectType'][6].$row['projectType'][7]===(string)'dom'){
                    $arrayDom1[]=new Projects($row[id],$row[projectType],$row[number],$row[titleSK],$row[titleEN],$row[duration],$row[coordinator],'DOM');
                }
                else{
                    //echo substr($row[projectType],4,4);
                    $arrayMed1[]=new Projects($row[id],$row[projectType],$row[number],$row[titleSK],$row[titleEN],$row[duration],$row[coordinator],'MED');
                }
            }
        } 
        else
            echo "0 results";
        //print_r($arrayMed1);
    function cmp($a, $b)
    {
        return ($a->duration<$b->duration ? true : false);
    }
    
    function printArrayTable($array){
        foreach($array as $tmp){
            echo '<tr><td>'.$tmp->number."</td><td><a href='".$URL."anot.php"."?id=".$tmp->id."'>".(($_GET['lang']=='en') ? $tmp->titleEN : $tmp->titleSK).'</td><td>';
            if(strlen($tmp->duration)>13){
                $years=explode("-", $tmp->duration);
                
                $y1=explode(".", $years[0]);
                $y2=explode(".", $years[1]);
                echo $y1[2]."-".$y2[2].'</td><td>'.$tmp->coordinator.'</td><td>'.$tmp->category.'</td></tr>';
            }
            else
            echo $tmp->duration.'</td><td>'.$tmp->coordinator.'</td><td>'.$tmp->category.'</td></tr>';
        }
    }

    usort($arrayVeg1, "cmp");
    usort($arrayKeg1, "cmp");
    usort($arrayDom1, "cmp");
    usort($arrayApvv1, "cmp");
    usort($arrayMed1, "cmp");
    usort($arrayOst1, "cmp");
        
        print_r($arrayApvv1->$ids);
            echo"<br><div class='container'><table class='table table-bordered' id='tableProjekty'>";
    //èíslo projektu, názov projektu, doba riešenia (staèí roky),zodpovedný riešite¾.
    echo '<thead><tr><th>'.$lang['PROJ_TABLE_1C'].'</th><th>'.$lang['PROJ_TABLE_2C'].'</th><th>'.$lang['PROJ_TABLE_3C'].'</th><th>'.$lang['PROJ_TABLE_4C'].'</th><th>'.$lang['PROJ_TABLE_5C'].'</th></tr></thead><tbody>';
    printArrayTable($arrayMed1);
    printArrayTable($arrayVeg1);
    printArrayTable($arrayApvv1);
    printArrayTable($arrayKeg1);
    printArrayTable($arrayDom1);
   // printArrayTable($arrayOst1);
    echo '</tbody></table></div><br><br><br><br>';

            
?>

<?php include_once 'footer/footer.php';?>
</body>
</html>