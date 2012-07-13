	<div class="propiedades">
  	<div class="propiedad"><?php echo __('Ciudad_Propierties') ?></div>
  </div>   
  <div class="reservacion"><?php echo $locacion->getNombre() ?></div>

<?php foreach($propiedades as $prop): ?>
  <div class="reserved">
	<a href="<?php echo url_for('apartamento',$prop); ?>">
      	<img src="<?php echo $prop->retrieveAvatar(array(mdWebOptions::WIDTH => 75, mdWebOptions::HEIGHT => 75, mdWebOptions::CODE => mdWebCodes::RESIZECROP)); ?>" width="75" height="75" />
          <div class="tipo"><?php echo $prop->getTitulo() ?></div>
          <div class="servicios"><?php echo $prop->getCopete() ?></div>
          <div class="pn-precio green"><?php echo mdCurrencyHandler::getCurrentSymbol() ?> <?php echo $prop->getPrecio(); ?></div>
          <div style="float:left; font-size:9px; font-family: 'CourierRegular';"><?php echo __('Apartamento_per night') ?></div>
	</a>
  </div>
<?php endforeach; ?>