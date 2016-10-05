<html>
	<head>
		<?php include ('Persone.php');
		 			include('utils.inc.php'); ?>
		<title>Persone</title>
	</head>
	<body>
		<?php	if (isLogged()) {?>
			<form method="post" action="PersonePage.php">
		<?php if (!$querypersone = @pg_query("select * from PERSONE"))
						die ("Errore nella query: " . pg_last_error($conn));	?>

					<table border="1" cellspacing="2" cellpadding="2">
						<tr>
							<td><b>Id</b></td>
							<td><b>Nome</b></td>
							<td><b>Cognome</b></td>
							<td><b>Email</b></td>
						</tr>

		<?php 	while ($pers = pg_fetch_assoc($querypersone)) {	?>
							<tr>
								<td><?php echo htmlspecialchars($pers['id']); ?></td>
								<td><?php echo htmlspecialchars($pers['nome']); ?></td>
								<td><?php echo htmlspecialchars($pers['cognome']); ?></td>
								<td><?php echo htmlspecialchars($pers['email']); ?></td>
							</tr>
		<?php 	}	 	?>
						<tr>
							<td></td>
							<td> <input type="text" name="nome" maxlength="50"> </td>
							<td> <input type="text" name="cogn" maxlength="50"> </td>
							<td> <input type="text" name="mail" maxlength="50"> </td>
						</tr>
					</table>
					<input type="submit" value="Aggiungi persona">
			</form>
		<?php	}  else {  ?>
				<script language="JavaScript" type="text/javascript">
					location.href = "LoginPage.php";
					windows.location.reload();
				</script>
				<?php	}?>
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
    }, false); </script>
	</body>
</html>
