<?php 
$lista = $mdGenericSale->getMdGenericSaleItem();
$item = $lista[0];
$reserva = $item->getObject();

echo __('Mail_Usuario Final Asunto', array(
	'[locacion]' => $reserva->getMdApartamento()->getmdLocacion()->getNombre(),
	'[desde]'=> $reserva->getDateTimeObject('fecha_desde')->format('Y-m-d'),
	'[hasta]'=> $reserva->getDateTimeObject('fecha_hasta')->format('Y-m-d')
	));
?>