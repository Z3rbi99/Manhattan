<?php
session_start();

$conn = @pg_connect('dbname=postgres user=postgres password=iacopo');

$_SESSION['login'] = false;

if (!$conn) {
	die ('Connessione fallita !<br />');
}

if (isset($_POST['username']) and $_POST['username']!="")
	$username = $_POST['username'];

if (isset($_POST['password']) and $_POST['password']!="")
	$password = $_POST['password'];


if (isset($username) and $username!="" and isset($password) and $password!="") {
	if (!$queryLogin = @pg_query("select count(*) from LOGIN where username='".$username."' and password='".$password."'"))
		die ("Errore nella query: " . pg_last_error($conn));
}

if (isset($_POST['username']) and isset($_POST['password']) and ($_POST['username']=="" or $_POST['password']==""))
	echo "Devi riempire tutti i campi.";

if (isset($queryLogin)){
	while ($log = pg_fetch_assoc($queryLogin))
		if ($log['count']=="0")
			echo "L'username e la password non corrispondono.";
		else
			$_SESSION['login'] = true;
}
?>
