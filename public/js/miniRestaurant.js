  $(document).ready(function () {

  $("#marioDiv").animate({ left: '1700px' }, "slow").animate({ opacity: '0' }, "slow");


  $("#flip").click(function () {
    $("#panel").slideDown(5000);
    $("#flip").hide();
  });
    $("#stop").click(function(){
    $("#panel").stop();
  });
  $("#hamburguesa").show();
    $("#Adult").hide();
    $("#Juvenil").hide();
    $("#Kids").hide();
    $("#complement").hide();
    $("#beguda").hide();
    $("#postre").hide();

  $("#menuHamburguesa").click(function () {
    $("#hamburguesa").show();
      $("#Adult").hide();
      $("#Juvenil").hide();
      $("#Kids").hide();
      $("#complement").hide();
      $("#beguda").hide();
      $("#postre").hide();
  });
  $("#menuComplement").click(function () {
    $("#complement").show();
      $("#Adult").hide();
      $("#Juvenil").hide();
      $("#Kids").hide();
      $("#hamburguesa").hide();
      $("#beguda").hide();
      $("#postre").hide();
  });
  $("#menuBeguda").click(function () {
    $("#beguda").show();
      $("#Adult").hide();
      $("#Juvenil").hide();
      $("#Kids").hide();
      $("#hamburguesa").hide();
      $("#complement").hide();
      $("#postre").hide();
  });
  $("#menuPostres").click(function () {
    $("#postre").show();
      $("#Adult").hide();
      $("#Juvenil").hide();
      $("#Kids").hide();
      $("#hamburguesa").hide();
      $("#complement").hide();
      $("#beguda").hide();
  });

  $("#menuAdults").click(function () {
      $("#Adult").show();
        $("#postre").hide();
        $("#Juvenil").hide();
        $("#Kids").hide();
        $("#hamburguesa").hide();
        $("#complement").hide();
        $("#beguda").hide();
    });

  $("#menuJuvenils").click(function () {
    $("#Juvenil").show();
      $("#Adult").hide();
      $("#postre").hide();
      $("#Kids").hide();
      $("#hamburguesa").hide();
      $("#complement").hide();
      $("#beguda").hide();
  });

  $("#menuKids").click(function () {
    $("#Kids").show();
      $("#Adult").hide();
      $("#Juvenil").hide();
      $("#postre").hide();
      $("#hamburguesa").hide();
      $("#complement").hide();
      $("#beguda").hide();
  });


    $("#p1").css("color", "red").hide();
    $("#p1").css("color", "red").slideDown(2000);
    $("#p1").css("color", "red").slideUp(2000);

    $("button").click(function(){
      var txt = "";
    txt += "Width of div: " + $("#div1").width() + "</br>";
    txt += "Height of div: " + $("#div1").height();
    $("#div1").html(txt);
    $("#div1").fadeIn();
    $("#div2").fadeIn("slow");
    $("#div3").fadeIn(3000);
  });

});
function mouseDown() {
  document.getElementById("demo").innerHTML = "NO hi ha ofertes.";
}

function mouseUp() {
  document.getElementById("demo").innerHTML = "Descompte del 10%.";
}

function bigImg(x) {
  x.style.height = "300px";
  x.style.width = "300px";
}

function normalImg(x) {
  x.style.height = "150px";
  x.style.width = "150px";
}
var menu = new Array();
var menuPreu = new Array();

function factura(nom, preu) {

  menu.push(nom);
  menuPreu.push(preu);

  imprimirMenu();
  imprimirPreu();

  imprimirMenuComp();
  imprimirPreuComp();

  imprimirMenuBeguda();
  imprimirPreuBeguda();

  imprimirMenuPostre();
  imprimirPreuPostre();

  imprimirMenuJuvenil();  //-----------------------------------------------------------------------------------------------Ferran
  imprimirPreuJuvenil();  //-----------------------------------------------------------------------------------------------Ferran


  console.log(menu);
  console.log(menuPreu);
}

function imprimirMenu() {
  var table = document.getElementById("taula");
  var newRow = table.insertRow(table.length);
  var cell = newRow.insertCell(i);

  for (var i = 0; i < menu.length; i++) {

    cell.innerHTML = menu[i];

  }
}
function imprimirPreu() {
  var table2 = document.getElementById("taula2");
  var newRow = table2.insertRow(table2.length);
  var cell = newRow.insertCell(i);

  for (var i = 0; i < menuPreu.length; i++) {

    cell.innerHTML = menuPreu[i];
  }
  suma();
  suma2();
  suma3();
  suma4();
  suma5();
  suma6(); // ------------------------------------------------------------------------------------Ferran

}
function imprimirMenuComp() {
  var table = document.getElementById("taulaComp");
  var newRow = table.insertRow(table.length);
  var cell = newRow.insertCell(i);

  for (var i = 0; i < menu.length; i++) {

    cell.innerHTML = menu[i];

  }
}

function imprimirPreuComp() {
  var table2 = document.getElementById("taula2Comp");
  var newRow = table2.insertRow(table2.length);
  var cell = newRow.insertCell(i);

  for (var i = 0; i < menuPreu.length; i++) {

    cell.innerHTML = menuPreu[i];
  }
}

function imprimirMenuBeguda() {
  var table = document.getElementById("taulaBeguda");
  var newRow = table.insertRow(table.length);
  var cell = newRow.insertCell(i);

  for (var i = 0; i < menu.length; i++) {

    cell.innerHTML = menu[i];

  }
}

function imprimirPreuBeguda() {

  var table2 = document.getElementById("taula2Beguda");
  var newRow = table2.insertRow(table2.length);
  var cell = newRow.insertCell(i);

  for (var i = 0; i < menuPreu.length; i++) {

    cell.innerHTML = menuPreu[i];
  }
}

function imprimirMenuPostre() {
  var table = document.getElementById("taulaPostre");
  var newRow = table.insertRow(table.length);
  var cell = newRow.insertCell(i);

  for (var i = 0; i < menu.length; i++) {

    cell.innerHTML = menu[i];

  }
}

function imprimirPreuPostre() {

  var table2 = document.getElementById("taula2Postre");
  var newRow = table2.insertRow(table2.length);
  var cell = newRow.insertCell(i);

  for (var i = 0; i < menuPreu.length; i++) {

    cell.innerHTML = menuPreu[i];
  }
}

function eliminarFactura() {

  menuPreu.splice(0, menuPreu.length);
  menu.splice(0, menu.length);

  location.reload();
  console.log(menu);
  console.log(menuPreu);
}

function suma() {

  var total = 0;
  for (var i = 0; i < menuPreu.length; i++) {
    total += menuPreu[i];
  }

  console.log(total);

  document.getElementById("inTotal").value = total.toFixed(2);
}
function suma2() {

  var total = 0;
  for (var i = 0; i < menuPreu.length; i++) {
    total += menuPreu[i];
  }
  console.log(total);

  document.getElementById("inTotal2").value = total.toFixed(2);
}
function suma3() {

  var total = 0;
  for (var i = 0; i < menuPreu.length; i++) {
    total += menuPreu[i];
  }
  console.log(total);

  document.getElementById("inTotal3").value = total.toFixed(2);
}
function suma4() {

  var total = 0;
  for (var i = 0; i < menuPreu.length; i++) {
    total += menuPreu[i];
  }
  console.log(total);

  document.getElementById("inTotal4").value = total.toFixed(2);
}
function suma5() {

  var total = 0;
  for (var i = 0; i < menuPreu.length; i++) {
    total += menuPreu[i];
  }
  console.log(total);

  document.getElementById("inTotal5").value = total.toFixed(2);
}

function valida() {

  var email, pasword, nom, cognom, ciutat, totalPagar, expressio, expressio2, expressio3, checkbox;

  expressio = /\w+@\w+\.+[a-z]/;
  expressio2 = new RegExp('[A-Z]','i');
  expressio3 = /^\d{9}$/;

  email = document.getElementById("email").value;
  pasword = document.getElementById("pwd").value;
  nom = document.getElementById("nom").value;
  cognom = document.getElementById("cognom").value;
  ciutat = document.getElementById("ciutat").value;
  totalPagar = document.getElementById("inTotal5").value;
  targeta = document.getElementById("targeta").value;
  checkbox = document.getElementById("check");

  if(email === "" || pasword === "" || nom === "" || cognom === "" || ciutat === "" || totalPagar === ""|| targeta === "" ){

    alert("El camp esta buit");
  }
  else if(nom.length > 30){

    alert ("El nom es molt llarg");
    return false;
  }
  else if(!expressio2.test(nom)) {

    alert("El nom no es valid");
    return false;
  }
  else if(email.length > 30){

    alert ("L'email es molt llarg");
    return false;
  }
  else if(!expressio.test(email)) {

    alert("El correu no es valid");
    return false;
  }
  else if(pasword.length > 30){

    alert ("El password es molt llarg");
    return false;
  }
  else if(cognom.length > 30){
    alert ("El cognom es molt llarg");
    return false;
  }
  else if(ciutat.length > 30){
    alert ("El camp ciutat es molt llarg");
    return false;
  }

  else if( !expressio3.test(targeta)) {
        alert ("Numero de targeta incorrecte");
    return false;
  }

  else if( !checkbox.checked ) {
    alert("Accepta les condicions");
  return false;
  }
  tiquet();
  setCookie();
  getCookie();
  comprovar();
}

 function tiquet(){
  numComanda = Math.round(Math.random()*10000);
  alert("Compra amb exit!");   // ---------------------------------------------------------------Ferran
   alert("Numero de tiquet: " +numComanda + " Pots anar a la barra a buscar la teva comanda");
 }


function setCookie() {
      var cookenom = "usuariNom";
      var d = new Date();
      var nom = document.getElementById('nom').value;
      d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000));
      var expires = "expires=" + d.toUTCString();
      document.cookie = cookenom + "=" + nom + ";" + expires + ";path=/";
      console.log(nom);
    }

function getCookie(cookenom) {
  var name = cookenom + "=";
  var ca = document.cookie.split(';');
  console.log(name);
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
      while (c.charAt(0) == ' ') {
            c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
      }
    }
      return "";
}

function comprovar() {
  var usuari = getCookie("usuariNom");
    if (usuari != "") {
      document.getElementById('nom').value = usuari;
  }
}
//ivan
function elPrimero(){
  $('#primerFill').dblclick(function () {
      $('#myModal4').modal('toggle');
  });
  var list = document.getElementById("primerFill").firstChild.innerHTML;
   document.getElementById("retornaFill").innerHTML = list;

   var list = document.getElementById("primerFill").lastChild.innerHTML;
    document.getElementById("elIngrediente").innerHTML = list;
}

function elSegon(){
  $('#segonFill').dblclick(function () {
      $('#myModal4').modal('toggle');
  });
  var list = document.getElementById("segonFill").firstChild.innerHTML;
   document.getElementById("retornaFill").innerHTML = list;

   var list = document.getElementById("segonFill").lastChild.innerHTML;
    document.getElementById("elIngrediente").innerHTML = list;
}

function elTre(){
  $('#tercerFill').dblclick(function () {
      $('#myModal4').modal('toggle');
  });
  var list = document.getElementById("tercerFill").firstChild.innerHTML;
   document.getElementById("retornaFill").innerHTML = list;
}

function elQuart(){
  $('#quartFill').dblclick(function () {
      $('#myModal4').modal('toggle');
  });
  var list = document.getElementById("quartFill").firstChild.innerHTML;
   document.getElementById("retornaFill").innerHTML = list;
}



function menuPopular(){
  $('#popular').dblclick(function () {
      $('#myModal2').modal('toggle');
  });

  var x = document.getElementById("menu1").nextSibling.innerHTML;
  document.getElementById("mesPopular").innerHTML = x;

}

function cosetes(){
  var c = document.getElementsByTagName("BUTTON")[0];
  var x = c.childNodes[0].nodeValue;
  document.getElementById("demo").innerHTML = x;
}




//--------------------------------------------------------------------------------------------------------------------------Ferran

function imprimirMenuJuvenil() {
  var table = document.getElementById("taulaJuvenil");
  var newRow = table.insertRow(table.length);
  var cell = newRow.insertCell(i);

  for (var i = 0; i < menu.length; i++) {

    cell.innerHTML = menu[i];

  }
}

function imprimirPreuJuvenil() {

  var table2 = document.getElementById("taula2Juvenil");
  var newRow = table2.insertRow(table2.length);
  var cell = newRow.insertCell(i);

  for (var i = 0; i < menuPreu.length; i++) {

    cell.innerHTML = menuPreu[i];
  }
}

function suma6() {

  var total = 0;
  for (var i = 0; i < menuPreu.length; i++) {
    total += menuPreu[i];
  }
  console.log(total);

  document.getElementById("inTotal6").value = total.toFixed(2);
}

function eliminarm1(){

var m1 = document.getElementById("foto1");
var m11 = document.getElementById("boto1");
var m111 = document.getElementById("boto5");
    if (m1) {
    m1.parentNode.removeChild(m1);
  }
    if (m11) {
    m11.parentNode.removeChild(m11);
  }
 if (m111) {
    m111.parentNode.removeChild(m111);
  }
}

function eliminarm2(){

var m2 = document.getElementById("foto2");
var m22 = document.getElementById("boto2");
var m222 = document.getElementById("boto6");
    if (m2) {
    m2.parentNode.removeChild(m2);
  }
    if (m22) {
    m22.parentNode.removeChild(m22);
  }
    if (m222) {
    m222.parentNode.removeChild(m222);
  }
}
function eliminarm3(){

var m3 = document.getElementById("foto3");
var m33 = document.getElementById("boto3");
var m333 = document.getElementById("boto7");
    if (m3) {
    m3.parentNode.removeChild(m3);
  }
    if (m33) {
    m33.parentNode.removeChild(m33);
  }
if (m333) {
    m333.parentNode.removeChild(m333);
  }
}

function eliminarm4(){

var m4 = document.getElementById("foto4");
var m44 = document.getElementById("boto4");
var m444 = document.getElementById("boto8");
    if (m4) {
    m4.parentNode.removeChild(m4);
  }
    if (m44) {
    m44.parentNode.removeChild(m44);
  }
if (m444) {
    m444.parentNode.removeChild(m444);
  }
}

function replacem1(){

    var replace1 = document.createElement("img");
    replace1.setAttribute("src", "img/juvenil/11.jpg")
    var m1 = document.getElementById("foto1");
    if (m1) {
    m1.parentNode.replaceChild(replace1, m1);
  }
}

function replacem2(){

    var replace2 = document.createElement("img");
    replace2.setAttribute("src", "img/juvenil/22.jpg")
    var m2 = document.getElementById("foto2");
    if (m2) {
    m2.parentNode.replaceChild(replace2, m2);
  }
}

function replacem3(){

    var replace3 = document.createElement("img");
    replace3.setAttribute("src", "img/juvenil/33.jpg")
    var m3 = document.getElementById("foto3");
    if (m3) {
    m3.parentNode.replaceChild(replace3, m3);
  }
}

function replacem4(){

    var replace4 = document.createElement("img");
    replace4.setAttribute("src", "img/juvenil/44.jpg")
    var m4 = document.getElementById("foto4");
    if (m4) {
    m4.parentNode.replaceChild(replace4, m4);
  }
}

function info1(){
     var info11 = document.getElementById("boto9").className;

    alert("La classe del boto es :  " + info11 );
}

function info2() {
  var dir = document.getElementById("boto4").dir;
    alert("El boto4 esta direccionat a : " + dir)
}

function info3() {
  var id = document.getElementById("boto4").id;
    alert("El boto4 te la ID : " + id)
}

function info4() {
  var lang = document.getElementById("info4").lang;
    alert("La pagina esta amb idioma : " + lang);
}

function info5() {
  var style1 = document.getElementById("info5").style.marginTop;
    alert("El boto te un estil CSS: " + style1);
}
