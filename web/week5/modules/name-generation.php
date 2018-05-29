<?php
$statement = $db->query('SELECT nameid, nametext FROM names');

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  echo '<p>ID: ' . $row['nameid'] . '</p>';
  echo '<p>NAME: ' . $row['nametext'] . '</p>';
}
?>
