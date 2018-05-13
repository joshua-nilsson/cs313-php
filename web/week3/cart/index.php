<?php

session_start();

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

//      $tours = array(
//        'china' => array(
//          'tour' => $location,
//          'tickets' => $tickets,
//          'price' => $price
//        ),
//        'japan' => array(
//          'tour' => $location,
//          'tickets' => $tickets,
//          'price' => $price
//        ),
//        'india' => array(
//          'tour' => $location,
//          'tickets' => $tickets,
//          'price' => $price
//        ),
//        'new-york' => array(
//          'tour' => $location,
//          'tickets' => $tickets,
//          'price' => $price
//        ),
//        'las-vegas' => array(
//          'tour' => $location,
//          'tickets' => $tickets,
//          'price' => $price
//        ),
//        'hawaii' => array(
//          'tour' => $location,
//          'tickets' => $tickets,
//          'price' => $price
//        ),
//        'italy' => array(
//          'tour' => $location,
//          'tickets' => $tickets,
//          'price' => $price
//        ),
//        'london' => array(
//          'tour' => $location,
//          'tickets' => $tickets,
//          'price' => $price
//        ),
//        'paris' => array(
//          'tour' => $location,
//          'tickets' => $tickets,
//          'price' => $price
//        ),
//        'brazil' => array(
//          'tour' => $location,
//          'tickets' => $tickets,
//          'price' => $price
//        ),
//        'greece' => array(
//          'tour' => $location,
//          'tickets' => $tickets,
//          'price' => $price
//        ),
//        'australia' => array(
//          'tour' => $location,
//          'tickets' => $tickets,
//          'price' => $price
//        ));
//      var_dump($tours);
    }
    header('Location: ../view/checkout.php');
    break;
}
?>
