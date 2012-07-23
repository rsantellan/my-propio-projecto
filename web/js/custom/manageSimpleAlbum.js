function calledOnQueueCompleteBasicUploaderCallBack(__MD_OBJECT_ID, __MD_OBJECT_CLASS)
{
  calledOnQueueCompleteUploaderCallBack(__MD_OBJECT_ID, __MD_OBJECT_CLASS)
}

function calledOnQueueCompleteUploaderCallBack(__MD_OBJECT_ID, __MD_OBJECT_CLASS)
{

  var url = $("#retrieve-album-images").val();//__MD_CONTROLLER_FRONTEND_SYMFONY + '/apartamentos/images';		
  
  $.ajax({
    url: url,
    data: {
        'id': __MD_OBJECT_ID, 'class' : __MD_OBJECT_CLASS
        },
    type: 'post',
    dataType: 'json',
    success: function(json){
      if(json.response == "OK"){
        $("#avatar_content div.photo img").attr('src',json.options.avatar);
        $("#thumbs_content").html(json.options.content);
        $.fancybox.close();
      }
    },
    complete: function(json)
    {
    }
  });

  return false;
}