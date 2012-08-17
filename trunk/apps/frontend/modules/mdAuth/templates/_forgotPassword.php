
<div class="modal_bg">
    <div id="modal_center">
      <div class="titulo green"><?php echo __("usuario_Recordar contraseña");?></div>
        <div class="clear"></div>
        
        <?php if ($sf_user->hasFlash('mailSended')): ?>
          <h3>
            <?php echo __("usuario_Email enviado a su casilla de correo.");?>
          </h3>
        <?php else: ?>
        <div>
            <?php if($isAjax != "1"): ?>
              <form action="<?php echo url_for('@resetPassword') ?>" method="post" id="form_reset_password_ajax">
            <?php else: ?>
              <form action="<?php echo url_for('@forgotPasswordProcessAjax') ?>" method="post" id="form_reset_password_ajax" onsubmit="return forgotPasswordForm(this);">
            <?php endif; ?>
            
                <?php echo $form->renderHiddenFields();?>
                <div class="campos-left">
                <ul>
                    <li>
                      <h3>
                        <?php echo __("usuario_Le enviaremos sus datos de login a su casilla de mail");?>
                      </h3>
                    </li>
                    <li>
                      <?php echo __("usuario_email");?>
                    </li>
                    <li>
                        
                        <?php echo $form['email']->render(); ?>
                        <?php echo $form['email']->renderError(); ?>
                        
                    </li>
                    <li>
                        <?php if(isset ($exception)): ?>
                            <?php print_r($exception); ?>
                        <?php endif; ?>
                    </li>
                    <li>
                        <div class="float_right">
                            <input type="submit" class="send" value="<?php echo __("usuario_Enviar clave");?>">
                        </div>
                        <div class="clear"></div>
                    </li>
                </ul>
                </div>
            </form>
        </div>
        
        <?php endif; ?>
    </div>
</div>
