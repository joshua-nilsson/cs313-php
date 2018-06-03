<nav>
  <ul class="nav">
    <div class="container">
      <div class="row">
        <div class="col-sm-10">
          <li class="nav-item"><a href="index.php">Fantasy Name Generator</a></li>
        </div>
        <div class="col-sm-1">
          <li class="nav-item"><a href="account.php">Account</a></li>
        </div>
        <div class="col-sm-1">
          <li class="nav-item">
            <a href="login.php">
              <?php
              if (isset($_SESSION['loggedin'])) {
                echo "<a href='/acme/accounts/?action=logout' title='Click to Logout'>Logout</a>";
              }
              else {
                echo "<a href='login.php'>Login</a>";
              }
              ?>
            </a>
          </li>
        </div>
      </div>
    </div>
  </ul>
</nav>
