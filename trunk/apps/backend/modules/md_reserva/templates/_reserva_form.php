<h2><?php echo __("reserva_cambiar status");?></h2>
<hr/>
<form action="<?php echo url_for('md_reserva/saveStatus');?>" method="POST" onsubmit="return salvarCambioEstado(this);">
  <div class="form_status_field">
    <label><?php echo __("reserva_status");?></label>
    <?php echo $form['status']->render();?>
  </div>
  <div class="form_status_field">
    <label><?php echo __("reserva_message");?></label>
    <?php echo $form['message']->render();?>
  </div>
  <?php
    echo $form->renderHiddenFields();
  ?>  
  <input type="submit" value="<?php echo __("reserva_guardar");?>"/>
</form>