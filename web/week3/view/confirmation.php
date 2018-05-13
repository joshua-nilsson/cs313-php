<?php
session_start();

$tickets = $_SESSION['ticketInput'];
$price = $_SESSION['ticketTotal'];
$location = $_SESSION['location'];

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$address = $_POST['address'];
$country = $_POST['country'];
$city = $_POST['city'];
$postal = $_POST['postal'];
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
          <h1>Congratulations, <?php echo $firstName?>!</h1>
          <h2><?php echo "Ticket Confirmation: " . $tickets . " Ticket(s) to " . $location . " @ $" . $price ?></h2>
          <div class="row">
            <div class="col-sm-6">
              <img src="../img/<?php echo strtolower($location) ?>.jpg" alt="Image of <?php echo $location ?>">
            </div>
            <div class="col-sm-6">
              <table class="table table-striped">
                <tr>
                  <td>Location</td>
                  <td><?php echo $location ?></td>
                </tr>
                <tr>
                  <td>Ticket(s)</td>
                  <td><?php echo $tickets ?></td>
                </tr>
                <tr>
                  <td>Price</td>
                  <td><?php echo "$" . $price ?></td>
                </tr>
                <tr>
                  <td>First Name</td>
                  <td><?php echo $firstName ?></td>
                </tr>
                <tr>
                  <td>Last Name</td>
                  <td><?php echo $lastName ?></td>
                </tr>
                <tr>
                  <td>Address</td>
                  <td><?php echo $address ?></td>
                </tr>
                <tr>
                  <td>Country</td>
                  <td><?php echo $country ?></td>
                </tr>
                <tr>
                  <td>City</td>
                  <td><?php echo $city ?></td>
                </tr>
                <tr>
                  <td>Postal Code</td>
                  <td><?php echo $postal ?></td>
                </tr>
              </table>
            </div>
          </div>

          <div class="row justify-content-end">
            <div class="col-sm-6">
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
