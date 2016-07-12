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
					<input type="password" name="password">
				<input type="submit" value="Accedi">
			</form>
<?php }	else { 
			echo "Accesso riuscito.";
			var_dump($_SESSION);
		} ?>
	</body>
</html>