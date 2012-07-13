<?php if($sf_user->hasFlash("mdWesternPaymentProcessed")): ?>

  <?php echo __("venta_link sin validez");?>

<?php elseif($sf_user->hasFlash("mdWesternPaymentMade")): ?>

  <?php echo __("venta_su compra esta siendo procesada, al momento de verificar el codigo se le informara");?>

<?php else: ?>

  <form method="POST" action="<?php echo url_for('@genericWesternFinish?id=' . $id); ?>">
    
    <?php echo $form; ?>
    
    <div class="clear"></div>
    
    <input type="submit" value="<?php echo __("venta_enviar codigo de western");?>" />
    
  </form>

<?php endif; ?>
