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
//    $prompt = "<div>";

    $prompt = "<div class='container'>";
    $prompt .= "<div class='row'>";
    $prompt .= "<div class='col-sm-6'>";
    $prompt .= "<div id='accordion'>";
    $prompt .= "<div class='card'>";
    $prompt .= "<div class='card-header' id='headingOne'>";
    $prompt .= "<h5 class='mb-0'>";
    $prompt .= "<button class='btn btn-link' data-toggle='collapse' data-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>Example Table</button>";
    $prompt .= "</h5>";
    $prompt .= "</div>";
    $prompt .= "<div id='collapseOne' class='collapse show' aria-labelledby='headingOne' data-parent='#accordion'>";
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

//        $prompt .= '<p>Name: ' . $row['nametext'] . '</p>';
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
      $prompt .= "<input type='text' class='form-control' aria-label='Small' aria-describedby='inputGroup-sizing-lg'>";
      $prompt .= '</div>';
      $prompt .= '</td>';
      $prompt .= '<td>';
      $prompt .= "<div class='input-group-append'>";
      $prompt .= "<button class='btn btn-primary' type='button'>SUBMIT</button>";
      $prompt .= '</div>';
      $prompt .= '</td>';
      $prompt .= '</tr>';
    }
    $prompt .= '</tbody>';
    $prompt .= '</table>';

//    $prompt .= "</div";

    include 'index.php';
    break;

  default:
      include 'index.php';
    }
?>
