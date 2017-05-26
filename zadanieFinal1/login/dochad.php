<!DOCTYPE html>
<html lang="sk">
<head>
<title>Dochádzka</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php include_once 'header/header.php';
include_once 'menu/menu.php';
?>
<br>
<form action="<?php $_PHP_SELF ?>"  method="GET">
Rok:<select id="year" name="year">
 <?php
    require('../config.php');
    /*echo "<form action='<?php $_PHP_SELF ?>' method='GET'> <select  id='year' name='year'>";*/
    if($_GET["year"]){
        $year = $_GET["year"];
        $month = $_GET["month"];
    }
    else{
        $month = 3;
        $year = 2017;
    }
    for ($i=1950; $i<=2050; $i++)
    {
        if($i==$year){
            echo "<option selected value= ".$i .">" .$i."</option>";
        }
        else
        {
        echo "<option value= ".$i .">" .$i."</option>";
        }
    }
    echo "</select>";
    
    echo "  Mesiac: <select id='month' name='month'>";
    for($i=1;$i<13;$i++){
        if($month==$i){
           echo "<option selected value= ".$i ."> "; 
        }
        else{
            echo "<option value= ".$i ."> ";
        }
        switch ($i) {
            case 1:
                echo "Január </option>";
            break;
            case 2:
                echo "Február </option>";
            break;
            case 3:
                echo "Marec </option>";
            break;
            case 4:
                echo "Apríl </option>";
            break;
            case 5:
                echo "Máj </option>";
            break;
            case 6:
                echo "Jún </option>";
            break;
            case 7:
                echo "Júl </option>";
            break;
            case 8:
                echo "August </option>";
            break;
            case 9:
                echo "September </option>";
            break;
            case 10:
                echo "Október </option>";
            break;
            case 11:
                echo "November </option>";
            break;
            case 12:
                echo "December </option>";
        }
    }
    ?>
    </select> 
    <button id="zobraz" type="submit" class="btn btn-primary">
        <span class="glyphicon glyphicon-check"></span> Zobrazovať
    </button>

    </form>
    <br>
    <form> 
    <?php
    if ($_SESSION['admin']==true || $_SESSION['hr']==true){
    echo'<button type="button" class="btn btn-warning" id="edit">
        <span class="glyphicon glyphicon-edit"></span> Editovať
    </button>'; }?>
    <span id="dTyp" >  Typ neprítomnosti: </span>

    <?php
        $attend=array();

       // mysqli_set_charset($conn,"utf8");
        //get employers
        $sql = "SELECT id, meno, priezvisko FROM zamestnanec";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        //make array Priezvisko+meno->row=(id,meno,priezvisko)
            while($row = $result->fetch_assoc()) {
                $employ[$row["priezvisko"]. $row["meno"]] =$row;
            }
        } 
        else {
            echo "0 results";
        }
        //create attendance
        $sql = "SELECT id_zam, id_nep, datum FROM dochadzka";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        //make array id_zam,id_nep,year,month,day
            while($row = $result->fetch_assoc()) {
                $a=[];
                $tmp=$row["datum"];
                $a= explode('-',$row["datum"]);
                array_push($attend,[$row["id_zam"],$row["id_nep"],$a[0],$a[1],$a[2]]);//id_zam,id_nep,year,month,day
            }
        } 
        else {
            echo "0 results";
        }
        //make dropdown for nepritomnost
        echo "<select  id='typNep' style='display:none'>";
        $sql = "SELECT id, nepritomnost FROM typy_nepritomnosti";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo "<option selected value= ". $row["id"]. ">".$row["nepritomnost"]."</option>";
            }
            echo "<option value= 6>Zrušiť</option>";
        } 
        else {
            echo "0 results";
        }
        echo "</select>   ";
        //echo "<input type = 'button' value='Uložiť' class='btn btn-success' id='save' style='display:none'/></form><br>";
          echo     " <button type='button' class='btn btn-success ' id='save' style='display:none'> <span class='glyphicon glyphicon-floppy-disk'></span> Uložiť </button> </form><br>";
        ksort($employ);
        // function for create table
        function createTable($employ,$attend,$year, $month) {
            $list=array();
            for($d=1; $d<=31; $d++){
                $time=mktime(1, 0, 0, $month, $d, $year);          
                if (date('m', $time)==$month)       
                    $list[]=explode('-',date('d-D-N', $time));
            }
            // create table
            echo "<div align='center'>";
            echo"<table class='table-responsive' id='tableMain'><tr><td> ID </td><td> Meno </td><td> Pirezvisko </td>"; 
            // days name
            for($d=0; $d<count($list); $d++){
                //when sunday or saturday
                if($list[$d][2]==6 || $list[$d][2]==7)
                    echo "<td class='weekend'> " . $list[$d][1]." </td>";   
                else
                    echo "<td> " . $list[$d][1]." </td>";    
            }
            echo "</tr>";
            // how many days
            for($d=0; $d<count($list); $d++){
                // employers name and id
                foreach($employ as $x => $x_value) {
                    echo "<tr><td>" . $x_value["id"] ."</td><td>" . $x_value["meno"]. "</td><td>" . $x_value["priezvisko"]. "</td>";
                    for($d=0; $d<count($list); $d++){
                        $prev=1;
                        $used=0;
                        // check record in table dochadcka
                        for($i=0;$i<count($attend);$i++){
                            // when record exist 
                            if($d==$attend[$i][4]-1 && $used==0){// day_start
                                if($year==$attend[$i][2] && $month==$attend[$i][3] && $x_value["id"]==$attend[$i][0]){ //year, month, ID
                                    //echo $d."--".$attend[$i][4]."--".$attend[$i][5];
                        
                                        switch ($attend[$i][1]){
                                            case 1:
                                                echo "<td class='pn'>" . $list[$d][0]."</td>";
                                            break;
                                            case 2:
                                                echo "<td class='or'>" . $list[$d][0]."</td>";
                                            break;
                                            case 3:
                                                echo "<td class='sc'>" . $list[$d][0]."</td>";
                                            break;
                                            case 4:
                                                echo "<td class='pd'>" . $list[$d][0]."</td>";
                                            break;
                                            case 5:
                                                echo "<td class='dv'>" . $list[$d][0]."</td>";
                                        }
                                        $prev=-1;
                                        $used=1;
                                    //}
                                }
                            }    
                        }
                        if($prev==1){
                            //when sunday or saturday
                            if($list[$d][2]==6 || $list[$d][2]==7)
                                echo "<td class='weekend'>" . $list[$d][0]."</td>";   
                            else
                                echo "<td>" . $list[$d][0]."</td>";
                        }
                    }
                    echo "</tr>";
                }
            }
            echo"</table></div>";
        }
    createTable($employ,$attend,$year, $month);
    //echo count($attend);
?>


<script>
var mArray=[];
delet=0;
id=3;
var dropdown = $("#typNep");
var array=[];
$("#dTyp").css("display", "none");
$("#edit").on('click', function (){
    $("#typNep").css("display", "inline");
    $("#save").css("display", "inline");
    $("#dTyp").css("display", "inline");
    $("#tableMain td").on('mousedown', function (){
        colD = $(this).parent().children().index($(this));
        rowD = $(this).parent().parent().children().index($(this).parent());
        array[0]=document.getElementById("tableMain").rows[rowD].cells[0].innerHTML;
    }).on('mouseup', function() {
        var colL = $(this).parent().children().index($(this));
        var rowL = $(this).parent().parent().children().index($(this).parent());
        if(rowD==rowL && rowD!=0 && colD>2 && colL>2){
            if(colD<colL){
                for(i=colD;i<colL+1;i++)
                    document.getElementById("tableMain").rows[rowD].cells[i].style.background = "red"; 
                array[2]=colD-2;
                array[3]=colL-2;
            }
            else{
                for(i=colD;i>colL-1;i--)
                    document.getElementById("tableMain").rows[rowD].cells[i].style.background = "red"; 
                array[3]=colD-2;
                array[2]=colL-2;
            }
            array[1]=($("#typNep").val());
            mArray.push([array[0],array[1],array[2],array[3]]);
        }
        if(colL<3 || colD<3){
            $('#myModal').modal();
            meno=document.getElementById("tableMain").rows[rowD].cells[1].innerHTML;
            priez=document.getElementById("tableMain").rows[rowD].cells[2].innerHTML;
            for(i=$('.modal-body tr').length-1;i>0;i--){
                if(i!=rowD)
                    $(".modal-body tr").eq(i).remove();
            }
            
            $('#mTitle').text(meno+" "+priez+" - "+$("#month option:selected").text()+" "+$("#year option:selected").text());
            modal(rowD, document.getElementById("tableMain").rows[rowD].cells[0].innerHTML);
        }
    });
});
$("#save").on('click', function (){
    k="";
    for(i=0;i<mArray.length;i++)
        k=k+mArray[i][0]+","+mArray[i][1]+","+mArray[i][2]+","+mArray[i][3]+";"; 
    if(k!=""){
        if (window.location.href.indexOf("month") >= 0)
           window.location.href = window.location.href +"&data=" + k;             
        else
           window.location.href = window.location.href +"?year=2017&month=3&data=" + k;
    }
    mArray=[];  
});

</script>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button id="closeH" type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" id="mTitle">Modal Header</h4>
        </div>
        <div class="modal-body">      
          <?php
          if($month<10){
           echo "Začiatok: <input type='date' id='day_zac' min='".$year."-0".$month."-01' max='".$year."-0".$month."-". cal_days_in_month(CAL_GREGORIAN, $month, $year)."'>";
           echo " Koniec: <input type='date' id='day_kon' min='".$year."-0".$month."-01' max='".$year."-0".$month."-". cal_days_in_month(CAL_GREGORIAN, $month, $year)."'><br>";
          }
          else {
                echo "Začiatok: <input type='date' id='day_zac' min='".$year."-".$month."-01' max='".$year."-".$month."-". cal_days_in_month(CAL_GREGORIAN, $month, $year)."'>";
           echo "Koniec: <input type='date' id='day_kon' min='".$year."-".$month."-01' max='".$year."-".$month."-". cal_days_in_month(CAL_GREGORIAN, $month, $year)."'>";
          }
                  echo "<br>Typ neprítomnosti: <select  id='typNepModal'>";
        $sql = "SELECT id, nepritomnost FROM typy_nepritomnosti";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo "<option selected value= ". $row["id"]. ">" .$row["nepritomnost"]."</option>";
            }
            echo "<option value= 6>Zrušiť</option>";
        } 
        else {
            echo "0 results";
        }
        echo "</select><br>";
            $list=array();
            $id=" <script>document.write(id)</script>";
            for($d=1; $d<=31; $d++){
                $time=mktime(1, 0, 0, $month, $d, $year);          
                if (date('m', $time)==$month)       
                    $list[]=explode('-',date('d-D-N', $time));
            }
            // create table
            echo "<br><div align='center'>";
            echo"<table class='table-responsive' id='tableModal'><tr><td> ID </td><td> Meno </td><td> Pirezvisko </td>"; 
            // days name
            for($d=0; $d<count($list); $d++){
                //when sunday or saturday
                if($list[$d][2]==6 || $list[$d][2]==7)
                    echo "<td class='weekend'> " . $list[$d][1]." </td>";   
                else
                    echo "<td> " . $list[$d][1]." </td>";    
            }
            echo "</tr>";
            // how many days
            for($d=0; $d<count($list); $d++){
                // employers name and id
                foreach($employ as $x => $x_value) {
                    echo "<tr><td>" . $x_value["id"] ."</td><td>" . $x_value["meno"]. "</td><td>" . $x_value["priezvisko"]. "</td>";
                    for($d=0; $d<count($list); $d++){
                        $prev=1;
                        $used=0;
                        // check record in table dochadcka
                        for($i=0;$i<count($attend);$i++){
                            // when record exist 
                            if($d==$attend[$i][4]-1 && $used==0){// day_start
                                if($year==$attend[$i][2] && $month==$attend[$i][3] && $x_value["id"]==$attend[$i][0]){ //year, month, ID
                                    //echo $d."--".$attend[$i][4]."--".$attend[$i][5];
                                  
                                        switch ($attend[$i][1]){
                                            case 1:
                                                echo "<td class='pn'>" . $list[$d][0]."</td>";
                                            break;
                                            case 2:
                                                echo "<td class='or'>" . $list[$d][0]."</td>";
                                            break;
                                            case 3:
                                                echo "<td class='sc'>" . $list[$d][0]."</td>";
                                            break;
                                            case 4:
                                                echo "<td class='pd'>" . $list[$d][0]."</td>";
                                            break;
                                            case 5:
                                                echo "<td class='dv'>" . $list[$d][0]."</td>";
                                        }
                                        $prev=-1;
                                        $used=1;
                                }
                            }    
                        }
                        if($prev==1){
                            //when sunday or saturday
                            if($list[$d][2]==6 || $list[$d][2]==7)
                                echo "<td class='weekend'>" . $list[$d][0]."</td>";   
                            else
                                echo "<td>" . $list[$d][0]."</td>";
                        }
                    }
                    echo "</tr>";
                }
            }
            echo"</table></div>";
          ?>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-success " id="saveModal">
          <span class="glyphicon glyphicon-floppy-disk"></span> Uložiť
        </button>
        
          <button type="button" id="close" class="btn btn-default" data-dismiss="modal"></i>Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<div align='center'>
<H2>Legenda:</H2>
<table>
  <tr>
  <td class="pn">PN</td>
  <td class="or">OCR</td>
  <td class="sc">Služobná <br>cesta</td>
  <td class="pd">Plán<br> dovolenky</td>
  <td class="dv">Dovolenka</td>
</tr>
</table>
</div>
<br>

<script>
    $('#myModal').on('hidden.bs.modal', function () {
 location.reload();
})
    function modal(row, id){
    $(".modal-body td").on('mousedown', function (){
        colD = $(this).parent().children().index($(this));
        rowD = $(this).parent().parent().children().index($(this).parent());
        array[0]=id;
    }).on('mouseup', function() {
        var colL = $(this).parent().children().index($(this));
        var rowL = $(this).parent().parent().children().index($(this).parent());
        if(rowD==rowL && rowD!=0 && colD>2 && colL>2){
            if(colD<colL){
                for(i=colD;i<colL+1;i++)
                    document.getElementById("tableModal").rows[1].cells[i].style.background = "red"; 
                array[2]=colD-2;
                array[3]=colL-2;
            }
            else{
                for(i=colD;i>colL-1;i--)
                    document.getElementById("tableModal").rows[1].cells[i].style.background = "red"; 
                array[3]=colD-2;
                array[2]=colL-2;
            }
            array[1]=($("#typNepModal").val());
            mArray.push([array[0],array[1],array[2],array[3]]);
        }
    });
$("#saveModal").on('click', function (){
    if($("#day_zac").val()<=$("#day_kon").val()&& $("#day_kon").val()!=""){
        array[0]=id;
        array[1]=($("#typNepModal").val());
        array[2]=($("#day_zac").val()).substr(-2);
        array[3]=($("#day_kon").val()).substr(-2);
        mArray.push([array[0],array[1],array[2],array[3]]);
    }
    k="";
    for(i=0;i<mArray.length;i++)
        k=k+mArray[i][0]+","+mArray[i][1]+","+mArray[i][2]+","+mArray[i][3]+";"; 
    if(k!="")
        window.location.href = window.location.href +"&data=" + k; 
    mArray=[];
});
    }
    $("#close").on('click', function (){
        jQuery('#zobraz').click();
    });
        $("#closeH").on('click', function (){
        jQuery('#zobraz').click();
    });
    
    


</script>
<?php 
$data = $_GET["data"];
$year = $_GET["year"];
if(!empty($data)){
    $a=explode(';',$data);
    unset($data);
foreach($a as $x)
{
    //echo "<br>". $x."--";
    $b=explode(',',$x);
   // echo "<br>". $b[0]."--". $b[2];
    for($i=$b[2];$i<$b[3]+1;++$i){
        if(exist($attend,$b[0],$i,$year,$month)==1)
        {
            if($b[1]==6){
                $sql = "DELETE FROM dochadzka WHERE id_zam= '".$b[0]."' AND datum= '".$year."-".$month."-".$i."'";
                //echo $sql."<br>";
                $conn->query($sql);
                /*if ($conn->query($sql) === TRUE) {
                    echo "Record deleted successfully";
                } else {
                    echo "Error deleting record: " . $conn->error;
                }   */
            }
            else{
                $sql = "UPDATE dochadzka  SET id_nep='".$b[1]."' WHERE id_zam= '".$b[0]."' AND datum= '".$year."-".$month."-".$i."'";
                //echo $sql."<br>";
                $conn->query($sql);
                /*if ($conn->query($sql) === TRUE) {
                    echo "Record deleted successfully";
                } else {
                    echo "Error deleting record: " . $conn->error;
                }   */
                
            }
        }
        else{
            if($b[1]!=6){
            $sql = "INSERT INTO dochadzka VALUES (NULL, '" .$b[0]."', '".$b[1]."', '".$year."-".$month."-".$i."')";
            //echo "insert: ".$i."<br>";
            $conn->query($sql);
            }
            /*if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }*/
        }
    }
}
echo "<script>jQuery('#zobraz').click(); </script>";
}
function exist($attend,$id,$dayS,$year,$month) {
    //echo "<br> a:".count($attend)."<br>";
    for($i=0;$i<count($attend);$i++){ 
    //echo $year."--".$attend[$i][2] ."--".$month."--".$attend[$i][3]."--".$id."--".$attend[$i][0]."---".$dayS."----".$attend[$i][4]."<br>";
        if($year==$attend[$i][2] && $month==$attend[$i][3] && $attend[$i][0]==$id && $attend[$i][4]==$dayS )
            return 1;    
    }    
    return 0;    
}
?>
<footer>Programmed and designed by Róbert R.  All rights reserved. &copy;</footer>
</body>