<?php

// Adds a fixed alert to the bottom of the page.
function alert($text) {
  echo '<div class="alert alert-danger alert-dismissible alert-static fade show mt-2" role="alert">';
  echo $text;
  echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
  echo '</div>';
}



// Establishes a connection to the database and returns the connection object.
// Expects a file containing the credentials:
// - 1st line: database user
// - 2nd line: database password
// - 3rd line: database host, e.g. localhost
function connectDb($authFile = __DIR__ . "/credentials") {
  // Read password from file.
  try {
    $handle = fopen($authFile, "r");
    if (!$handle) {
      throw new Error("Can't open password file: '" . $authFile . "'");
    }
    $user = fgets($handle);
    $password = fgets($handle);
    $host = fgets($handle);
    fclose($handle);
  }
  catch (Error $e) {
    alert($e->getMessage());
    exit(1);
  }

  $user = trim($user, "\n\r\t\0\x0B");
  $password = trim($password, "\n\r\t\0\x0B");
  $host = trim($host, "\n\r\t\0\x0B");

  try {
    // The last parameter tells PDO to return the number of matched rows,
    // even if they where not affected by an update because their value wasn't changed.
    $db = new PDO('mysql:host=' . $host . ';dbname=enyekala', $user, $password, array(PDO::MYSQL_ATTR_FOUND_ROWS => true));
    $db->exec("SET NAMES 'utf8';");
  }
  catch (PDOException $e) {
    alert("Could not establish connection to database: " . $e->getMessage());
    exit(1);
  }
  return($db);
}



/**
 * Fill values from associative array into template and output it.
 *
 * @param $file - Name of the template.
 * @param $args - Associative array of variables to use in the template.
 */
function template($name, $args) {
  $path = $_SERVER["DOCUMENT_ROOT"] . "/res/template/" . $name . ".php";
  if (!file_exists($path)) {
    echo "No file: " . $path;
    return;
  }
  if (!is_array($args)) {
    echo "No array";
    return;
  }
  if (file_exists($path) && is_array($args)) {
    extract($args);
    include($path);
  }
}

?>
