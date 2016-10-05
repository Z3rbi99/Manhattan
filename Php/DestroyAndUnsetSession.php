<?php
session_start();

session_unset();

session_destroy();
?>

<script language="JavaScript" type="text/javascript">
  location.href = "LoginPage.php";
  windows.location.reload();
</script>
