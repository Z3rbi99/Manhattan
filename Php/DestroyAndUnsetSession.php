<?php
session_start();

session_destroy();


unset($_SESSION[]);

  <script language="JavaScript" type="text/javascript">
    location.href = "LoginPage.php";
    windows.location.reload();
  </script>





?>
