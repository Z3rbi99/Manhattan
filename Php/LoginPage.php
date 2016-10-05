<html>
	<head>
		<?php include('utils.inc.php');
		session_start();//avvia la sessione?>
		<title>Login</title>
	</head>
	<body>
			<form method="POST" action="autentica.php">
				Username:<br>
					<input type="text" name="username"><br>

				Password:<br>
					<input type="password" name="password"><br>

					<input type="submit" value="Accedi"> oppure
					<a href="RegistrazionePage.php">Registrati</a>
			</form>
	</body>
</html>
