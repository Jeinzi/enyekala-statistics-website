<div class="container text-center mb-3">
  <small class="text-muted">Last updated
  <?php
    try {
      $query = $connection->prepare("SELECT analyzeDate FROM meta;");
      $result = $query->execute(array());
      $timestamp = $query->fetch(PDO::FETCH_ASSOC)["analyzeDate"];
      $timestamp .= " UTC";
    }
    catch (PDOException $e) {
      $timestamp = "at an unknown time";
    }
    echo $timestamp;
  ?>
  </small>
</div>
