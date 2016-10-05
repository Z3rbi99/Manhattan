function checkPass() {
  var password1 = document.getElementById('password1');
  var password2 = document.getElementById('password2');
  var message = document.getElementById('confirmMessage');

  var goodColor = "#66cc66";
  var badColor = "#ff6666";

  if (password1.value == password2.value) {
    password2.style.backgroundColor = goodColor;
    message.style.color = goodColor;
    message.innerHTML = "Le password corrispondono."
	  return true;
  } else {
    password2.style.backgroundColor = badColor;
    message.style.color = badColor;
    message.innerHTML = "Le password non corrispondono."
	  return false;
  }
}


function checkPW2() {
  var password2 = document.forms["registrazione"]["password2"].value;

  if (password2.value != "")
    checkPass()
}


function checkEmptyInput(event) {
//  Funzione che restituisce FALSE se i campi sono valorizzati, TRUE se manca qualche campo
  var nome = document.forms["registrazione"]["nome"].value;
  var cognome = document.forms["registrazione"]["cognome"].value;
  var username = document.forms["registrazione"]["username"].value;
  var email = document.forms["registrazione"]["email"].value;

  var message = document.getElementById('emptyMessage');

  var avviso = false;
  var empty = "#ff6666";

  if (nome == null || nome == "") {
    event.preventDefault();
    document.getElementById("nome").style.backgroundColor = empty;
    avviso = true;
  }
  if (cognome == null || cognome == "") {
    event.preventDefault();
    document.getElementById("cognome").style.backgroundColor = empty;
    avviso = true;
  }
  if (username == null || username == "") {
    event.preventDefault();
    document.getElementById("username").style.backgroundColor = empty;
    avviso = true;
  }
  if (document.forms["registrazione"]["password1"].value == null || document.forms["registrazione"]["password1"].value == "") {
    event.preventDefault();
    document.getElementById("password1").style.backgroundColor = empty;
    avviso = true;
  }
  if (!checkPass()) {
    event.preventDefault();
  }
  if (email == null || email == "") {
    event.preventDefault();
    document.getElementById("email").style.backgroundColor = empty;
    avviso = true;
  }
  if (avviso) {
    message.style.color = empty;
    message.innerHTML = "Devi riempire tutti i campi."
  }
    return avviso;
}


function checkEmptyInputAndBlur(event) {
  var crypt = new Crypt();
  var password1 = crypt.HASH.sha512(document.forms["registrazione"]["password1"].value.toString());
  var password2 = crypt.HASH.sha512(document.forms["registrazione"]["password2"].value.toString());

  var para1 = document.createElement("input");
  para1.setAttribute("id", "inp1");
  para1.setAttribute("type", "hidden");

  var para2 = document.createElement("input");
  para2.setAttribute("id", "inp2");
  para2.setAttribute("type", "hidden");

  var element = document.getElementById("registrazione");
  element.appendChild(para1);
  element.appendChild(para2);


  $( "#inp1" ).val(password1);
  $( "#inp2" ).val(password2);


  if(setBlurListener(event)){
    var param = {
        "nome": $( "#nome" ).val(),
        "cognome": $( "#cognome" ).val(),
        "username": $( "#username" ).val(),
        "password1": $("#inp1").val(),
        "password2": $("#inp2").val(),
        "email": $( "#email" ).val()
      };

    $.post("RegistrazioneFunctions.php", param)
      .done(function( data ) {
        alert( "Risposta: " + data );
        if (data == "Registrazione avvenuta correttamente")
          window.location.href = "../Php/LoginPage.php";
        })
  } else {
      alert("Errore di qualche tipo");
  }
}


function setBlurListener(event){
  var inputs = document.getElementsByTagName('input');
  var result = false;
  var jac = false;
  for (index = 0; index < inputs.length; ++index) {
    if(inputs[index].getAttribute("type")!="button"){
      if(!checkEmptyInput(event)){
          result = true;
      }
    }
  }
  return result;
}


function focusFunction(el) {
  var writing = "#ffffff";
  el.style.background = writing;
}
