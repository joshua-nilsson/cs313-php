
<?php
// Start the session
session_start();
$listOfScriptues = $_GET["check"];
?>
<?php
try
{
  $user = 'hhhrcjrfjyglyn';
  $password = 'e5a22e741fe1d44d973e341c1291e949531799efbd5872116115ce25cd5ca9d8';
  $db = new PDO('pgsql:host=ec2-50-19-224-165.compute-1.amazonaws.com;dbname=d2gtblt01rf5ff', $user, $password);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

foreach($listOfScriptues as $scripture){

  $statement = $db->query("SELECT book, chapter, verse FROM scriptures where book = '".$scripture."';");
  while ($row = $statement->fetch(PDO::FETCH_ASSOC))
  {
    echo 'Scriptures: ' . $row['book'] . " " .$row['chapter'] .':'. $row['verse'] . '<br/>';
  }
}
?>
