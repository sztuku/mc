var products =document.getElementsByClassName("produktyform");

var jumpbtn =document.getElementById("buy");
var jumpwindow=document.getElementById("oknoilosc");
var productform=document.getElementById("produktyform");


jumpbtn.addEventListener("click", podajilosc,false);



// <button type="submit" " class="btn btn-outline-danger">Dodaj do koszyka</button>

function podajilosc(){

var cien = document.createElement("div");
cien.style.position="absolute";
cien.style.top="0";
cien.style.width="100%";
cien.style.height="100%";
cien.style.backgroundColor="#82767661";
cien.style.zIndex="3";
document.getElementById("cien").appendChild(cien);




var zamowbtn=document.createElement("button");
zamowbtn.type="submit";
zamowbtn.className="btn btn-danger";
zamowbtn.innerText="Dodaj do koszyka";
zamowbtn.style.zIndex="4";


var liczenie = document.createElement("div");
liczenie.className = "col-6 offset-3   count";
liczenie.style.zIndex="4";
liczenie.style.position="absolute";
//liczenie.style.paddingLeft="25%";
liczenie.style.top="50%";

var btnUp = document.createElement("output");
btnUp.className = "countup countbtn";
btnUp.id="countup";
btnUp.value = "+";
//btnUp.style.cssFloat="left";




var liczenieOkno = document.createElement("input");
liczenieOkno.className = "ilosc";
liczenieOkno.value = "1";
liczenieOkno.name = "ilosc";
liczenieOkno.style.background= "rgb(137, 137, 137)";
liczenieOkno.style.color=" rgb(65, 64, 64)";
liczenieOkno.style.border= "3px solid rgb(70, 70, 70)";
liczenieOkno.style.textAlign="center";
liczenieOkno.style.marginBottom="10%";
//liczenieOkno.style.cssFloat="left";



var btnDown = document.createElement("output");
btnDown.className = "countdown countbtn";
btnDown.value = "-";
btnDown.id="countdown";
//btnDown.style.cssFloat="left";





productform.appendChild(liczenie);

liczenie.appendChild(btnUp);
liczenie.appendChild(liczenieOkno);
liczenie.appendChild(btnDown);
liczenie.appendChild(zamowbtn);

var arrowUp = document.getElementById("countup");
var arrowDown = document.getElementById("countdown");

arrowUp.addEventListener(
    "click",
    function() {
      fieldUp(this);
    },
    false
  );

  arrowDown.addEventListener(
    "click",
    function() {
      fieldDown(this);
    },
    false
  );

  
cien.addEventListener("click",function(){

    cien.remove();
    liczenie.remove();

},false);

}
  
function fieldUp(e) {
    var wartosc = parseInt(e.nextSibling.value);
    e.nextSibling.value = wartosc + 1;
    e.nextSibling.style.background = " #898989";
    e.nextSibling.style.color = " #414040";
    e.nextSibling.style.border="3px solid #464646";
  }
  
  function fieldDown(e) {
    var wartosc = parseInt(e.previousSibling.value);
    if (wartosc <= 1) {
      e.previousSibling.value = 1;
      e.previousSibling.style.background = " #ff2221";
      e.previousSibling.style.color = "white";
      alert("Nie możesz zamowić mniej niż jeden produkt");
    } else {
      e.previousSibling.value = wartosc - 1;
      
    }
  }