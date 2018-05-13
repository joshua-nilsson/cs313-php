<?php
session_start();

$tickets = $_SESSION['ticketInput'];
$price = $_SESSION['ticketTotal'];
$location = $_SESSION['location'];
?>
<!DOCTYPE HTML>
<html lang="en-US">
  <head>
    <?php include '../modules/head.php';?>
    <title><?php echo $location ?> | Order Confirmation</title>
    <meta name="description" content="<?php echo $location ?> Order Confirmation">
  </head>

  <body>
    <header>
      <?php include '../modules/header.php';?>
    </header>

    <main>
      <article>
        <section class="container">
          <h1>Congratulations!</h1>
          <h2><?php echo "Ticket Confirmation: " . $tickets . " Ticket(s) to " . $location . " @ $" . $price ?></h2>
          <div class="row">
            <div class="col-sm-6">
              <img src="../img/<?php echo $location?>.jpg" alt="Image of Australia">
            </div>
            <div class="col-sm-6">
              <table class="table table-striped">
                <tr>
                  <td>Location</td>
                  <td><?php echo $location ?></td>
                </tr>
                <tr>
                  <td>Tickets</td>
                  <td><?php echo $tickets ?></td>
                </tr>
                <tr>
                  <td>Price</td>
                  <td><?php echo "$" . $price ?></td>
                </tr>
              </table>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-6 checkout">
              <a href="tours.php" class="btn btn-primary">Back to Tours</a>
            </div>
          </div>
        </section>
      </article>
    </main>

    <footer>
      <?php include '../modules/footer.php';?>
    </footer>
    <?php include '../modules/scripts.php';?>
  </body>
</html>
