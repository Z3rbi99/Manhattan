<html>
	<head>
		<?php include "Progetti.php";
		 			include('utils.inc.php');?>
		<title>Progetti</title>
	</head>
	<body>
		<?php	if (isLogged()) {?>
			<form method="get"action="ProgettiPage.php">
		<?php


			if (isset($_GET['passavar'])) {

					if (!$queryprogetti = @pg_query("select * from PROGETTI"))
						die ("Errore nella query: " . pg_last_error($conn));	?>

					<table border="1" cellspacing="2" cellpadding="2">
						<tr>
							<td><b>Id</b></td>
							<td><b>Nome</b></td>
							<td><b>Descrizione</b></td>
							<td><b>Data Inizio</b></td>
							<td><b>Data Fine</b></td>
						</tr>
		<?php		if (count($_GET)>0){
						while ($prog = pg_fetch_assoc($queryprogetti)){ ?>
							<tr>
								<td><?php echo $prog['id'] ?></td>
								<td><?php echo $prog['nome'] ?></td>
								<td><?php echo $prog['descrizione'] ?></td>
								<td><?php echo $prog['datainizio'] ?></td>
								<td><?php echo $prog['datafine'] ?></td>
							</tr>
		<?php		} 	}	?>

						<tr>
							<td></td>
							<td> <input type="text" name="nomeProg" maxlength="50"> </td>
							<td> <input type="text" name="descr" maxlength="250"> </td>
							<td> <input type="datetime-local" name="dataini"> </td>
							<td> <input type="datetime-local" name="datafin"> </td>
						</tr>
					</table>
					<input type="submit" value="Aggiungi progetto">
		<?php	} else {	?>
					<input type="submit" value="Mostra progetti">
		<?php	}	?>
				<input hidden name="passavar" value="mostratabella">
		</form>
	<?php	} ?>
	</body>
</html>
