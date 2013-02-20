<?php
slot('backend_reservas', 'ok');
?>
<div id="md_center_container">
  <div class="md_shadow">
    <div class="md_center">

      <div class="md_content_center">
        <h1 style="float: left">
          <?php echo __('reservas_manejar'); ?>
        </h1>
        <div style="float:right">
        </div>
        <div class="clear"></div>
        <div id="md_content_actions">
        </div>              
        <div class="clear"></div>

        <div>
          <a href="<?php echo url_for("@md_reserva"); ?>">
            <?php echo __('reservas_manejar nuevas'); ?>
          </a>
        </div>
        <div>
          <a href="<?php echo url_for("@md_reserva_2"); ?>">
            <?php echo __('reservas_manejar todas las reservas'); ?>
          </a>
        </div>
        <div>
          <a href="<?php echo url_for("@reservaEstadistica"); ?>">
            <?php echo __('reservas_mirar estadisticas'); ?>
          </a>
        </div>
        <div>
          <a href="<?php echo url_for("@reservaEstadisticaUsuarios"); ?>">
            <?php echo __('reservas_mirar estadisticas usuarios'); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>