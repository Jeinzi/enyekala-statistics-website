<?php
/*
  Return player name suggestions based on an input string.
  If anything goes wrong, return an empty list.
*/
include("include/utility.php");

if (isset($_GET['input'])) {
  $input = $_GET['input'];
}
else {
  $input = "";
}

$names = array();

try {
  $connection = connectDb();
  $query = $connection->prepare("SELECT * FROM players WHERE name LIKE ? ORDER BY nLogins DESC LIMIT 10;");
  $result = $query->execute(array($input . "%"));
}
catch (Exception $e) {
  $result = false;
}

if ($result !== false) {
  while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $names[] = $row["name"];
  }
}


echo json_encode($names);
?>
