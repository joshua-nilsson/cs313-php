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
?>
<!DOCTYPE HTML>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <title>Fantasy Name Generator</title>
    <meta name="description" content="">
    <?php include '../modules/head.php';?>
  </head>

  <body>
    <header>
      <?php include '../modules/header.php';?>
    </header>

    <main>
      <?php include '../modules/example-config.php';?>

      <?php

//      foreach ($db->query('SELECT nameId, nameText FROM names') as $name)
//      {
//        echo 'ID: ' . $name['nameId'];
//        echo 'NAME: ' . $name['nameText'];
//        echo '<br/>';
//      }

      $statement = $db->query('SELECT DISTINCT book FROM scriptures');
      echo'<tr>';
      while ($row = $statement->fetch(PDO::FETCH_ASSOC))
      {
        echo '<th><input type="checkbox" name="check[]" id="check" value="'. $row['book'] .'">'. $row['book'] .'</th><br>';
      }
      echo '</tr>';

      ?>
    </main>

    <footer>
      <?php include '../modules/footer.php';?>
    </footer>
    <?php include '../modules/scripts.php';?>
  </body>
</html>
<!-- https://stackoverflow.com/questions/10004723/html5-input-type-range-show-range-value?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa -->
