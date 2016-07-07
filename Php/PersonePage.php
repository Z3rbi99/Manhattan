<html>
	<head>
		<?php include "Persone.php" ?>
		<title>Persone</title>
	</head>
	<body>
			<form method="get" action="PersonePage.php">
		<?php	if(isset($passavar1)&&$passavar1!="") {
			
					if(!$querypersone = @pg_query("select * from PERSONE")) 
						die("Errore nella query: " . pg_last_error($conn));	?>
						
						
					<table border="1" cellspacing="2" cellpadding="2">
						<tr>
							<td><b>Id</b></td>
							<td><b>Nome</b></td>
							<td><b>Cognome</b></td>
						</tr>
							
		<?php		if (count($_GET)>0){
						while($pers = pg_fetch_assoc($querypersone)){	?>
							<tr>
								<td><?php echo $pers['id']; ?></td>
								<td><?php echo $pers['nome']; ?></td>
								<td><?php echo $pers['cognome']; ?></td>
							</tr>
		<?php 		}	} 	?>
		
						<tr>
							<td></td>
							<td> <input type="text" name="nome" maxlength="50"> </td>
							<td> <input type="text" name="cogn" maxlength="50"> </td>
						</tr>
					</table>
					<input type="submit" value="Aggiungi persona">
		<?php 	} else }	?>
					<input type="submit" value="Mostra persone">
		<?php 	} ?>
				<input hidden name="passavar1" value="mostratabella">
			</form>
	</body>
</html>