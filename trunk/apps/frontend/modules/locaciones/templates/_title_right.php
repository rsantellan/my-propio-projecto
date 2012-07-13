<div class="title-right">
	<a href="<?php echo url_for('@submit') ?>">
	<div class="property-left">
        <li><?php echo __('Apartamento_submit') ?></li>
        <li><?php echo __('Apartamento_property') ?></li>
    </div>
	<div class="property-img"><img src="/images/property.png" width="41" height="39" /></div>
	</a>
<?php if(isset($mdLocacion)):

?>
    <div class="property-img"><img src="/images/separador.png" width="2" height="54" /></div>
	<div class="property-right">
			<a href="<?php echo url_for('locacion', $mdLocacion) ?>">
    	<li style="font-size:19px; font-family:'BelloProRegular';" class="green"><img src="/images/hand-green.png" width="14" height="14" /><?php echo __('Ciudad_get to know') ?></li>
        <li style="font-size:21px; font-family:'BelloSmCp';"><?php echo $mdLocacion->getNombre() ?></li>
			</a>
    </div>
<?php endif; ?>
</div>