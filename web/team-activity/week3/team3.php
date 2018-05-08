<?php
$locations = array ( "na" => "North America", "sa" => "South America", "eu" => "Europe", "as" => "Asia", "au" => "Australia", "af" => "Africa", "an" => "Antarctica");
$name = $_POST['name'];
$email = $_POST['email'];
$major = $_POST['major'];
$comment = $_POST['comment'];
$continent = $_POST['check'];

echo "Name: $name <br/>";
//echo "e-mail: $email <br/>";
echo "<a href='mailto: $email '>$email</a><br />";
echo "Major: $major <br/>";
echo "Comments: $comment <br/>";
echo "Continents Visited: ";
//print_r($locations);
foreach($continent as $cont){
  echo "$locations[$cont], ";
};
?>
