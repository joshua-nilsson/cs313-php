
<?php
// Start the session
session_start();
$listOfScriptues = $_GET["check"];
?>
<?php
try
{
  $user = 'userName';
  $password = 'passswordSalt';
  $db = new PDO('pgsql:host=..........;dbname=dbnameonServer', $user, $password);
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