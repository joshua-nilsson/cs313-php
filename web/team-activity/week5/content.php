<?php
// Start the session
session_start();
$scriptureId = $_GET["value_key"];

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
$statement = $db->query('SELECT book, chapter, verse, content FROM scriptures where scripture_id = '.$scriptureId.';');
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  echo 'Content: ' . $row['book'] . " " .$row['chapter'] .':'. $row['verse'] . ' ' . $row['content'] .'<br/>';
}
?>
