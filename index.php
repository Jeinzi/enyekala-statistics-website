<!doctype html>
<html lang="en">
<head>
  <title>Enyekala Player Stats</title>
  <?php include("include/head.php"); ?>
</head>

<body>
<?php
  try {
    $connection = connectDb();
    $query = $connection->prepare("SELECT * FROM players ORDER BY nLogins DESC LIMIT 50;");
    $result = $query->execute(array());
  }
  catch (PDOException $e) {
    alert("Exception: Could not get latest projects" . $e);
  }
  if ($result === false) {
    return;
  }
?>
  <div class="container py-4">
    <header class="border-bottom pb-3 mb-4">
      <a href="/" class="no-link-deco fs-4">Statistics for Enyekala</a>
    </header>
    <div class="bg-light rounded-3 p-5 mb-5">
      <h1 class="fw-bold display-5">Welcome!</h1>
      This website provides statistics for the <a href="http://arklegacy.duckdns.org">Enyekala</a> Minetest server, also known als "Must Test".
      <form action="/player" method="GET">
        <div class="input-group mt-3">
          <input type="text" name="name" placeholder="Enter the name of a player for details…" class="form-control" autofocus>
          <button type="submit" class="btn btn-success">Go!</button>
        </div>
      </form>
    </div>
    <h2>Most Active Players</h2>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">First Login</th>
          <th scope="col">Logins</th>
          <th scope="col">Number of Chat Messages</th>
          <th scope="col">Chunks created</th>
        </tr>
      </thead>
      <?php
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
          template("table-row-player", array(
            "name" => $row["name"],
            "chunks"  => $row["chunks"],
            "nMsg"  => $row["nMessages"],
            "nLogins" => $row["nLogins"],
            "firstLogin" => $row["firstLogin"]
          ));
        }
      ?>
    </table>
  </div>
</body>
</html>
