<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<!-- <script src="C:/Progetti/Manhattan/Php/jquery-3.0.0.min.js"></script>
		 <link href="/jquery/jquery-ui-1.9.2.custom/css/ui-darkness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet"> -->
		<meta charset="utf-8">
		<title>jQuery UI inizioProg - Default functionality</title>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css">
		<script>
			$(function() {
				$( "#pippo" ).date picker();
			});
		</script>
	</head>
	
	
	
	<body>
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
		
		echo "<form method=\"get\"action=\"Progetti.php\">";
	
		if(isset($nomeProg)&&$nomeProg!="") {
			if(!$queryAggiungiProg = @pg_query("insert into PROGETTI (Nome,Descrizione,DataInizio,DataFine) values ('".$nomeProg."','".$descrProg."',".$dataInizio.",".$dataFine.");"))
				die("Errore nella query: " . pg_last_error($conn));
			
		}
	
		if(isset($_GET['passavar'])) {
			if(!$queryprogetti = @pg_query("select * from PROGETTI"))
				die("Errore nella query: " . pg_last_error($conn));
			
			echo '<table border="1" cellspacing="2" cellpadding="2">
					<tr>
						<td><b>Id</b></td>
						<td><b>Nome</b></td>
						<td><b>Descrizione</b></td>
						<td><b>Data Inizio</b></td>
						<td><b>Data Fine</b></td>
					</tr>';

			while($prog = pg_fetch_assoc($queryprogetti)){
				echo "\n\t<tr>\n\t\t<td>".$prog['id']."</td>\n\t\t<td>".$prog['nome']."</td>";
				echo "<td>".$prog['descrizione']."</td>\n\t\t<td>".$prog['datainizio']."</td>\n\t<td>".$prog['datafine']."</td>\n\t</tr>";
			}
			echo "\n\t<tr>\n\t\t<td></td>\n\t\t<td> <input type=\"text\" name=\"nomeProg\"> </td>\n\t\t<td> <input type=\"text\" name=\"descr\"> </td>";
			echo "<td> <input type=\"datetime-local\" id=\"inizioProg\" name=\"dataini\"> </td>\n\t\t<td> <input type=\"datetime-local\" id=\"inizioProg\" name=\"datafin\"> </td>\n\t</tr>";
			echo '</table>';
			echo "<input type=\"submit\" value=\"Aggiungi progetto\">";
		}
		else {
			echo "<input type=\"submit\" value=\"Mostra progetti\">";
		}
		echo "<input hidden name=\"passavar\" value=\"mostratabella\">";
		?>
		
		</form>
	</body>
</html>