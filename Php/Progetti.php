<html>
<?php
$conn = @pg_connect('dbname=postgres user=postgres password=iacopo');

if(!$conn) {
    die('Connessione fallita !<br />');
} else {
    echo 'Connessione riuscita !<br />';
}



function showTab(){
	if(!$queryprogetti = @pg_query("select * from PROGETTI"))
		die("Errore nella query: " . pg_last_error($conn));

	echo <<<EOD
		<table border="1" cellspacing="2" cellpadding="2">
			<tr>
				<td><b>Id</b></td>
				<td><b>Nome</b></td>
				<td><b>Descrizione</b></td>
				<td><b>Data Inizio</b></td>
				<td><b>Data Fine</b></td>
			</tr>
EOD;

	while($prog = pg_fetch_assoc($queryprogetti)){
		echo "\n\t<tr>\n\t\t<td>".$prog['id']."</td>\n\t\t<td>".$prog['nome']."</td>";
		echo "<td>".$prog['descrizione']."</td>\n\t\t<td>".$prog['datainizio']."</td>\n\t<td>".$prog['datafine']."</td>\n\t</tr>";
	}	
}
?>

<form action="Persone.php">
	<input type="submit" value="Mostra progetti">
	
<?php  showTab() ?>	
	
</form>





</html>