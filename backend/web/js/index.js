$(function(){
  window.onload = function(){    
    $(".loader").fadeOut("slow");
  }
  $(".loader").fadeOut("slow");
  $(document).on('submit',function(){
    $(".loader").fadeIn("slow");
  });
  $('[data-plugin="switchery"]').each(function (idx, obj) {
    new Switchery($(this)[0], $(this).data());
  });

  $('[data-plugin="switchery"]').on('change',function (event) {
    event.stopPropagation();
    var $self = $(this);
    if ($self.val().localeCompare('todo') === 0) {
      if ($self.is(':checked')) {
        $('.chb_lista').each(function (idx, obj) {
          if (!$(obj).is(':checked')) {
            $(obj).trigger('click').unbind('change');
          }
        });
      } else {
        $('.chb_lista').each(function (idx, obj) {
          if ($(obj).is(':checked')) {
            $(obj).trigger('click').unbind('change');
          }
        });
      }
    }
  });
  if (status && status === '1') {
    Swal.fire({
      type  : 'success',
      title : 'Correcto',
      text  : 'La actualizacion se realizo correctamente'
    });
  }
});