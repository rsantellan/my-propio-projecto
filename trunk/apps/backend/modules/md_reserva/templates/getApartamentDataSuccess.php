<div class='reserva_apartamento'>
  <div class='reserva_imagen_apartamento'>
      <img src="<?php echo $object->retrieveAvatar(array(mdWebOptions::WIDTH => 160, mdWebOptions::HEIGHT => 160, mdWebOptions::CODE => mdWebCodes::RESIZE)); ?>" />
  </div>
  <div class='reserva_datos_apartamento'>
    <span>
      <?php echo __('apartament_nombre') ?>:<strong><?php echo $object->getTitulo(); ?></strong>
    </span>
    <div class="clear"></div>
    <span>
      <?php echo __('apartament_Moneda') ?>:<strong><?php echo $object->getMdCurrency(); ?></strong>
    </span>
    <div class="clear"></div>
    <span>
      <?php echo __('apartament_precio temporada alta') ?>:<strong><?php echo $object->getPrecioAlta(); ?></strong>
    </span>
    <div class="clear"></div>
    <span>
      <?php echo __('apartament_precio temporada media') ?>:<strong><?php echo $object->getPrecioMedia(); ?></strong>
    </span>
    <div class="clear"></div>
    <span>
      <?php echo __('apartament_precio temporada baja') ?>:<strong><?php echo $object->getPrecioBaja(); ?></strong>
    </span>
    <div class="clear"></div>
  </div>
</div>
