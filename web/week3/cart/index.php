<?php

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

  case 'addCart':
    if($_POST['ticketInput'] > 0) {
      $_SESSION['location'] = $_POST['tour'];
      $_SESSION['ticketInput'] = $_POST['ticketInput'];
      $_SESSION['ticketTotal'] = ($_SESSION['ticketInput'] * 1000);
      $tickets = $_SESSION['ticketInput'];
      $price = $_SESSION['ticketTotal'];
      $location = $_SESSION['location'];

      echo "<p>Tickets: $tickets</p>";
      echo "<p>Total: $$price</p>";
      echo "<p>Location: $location</p>";
    }
    include '../view/cart.php';
    break;
}
?>
