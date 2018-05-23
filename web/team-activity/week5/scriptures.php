<?php
// Start the session
session_start();
$listOfScriptues = $_GET["check"];

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

foreach($listOfScriptues as $scripture){

  $statement = $db->query("SELECT scripture_id, book, chapter, verse FROM scriptures where book = '".$scripture."';");
  while ($row = $statement->fetch(PDO::FETCH_ASSOC))
  {
    echo 'Scriptures: ' . $row['book'] . " " .$row['chapter'] .':'. $row['verse'] . '<br/>';
    echo '<a href="content.php?value_key='.$row['scripture_id'].'">Link</a><br/>';
  }
}
?>
