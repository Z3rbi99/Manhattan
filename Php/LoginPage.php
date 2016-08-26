<html>
	<head>
		<?php include('utils.inc.php'); ?>
		<title>Login</title>
		<script>
		function redir(){
			windows.location('HomePage.php');
			}
		</script>
	</head>
	<body>
<?php
if (isset($_SESSION)) {
	if (isLogged()) {
		echo "Benvenuto ".$_SESSION['username'];?>
		<script language="JavaScript" type="text/javascript">
			location.href = "HomePage.php";
			windows.location.reload();
		</script>

<?php }
		} else {?>
			<form method="POST" action="autentica.php">
				Username:<br>
					<input type="text" name="login"><br>
				Password:<br>
					<input type="password" name="password"><br>

					<input type="submit" value="Accedi"> oppure
					<a href="RegistrazionePage.php">Registrati</a>
			</form>
<?php		}
 			?>
	</body>
</html>
