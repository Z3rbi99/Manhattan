<?php
session_start();

$conn = @pg_connect('dbname=postgres user=postgres password=iacopo');
include('SecurityFunctions.php');

if (isset($_POST['nomeProg']) and $_POST['nomeProg']!="" and sqlInjection($_POST['nomeProg']))
	$nomeProg = strip_tags($_POST['nomeProg']);

if (isset($_POST['descr']) and $_POST['descr']!="" and sqlInjection($_POST['descr']))
	$descrProg = strip_tags($_POST['descr']);

if (isset($_POST['dataini']) and $_POST['dataini']!="" and sqlInjection($_POST['dataini']))
	$dataInizio = "'".strip_tags($_POST['dataini'])."'";
else
	$dataInizio = 'null';

if (isset($_POST['datafin']) and $_POST['datafin']!="" and sqlInjection($_POST['datafin']))
	$dataFine = "'".strip_tags($_POST['datafin'])."'";
else
	$dataFine = 'null';

if (!$conn) {
	die('Connessione fallita !<br />');
}


if(isset($nomeProg)&&$nomeProg!="") {
	if(!$queryAggiungiProg = @pg_query("insert into PROGETTI (Nome,Descrizione,DataInizio,DataFine) values ('".$nomeProg."','".$descrProg."',".$dataInizio.",".$dataFine.");"))
		die("Errore nella query: " . pg_last_error($conn));
}
if(isset($_POST['nomeProg']) and $_POST['nomeProg']=="")
	echo "Devi inserire almeno il nome del progetto.";

?>
