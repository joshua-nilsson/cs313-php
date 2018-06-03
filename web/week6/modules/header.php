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
              if (isset($_SESSION['loggedin'])) {
                echo "<a href='account.php' title='View Account'>Account</a>";
              }
              else {
                echo "<a href='register.php' title='Click to Register'>Register</a>";
              }
              ?>
            </a>
          </li>
        </div>
        <div class="col-sm-1">
          <li class="nav-item">
              <?php
              if (isset($_SESSION['loggedin'])) {
                echo "<a href='controller.php?action=logout' title='Click to Logout'>Logout</a>";
              }
              else {
                echo "<a href='login.php'>Login</a>";
              }
              ?>
          </li>
        </div>
      </div>
    </div>
  </ul>
</nav>
