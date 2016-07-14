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


function checkPassAndGo(event) {
	if (!checkPass())
		event.preventDefault();
}


function checkEmptyInput(event) {
  var nome = document.forms["registrazione"]["nome"].value;
  var cognome = document.forms["registrazione"]["cognome"].value;
  var username = document.forms["registrazione"]["username"].value;
  var password1 = document.forms["registrazione"]["password1"].value;
  var password2 = document.forms["registrazione"]["password2"].value;
  var mail = document.forms["registrazione"]["mail"].value;

  var avviso = false;
  var empty = "#fff159";

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
  if (password2 == null || password2 == "") {
    event.preventDefault();
    document.getElementById("password2").style.backgroundColor = empty;
    avviso = true;
  }
  if (mail == null || mail == "") {
    event.preventDefault();
    document.getElementById("mail").style.backgroundColor = empty;
    avviso = true;
  }
  if (avviso) {
    message.innerHTML = "Devi riempire tutti i campi."
  }
}
