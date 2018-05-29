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

        echo '<p>Name: ' . $row['nametext'] . '</p>';
//      $prompt = "<table class='table'>";
//      $prompt .= "<thead id='head-dark' class='thead-dark'>";
//      $prompt .= '<tr>';
//      $prompt .= "<th scope='col'>PROMPT</th>";
//      $prompt .= "<th scope='col'>NAME</th>";
//      $prompt .= "<th scope='col'>CONTROLS</th>";
//      $prompt .= '</tr>';
//      $prompt .= '</thead>';
//      $prompt .= '<tbody>';
//      $prompt .= '<tr>';
//      $prompt .= '<td>';
//      $prompt .= "<div class='input-group input-group-default mb-6'>";
//      $prompt .= "<div class='input-group-prepend'>";
//      $prompt .= "<div class='input-group-text' id='inputGroup-sizing-sm'>SuikkLakan</div>";
//      $prompt .= '</div>';
//      $prompt .= '</div>';
//      $prompt .= '</td>';
//      $prompt .= '<td>';
//      $prompt .= "<div class='input-group-append'>";
//      $prompt .= "<input type='text' class='form-control' aria-label='Small' aria-describedby='inputGroup-sizing-lg' value="$row[nametext]">";
//      $prompt .= '</div>';
//      $prompt .= '</td>';
//      $prompt .= '<td>';
//      $prompt .= "<div class='input-group-append'>";
//      $prompt .= "<button class='btn btn-primary' type='button'>SUBMIT</button>";
//      $prompt .= '</div>';
//      $prompt .= '</td>';
//      $prompt .= '</tr>';
//      $prompt .= '</tbody>';
//      $prompt .= '</table>';
    }

    include 'index.php';
    break;

  default:
      include 'index.php';
    }
?>
