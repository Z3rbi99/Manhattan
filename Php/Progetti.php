<?php
		$conn = @pg_connect('dbname=postgres user=postgres password=iacopo');
		
		if(isset($_GET['nomeProg'])&&$_GET['nomeProg']!="")
			$nomeProg = $_GET['nomeProg'];
		if(isset($_GET['descr'])&&$_GET['descr']!="")
			$descrProg = $_GET['descr'];
		if(isset($_GET['dataini'])&&$_GET['dataini']!="")
			$dataInizio = "'".$_GET['dataini']."'";
		else
			$dataInizio = 'null';
		if(isset($_GET['datafin'])&&$_GET['datafin']!="")
			$dataFine = "'".$_GET['datafin']."'";
		else
			$dataFine = 'null';
		
		if(!$conn) {
			die('Connessione fallita !<br />');
		} 
		else {
			echo 'Connessione riuscita !<br />';
		}
		
		if(isset($nomeProg)&&$nomeProg!="") {
			if(!$queryAggiungiProg = @pg_query("insert into PROGETTI (Nome,Descrizione,DataInizio,DataFine) values ('".$nomeProg."','".$descrProg."',".$dataInizio.",".$dataFine.");"))
				die("Errore nella query: " . pg_last_error($conn));
		}
		if(isset($_GET['nomeProg']) and $_GET['nomeProg']=="")
			echo "Devi inserire almeno il nome del progetto.";
?>