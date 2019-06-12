
  var url_base = $('meta[name="baseUrl"]').attr('content');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });