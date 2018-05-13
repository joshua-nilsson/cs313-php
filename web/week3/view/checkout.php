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
    <title><?php echo $location ?> | Checkout</title>
    <meta name="description" content="Checkout to <?php echo $location?>!">
  </head>

  <body>
    <header>
      <?php include '../modules/header.php';?>
    </header>

    <main>
      <article>
        <section class="container">
          <h1><?php echo $location ?> Checkout</h1>
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

          <form action="confirmation.php" method="post">
            <div class="row justify-content-end">
              <div class="col-sm-6 checkout">
                <input type="submit" value="Purchase" class="btn btn-primary" href="china.php">
              </div>
            </div>
            <input type="hidden" name="tour" value="Australia">
            <input type="hidden" name="action" value="purchase">
          </form>
        </section>
      </article>
    </main>

    <footer>
      <?php include '../modules/footer.php';?>
    </footer>
    <?php include '../modules/scripts.php';?>
  </body>
</html>
