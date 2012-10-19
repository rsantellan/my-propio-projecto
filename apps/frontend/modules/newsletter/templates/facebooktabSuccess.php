<?php
use_stylesheet('facebooktab.css');

?>
<form name="<?php echo $form->getName();?>" class="form-send" method="POST" action="<?php echo url_for('@facebooktab') ?>">
      <?php echo $form->renderHiddenFields() ?>
    <div class="campos-left">
        <li><?php echo __('novedades_nombre') ?></li>
        <li><?php echo $form['nombre']->render(array('tabIndex'=>1)) ?></li>
        <li><?php echo __('novedades_email') ?></li>
        <li><?php echo $form['email']->render(array('tabIndex'=>2)) ?></li>

        <div class="div-send"><button class="send" type="submit" tabIndex="4"><?php echo __('novedades_Enviar') ?></button></div>
    </div>

                  <div class="clear"></div>
                  <ul class="error_list">
                      <?php foreach($form->getFormattedErrors() as $error): ?>
                      <li><?php echo $error; ?></li>
                      <?php endforeach; ?>
                  </ul>
                  <div class="clear"></div>
</form>