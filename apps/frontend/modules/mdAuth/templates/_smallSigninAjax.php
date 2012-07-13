<div class="titulo green"><?php echo __('Usuario_Login titulo') ?></div>
<form action="<?php echo url_for('@procesSigninAjax') ?>" method="post">
	<?php echo $form->renderHiddenFields()?>
     <div class="campos-left">
         <li><?php echo $form['username']->renderLabel(__('Usuario_email'))?></li>
         <li><?php echo $form['username']->render()?><?php echo $form['username']->renderError()?></li>
         <li><?php echo $form['password']->renderLabel(__('Usuario_clave'))?></li>
         <li><?php echo $form['password']->render()?><?php echo $form['password']->renderError()?></li>
				 <li><?php foreach($form->getFormattedErrors() as $error) echo $error;?></li>
					<?php if(!empty($exception)): ?>
					<li class="error"><?php echo $exception; ?></li>
					<?php endif; ?>
         <li><?php echo __('Usuario_Forgot your password?') ?></li>
         <div class="remember"><?php echo $form['remember']->render()?><?php echo $form['username']->renderLabel(__('Usuario_recordarme'))?></div>
         <div class="div-send"><button class="send" type="submit"><?php echo __('Login_boton') ?></button></div>
     </div>
</form>
