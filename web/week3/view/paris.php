<!DOCTYPE HTML>
<html lang="en-US">
  <head>
    <?php include '../modules/head.php';?>
    <title>Travel to Paris | Tickets</title>
    <meta name="description" content="Book your travels to Paris!">
  </head>

  <body>
    <header>
      <?php include '../modules/header.php';?>
    </header>

    <main>
      <article>
        <section class="container">
          <h1>Tour Paris</h1>
          <div class="row">
            <div class="col-sm-6">
              <img src="../img/paris.jpg" alt="Image of Paris">
            </div>
            <div class="col-sm-3">
              <h2>Description</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="col-sm-3">
              <h2>Features</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

            </div>
          </div>

          <form action="../cart/index.php" method="post">
            <div class="row col justify-content-end tickets">
              <div class="col-sm-6">
                <p><span id="priceTag">$1000</span></p>
                <label for="customRange1">Number of Tickets:</label>
                <!-- https://stackoverflow.com/questions/10004723/html5-input-type-range-show-range-value?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa -->
                <input type="range" name="ticketInput" class="custom-range" id="customRange1" value="1" min="1" max="10" oninput="myFunction(); ticketOutput.value = customRange1.value">
                <output name=ticketOutput id="ticketOutput">1</output>
              </div>
            </div>
            <div class="row justify-content-end">
              <div class="col-sm-6">
                <input type="submit" value="Add to Cart" class="btn btn-primary" href="china.php">
              </div>
            </div>
            <input type="hidden" name="tour" value="Paris">
            <input type="hidden" name="action" value="addCart">
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
