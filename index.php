<!doctype html>
<html lang="en">
<head>
  <title>Enyekala Player Stats</title>
  <?php include("include/head.php"); ?>
</head>

<body>
  <div class="container py-4">
    <header class="border-bottom pb-3 mb-4">
      <span class="fs-4">
        Statistics for Enyekala
      </span>
    </header>
    <div class="bg-light rounded-3 p-5">
      <h1 class="fw-bold display-5">Welcome!</h1>
      This website provides statistics for the Enyekala-Minetest-Server, also known als "Must Test".
      <form action="/player" method="GET">
        <div class="input-group mt-3">
          <input type="text" name="name" placeholder="Enter the name of a player for details…" class="form-control" autofocus>
          <button type="submit" class="btn btn-success">Go!</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
