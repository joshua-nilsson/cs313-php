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
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
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
      $prompt .= "<input type='text' name='collectiontext' class='form-control' aria-label='Small' aria-describedby='inputGroup-sizing-lg'>";
      $prompt .= '</div>';
      $prompt .= '</td>';
      $prompt .= '<td>';
      $prompt .= "<div class='input-group-append'>";
      $prompt .= "<button class='btn btn-primary' type='button'>SUBMIT</button>";
      $prompt .= "<input type='hidden' name='action' value='insert'>";
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
    $prompt .= '</form>';

    $collection = "<div id='collection' class='col-sm-6'>";
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
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {

      //        $collection .= '<p>Name: ' . $row['nametext'] . '</p>';
      $collection .= '<tr>';
      $collection .= '<td>';
      $collection .= "<div class='input-group input-group-default mb-6'>";
      $collection .= "<div class='input-group-prepend'>";
      $collection .= "<div class='input-group-text' id='inputGroup-sizing-sm'>$row[nametext]</div>";
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
      $collection .= "<button class='btn btn-primary' type='button'>SUBMIT</button>";
      $collection .= '</div>';
      $collection .= '</td>';
      $collection .= '</tr>';
    }
    $collection .= '</tbody>';
    $collection .= '</table>';
    $collection .= '</div>';
    $collection .= '</div>';

    include 'index.php';
    break;

  case 'insert':
    $collectiontext = filter_input(INPUT_POST, 'collectiontext', FILTER_SANITIZE_STRING);

    if(empty($collectiontext)) {
      $msg = '<p>* Please enter a name before submission.</p>';
      include 'index.php';
      exit; }

    $statement = $db->query('INSERT INTO collection (collectiontext) VALUES (:collectiontext)');
//    $sql = 'INSERT INTO collection (collectiontext) VALUES (:collectiontext)';
//    $stmt = $db->prepare($sql);
//    $stmt->bindValue(':collectiontext', $collectiontext, PDO::PARAM_STR);
//    $stmt->execute();
//    $stmt->closeCursor();
    include 'index.php';
    break;

  case 'update':

    break;

  case 'delete':

    break;

  default:
    include 'admin.php';
}
?>
