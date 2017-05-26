
function upload(value1)
{
	$(document).ready(function(){

  $.ajax({
      url:'Podkaz.php',
	  type:'post',
	  data: { "callFunc1": value1},
      complete: function (response) {
          $('#Kontajner_Pedagogika').html(response.responseText);
      },
      error: function () {
          $('#Kontajner_Pedagogika').html('Bummer: there was an error!');
      }
  });
  
  
  

});
	
	
	
}



function Zobraz(value)
{
	var blocky = document.getElementsByClassName("Kontajner");
	for(var i = 0; i < blocky.length; i++)
	{
	blocky[i].style.display="none";
	}
	document.getElementById(value).style.display="block";
	
	
}



// DOCHADZKA//

function show_select()
{
	document.getElementById("nepritomnost_select").style.display="block";
	
	
}

function hide_select()
{
	value_nepritomnost=undefined;
	document.getElementById("nepritomnost_select").style.display="none";
	
}

var value_nepritomnost;
function select_nepritomnost(value)
{
	value_nepritomnost=value;
	//alert(value);
	
}





var down = false;
$(document).mousedown(function() {
    down = true;
}).mouseup(function() {
    down = false;  
});

function paf(value) {
	//alert(value);
	
	if(down){
		if(value_nepritomnost!=undefined){
			if(value_nepritomnost!="none" ){
				if(value_nepritomnost!="DELETE"){
			if(document.getElementById(value).innerHTML===""){
				document.getElementById(value).innerHTML = value_nepritomnost;
				
				if(value_nepritomnost==="PN")
					document.getElementById(value).style.backgroundColor="red";
				if(value_nepritomnost==="OCR")
					document.getElementById(value).style.backgroundColor="green";
				if(value_nepritomnost==="Dovolenka")
					document.getElementById(value).style.backgroundColor="blue";
				if(value_nepritomnost==="Plan_Dovolenky")
					document.getElementById(value).style.backgroundColor="purple";
				if(value_nepritomnost==="Sluzobna_cesta")
					document.getElementById(value).style.backgroundColor="yellow";
				//alert("ano");
			insert_nepritomnost(value);
			}
		}
		}
		}
if(value_nepritomnost==="DELETE"){
	
	document.getElementById(value).innerHTML = "";
	document.getElementById(value).style.backgroundColor="white";
	delete_nepritomnost(value);
}



}

    
}
function delete_nepritomnost(value){
	
	//alert(value+""+value_nepritomnost);
	
	$(document).ready(function(){
  $.ajax({
      url:'kalendar.php',
	  type:'post',
	  data: { "callFunc7":value},
      complete: function (response) {
          $('#errorlog').html(response.responseText);
      },
      error: function () {
          $('#errorlog').html('Bummer: there was an error!');
      }
  });
  
  
  

});
		
		
	
	
}

function insert_nepritomnost(value){
	
	//alert(value+""+value_nepritomnost);
	
	$(document).ready(function(){
  $.ajax({
      url:'kalendar.php',
	  type:'post',
	  data: { "callFunc6":value+","+value_nepritomnost},
      complete: function (response) {
          $('#errorlog').html(response.responseText);
      },
      error: function () {
          $('#errorlog').html('Bummer: there was an error!');
      }
  });
  
  
  

});
		
		
	
	
}









var rok=0;
var mesiac=0;

function set_rok(value){
	//alert(value);
	rok=value;
}

function set_mesiac(value){
	
	mesiac=value;
}

function zobraz_kalendar(value){
	
	if(rok===0 || mesiac===0)
		;
	else
	{	
	$(document).ready(function(){
  $.ajax({
      url:'kalendar.php',
	  type:'post',
	  data: { "callFunc5":rok+","+mesiac+","+value},
      complete: function (response) {
          $('#kalendar1').html(response.responseText);
      },
      error: function () {
          $('#kalendar1').html('Bummer: there was an error!');
      }
  });
  
  
  

});
		
		
	}
	
}

// DOCHADZKA//



// DELETE filu//


function hop(value1)
{
	$(document).ready(function(){

  $.ajax({
      url:'delete.php',
	  type:'post',
	  data: { "callFunc1": value1},
      complete: function (response) {
          $('#cpp').html(response.responseText);
      },
      error: function () {
          $('#cpp').html('Bummer: there was an error!');
      }
  });
  
  
  

});
	
	
	
}


function hop2(value1)
{
	$(document).ready(function(){

  $.ajax({
      url:'delete.php',
	  type:'post',
	  data: { "callFunc2": value1},
      complete: function (response) {
          $('#cpp').html(response.responseText);
      },
      error: function () {
          $('#cpp').html('Bummer: there was an error!');
      }
  });
  
  
  

});
	
	
	
}
// DELETE filu//

//NAKUPY//
function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,id) {
			$(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
			$.ajax({
				url: "saveedit.php",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}        
		   });
		}


// NAKUPY //



