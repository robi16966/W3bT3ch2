<?php include_once 'lang/lang.php';?>
<!DOCTYPE HTML>
<html lang="sk">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $lang['MENU_FREE_THESIS']; ?></title>
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
echo "<h1>".$lang['MENU_FREE_THESIS']."</h1>";
$urltopost = "http://is.stuba.sk/pracoviste/prehled_temat.pl?lang=sk;pracoviste=642;filtr_typtemata2=2;omezit_temata2=Obmedziť";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,$urltopost);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$returndata = curl_exec ($ch);

// create new DOM object
$doc = new DOMDocument();
$doc->loadHTML($returndata);

// save all tables from page
$tables = $doc->getElementsByTagName('table');
$theData = array();

// loop over rows
foreach($tables[2]->getElementsByTagName('tr') as $row) {

    // initialize array to store the cell data from each row
    $rowData = array();
    foreach($row->getElementsByTagName('td') as $cell) {

        // push the cell's text to the array
        $rowData[] = $cell;
    }

    // push the row's data array to the 'big' array
    $theData[] = $rowData;
}


    echo "<br><div class='container'><div id='filterStud'>".$lang['THES_FILTR1'] ."<div id='studProg'></div></div> <div id='filterMen'>".$lang['THES_FILTR2'] ."<div id='menSkol'></div><span id='zoradit'>".$lang['THES_SORT'] ."<select id='sort' name='sort' onchange='sortTable(this);'><option value= 0>".$lang['THES_TABLE_1C']."</option><option value= 0>".$lang['THES_TABLE_2C']."</option><option value= 2>".$lang['THES_TABLE_3C']."</option><option value= 3>".$lang['THES_TABLE_4C']."</option></select></span></div>";
    echo"<table class='table table-bordered' id='tableProjekty'>";
    echo "<thead><tr><th>".$lang['THES_TABLE_1C']."</th><th>".$lang['THES_TABLE_2C']."</th><th>".$lang['THES_TABLE_3C']."</th><th>".$lang['THES_TABLE_4C']."</th></tr></thead><tbody>";

    $count=1;
    $arraySkol=array($lang['THES_SET']);
    $arrayStud=array($lang['THES_SET']);
    for($row=1; $row<count($theData);$row++){
        $maxObs=explode('/', ($theData[$row][8]->textContent));
        /*echo"<br>".$theData[$row][8].":  ".$maxObs[0]."---".$maxObs[1]."<br>";
        if((int)$maxObs[0]<(int)$maxObs[1] || !is_numeric($maxObs[1]))
            echo "OK";*/
        
        //foreach($aTags as $aTags){
            //echo $row.$aTags[0]->getAttribute('href')."<br>";
        
       if((int)$maxObs[0]<(int)$maxObs[1] || !is_numeric($maxObs[1])){
        $aTags=$theData[$row][7]->getElementsByTagName('a');
        if(!in_array($theData[$row][3]->textContent, $arraySkol))
            array_push($arraySkol,$theData[$row][3]->textContent);
        if(!in_array($theData[$row][5]->textContent, $arrayStud))
            array_push($arrayStud,$theData[$row][5]->textContent);
        echo"<tr>";//href="http://is.stuba.sk'.$aTags[0]->getAttribute('href').'"
        $abs=abstrakt('http://is.stuba.sk'.$aTags[0]->getAttribute('href'));
        echo'<td>'.$count.'</td><td><a data-toggle="modal" href="#myModal"  onclick="check(this)">'.$theData[$row][2]->textContent.'<p hidden>'.$abs.'</p>'.'</a></td><td>'.$theData[$row][3]->textContent.'</td><td>'.$theData[$row][5]->textContent.'</td>';
        echo'</tr>';
        $count++;
        }
    }
    echo '</tbody></table></div>';
    echo "<select  id='filtrSkol'onchange='filtrTableMeno(this)' >";
           foreach($arraySkol as $skol){
               echo "<option value= ". $skol. ">".$skol."</option>";
           }
            echo "</select>   ";
            echo "<select  id='filtrStud' onchange='filtrTableStud(this)' >";
           foreach($arrayStud as $stud){
               echo "<option value= ". $stud. ">".$stud."</option>";
           }
            echo "</select>   ";
    
    
    function abstrakt($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $returndata = curl_exec ($ch);

        // create new DOM object
        $doc = new DOMDocument();
        $doc->loadHTML($returndata);

        // save all tables from page
        $tables = $doc->getElementsByTagName('table');
        $theData = array();
        foreach($tables[0]->getElementsByTagName('tr') as $row) 
            $theData[] = $row;
         
        return((string)$theData[9]->textContent);
    }
?>
<script>
function check(a){
    $('#mTitle').text(a.innerText);
    $('#mBody').text($(a).children().last()[0].innerText.substr(10));//
}

</script>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button id="closeH" type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="mTitle">Modal Header</h4>
        </div>
        <div class="modal-body" id="mBody">      
          <?php
          
          ?>
        </div>
        <div class="modal-footer">
        
          <button type="button" id="close" class="btn btn-default" data-dismiss="modal"></i>Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<br><br><br><br>
<?php include_once 'footer/footer.php';?>
  <script src="scripts/sort.js"></script>
</body>
</html>