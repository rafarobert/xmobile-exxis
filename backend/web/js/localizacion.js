$(function(){
  $.ajax({
    type: 'GET',
    url: `${url_base}/login/default/localidad`,
    success: function (response) {
      if(response.code == 100){
        var html = '<option value="">Seleccione..</option>'
        response.datos.forEach(element => {
          html += '<option value="'+element.id+'">'+element.nombre+'</option>';
        });
        $('#localidad').html(html);
        $('#modal-localizacion').modal('show');
      }
    }
  });
  $('#btn-guardar').on('click', function () {
    var localidad = $('#localidad option:selected').text();
    var idLocalidad = $('#localidad').val();
    $.ajax({
      type: 'POST',
      url: `${url_base}/login/default/localidadguardar`,
      data: { localidad:localidad,idLocalidad:idLocalidad },
      success: function (response) {
        
      }
    });
  });
});