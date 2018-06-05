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

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
$action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

case 'register':
      // Filter, Store Data into Variables
      $guestUsername = filter_input(INPUT_POST, 'guestUsername', FILTER_SANITIZE_STRING);
      $guestPassword = filter_input(INPUT_POST, 'guestPassword', FILTER_SANITIZE_STRING);

      // Check for any missing data
      if(empty($guestUsername) || empty($guestPassword)) {
        $msg = '<p>* No empty fields allowed.</p>';
        include 'signup7.php';
        exit; }

      // Check Pattern of Password
      $checkPassword = checkPassword($guestPassword);

      // Hash the Password
      $hashedPassword = password_hash($checkPassword, PASSWORD_DEFAULT);

      // Register Guest
      $regGuest = registerGuest($guestUsername, $hashedPassword);

      header('Location: login7.php');
      die();
      break;

case 'login':
      $guestUsername = filter_input(INPUT_POST, 'guestUsername', FILTER_SANITIZE_STRING);
      $guestPassword = filter_input(INPUT_POST, 'guestPassword', FILTER_SANITIZE_STRING);
      $checkpassword = checkPassword($guestPassword);
      if(empty($guestUsername) || empty($guestPassword)) {
        $msg = "<div class='alert alert-danger' role='alert'>* Please provide a username and password.</div>";
        include 'login.php';
        exit; }
      $guestData = getClient($guestUsername);
      $hashCheck = password_verify($checkpassword, $guestData['guestPassword']);
      if (!$hashCheck) {
        $msg = "<div class='alert alert-danger' role='alert'>* Please check your credentials and try again.</div>";
        include 'login.php';
        exit;
      }
      $_SESSION['loggedin'] = TRUE;
      array_pop($guestData);
      // clientData now part of the session - referencing CIT 336
      $_SESSION['guestData'] = $guestData;
      header('Location: welcome.php');
      exit;
      break;

default:
      include 'signup7.php';
      break;

}

function checkPassword($guestPassword) {
  /* Check the password for a minimum of 8 characters,
  * at least one 1 capital letter, at least 1 number and
  * at least 1 special character */
  $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
  return preg_match($pattern, $guestPassword);
}

function registerGuest($guestUsername, $guestPassword) {
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

  // Query - Username, Password into guests
  $sql = 'INSERT INTO guests (guestUsername, guestPassword) VALUES (:guestUsername, :guestPassword)';

  // Create the prepared statement using the database connection
  $stmt = $db->prepare($sql);

  /* The next four lines replace the placeholders in the SQL
  * statement with the actual values in the variables
  * and tells the database the type of data it is */
  $stmt->bindValue(':guestUsername', $guestUsername, PDO::PARAM_STR);
  $stmt->bindValue(':guestPassword', $guestPassword, PDO::PARAM_STR);

  // Execute - Insert Username, Password into guests
  $stmt->execute();
}

function getClient($guestUsername){
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
  $sql = 'SELECT guestid, guestUsername, guestPassword FROM guests WHERE guestUsername = :guestUsername';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':guestUsername', $guestUsername, PDO::PARAM_STR);
  $stmt->execute();
  $guestData = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $guestData;
}
?>
