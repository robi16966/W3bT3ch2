<?php include_once 'lang/lang.php';?>
<!DOCTYPE HTML>
<html lang="sk">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $lang['MENU_STAFF']; ?></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

</head>
<body>
<?php include_once ('header/header.php');
include_once ('menu/menu.php');
?>
<style>
.staff{
	position: relative;
	z-index: -1;
	width: 80%;
	margin: auto;
	padding: 10px;
	text-align: left;
	background-color: white;
	border-radius: 2px;	
}

table,th,td { 
  border: none; 
  height: 30px;
  text-align:left;
}
</style>


<br><br>

<?php
$csvFile = file('staff/ZP_dataaaa.csv');
$departments = array();
$staffrole = array();
?>

<h2><?php echo $lang['MENU_STAFF']; ?></h2>

<?php echo $lang['FILTER_DEP']; ?>
<select class="department" id="myInput" onchange="myFunction()">
	<option>---</option>
		<option>OEMP</option>
		<option>OIKR</option>
		<option>AHU</option>
		<option>OEAP</option>
		<option>OAMM</option>
</select>


<?php echo $lang['FILTER_ROLE']; ?>
<select class="staffrole" id="myInput2" onchange="myFunction3()">
	<option>---</option>
	<option>doktorand</option>
	<option>teacher</option>
	<option>researcher</option>
</select>

<?php echo $lang['SORT']; ?>
<select class="sort" id="myInput3">
	<option>---</option>
	<option onclick="sortTable(0)"><?php echo $lang['NAME']; ?> </option>
	<option onclick="sortTable(3)"><?php echo $lang['DEPARTMENT']; ?></option>
	<option onclick="sortTable(4)"><?php echo $lang['STAFFROLE']; ?></option>
</select>

<br><br>
<div class="staff">
	<table class="table table-bordered" id="myTable">
<thead>
	<tr>
	   <th><?php echo $lang['NAME']; ?></th><th><?php echo $lang['ROOM']; ?></th><th><?php echo $lang['PHONE']; ?></th><th><?php echo $lang['DEPARTMENT']; ?></th><th><?php echo $lang['STAFFROLE']; ?></th><th><?php echo $lang['FUNCTION']; ?></th>
	</tr>
</thead>
<tbody>
<?php
$i=0;
foreach ($csvFile as $line => $value) {
$pieces = explode(";", $value);
	echo "<tr class = 'detail'><td><a href=\"\" class = 'myBtn'>" .$pieces[2]. " " .$pieces[0]." ".$pieces[1]." ".$pieces[3]."</a></td><td>" .$pieces[6]."</td><td>" .$pieces[7]."</td><td>".$pieces[8]."</td><td>".$pieces[9]."</td><td>" .$pieces[10]."</td></tr>";
   	$departments[$i] = $pieces[8];
	$staffrole[$i] = $pieces[9];

?>

<div class="modal">
		
  		<div class="modal-content">
    		<span class="close">&times;</span>
    		<p> bbbb </p>
  	</div>
<?php
$i++;
	}
?> 
</tbody>
</table>
<br><br><br><br>
</div>


<script>

$(".detail").on("click", function() {
   idx = $(this).index();
	console.info(idx);


var modal = document.getElementsByClassName("modal")[idx];

// Get the button that opens the modal
var btn = document.getElementsByClassName("myBtn")[idx];

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[idx];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

alert("bla");
});


function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
	if(input.value == "---"){
		for (j = 0; j < tr.length; j++){
			tr[j].style.display = "";
		}
	}
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function myFunction3() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
	if(input.value == "---"){
		for (j = 0; j < tr.length; j++){
			tr[j].style.display = "";
		}
	}

    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

<?php include_once 'footer/footer.php';?>
</body>
</html>
