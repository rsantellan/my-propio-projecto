
function registerNewUser(form){        

    // Target url
    var target = $(form).attr('action');

    // Request
    var data = $(form).serialize();

    // Send
    $.ajax({
        url: target,
        dataType: 'json',
        type: 'POST',
        data: data,
        success: function(json)
        {
            if(json.response == 'OK')
            {
              $('#register_new_user_div').html(json.options.body);  
							$('#md_apartamento_frontend_md_user_id').val(json.options.md_user_id);
							if(typeof(submitPropertyForm) == 'function'){
								submitPropertyForm();
							}else{
								window.location.href = '/';
							}
            }
            else
            {
                // Message
                $('#register_new_user_div').html(json.options.form);
								if(typeof($.scrollTo) == 'function'){
										$(window).scrollTo('#user_new_form',500, {offset:{top:-30 } });
								}
            }
        },
        error: function()
        {
            // Message
						console.log('error ajax');
        }
    });


    return false;
}