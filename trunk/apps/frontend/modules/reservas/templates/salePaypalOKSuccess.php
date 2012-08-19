<?php
slot('novedades', true);

use_stylesheet('novedades.css');

?>
<div class="title">
    <li><img src="/images/folder.png" width="15" height="12" /></li>
		<li><a href="<?php echo url_for('@homepage') ?>"><?php echo __('Global_Home') ?></a></li>
    <li>/</li>
    <li class="current"><?php echo __('reserva_Navegacion') ?></li>
</div> 

<div class="main-content-up">
    <h3><?php echo __('reserva_OK titulo') ?></h3>
  
  <?php echo __('reserva_OK texto') ?>
</div>