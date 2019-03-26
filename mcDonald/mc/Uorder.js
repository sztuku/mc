
$(function() {


var list=$('.products');

var iloscrzeczy=$('.zmien');
  
  
 
  





var btnUp = document.createElement("output");
    btnUp.className = "countup countbt";
    btnUp.value = "+";
    
   

    
var btnDown = document.createElement("output");
    btnDown.className = "countdown countbt";
    btnDown.value = "-";
    btnUp.style.cssFloat="left";



  
  
  iloscrzeczy.append(btnUp, btnDown);
  



 
  $(".countup").click(
    "click",
    function() {
      fieldUp(this);
    },
    false
  );

  $(".countdown").click(
    "click",
    function() {
      fieldDown(this);
    },
    false
  );
  


function fieldUp(e) {
  var wartosc = parseInt(e.previousSibling.value);
  e.previousSibling.value = wartosc + 1;
  e.previousSibling.style.color="inherit";
 
}

function fieldDown(e) {
  var wartosc = parseInt(e.previousSibling.previousSibling.value);
  if (wartosc <=1) {
    e.previousSibling.previousSibling.value = 1;
 
    e.previousSibling.previousSibling.style.color = "red";
  } else {
    e.previousSibling.previousSibling.value = wartosc - 1;
     
  }}
})