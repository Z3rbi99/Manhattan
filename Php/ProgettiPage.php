<html>
	<head>
		<?php
		include ('Progetti.php');
		include('utils.inc.php');
		if (isLogged()) { ?>
		<title>Progetti</title>
	</head>
	<body>
		<?php	?>
			<form method="post"action="ProgettiPage.php">

		<?php	if (!$queryprogetti = @pg_query("select * from PROGETTI"))
						die ("Errore nella query: " . pg_last_error($conn));	?>

					<table border="1" cellspacing="2" cellpadding="2">
						<tr>
							<td><b>Id</b></td>
							<td><b>Nome</b></td>
							<td><b>Descrizione</b></td>
							<td><b>Data Inizio</b></td>
							<td><b>Data Fine</b></td>
						</tr>

		<?php	while ($prog = pg_fetch_assoc($queryprogetti)){ ?>
						<tr>
							<td><?php echo htmlspecialchars($prog['id']) ?></td>
							<td><?php echo htmlspecialchars($prog['nome']) ?></td>
							<td><?php echo htmlspecialchars($prog['descrizione']) ?></td>
							<td><?php echo htmlspecialchars($prog['datainizio']) ?></td>
							<td><?php echo htmlspecialchars($prog['datafine']) ?></td>
						</tr>
		<?php		} 	?>

						<tr>
							<td></td>
							<td> <input type="text" name="nomeProg" maxlength="50"> </td>
							<td> <input type="text" name="descr" maxlength="250"> </td>
							<td> <input type="datetime-local" name="dataini"> </td>
							<td> <input type="datetime-local" name="datafin"> </td>
						</tr>
					</table>

					<input type="submit" value="Aggiungi progetto">
		</form>
	<?php	} else {  ?>
		  <script language="JavaScript" type="text/javascript">
	      location.href = "LoginPage.php";
	      windows.location.reload();
	    </script>

			<?php	} ?>
			<script>
			history.replaceState(null, document.title, location.pathname+"#!/stealingyourhistory");
	    history.pushState(null, document.title, location.pathname);

	    window.addEventListener("popstate", function() {
	      if(location.hash === "#!/stealingyourhistory") {
	            history.replaceState(null, document.title, location.pathname);
	            setTimeout(function(){
	              location.replace("HomePage.php");
	            },0);
	      }
	    }, false);
			</script>
	</body>
</html>
