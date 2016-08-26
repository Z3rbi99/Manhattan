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

  if (password2 != "")
    checkPass()
}


function checkEmptyInput(event) {
//  alert('ciao');
  var nome = document.forms["registrazione"]["nome"].value;
  var cognome = document.forms["registrazione"]["cognome"].value;
  var username = document.forms["registrazione"]["username"].value;
  var password1 = document.forms["registrazione"]["password1"].value;
  var password2 = document.forms["registrazione"]["password2"].value;
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
  if (password1 == null || password1 == "") {
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
    //controlloDB();
}


/* VERSIONI JAVASCRIPT SENZA jQuery
function receiveResponse(state)
{
    if (state.readyState == 4)
    {
        // xhr.readyState == 4, so we've received the complete server response
        if (state.status == 200)
        {
            // xhr.status == 200, so the response is good
            var response = state.responseXML;
            console.log(response);
            document.getElementById("risultato").innerHTML = response;
        }
    }else{
        console.log(state.readyState);
    }
}


function controlloDB() {
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "RegistrazioneFunctions.php", true);
  xhttp.onreadystatechange = function(){
    receiveResponse(xhttp);
//    console.log(xhttp);
  };
  xhttp.send("nome="+document.getElementById('nome').value+"&cognome="+document.getElementById('cognome').value);

//  function() {
//    if (xhttp.readyState == 4 && xhttp.status == 200) {
//      document.getElementById("risultato").innerHTML = xhttp.responseText;
//    }
//  };
//  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
}*/


function checkEmptyInputAndBlur(event) {
  //checkEmptyInput(event);
  if(setBlurListener(event)){
    $.get( "RegistrazioneFunctions.php", { nome: $( "#nome" ).val(), cognome: $( "#cognome" ).val(), username: $( "#username" ).val(), password1: $( "#password1" ).val(), password2: $("#password2").val(), email: $( "#email" ).val() })
      .done(function( data ) {
          alert( "Risposta: " + data );
        })
  }else{
      alert("Errore di qualche tipo");
  }
}


function setBlurListener(event){
  var inputs = document.getElementsByTagName('input');
  var result = false;
  for (index = 0; index < inputs.length; ++index) {
    if(inputs[index].getAttribute("type")!="submit"){

      var ciao = inputs[index].addEventListener("blur", function() {
                  if(!checkEmptyInput(event)){
                    result = true;
                    return result;
                  }
      });
      alert('setblurList result'+ciao);
    }
  }

  return result;
}


function focusFunction(el) {
  var writing = "#ffffff";
  el.style.background = writing;
}
