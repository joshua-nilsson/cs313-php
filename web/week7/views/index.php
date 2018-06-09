<?php
//Start the session
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

if (!$_SESSION['loggedin']) {
  header('Location: login.php');
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <title>Fantasy Name Generator</title>
    <meta name="description" content="Fantasy Name Generator">
    <?php include '../modules/head.php';?>
  </head>

  <body>
    <header>
      <?php include '../modules/header.php';?>
    </header>

    <main>
      <?php include '../modules/example-config.php';?>

      <?php if (isset($prompt)){echo $prompt;}?>
      <?php if (isset($prompt)){echo $collection;}?>

      <?php include '../modules/modal.php';?>
    </main>

    <footer>
      <?php include '../modules/footer.php';?>
    </footer>
    <?php include '../modules/scripts.php';?>
  </body>
</html>
<!-- https://stackoverflow.com/questions/10004723/html5-input-type-range-show-range-value?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa -->
