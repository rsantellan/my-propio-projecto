mdGenericSale = function(options){
	this._initialize();

}

mdGenericSale.instance = null;
mdGenericSale.getInstance = function (){
	if(mdGenericSale.instance == null)
		mdGenericSale.instance = new mdGenericSale();
	return mdGenericSale.instance;
}

mdGenericSale.prototype = {
    _initialize : function(){

    },
    
    changePaymentStatus: function(form)
    {
      mdShowLoading();
      $.ajax({
          url: $(form).attr('action'),
          data: $(form).serialize(),
          type: 'post',
          dataType: 'json',
          success: function(json){
            mastodontePlugin.UI.BackendBasic.getInstance().close();
          },
          complete: function()
          {
            mdHideLoading();
          }
      });

      return false;
    }
}
