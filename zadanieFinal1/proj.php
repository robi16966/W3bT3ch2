<?php include_once 'lang/lang.php';?>
<!DOCTYPE HTML>
<html lang="sk">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $lang['PAGE_TITLE']; ?></title>
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
include ("classes/projekt.php");
$urltopost = "http://uamt.fei.stuba.sk/web/?q=sk/node/408";
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

//print_r($tables[0]->getElementsByTagName('tr')[1]->getElementsByTagName('th')[0]);
if($tables[0]->getElementsByTagName('tr')[1]->getElementsByTagName('th')[0]->nodeValue=='VEGA')
// loop over rows
    $arrayVeg1=array();
    $arrayKeg1=array();
    $arrayDom1=array();
    $arrayApvv1=array();
    $arrayMed1=array();
foreach($tables[0]->getElementsByTagName('tr') as $row) {

    if($row->getElementsByTagName('th')[0]->nodeValue==''){
        $kat=$kat;
    }
    else if($row->getElementsByTagName('th')[0]->nodeValue=='VEGA'){
        $kat='VEGA';
        //break;
    }
    else if($row->getElementsByTagName('th')[0]->nodeValue=='APVV'){
        $kat='APVV';
    }
    else if($row->getElementsByTagName('th')[0]->nodeValue=='Cooperation'){
        $kat='MED';
    }
    else if($row->getElementsByTagName('th')[0]->nodeValue=='KEGA'){
        $kat='KEGA';
    }
    else
        $kat='DOM';
    // initialize array to store the cell data from each row
    $rowData = array();
    foreach($row->getElementsByTagName('td') as $cell) {

        // push the cell's text to the array
        $rowData[] = $cell;
        
    }

    // push the row's data array to the 'big' array
    if(!empty($rowData)){
    if($kat=='VEGA'){
        $aTags=$rowData[1]->getElementsByTagName('a')[0]->getAttribute('href');
        $arrayVeg1[]=new Projekt($rowData[0]->textContent,$rowData[1]->textContent,$rowData[2]->textContent,$rowData[3]->textContent,$aTags,'VEGA');
    }
    else if($kat=='APVV'){
        $aTags=$rowData[1]->getElementsByTagName('a')[0]->getAttribute('href');
        $arrayApvv1[]=new Projekt($rowData[0]->textContent,$rowData[1]->textContent,$rowData[2]->textContent,$rowData[3]->textContent,$aTags,'APVV');
    }
    else if($kat=='MED'){
        $aTags=$rowData[1]->getElementsByTagName('a')[0]->getAttribute('href');
        $arrayMed1[]=new Projekt($rowData[0]->textContent,$rowData[1]->textContent,$rowData[2]->textContent,$rowData[3]->textContent,$aTags,'MED');
    }
    else if($kat=='KEGA'){
        $aTags=$rowData[1]->getElementsByTagName('a')[0]->getAttribute('href');
        $arrayKeg1[]=new Projekt($rowData[0]->textContent,$rowData[1]->textContent,$rowData[2]->textContent,$rowData[3]->textContent,$aTags,'KEGA');
    }
    else{
        $aTags='';
        if(!is_null($rowData[1]->getElementsByTagName('a')[0])){
            $aTags=$rowData[1]->getElementsByTagName('a')[0]->getAttribute('href');
        }
        $arrayDom1[]=new Projekt($rowData[0]->textContent,$rowData[1]->textContent,$rowData[2]->textContent,$rowData[3]->textContent,$aTags,'DOM');
    }
    }
    $theData[] = $rowData;
}

//print_r($arrayDom1);
    //strrpos-Find the position of the last occurrence of a '(' in a projekt name, strpos- find the position of first occurrence of a ')' after '('
/*if(1){  
    $arrayVeg=array();
    $arrayKeg=array();
    $arrayDom=array();
    $arrayApvv=array();
    $arrayMed=array();
    $arrayOst=array();
    for($row=1; $row<count($theData);$row++){
        $oBracket = strrpos($theData[$row][1]->textContent,'(');//open bracket
        $cBracket = strpos($theData[$row][1]->textContent,')',$oBracket+1);// closed bracket
        //(int)((int)$theData[$row][3]->textContent-(int)$theData[$row][2]->textContent)->doba ries
        if($oBracket>0){
            $tmp=new Projekt(substr($theData[$row][1]->textContent,$oBracket+1,$cBracket-$oBracket-1),substr($theData[$row][1]->textContent,0,$oBracket-1),$theData[$row][2]->textContent,$theData[$row][3]->textContent,substr($theData[$row][1]->textContent,$cBracket+10),$theData[$row][4]->textContent);
            if(strcmp(trim($tmp->kategoria),"VEGA")== 0)
                array_push($arrayVeg,$tmp);
            elseif(strcmp(trim($tmp->kategoria),"KEGA")== 0)
                array_push($arrayKeg,$tmp);
            elseif(strcmp(trim($tmp->kategoria),"-- Iný domáci --")== 0)
                array_push($arrayDom,$tmp);
            elseif(strpos(trim($tmp->kategoria),"APVV")!== false)
                array_push($arrayApvv,$tmp);
            elseif(strpos(trim($tmp->kategoria),"Medzinárodné")!== false)
                array_push($arrayMed,$tmp);
            else
                array_push($arrayOst,$tmp);
            }
        else{
            $tmp=new Projekt(' --- ',substr($theData[$row][1]->textContent,0, strpos($theData[$row][1]->textContent,'Garant: ')),$theData[$row][2]->textContent,$theData[$row][3]->textContent,substr($theData[$row][1]->textContent,strpos($theData[$row][1]->textContent,'Garant: ')+8),$theData[$row][4]->textContent);
            if(strcmp(trim($tmp->kategoria),"VEGA")== 0)
                array_push($arrayVeg,$tmp);
            elseif(strcmp(trim($tmp->kategoria),"KEGA")== 0)
                array_push($arrayKeg,$tmp);
            elseif(strcmp(trim($tmp->kategoria),"-- Iný domáci --")== 0)
                array_push($arrayDom,$tmp);
            elseif(strpos(trim($tmp->kategoria),"APVV")!= false)
                array_push($arrayApvv,$tmp);
            elseif(strpos(trim($tmp->kategoria),"Medzinárodné")!= false)
                array_push($arrayMed,$tmp);
            else
                array_push($arrayOst,$tmp);
        }  
    }*/
    
    function cmp($a, $b)
    {
        return ($a->riesOdDo<$b->riesOdDo ? true : false);
    }
    
    function printArrayTable($array){
        foreach($array as $tmp){
        $con=abstrakt('http://uamt.fei.stuba.sk/web/'.$tmp->href);
            echo '<tr><td>'.$tmp->cislo.'</td><td><a data-toggle="modal" href="#myModal"  onclick="check(this)"><p hidden>'.$con.'</p>'.$tmp->nazov.'</td><td>'.$tmp->riesOdDo.'</td><td>'.$tmp->garant.'</td><td>'.$tmp->kategoria.'</td></tr>';
        }
    }

    usort($arrayVeg1, "cmp");
    usort($arrayKeg1, "cmp");
    usort($arrayDom1, "cmp");
    usort($arrayApvv1, "cmp");
    usort($arrayMed1, "cmp");
    usort($arrayOst1, "cmp");
   
    //echo "<br><div class='container'><div id='filterStud'>Filtrovať podľa štud. programu: <div id='studProg'></div></div> <div id='filterMen'>Filtrovať podľa mena školiteľa:\t <div id='menSkol'></div><span id='zoradit'>Zoradiť podľa: <select id='sort' name='sort' onchange='sortTable(this);'><option value= 0> Por. </option><option value= 0> Názov </option><option value= 2> Meno školiteľa </option><option value= 3> Študijný program </option></select></span></div>";
    echo"<br><div class='container'><table class='table table-bordered' id='tableProjekty'>";
    //číslo projektu, názov projektu, doba riešenia (stačí roky),zodpovedný riešiteľ.
    echo '<thead><tr><th>'.$lang['PROJ_TABLE_1C'].'</th><th>'.$lang['PROJ_TABLE_2C'].'</th><th>'.$lang['PROJ_TABLE_3C'].'</th><th>'.$lang['PROJ_TABLE_4C'].'</th><th>'.$lang['PROJ_TABLE_5C'].'</th></tr></thead><tbody>';
    printArrayTable($arrayMed1);
    printArrayTable($arrayVeg1);
    printArrayTable($arrayApvv1);
    printArrayTable($arrayKeg1);
    printArrayTable($arrayDom1);
   // printArrayTable($arrayOst1);
    echo '</tbody></table></div>';/*
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
    }
    */
    function abstrakt($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $returndata = curl_exec ($ch);

        // create new DOM object
        $doc = new DOMDocument();
        $doc->loadHTML($returndata);

        // save all tables from page
        $divs = $doc->getElementsByTagName('div');         
        return((string)$divs[33]->textContent);
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
<?php include_once 'footer/footer.php';?>
  <script src="scripts/sort.js"></script>
</body>