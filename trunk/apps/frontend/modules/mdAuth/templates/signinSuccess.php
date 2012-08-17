<?php use_helper('I18N') ?>
<div class="col-left" id="login">
    <?php include_partial('smallSigninAjax', array('form'=>$form)) ?>
</div>
<script>
$('#login form').submit(submitLogin);

function submitLogin(){
	form = this;
	$('#login button.send').remove();
	$.ajax({
	        url: $(form).attr('action'),
	        data: $(form).serialize(),
	        type: 'post',
	        dataType: 'json',
	        success: function(json){
	            if(json.result == 0){
                    window.location.reload();
	            }else {
                    $('#login').html(json.body)
                    $('#login form').submit(submitLogin);
	            }

	        },
	        complete: function(){

	        },
	    error: function(){
	    }
	    });
	return false;
}
</script>