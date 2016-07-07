<?php
		$conn = @pg_connect('dbname=postgres user=postgres password=iacopo');
		
		if(isset($_GET['nome'])&&$_GET['nome']!="")
			$nome = $_GET['nome'];
		if(isset($_GET['cogn'])&&$_GET['cogn']!="")
			$cogn = $_GET['cogn'];
		if(isset($_GET['passavar1'])&&$_GET['passavar1']!="")
			$passavar1 = $_GET['passavar1'];
		
		if(!$conn) {
			die('Connessione fallita !<br />');
		}
		else {
			echo 'Connessione riuscita !<br />';
		}
	
		if(isset($nome)&&$nome!="") {
			if(!$queryAggiungiPers = @pg_query("insert into PERSONE (Nome,Cognome) values ('".$nome."','".$cogn."');"))
				die("Errore nella query: " . pg_last_error($conn));
		}
	
		if(isset($_GET['nome']) and $_GET['nome']=="")
			echo "Devi riempire tutti i campi.";
?>