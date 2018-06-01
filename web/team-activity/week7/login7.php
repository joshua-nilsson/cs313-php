<?php dbConnect(); ?>
<!DOCTYPE HTML>
<html lang="en-US">
  <head>
    <meta charset="utf-8">
    <title>User Login</title>
    <meta name="description" content="User Login">
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
      <h1>User Login</h1>

      <form method="post" action="">
        <label for="user">Username</label>
        <input type="text" name="guestUsername" placeholder="Sherlock Holmes" autofocus>
        <label for="password">Password</label>
        <input type="password" name="guestPassword" placeholder="FunkyChicken92!">
        <input type="submit" value="LOGIN">
        <input type="hidden" name="action" value="">
      </form>
    </main>
  </body>
</html>
