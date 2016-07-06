<html>
	<head>

		<title>Persone</title>
	
	</head>
	<body>
		<?php
		$conn = @pg_connect('dbname=postgres user=postgres password=iacopo');
		
		if(isset($_GET['nome'])&&$_GET['nome']!="")
			$nome = $_GET['nome'];
		if(isset($_GET['cogn'])&&$_GET['cogn']!="")
			$cogn = $_GET['cogn'];
		

		if(!$conn) {
			die('Connessione fallita !<br />');
		} 
		else {
			echo 'Connessione riuscita !<br />';
		}
		
		echo "<form method=\"get\"action=\"Persone.php\">";
	
		if(isset($nome)&&$nome!="") {
			if(!$queryAggiungiPers = @pg_query("insert into PERSONE (Nome,Cognome) values ('".$nome."','".$cogn."');"))
				die("Errore nella query: " . pg_last_error($conn));
			
		}
	
		if(isset($_GET['passavar1'])) {
			if(!$querypersone = @pg_query("select * from PERSONE"))
				die("Errore nella query: " . pg_last_error($conn));
			
			echo '<table border="1" cellspacing="2" cellpadding="2">
					<tr>
						<td><b>Id</b></td>
						<td><b>Nome</b></td>
						<td><b>Cognome</b></td>
					</tr>';

			while($pers = pg_fetch_assoc($querypersone)){
				echo "\n\t<tr>\n\t\t<td>".$prog['id']."</td>\n\t\t<td>".$prog['nome']."</td>";
				echo "<td>".$prog['cogn']."</td>\n\t\t</tr>";
			}
			echo "\n\t<tr>\n\t\t<td></td>\n\t\t<td> <input type=\"text\" name=\"nome\" maxlength=\"50\"> </td>\n\t\t<td> <input type=\"text\" name=\"cogn\" maxlength=\"50\"> </td>";
			echo '</table>';
			echo "<input type=\"submit\" value=\"Aggiungi persona\">";
		}
		else {
			echo "<input type=\"submit\" value=\"Mostra persone\">";
		}
		echo "<input hidden name=\"passavar\" value=\"mostratabella\">";
		?>
		</form>
	</body>
</html>