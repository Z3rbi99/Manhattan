<?php
/**
 * Se login e password sono corrette restituisce un array
 * associativo con i dati dell'utente ad eccezione della password
 * @param string $login
 * @param string $password
 * @return array
 */

function effettua_login($username,$password) {
    $username=pg_escape_string($username);
    $password=pg_escape_string($password);
    $rs= @pg_query("select * from LOGIN where login.username='".$username."' and login.password='".$password."' limit 1");
    return (array) pg_fetch_assoc($rs);
}

/**
 * Tiene traccia nella sessione dei dati
 * @param array $info array con i dati estratti dal DB relative
 *                    all’utente loggato
 */
function login($info){
    $_SESSION['my_test_loggedin']=$info;
}


/**
 * Se loggato restituisce l'array con i dati dell'utente
 * altrimenti restituisce un array vuoto
 * @return array|null
 */
function isLogged(){
  if(isset($_SESSION['my_test_loggedin'])&&$_SESSION['my_test_loggedin']!="")
    return true;
  else {
    return false;
    }
}
?>
