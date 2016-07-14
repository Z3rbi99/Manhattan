<html>
	<head>
		<?php include "Registrazione.php" ?>
		<script type="text/javascript" src="../Js/RegistrazionePwCheck.js"></script>

		<title>Registrazione</title>
	</head>
	<body>
		<form method="POST" action="RegistrazionePage.php" name="registrazione" id="registrazione">
			Nome:<br>
				<input type="text" name="nome" id="nome"><br><br>

			Cognome:<br>
				<input type="text" name="cognome" id="cognome"><br><br>

			Username:<br>
				<input type="text" name="username" id="username"><br><br>

			<label for="password1">Password:</label><br>
				<input type="password" name="password1" id="password1"><br>

			<label for="password2">Reinserisci la password:</label><br>
				<input type="password" name="password2" id="password2" onkeyup="checkPass();return false;"><br>
				<span id="confirmMessage"></span><br>

			E-mail:<br>
				<input type="text" name="mail" id="mail"><br>

				<input type="submit" value="Registrati" onclick="checkEmptyInput(event)" onclick="checkPassAndGo(event);"> oppure
				<a href="LoginPage.php">Accedi</a>
		</form>
	</body>
</html>
