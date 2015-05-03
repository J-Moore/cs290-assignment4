<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

session_start();

if (   ($_SERVER['REQUEST_METHOD'] === 'GET')
    && (isset($_GET['action']))
    && ($_GET['action'] === 'logout')
) {
    $_SESSION = array();
    session_destroy();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>Assignment4 Login Page</title>
  </head>
  <body>
  
    <!-- form for logging in to content1 -->
    <form action='content1.php' method='post'>
      <p>Login with your Username:
      <p><input type='text' name='username' />
      <p><input type='submit' name='login' value='Login'>
    </form>
    
  </body>
</html>