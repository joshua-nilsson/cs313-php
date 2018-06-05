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
    <title>Welcome</title>
    <meta name="description" content="Welcome">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      label, input {
        display: block;
      }

      label, input:first-of-type {
        margin-bottom: 5px;
      }

      label {
        font-weight: bold;
        font-size: 150%;
      }

      input[type="submit"] {
        margin-top: 10px;
      }
    </style>
  </head>

  <body>
    <main>
      <h1>Welcome</h1>

      <?php if (isset($msg)){ echo $msg;} ?>
    </main>
  </body>
</html>
