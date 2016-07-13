<html>
	<head>
		<?php include "Login.php" ?>
		<title>Login</title>
	</head>
	<body>
<?php	if (!$_SESSION['login']){?>

			<form method="POST" action="LoginPage.php">
				Username:<br>
					<input type="text" name="username"><br>
				Password:<br>
					<input type="password" name="password"><br>
					
					<input type="submit" value="Accedi"> oppure
					<a href="RegistrazionePage.php">Registrati</a>
					 
			</form>
			
<?php }	else { 
			echo "Accesso riuscito.";
		} ?>
	</body>
</html>