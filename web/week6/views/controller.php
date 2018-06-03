<?php
//Start the session
session_start();

// Get  functions.php
require_once 'functions.php';

databaseConnection();

switch ($action) {

  case 'generate':
    $prompt-collection = buildPromptCollection();

    include 'index.php';
    break;

  case 'insert':
    $promptText = filter_input(INPUT_POST, 'promptText', FILTER_SANITIZE_STRING);

    if(empty($promptText)) {
      $msg = '<p>* Please enter a name before submission.</p>';
      include 'index.php';
      exit; }

    break;

  case 'update':

    break;

  case 'delete':

    break;

  default:
    include 'index.php';
}
?>
