<html>
	<head>
		<script type="text/javascript" src="../lib/jquerymin.js"></script>
		<script type="text/javascript" src="../lib/functions_cryptography.js"></script>
		<script type="text/javascript" src="../Js/RegistrazioneFunctions.js"></script>
		<title>Registrazione</title>
	</head>
	<body>
		<form method="POST"  name="registrazione" id="registrazione"> <!-- action="RegistrazioneFunctions.php"-->
			Nome:<br>
				<input type="text" name="nome" id="nome" onfocus="focusFunction(this)"><br><br>

			Cognome:<br>
				<input type="text" name="cognome" id="cognome" onfocus="focusFunction(this)"><br><br>

			Username:<br>
				<input type="text" name="username" id="username" onfocus="focusFunction(this)"><br><br>

			<label for="password1">Password:</label><br>
				<input type="password" name="password1" id="password1" onfocus="focusFunction(this)" onkeyup="checkPW2()"><br>

			<label for="password2">Reinserisci la password:</label><br>
				<input type="password" name="password2" id="password2" onkeyup="checkPass();return false;"><br>
				<span id="confirmMessage"></span><br>

			E-mail:<br>
				<input type="text" name="email" id="email" onfocus="focusFunction(this)"><br>

				<div id="risultato"></div>


				<input type="button" value="Registrati" onclick="checkEmptyInputAndBlur(event)"> oppure
				<a href="LoginPage.php">Accedi</a><br>
				<span id="emptyMessage"></span><br>
		</form>
	</body>
</html>
