<?php
//phpinfo();
//echo json_encode('ciao bello');

/*
if(isset( $_GET["nome"]))
	$nomePost = $_GET["nome"];
if(isset( $_GET["cognome"]))
	$cognomePost = $_GET["cognome"];
	if(isset( $_POST["nome"]))
		$nomePost = $_POST["nome"];
	if(isset( $_POST["cognome"]))
		$cognomePost = $_POST["cognome"];
*/
//echo $nomePost;

$conn = @pg_connect('dbname=postgres user=postgres password=iacopo');
if(!$conn) {
	die('Connessione fallita !<br />');
}


if ((checkFullInput($_GET['nome']) &&
		checkFullInput($_GET['cognome']) &&
		checkFullInput($_GET['username']) &&
		checkFullInput($_GET['password1']) &&
		checkFullInput($_GET['email']) &&
		userNotInDataBase($_GET['username']) &&
		emailNotInDataBase($_GET['email']) &&
		passwordUguali($_GET['password1'], $_GET['password2'])) ) {

			insertDatiRegistrazione($_GET['nome'], $_GET['cognome'], $_GET['username'], $_GET['password1'], $_GET['email']);
}

/*
funcion check(){
	$ok = false;
	$message = '';
	if(!checkFullInput($_POST['nome'])){
		$ok = true;
		$message = 'Errore nome';
	}
	if(!checkFullInput($_POST['cognome']))
		$ok = true;
	if(!checkFullInput($_POST['cognome']))
		$ok = true;

}
*/

function checkFullInput($input) {
  if (isset($input) and $input != ""){
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
			if ($userUnivoco['count'] == "0") {
        return true;
      } else {
				echo "Username già presente";
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
				$messaggio = "Email già collegata ad un altro account";
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
  if (!$queryInsertDatiRegistrazioneLogin = @pg_query("insert into LOGIN (Username, Password) values ('".$username."','".$password."');")) {
		die ("Errore nella query: " . pg_last_error($conn));
  }
  if (!$queryInsertDatiRegistrazionePersone = @pg_query("insert into PERSONE (Nome, Cognome, Email, Username) values ('".$nome."','".$cognome."','".$email."','".$username."');")) {
    die ("Errore nella query: " . pg_last_error($conn));
  }
	echo "Registrazione avvenuta correttamente";
}
?>
