
<!DOCTYPE HTML>
<html>
<body>

<form action="05TeachTeam.php" method="get">

<?php
try
{
  $user = 'hhhrcjrfjyglyn';
  $password = 'e5a22e741fe1d44d973e341c1291e949531799efbd5872116115ce25cd5ca9d8';
  $db = new PDO('pgsql:host=ec2-50-19-224-165.compute-1.amazonaws.com;dbname=d2gtblt01rf5ff', $user, $password);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

$statement = $db->query('SELECT DISTINCT book FROM scriptures');
 echo'<tr>';
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{

  echo '<th><input type="checkbox" name="check[]" id="check" value="'. $row['book'] .'">'. $row['book'] .'</th><br>';

}
 echo '</tr>';


?>

   <input type="submit" value="submit">

</form>
</body>
</html>
