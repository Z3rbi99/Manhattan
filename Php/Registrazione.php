<?php
		$conn = @pg_connect('dbname=postgres user=postgres password=iacopo');
		
		if(!$conn) {
			die('Connessione fallita !<br />');
		}
		
		if(isset($_POST['nome']) and $_POST['nome']!="")
			$nome = $_POST['nome'];
		
		if(isset($_POST['cognome']) and $_POST['cognome']!="")
			$cognome = $_POST['cognome'];
		
		if(isset($_POST['username']) and $_POST['username']!="")
			$username = $_POST['username'];
		
		if(isset($_POST['password']) and $_POST['password']!="")
			$password = $_POST['password'];
		
		if(isset($_POST['mail']) and $_POST['mail']!="")
			$mail = $_POST['mail'];
		
		
		if(isset($nome) and $nome!="" and isset($cognome) and $cognome!="" and isset($username) and $username!="" and isset($password) and $password!="" and isset($mail) and $mail!=""){
			if(!$queryUserUnivoco = @pg_query("select count(*) from LOGIN where username='".$username."'")){
				die("Errore nella query: " . pg_last_error($conn));
			} else {
				while($userUnivoco = pg_fetch_assoc($queryUserUnivoco)){
					if($userUnivoco['count']=="0"){
						if(!$queryUserUnivoco = @pg_query("insert into PERSONE (Nome,Cognome,Email,Username) values ('".$nome."','".$cognome."','".$mail."','".$username."');"))
							die("Errore nella query: " . pg_last_error($conn));
							
						if(!$queryUserUnivoco = @pg_query("insert into LOGIN (Username,Password) values ('".$username."','".$password."');"))
							die("Errore nella query: " . pg_last_error($conn));
					} else {
						echo "Questo username è già stato utilizzato.";
					}
				}
			}
		}
		
		/*if(isset($_POST['nome']) and isset($_POST['cognome']) and isset($_POST['username']) and isset($_POST['password1']) and isset($_POST['mail']) and ($_POST['nome']=="" or $_POST['cognome']=="" or $_POST['username']=="" or $_POST['password1']=="" or $_POST['mail']==""))
			echo "Devi riempire tutti i campi.";*/
?>