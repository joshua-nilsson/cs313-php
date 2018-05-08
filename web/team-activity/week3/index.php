<!DOCTYPE HTML>
<html>
  <body>
    <form action="team3.php" method="post">
      Name: <input type="text" name="name"><br>
      E-mail: <input type="text" name="email"><br>
      <p>What is your Major?:</p>
      <?php
      $majors = array("Computer Science", "Web Design and Development", "Computer Information Technology", "Computer Engineering");
      foreach($majors as $major){
        echo "<input type='radio' name='major' value='$major'> $major<br>";
      }
      ?>

      <p>Comments:</p>
      <textarea rows="4" cols="50" name="comment" placeholder="Enter comments here..."></textarea>
      <p>Which Continents have you visited?:</p>
      <input type="checkbox" name="check[]" value="na">North America<br>
      <input type="checkbox" name="check[]" value="sa">South America<br>
      <input type="checkbox" name="check[]" value="eu">Europe<br>
      <input type="checkbox" name="check[]" value="as">Asia<br>
      <input type="checkbox" name="check[]" value="au">Australia<br>
      <input type="checkbox" name="check[]" value="af">Africa<br>
      <input type="checkbox" name="check[]" value="an">Antarctica<br>
      <input type="submit">
    </form>
  </body>
</html>
