<!--<?php dbConnect(); ?>-->
<!DOCTYPE HTML>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <title>User Sign-Up</title>
    <meta name="description" content="User Sign-Up">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      label, input {
        display: block;
      }

      label, input:first-of-type {
        margin-bottom: 5px;
      }

      label {
        display: block;
        font-weight: bold;
        font-size: 150%;
      }

      input[type="submit"] {
        margin-top: 10px;
      }
    </style>
  </head>

  <body>
    <main>
      <h1>User Sign-Up</h1>

      <?php if (isset($msg)){ echo $msg;} ?>

      <form method="post" action="functions7.php">
        <label for="user">Username</label>
        <input type="text" name="guestUsername" placeholder="Sherlock Holmes" autofocus>
        <label for="password">Password</label>
        <input type="password" name="guestPassword" placeholder="FunkyChicken92!">
        <input type="submit" value="LOGIN">
        <input type="hidden" name="action" value="register">
      </form>
    </main>
  </body>
</html>
