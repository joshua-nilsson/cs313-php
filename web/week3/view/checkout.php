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

          <form action="confirmation.php" method="post" class="form-group" class="row">
            <div class="col-sm-6">
              <label for="">First Name</label>
              <input type="text" name="firstName" placeholder="Sherlock" autofocus required class="form-control">
              <label>Last Name</label>
              <input type="text" name="lastName" placeholder="Holmes" required class="form-control">
              <label>Address</label>
              <input type="text" name="address" placeholder="221B Baker Street" required class="form-control">
              <label>Country</label>
              <input type="text" name="country" placeholder="England" required class="form-control">
              <label>City</label>
              <input type="text" name="city" placeholder="London" required class="form-control">
              <label>Postal Code</label>
              <input type="text" name="postal" placeholder="NW1 6XE" required class="form-control">
                <input type="submit" value="Purchase" class="btn btn-primary" href="china.php">
            </div>
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
