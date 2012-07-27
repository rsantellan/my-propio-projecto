<a id="status_link_id_<?php echo $md_reserva->getId();?>" href="<?php echo url_for("md_reserva/changeReservaStatus?id=".$md_reserva->getId());?>" class="myFancyLink reserva_estado_<?php echo $md_reserva->getStatus();?>">
  <?php echo __('reserva_estado '.$md_reserva->getStatus());?>
</a>