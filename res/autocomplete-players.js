$("#input-player").on("input", function(e) {
  console.log("input")
  var params = {
    input: $(this).val()
  }
  $.get("autocomplete-players", params).done(function(data) {
    dropdown = $('#player-dropdown')
    dropdown.empty()
    data = JSON.parse(data);

    if (data.length === 0 || params.input === "") {
      $("#input-player").dropdown('hide');
      return
    }

    let entries = []
    for (let name of data) {
      entries.push(`<li><a class='dropdown-item' href='/player?name=${name}'>${name}</a></li>`)
    }
    $('#player-dropdown').append(entries.join(""))
    $("#input-player").dropdown('show');
  })
})
