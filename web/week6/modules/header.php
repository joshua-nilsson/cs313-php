<nav>
  <ul class="nav">
    <div class="container">
      <div class="row">
        <div class="col-sm-10">
          <li class="nav-item"><a href="index.php">Fantasy Name Generator</a></li>
        </div>
        <div class="col-sm-1">
          <li class="nav-item">
            <a href="account.php">
              <?php
              if (isset($_SESSION['loggedin'])){

                $username = $_SESSION['clientData']['clientusername'];

                echo $username . "'s Account";
              }
              else { echo "Account";}
              ?>
            </a>
          </li>
        </div>
        <div class="col-sm-1">
          <li class="nav-item"><a href="login.php">Login</a></li>
        </div>
      </div>
    </div>
  </ul>
</nav>
