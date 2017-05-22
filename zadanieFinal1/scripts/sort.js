function sortTable(key) {
    //alert(key.value);
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("tableProjekty");
  switching = true;
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
      x = rows[i].getElementsByTagName("TD")[key.value];
      y = rows[i + 1].getElementsByTagName("TD")[key.value];
      //check if the two rows should switch place:
      if($.isNumeric(x.innerHTML) && $.isNumeric(y.innerHTML)){
        if (parseInt(x.innerHTML) > parseInt(y.innerHTML)) {
            //if so, mark as a switch and break the loop:
            shouldSwitch= true;
            break;
        }
      }
      else{
          //if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {// y.innerHTML.toLowerCase().localeCompare(x.innerHTML.toLowerCase(),'sk', { sensitivity: 'base' })<0
            //if so, mark as a switch and break the loop:
          if(new Intl.Collator("sk").compare(y.innerHTML.toLowerCase(),x.innerHTML.toLowerCase())<0){
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
    }
  }
}
filterMeno='';
filterStud='';
function filtrTableStud(key) {
  var table, tr, td, i;
  filterStud = key.value.toUpperCase();
  if(new String(filterStud).valueOf()==new String("NASTAVIç").valueOf())
      filterStud="";
  table = document.getElementById("tableProjekty");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    tdStud = tr[i].getElementsByTagName("td")[3];
    tdMeno = tr[i].getElementsByTagName("td")[2];
    if (tdStud && tdMeno) {
      if (tdStud.innerHTML.toUpperCase().indexOf(filterStud) > -1 && tdMeno.innerHTML.toUpperCase().indexOf(filterMeno) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function filtrTableMeno(key) {
  var table, tr, td, i;
  filterMeno = key.value.toUpperCase();
  if(new String(filterMeno).valueOf()==new String("NASTAVIç").valueOf())
      filterMeno="";
  table = document.getElementById("tableProjekty");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    tdStud = tr[i].getElementsByTagName("td")[3];
    tdMeno = tr[i].getElementsByTagName("td")[2];
    if (tdStud && tdMeno) {
      if (tdStud.innerHTML.toUpperCase().indexOf(filterStud) > -1 && tdMeno.innerHTML.toUpperCase().indexOf(filterMeno) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

$( "#studProg" ).replaceWith( $( "#filtrStud" ) );
$( "#menSkol" ).replaceWith( $( "#filtrSkol" ) );