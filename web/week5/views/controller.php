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

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
$action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

  case 'generate':

//    $nameInput = filter_input(INPUT_POST, 'nameInput', FILTER_SANITIZE_STRING);

    $statement = $db->query('SELECT nameid, nametext FROM names');

//    for ($i=0;i<=$nameInput;i++) {
//      $row = $statement->fetch(PDO::FETCH_ASSOC)
//      echo '<p>NAME: ' . $row['nametext'] . '</p>';
//   }
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
      $prompt = '<p>NAME: ' . $row['nametext'] . '</p>';
    }

    header('Location: index.php');
//    exit;
    break;

  default:
      include 'index.php';
    }
//    else {
//    $message = '<p class="alertMsg">* Sorry, but the category submission failed. Please try again.</p>';
//    include '../view/new-cat.php';
//    exit;

?>
