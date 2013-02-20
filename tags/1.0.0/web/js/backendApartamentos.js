function generarIdiomasApartamentos(obj){
  mdShowLoading();
  $.ajax({
    url: $(obj).attr("href"),
    type: 'post',
    dataType: 'json',
    success: function(json){
      if(json.response == "OK"){
        mdHideLoading(function(){
          mdShowMessage("El proceso de Generar idiomas faltantes ha finalizado con exito.")
          });
      }else{
        mdHideLoading(function(){
          mdShowMessage("Ha ocurrido un error y el proceso no se ha podido realizar con exito.")
          });
      }
    },
    error: function(){
      mdHideLoading(function(){
        mdShowMessage("Ha ocurrido un error y el proceso no se ha podido realizar con exito.")
        });
    }
  });
  return false;
} 