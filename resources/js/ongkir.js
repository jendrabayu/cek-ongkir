$('select[name=origin_province]').on('change', function () {
  const provinceId = $(this).val();

  if (provinceId) {
    $.ajax({
      url: '/api/province/' + provinceId + '/cities',
      type: 'get',
      dataType: 'json',
      success: function (data) {
        $('select[name=origin_city]').empty();
        $.each(data, function (key, value) {
          $('select[name=origin_city]').append(`<option value="${key}">${value}</option>`)
        })
      }
    })
  } else {
    $('select[name=origin_city]').empty();
  }
});

$('.select2').select2()

$('#destination_city').select2({
  ajax: {
    url: '/api/cities',
    type: 'post',
    dataType: 'json',
    delay: 150,
    data: function (params) {
      return {
        _token: $('meta[name=csrf-token]').attr('content'),
        search: $.trim(params.term)
      }
    },
    processResults: function (response) {
      return {
        results: response
      }
    },
    cache: true
  }
})