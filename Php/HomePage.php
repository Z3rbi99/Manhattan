<html>
  <head>
  <?php include "Home.php"; ?>
    <title>Home</title>
  </head>
  <body>
    <?php	include('utils.inc.php');
    
    if (isLogged()) { ?>
      <form method="get" action="DestroyAndUnsetSession.php">
          <button type="submit">Logout</button>
      </form>
      <form method="get" action="ProgettiPage.php">
        <button type="submit">Progetti</button>
      </form>
      <form method="get" action="PersonePage.php">
        <button type="submit">Persone</button>
      </form>
    <?php } ?>
  </body>
</html>
