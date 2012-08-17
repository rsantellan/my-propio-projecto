<form action='<?php echo url_for('registerUser/processNewUser'); ?>' method="post" id='user_new_form' onsubmit="return registerNewUser(this);" class="form-send">
      <?php echo $form->renderHiddenFields(); ?>     
			<div class="campos-right">
         <div class="campos-right-left">
             <li <?php if($form['nombre']->hasError()) echo 'class="error_list"' ?>><?php echo __('Usuario_nombre') ?></li>
             <li <?php if($form['nombre']->hasError()) echo 'class="error_list"' ?>><?php echo $form['nombre']->render(array('tabIndex'=>1)); ?></li>
             <li <?php if($form['email']->hasError()) echo 'class="error_list"' ?>><?php echo __('Usuario_email') ?></li>
             <li <?php if($form['email']->hasError()) echo 'class="error_list"' ?>><?php echo $form['email']->render(array('tabIndex'=>3)); ?></li>
             <li style="font-size:10px; font-family: 'CourierRegular';"><?php echo __('Usuario_acepto los terminos') ?><a target="_blank" href="<?php echo url_for('@terminos') ?>" class="blue"> <?php echo __('Global_Terms of Service') ?>.</a></li>
         </div>
         <div class="campos-right-right">
             <li <?php if($form['apellido']->hasError()) echo 'class="error_list"' ?>><?php echo __('Usuario_apellido') ?></li>
             <li <?php if($form['apellido']->hasError()) echo 'class="error_list"' ?>><?php echo $form['apellido']->render(array('tabIndex'=>2)); ?></li>
             <li <?php if($form['password']->hasError()) echo 'class="error_list"' ?>><?php echo __('Usuario_clave') ?></li>
             <li <?php if($form['password']->hasError()) echo 'class="error_list"' ?>><?php echo $form['password']->render(array('tabIndex'=>15)); ?></li>
						<?php if(!isset($register)): ?>
             <li style="font-size:10px; font-family: 'CourierRegular';"><?php echo __('Usuario_Already have an account') ?> <a href="<?php echo url_for('@signin') ?>" id="login_opener" class="blue"><?php echo __('Usuario_Login link') ?>.</a></li>
						<script>
						$(function(){
							$('#login_opener').fancybox({
								'hideOnContentClick': false,
                                'autoDimensions': true
							});
						});

						</script>
					<?php endif; ?>
         </div>
<?php if($form->hasErrors()): ?>
<div class="clear"></div>
					<ul class="error_list">
<?php foreach($form->getFormattedErrors() as $error)
	echo '<li>' . $error . '</li>';
?>
					</ul>
<?php endif; ?>
     </div>
</form>
