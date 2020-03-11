$("#addButton").on('click', function () {
    var input_val = $('#inputTag').val()
    $("#addTag").append(`<h4 class="d-inline"><span class="badge badge-warning mr-2">${input_val}</span></h4>`);
    $("#hiddenTags").val($("#hiddenTags").val() + "," + input_val);
  });

  $(document).ready(function() {
    $('#summernote').summernote();
  });