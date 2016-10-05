<?php
session_start();//avvia la sessione
$conn = @pg_connect('dbname=postgres user=postgres password=iacopo');  //si connette al DB
include('utils.inc.php'); //include  librerie
include('SecurityFunctions.php');


if ($_POST['username'] && $_POST['password']) {

  $hashpassword = hash ( 'sha512', $_POST['password']); //sha512 della password
  $utente=effettua_login($_POST['username'], $hashpassword); //verifica dati in post
  if($utente['id']!="") {
    login($utente['username'].$utente['id']); //memorizza in sessione i dati dell'utente
    if(!isLogged()) {//se non è loggato torna al form e lo script termina
       header("Location: LoginPage.php");
       exit();
    } else {
      header("Location: HomePage.php"); //va alla pagina principale
    }
  } else {
    header("Location: LoginPage.php"); //torna al form di autenticazione
    exit();
  }
} else {
  echo "L'username e la password non possono contenere caratteri speciali.";
}
?>
