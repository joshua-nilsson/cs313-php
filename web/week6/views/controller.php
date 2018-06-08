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
    $statement1 = $db->query('SELECT nameid, nametext FROM names');
    $statement2 = $db->query('SELECT collectiontext FROM collection
      WHERE clientid = (SELECT clientid FROM clients WHERE clientusername = ' . $_SESSION['clientData']['clientUsername']')');
//    $statement2 = $db->query('SELECT collectionid, collectiontext FROM collection');
    //    for ($i=0;i<=$nameInput;i++) {
    //      $row = $statement->fetch(PDO::FETCH_ASSOC)
    //      echo '<p>NAME: ' . $row['nametext'] . '</p>';
    //   }
    $prompt = "<div id='prompt' class='container'>";
    $prompt .= "<form action='controller.php' method='post'>";
    $prompt .= "<div class='form-group'>";
    $prompt .= "<div class='row'>";
    $prompt .= "<div class='col-sm-6'>";
    $prompt .= "<div id='accordion'>";
    $prompt .= "<div class='card'>";
    $prompt .= "<div class='card-header' id='headingThree'>";
    $prompt .= "<h5 class='mb-0'>";
    $prompt .= "<button class='btn btn-link' data-toggle='collapse' data-target='#collapseThree' aria-expanded='true' aria-controls='collapseThree'>Prompt Table</button>";
    $prompt .= "</h5>";
    $prompt .= "</div>";
    $prompt .= "<div id='collapseThree show' class='collapse show' aria-labelledby='headingThree' data-parent='#accordion'>";
    $prompt .= "<div class='card-body'>";
    $prompt .= "<table class='table'>";
    $prompt .= "<thead id='head-dark' class='thead-dark'>";
    $prompt .= '<tr>';
    $prompt .= "<th scope='col'>PROMPT</th>";
    $prompt .= "<th scope='col'>NAME</th>";
    $prompt .= "<th scope='col'>CONTROLS</th>";
    $prompt .= '</tr>';
    $prompt .= '</thead>';
    $prompt .= '<tbody>';
    while ($row = $statement1->fetch(PDO::FETCH_ASSOC))
    {
      $prompt .= '<tr>';
      $prompt .= '<td>';
      $prompt .= "<div class='input-group input-group-default mb-6'>";
      $prompt .= "<div class='input-group-prepend'>";
      $prompt .= "<div class='input-group-text' id='inputGroup-sizing-sm'>$row[nametext]</div>";
      $prompt .= '</div>';
      $prompt .= '</div>';
      $prompt .= '</td>';
      $prompt .= '<td>';
      $prompt .= "<div class='input-group-append'>";
      $prompt .= "<input type='text' name='collectiontext[]' class='form-control' aria-label='Small' aria-describedby='inputGroup-sizing-lg'>";
      $prompt .= '</div>';
      $prompt .= '</td>';
      $prompt .= '<td>';
      $prompt .= "<div class='input-group-append'>";
      $prompt .= "<button class='btn btn-primary' type='submit' title='Click to Submit'>SUBMIT</i></button>";
      $prompt .= '</div>';
      $prompt .= '</td>';
      $prompt .= '</tr>';
    }
    $prompt .= '</tbody>';
    $prompt .= '</table>';
    $prompt .= '</div>';
    $prompt .= '</div>';
    $prompt .= '</div>';
    $prompt .= '</div>';
    $prompt .= '</div>';
    $prompt .= "<input type='hidden' name='action' value='insert'>"; // possibly wrong place?
    $prompt .= '</form>';
    $collection = "<div id='collection' class='col-sm-6'>";
    $collection .= "<form action='controller.php' method='post'>";
    $collection .= "<div id='accordion'>";
    $collection .= "<div class='card'>";
    $collection .= "<div class='card-header' id='headingThree'>";
    $collection .= "<h5 class='mb-0'>";
    $collection .= "<button class='btn btn-link' data-toggle='collapse' data-target='#collapseThree' aria-expanded='true' aria-controls='collapseThree'>Collection Table</button>";
    $collection .= "</h5>";
    $collection .= "</div>";
    $collection .= "<div id='collapseThree show' class='collapse show' aria-labelledby='headingThree' data-parent='#accordion'>";
    $collection .= "<div class='card-body'>";
    $collection .= "<table class='table'>";
    $collection .= "<thead id='head-dark' class='thead-dark'>";
    $collection .= '<tr>';
    $collection .= "<th scope='col'>PROMPT</th>";
    $collection .= "<th scope='col'>NAME</th>";
    $collection .= "<th scope='col'>CONTROLS</th>";
    $collection .= '</tr>';
    $collection .= '</thead>';
    $collection .= '<tbody>';
    while ($row = $statement2->fetch(PDO::FETCH_ASSOC))
    {
      //        $collection .= '<p>Name: ' . $row['nametext'] . '</p>';
      $collection .= '<tr>';
      $collection .= '<td>';
      $collection .= "<div class='input-group input-group-default mb-6'>";
      $collection .= "<div class='input-group-prepend'>";
      $collection .= "<div class='input-group-text' id='inputGroup-sizing-sm'>$row[collectiontext]</div>";
      $collection .= '</div>';
      $collection .= '</div>';
      $collection .= '</td>';
      $collection .= '<td>';
      $collection .= "<div class='input-group-append'>";
      $collection .= "<input type='text' class='form-control' aria-label='Small' aria-describedby='inputGroup-sizing-lg'>";
      $collection .= '</div>';
      $collection .= '</td>';
      $collection .= '<td>';
      $collection .= "<div class='input-group-append'>";
      $collection .= "<button type='button' class='btn btn-warning' title='Click to Update'><i class='fas fa-sync-alt fa-fw'></i></i></button>";
      $collection .= "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#exampleModalCenter' title='Click to Delete'><i class='fas fa-trash-alt fa-fw'></i></button>";
      $collection .= '</div>';
      $collection .= '</td>';
      $collection .= '</tr>';
    }
    $collection .= '</tbody>';
    $collection .= '</table>';
    $collection .= '</div>';
    $collection .= '</form>';
    $collection .= '</div>';
    include 'index.php';
    break;
  case 'insert':
    // Get all the collection text items. Note FILTER_REQUIRE_ARRAY here-
    // see line 80's name attribute for one slight change you need to make to
    // your <input> tags to make this work
    $collectiontext = filter_input(INPUT_POST, 'collectiontext', FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
    // Filter all the collection text items down to only the ones the user
    // actually filled out- the ones that aren't empty, in other words
    $nonEmpty = array();
    foreach($collectiontext as $input) {
      if (!empty($input)) {
        array_push($nonEmpty, $input);
      }
    }
    // If the user didn't fill anything out, display an error and exit:
    if(count($nonEmpty) === 0) {
      $msg = "<div class='alert alert-danger' role='alert'>* Please enter a name before submission.</div>";
      include 'index.php';
      exit;
    }
    // debugging and such
//    echo "<pre>";
//    var_dump($nonEmpty);
//    echo "</pre>";

    // This is the start of a SQL query. We don't know how many things the user
    // filled out, so we need to build off of this one set at a time.
    $sql = 'INSERT INTO collection (collectiontext, clientid) VALUES ';

    // This array will hold placeholders for all the tuples- or (id, text) pairs
    // that we want to insert into the database. We use an array instead of direct
    // concatenation because PHP's implode() makes it easier not to worry about
    // the exact placement of commas between our different tuples.
    $values = array();
    foreach($nonEmpty as $index => $input) {
      array_push($values, "(:collectiontext{$index}, :clientid{$index})");
    }
    // Now we pad our original query with the imploded values tuples:
    $sql .= implode(', ', $values);
    // Debugging purposes:
    echo '<pre>' . $sql . '</pre>';
    // Now we can prepare the query and get a PDOStatement object:
    $stmt = $db->prepare($sql);
    // Now we iterate over all the filled-out inputs and bind them to the
    // placeholders we made earlier:
    foreach($nonEmpty as $index => $input) {
      $stmt->bindValue(":collectiontext{$index}", $input, PDO::PARAM_STR);
      // Hardcoded clientId for now:
      $stmt->bindValue(":clientid{$index}", 1, PDO::PARAM_INT);
    }
    // And then we can execute the query (try/catch for more debugging info):
    try {
      $stmt->execute();
      $stmt->closeCursor();
      header('Location: controller.php?action=generate');
    } catch (PDOException $e) {
      echo $e->getMessage();
      exit;
    }
    break;
  case 'update':
    break;
  case 'delete':
    break;
  case 'register':
    $clientusername = filter_input(INPUT_POST, 'clientusername', FILTER_SANITIZE_STRING);
    $clientpassword = filter_input(INPUT_POST, 'clientpassword', FILTER_SANITIZE_STRING);
    if(empty($clientusername) || empty($clientpassword)) {
      $msg = "<div class='alert alert-danger' role='alert'>* No empty fields allowed.</div>";

      include 'register.php';
      exit; }
    $checkPassword = checkPassword($clientpassword);
    $hashedPassword = password_hash($checkPassword, PASSWORD_DEFAULT);
    $regClient = registerClient($clientusername, $hashedPassword);
    header('Location: login.php');
    die();
    break;
  case 'login':
    $clientusername = filter_input(INPUT_POST, 'clientusername', FILTER_SANITIZE_STRING);
    $clientpassword = filter_input(INPUT_POST, 'clientpassword', FILTER_SANITIZE_STRING);
    $checkpassword = checkPassword($clientpassword);
    if(empty($clientusername) || empty($checkpassword)) {
      $msg = "<div class='alert alert-danger' role='alert'>* Please provide a username and password.</div>";
      include 'login.php';
      exit; }
    $clientData = getClient($clientusername);
    $hashCheck = password_verify($checkpassword, $clientData['clientpassword']);
    if (!$hashCheck) {
      $msg = "<div class='alert alert-danger' role='alert'>* Please check your credentials and try again.</div>";
      include 'login.php';
      exit;
    }
    $_SESSION['loggedin'] = TRUE;
    array_pop($clientData);
    // clientData now part of the session - referencing CIT 336
    $_SESSION['clientData'] = $clientData;
    header('Location: account.php');
    exit;
    break;
  case 'logout':
    session_destroy();
    header('Location: index.php');
    break;
  case 'account':
    $clientId = $_SESSION['clientData']['clientId'];
    if ($_SESSION['loggedin']) {
      $collection = getClientCollection($clientId);
      $clientCollection = buildClientCollection($collection);
    }
    else {
      header('Location: index.php');
    }
    include 'account.php';
    break;
  default:
    include 'index.php';
}
function checkPassword($clientpassword) {
  /* Check the password for a minimum of 8 characters,
  * at least one 1 capital letter, at least 1 number and
  * at least 1 special character */
  $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
  return preg_match($pattern, $clientpassword);
}
function registerClient($clientusername, $clientpassword) {
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
  $sql = 'INSERT INTO clients (clientusername, clientpassword) VALUES (:clientusername, :clientpassword)';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':clientusername', $clientusername, PDO::PARAM_STR);
  $stmt->bindValue(':clientpassword', $clientpassword, PDO::PARAM_STR);
  $stmt->execute();
}
function getClient($clientusername){
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
  $sql = 'SELECT clientid, clientusername, clientpassword FROM clients WHERE clientusername = :clientusername';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':clientusername', $clientusername, PDO::PARAM_STR);
  $stmt->execute();
  $clientData = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $clientData;
}
function getClientCollection($clientId) {
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
  $sql = 'SELECT collection.collectionid, collection.collectiontext FROM collection INNER JOIN clients ON collection.clientid = clients.clientid WHERE collection.clientid = :clientId ORDER BY collection.collectionid DESC';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
  $stmt->execute();
  $collection = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $collection;
}
function buildClientCollection($collection) {
  $clientCollection = "<ul>";
  foreach($collection as $collect) {
    $clientCollection .= "<li>$collect[collectiontext]</li>";
  }
  $clientCollection .= "</ul>";
  return $clientCollection;
}
?>
