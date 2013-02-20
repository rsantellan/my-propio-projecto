<?php 
$lista = $mdGenericSale->getMdGenericSaleItem();
$item = $lista[0];
$reserva = $item->getObject();

echo __('Mail_Comission Asunto', array(
	'[apartamento]' => $reserva->getMdApartamento()->getTitulo(),
	'[desde]'=> $reserva->getDateTimeObject('fecha_desde')->format('Y-m-d'),
	'[hasta]'=> $reserva->getDateTimeObject('fecha_hasta')->format('Y-m-d')
	));
?>