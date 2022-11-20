<!doctype html>
<html lang="en">
<head>
  <title>Enyekala Player Stats</title>
  <?php include("include/head.php"); ?>
</head>

<body>
<?php
  if (!isset($_GET['name'])) {
    echo "No user specified!";
    exit;
  }
  $name = $_GET['name'];

  try {
    $connection = connectDb();
    $query = $connection->prepare("SELECT * FROM players WHERE name=?;");
    $result = $query->execute(array($name));
  }
  catch (PDOException $e) {
    alert("Exception: Could not get latest projects" . $e);
  }
  if ($result === false) {
    return;
  }

  $row = $query->fetch(PDO::FETCH_ASSOC);
?>
  <div class="container py-4">
    <header class="border-bottom pb-3 mb-4">
      <div class="row">
        <div class="col-8">
          <?php include("include/page-title.php"); ?>
        </div>
        <div class="col-4">
        <form action="/player" method="GET">
          <div class="input-group">
            <input type="text" name="name" placeholder="C'mon, enter another one" class="form-control" autofocus>
            <button type="submit" class="btn btn-success">Go!</button>
          </div>
        </form>
        </div>
      </div>
      
    </header>
    <div class="row">
      <div class="col-12">
      <?php
        if ($query->rowCount() == 0) {
          alert("No user named '" . $name . "' found.");
        }
        else {
          template("table-player-stats", array(
            "name" => $row["name"],
            "chunks"  => $row["chunks"],
            "nMsg"  => $row["nMessages"],
            "nLogins" => $row["nLogins"],
            "firstLogin" => $row["firstLogin"]
          ));
        }
      ?>
      </div>
    </div>
  </div>
</body>
</html>
