
<!DOCTYPE HTML>
<html>  
<body>

<form action="05TeachTeam.php" method="get">

<?php
try
{
  $user = 'userName';
  $password = 'passswordSalt';
  $db = new PDO('pgsql:host=..........;dbname=dbnameonServer', $user, $password);
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