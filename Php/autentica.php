<?php
session_start();//avvia la sessione
$conn = @pg_connect('dbname=postgres user=postgres password=iacopo');  //si connette al DB
include('utils.inc.php'); //include  librerie


$utente=effettua_login($_POST['login'], $_POST['password']); //verifica dati in post

/*if($utente==array()) //se utente è un array vuoto
        {
        header("Location: login.html"); //torna al form di autenticazione
        exit();
        }
    else {*/
        if($utente['id']!=""){

          login($utente['id']+$utente['username']); //memorizza in sessione i dati dell'utente
          if(!isLogged())
                          {//se non è loggato torna al form e lo script termina
                           header("Location: LoginPage.php");
                           exit();
                          }
            //altrimenti è loggato e quindi lo script viene eseguito
            else{
              header("Location: HomePage.php"); //va alla pagina principale
            }
        }else
          {
            header("Location: LoginPage.php"); //torna al form di autenticazione
            exit();
          }
    //  }
?>
