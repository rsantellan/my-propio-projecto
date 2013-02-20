<?php
use_stylesheet('log-in');
use_javascript('regiterUser.js');
?>
<div class="title">
    <li><img src="/images/folder.png" width="15" height="12" /></li>
    <li><a href="<?php echo url_for('@homepage') ?>"<?php echo __('Global_Home') ?></a></li>
    <li>/</li>
    <li class="current"><?php echo __('Usuario_Login navegacion') ?></li>
</div> 
<?php echo include_component('locaciones', 'title_right'); ?>
<div class="main-content-up">
    <div class="col-left" id="login_page">
        <?php include_partial('mdAuth/smallSigninAjax', array('form' => $loginForm)) ?>
    </div>
    <script>
        $('#login_page form').submit(submitLogin);

        function submitLogin(){
            form = this;
            $('#login_page button.send').remove();
            $.ajax({
                        url: $(form).attr('action'),
                        data: $(form).serialize(),
                        type: 'post',
                        dataType: 'json',
                        success: function(json){
                                if(json.result == 0){
                        window.location.href = '<?php echo url_for('@homepage') ?>';
                                }else {
                        $('#login_page').html(json.body)
                        $('#login_page form').submit(submitLogin);
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
    <div class="col-right">
        <div class="titulo green"><?php echo __('Usuario_create free account') ?></div>
        <div id="register_new_user_div" >
            <?php include_component('registerUser', 'registerUser', array('register' => true)); ?>
        </div>
        <button class="send" id="submit" type="button" style="margin-left: 30px;"><?php echo __('Usuario_Create') ?></button>  
    </div>
</div>
<script>
    $(function(){
        $('#submit').click(function(){
            if($('#user_new_form').length>0){
                registerNewUser($('#user_new_form'));
            }
        })
    })
</script>