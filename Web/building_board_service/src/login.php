<?php
$login_fallure ='';

if($_GET['error']=='id'){
    $login_fallure = "Login Failed. Please Check Your ID";
}else if($_GET['error']=='Password'){
    $login_fallure = "Login Failed. Please Check Your Password";
}

?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <h1>Login</h1>

    <?=$login_fallure ?>
    <form action="process/login.php" method="post">
        
        <p><input type="text" name="id" placeholder="ID"></p>
        <p><input type="password" name="password" placeholder="Password"></p>
        <p><input type="submit" value="Login"><p>
    </form>
    <a href="register.php">Sign Up</a>
  </body>
</html>