$(document).ready(function() {
  $("a.myFancyLink").fancybox();
});

function salvarCambioEstado(form)
{
  $.fancybox.showActivity();
  $.ajax({
    url: $(form).attr('action'),
    data: $(form).serialize(),
    type: 'post',
    dataType: 'json',
    success: function(json){
      if(json.response == "OK")
      {
                        
      }
      else
      {
        
      }
              
    }
    , 
    complete: function()
    {
      $.fancybox.hideActivity();
      $.fancybox.resize();
    }
  });
  return false; 
}