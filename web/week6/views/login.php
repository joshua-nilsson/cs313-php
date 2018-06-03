<?php
session_start();

try{
  $dbUrl = getenv('DATABASE_URL');
  $dbopts = parse_url($dbUrl);
  $dbHost = $dbopts["host"];
  $dbPort = $dbopts["port"];
  $dbUser = $dbopts["user"];
  $dbPassword = $dbopts["pass"];
  if(!empty($dbopts["path"])){
    $dbName = ltrim($dbopts["path"],'/');
  }else{
    $dbName = $dbase;
  }
  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <title>User Login</title>
    <meta name="description" content="User Login">
    <?php include '../modules/head.php';?>
  </head>

  <body>
    <header>
      <?php include '../modules/header.php';?>
    </header>

    <main>
      <h1>User Login</h1>

      <?php if (isset($msg)){ echo $msg;} ?>

      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <form method="post" action="controller.php">
              <label for="user">Username</label>
              <input type="text" name="clientusername" placeholder="Sherlock Holmes" autofocus>
              <label for="password">Password</label>
              <input type="password" name="clientpassword" placeholder="FunkyChicken92!">
              <input type="submit" value="LOGIN">
              <input type="hidden" name="action" value="login">
            </form>
          </div>
        </div>
      </div>
    </main>

    <footer>
      <?php include '../modules/footer.php';?>
    </footer>
    <?php include '../modules/scripts.php';?>
  </body>
</html>
