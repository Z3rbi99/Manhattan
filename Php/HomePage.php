<html>
  <head>
  <?php
  session_start();//avvia la sessione
  include('utils.inc.php');
  if (isLogged()) {
  } ?>
    <title>Home</title>
  </head>
  <body>
    <?php
    if (isLogged()) { ?>
      <form method="post" action="DestroyAndUnsetSession.php">
        <button type="submit">Logout</button>
      </form>

      <form method="post" action="ProgettiPage.php">
        <button type="submit">Progetti</button>
      </form>

      <form method="post" action="PersonePage.php">
        <button type="submit">Persone</button>
      </form>
    <?php }
  else { ?>
    <script language="JavaScript" type="text/javascript">
      location.href = "LoginPage.php";
      windows.location.reload();
    </script>
    <?php } ?>
  </body>
</html>
