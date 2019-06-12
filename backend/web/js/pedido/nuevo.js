$(function(){
  var objeto = {
    cabecera: {

    },
    cuerpo: []
  }; 
  $('#nombre').select2({
    language: "es",
    placeholder: 'Seleccione...',
    dropdownParent: $('#cliente'),
    theme: 'classic',
    minimumResultsForSearch: 3,
    allowClear: true,
    ajax: {
      url: `${url_base}/pedido/buscar`,
      type: 'post',
      dataType: 'json',
      data: function (params) {
        var query = {
          search: params.term,
          type: 'public'
        }
        return query;
      },
      processResults: function (data) {
        var select = [];
        data.forEach(element => {
          var element = {
            id: element.id,
            text: element.CardName,
            cardCode: element.CardCode,
            address: element.Address
          }
          select.push(element);
        });
        return {
          results: select
        };
      }
    }
  });
  $('#nombre').on('select2:select', function (e) {
    var data = e.params.data;
    objeto.cabecera = {
      id: data.id,
      cardName: data.text,
      cardCode: data.cardCode,
      address: data.address
    }
  });
  $('#btn-aceptar').on('click', function () {
    var $form = $('#frm-cabecera');
    for (const key in objeto.cabecera) {
      $form.find(`#${key}`).val(objeto.cabecera[key]);
    }
    $('#cliente').modal('hide');
    $('.card-body').fadeIn();
  });
  var $table = $('.table-rep-plugin');
  $table.responsiveTable('update');
  $table.find('table').dataTable({
    language: {
      url: '/Spanish.json'
    }
  });
});