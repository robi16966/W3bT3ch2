function albums(){
    var request;
    var desc = new Array();
    var lang=getCookie('lang');
    if(window.XMLHttpRequest)
    {
      request=new XMLHttpRequest();
    } else {
      request=new ActiveXObject("Microsoft,XMLHTTP");
    }
    request.open('GET', 'json/pictures.json');
    request.onreadystatechange = function()
    {
      if((request.readyState===4)&&(request.status===200)){
        var items = JSON.parse(request.responseText);
        
        number=0;
        for(var key in items.pictureCon)
        {
            for(var key2 in items.pictureCon[key])
            {
                if(items.pictureCon[key][key2].alt){ 
                    var column = document.createElement('div');
                    var a = document.createElement('a');
                    a.setAttribute('href','fotog.php?udalost='+key);
                    column.setAttribute('class','column');
                    var udalostDiv = document.createElement('div');
                    udalostDiv.setAttribute("class", "udalDiv")
                    var img = document.createElement('img');                 
                    img.src=items.pictureCon[key][key2].src;
                    img.setAttribute("alt", items.pictureCon[key][key2].alt);
                    img.setAttribute("height", items.pictureCon[key][key2].height);
                    img.setAttribute("width", items.pictureCon[key][key2].width);
                    udalostDiv.appendChild(udalost);
                    a.appendChild(img);
                    a.appendChild(udalostDiv);
                    column.appendChild(a);
                    document.getElementById("row").appendChild(column);
                    break;
                }
                else{
                    if(lang=='sk')
                        udalost=document.createTextNode(items.pictureCon[key][key2].name_sk);
                    else
                        udalost=document.createTextNode(items.pictureCon[key][key2].name_en);
                }
        }
        
      }
    }
}
request.send();
}
function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}
function showImages(udalost){
    var request;
    var desc = new Array();
    if(window.XMLHttpRequest)
    {
      request=new XMLHttpRequest();
    } else {
      request=new ActiveXObject("Microsoft,XMLHTTP");
    }
    request.open('GET', 'json/pictures.json');
    request.onreadystatechange = function()
    {
      if((request.readyState===4)&&(request.status===200)){
        var items = JSON.parse(request.responseText);
        
        var images=document.getElementsByClassName("hover-shadow");
        
        number=0;
        for(var key in items.pictureCon[udalost])
        {
            if(items.pictureCon[udalost][key].alt){
            number++;
            var column = document.createElement('div');
            column.setAttribute('class','column');
            var img = document.createElement('img');                 
            img.src=items.pictureCon[udalost][key].src;
            img.setAttribute("alt", items.pictureCon[udalost][key].alt);
            img.setAttribute("height", items.pictureCon[udalost][key].height);
            img.setAttribute("width", items.pictureCon[udalost][key].width);
            img.setAttribute("onclick","openModal();currentSlide("+number+")");
            column.appendChild(img);
            document.getElementById("row").appendChild(column);
            desc[key]=items.pictureCon[udalost][key].desc;
            }
        }
        
            //var imgNum = document.getElementsByClassName("mySlide-img");

        for(var key in items.pictureCon[udalost])
        {
            if(items.pictureCon[udalost][key].alt){
            var slides = document.createElement('div');
            slides.className='mySlides';
            var img = document.createElement('img');
            img.className='mySlide-img';
            img.src=items.pictureCon[udalost][key].src;
            img.setAttribute("alt", items.pictureCon[udalost][key].alt);
            img.setAttribute("width", '100%');
            img.setAttribute("height", '600px');
            slides.appendChild(img);
            document.getElementById("modalContent").appendChild(slides);
            }
        }
        
        //var imgDemo = document.getElementsByClassName("demo");
        number=0;
        for(var key in items.pictureCon[udalost])
        {
            if(items.pictureCon[udalost][key].alt){
            number++;
           var slides = document.createElement('div');
            slides.className='column';
            var img = document.createElement('img');
            img.className='demo';
            img.src=items.pictureCon[udalost][key].src;
            img.setAttribute("alt", items.pictureCon[udalost][key].alt);
            img.setAttribute("width", '85%');
            img.setAttribute("height", '200px');
            img.setAttribute("onclick",'currentSlide('+number+')');
            slides.appendChild(img);
            document.getElementById("modalContent").appendChild(slides);
            }
        }
      }
    }
    request.send();
}

function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
  start(0);
}

function start(value)
{
   var button=document.getElementById("start");
  if(value==1){
    myVar = setInterval(plusSlides, 1000,1);
    button.style.color="green";
  }
  if(value==0){
    clearInterval(myVar);
    button.style.color="white";
  }
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides= document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}