<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML>
<html>
<body>

  <form action="scriptures.php" method="get">

    <?php
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

    $statement = $db->query('SELECT DISTINCT book FROM scriptures');
    echo'<tr>';
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
      echo '<th><input type="checkbox" name="check[]" id="check" value="'. $row['book'] .'">'. $row['book'] .'</th><br>';
    }
    echo '</tr>';


    ?>

    <input type="submit" value="submit">

  </form>
</body>
</html>
