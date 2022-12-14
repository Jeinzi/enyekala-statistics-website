<form action="/player" method="GET">
  <div class="dropdown">
    <div class="input-group <?= $classes ?>">
      <ul class="dropdown-menu" id="player-dropdown"></ul>
      <input type="text" name="name" id="input-player" placeholder="<?= $placeholder ?>" class="form-control dropdown-toggle" autocomplete="off" autofocus>
      <button type="submit" class="btn btn-success">Go!</button>
    </div>
  </div>
</form>