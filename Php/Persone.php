<?php
session_start();

$conn = @pg_connect('dbname=postgres user=postgres password=iacopo');
include('SecurityFunctions.php');

if (isset($_POST['nome']) and ($_POST['nome'])!="" and sqlInjection($_POST['nome']))
	$nome = strip_tags($_POST['nome']);

if (isset($_POST['cogn']) and ($_POST['cogn'])!="" and sqlInjection($_POST['cogn']))
	$cogn = strip_tags($_POST['cogn']);

	if (isset($_POST['mail']) and ($_POST['mail'])!="" and sqlInjection($_POST['mail']))
		$mail = strip_tags($_POST['mail']);

if (!$conn) {
	die ('Connessione fallita !<br />');
}

if (isset($nome) and $nome!="") {
	if (!$queryAggiungiPers = @pg_query("insert into PERSONE (Nome,Cognome,Email) values ('".$nome."','".$cogn."','".$mail."');"))
		die ("Errore nella query: " . pg_last_error($conn));
}

if (isset($_POST['nome']) and $_POST['nome']=="")
	echo "Devi riempire tutti i campi.";


?>
