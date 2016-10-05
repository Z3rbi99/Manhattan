<?php
$conn = @pg_connect('dbname=postgres user=postgres password=iacopo');
if(!$conn) {
	die('Connessione fallita !<br />');
}
$_SESSION['my_test_loggedin']="session_set";
include('SecurityFunctions.php');


if (checkFullInput(strip_tags($_POST['nome'])) &&
		checkFullInput(strip_tags($_POST['cognome'])) &&
		checkFullInput(strip_tags($_POST['username'])) &&
		checkFullInput(strip_tags($_POST['password1'])) &&
		checkFullInput(strip_tags($_POST['email'])) &&
		userNotInDataBase(strip_tags($_POST['username'])) &&
		emailNotInDataBase(strip_tags($_POST['email'])) &&
		passwordUguali(strip_tags($_POST['password1']), (strip_tags($_POST['password2'])))) {

			insertDatiRegistrazione(strip_tags($_POST['nome']), strip_tags($_POST['cognome']), strip_tags($_POST['username']), strip_tags($_POST['password1']), strip_tags($_POST['email']));
}

function checkFullInput($input) {
  if (isset($input) and $input != "" and sqlInjection($input)) {
    return true;
  } else {
    return false;
  }
}

function userNotInDataBase($user) {
  if (!$queryUserUnivoco = @pg_query("select count(*) from LOGIN where username = '".$user."'")) {
		die ("Errore nella query: " . pg_last_error($conn));
	} else {
		while ($userUnivoco = pg_fetch_assoc($queryUserUnivoco)) {
			if ($userUnivoco['count'] == 0) {
        return true;
      } else {
				echo "Questo username è già stato usato.";
        return false;
      }
    }
  }
}


function emailNotInDataBase($email) {
  if (!$queryEmailUnivoca = @pg_query("select count(*) as conteggio from PERSONE where email = '".$email."'")) {
		die ("Errore nella query: " . pg_last_error($conn));
	} else {
		$controllo = false;
		$messaggio = "";
		while ($emailUnivoca = pg_fetch_assoc($queryEmailUnivoca)) {
			if ($emailUnivoca['conteggio'] == 0) {
        $controllo = true;
      } else {
				$messaggio = "Questa email è collegata ad un altro account.";
      }
    }
		if($messaggio!="")
			echo $messaggio;
		return $controllo;
  }
}


function passwordUguali($pwd1, $pw2) {
  if ($pwd1 == $pw2) {
    return true;
  } else {
    return false;
  }
}


function insertDatiRegistrazione($nome, $cognome, $username, $password, $email) {

  if (!$queryInsertDatiRegistrazionePersone = @pg_query("insert into PERSONE (Nome, Cognome, Username, Email) values ('".$nome."','".$cognome."','".$username."','".$email."');")) {
    die ("Errore nella query: " . pg_last_error($conn));
  }
	if (!$queryInsertDatiRegistrazioneLogin = @pg_query("insert into LOGIN (Username, Password) values ('".$username."','".$password."');")) {
		die ("Errore nella query: " . pg_last_error($conn));
	}
	echo "Registrazione avvenuta correttamente";
}
?>
