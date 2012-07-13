<?php

/**
 * reservas actions.
 *
 * @package    rentNchill
 * @subpackage reservas
 * @author     maui
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reservasActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $values = $this->getUser()->getAttribute('reserva_values');
		$this->depto = Doctrine::getTable('mdApartamento')->find($values['md_apartamento_id']);
		$this->values=$values;
		$this->noches = count(mdBasicFunction::makeDayArray($values['fecha_desde'], $values['fecha_hasta']))-1;
  }

	public function executePay($request){

    $values = $this->getUser()->getAttribute('reserva_values');

		$reserva = new mdReserva();
		$reserva->setmdApartamentoId($values['md_apartamento_id']);
		$reserva->setmdUserId($this->getUser()->getMdUserId());
		$reserva->setFechaDesde($values['fecha_desde']);
		$reserva->setFechaHasta($values['fecha_hasta']);
		$reserva->setTotal($values['total']);
		$reserva->setmdCurrencyId(mdCurrencyHandler::getCurrent()->getId());
		$reserva->setCantidadPersonas($values['cantidad_personas']);
		$reserva->save();

		$options = array(
			'objects'=> array($reserva),
			'track'=> 'reservas/done'
			);
		$precio = $reserva->getTotal();
		return mdGenericPaymentHandler::startPayment(mdGenericPaymentHandler::PAYPAL, $precio, $options);
	}

	public function executeDone($request){
		$md_sale_id = $request->getParameter('sale');
    $mdGenericSale = Doctrine::getTable('mdGenericSale')->find($md_sale_id);
		if($this->getUser()->getMdUserId() != $mdGenericSale->getmdUserId()){
			$this->redirect('@homepage');
		}
		
    $items = $mdGenericSale->getMdGenericSaleItem();
	
    foreach($items as $item)
    {
      $reserva = $item->getObject();
		}
		
		$this->depto = $reserva->getmdApartamento();

		$this->noches = count(mdBasicFunction::makeDayArray($reserva->getFechaDesde(), $reserva->getFechaHasta()))-1;
		$this->reserva = $reserva;
		
	}


		public function executeSalePaypalOK(sfWebRequest $request)
	  {
	    $token = $request->getParameter('token');
	    $payerId = $request->getParameter('PayerID');
	    $paymentaction = $request->getParameter('PAYMENTACTION');
	    $mdSaleId = $request->getParameter('SALE');
	    $track = $request->getParameter('track', 'reservas/done');

	    $options = array();
	    $options['token'] = $token;
	    $options['paymentaction'] = $paymentaction;
	    $mdGenericSale = Doctrine::getTable('mdGenericSale')->find($mdSaleId);

	    if(mdGenericPaymentHandler::finishPayment(mdGenericPaymentHandler::PAYPAL, $mdGenericSale, $options))
	    {
		    // Obtenemos todos los items y los activamos
	      $items = $mdGenericSale->getMdGenericSaleItem();
	      foreach($items as $item)
	      {
	        $reserva = Doctrine::getTable($item->getObjectClass())->find($item->getObjectId());
					$reserva->setStatus('confirm');
					$reserva->save();
					foreach(mdBasicFunction::makeDayArray($reserva->getFechaDesde(), $reserva->getFechaHasta()) as $fecha){
						if($date = date_create_from_format('Y-m-d',$fecha)){
							$nueva = new mdOcupacion();
							$nueva->setMdApartamentoId($reserva->getmdApartamentoId());
							$nueva->setDateTimeObject('fecha',$date);
							$nueva->save();
						}
					}
				}
		    mdGenericSaleMailingHandler::sendConfirmAdminMail($mdGenericSale);
				mdGenericSaleMailingHandler::sendSaleFinishMail($mdGenericSale);
				
				if($reserva->getmdApartamento()->getTipo() == 'comission')
					rentMailHandler::sendComissionMail($mdGenericSale);
				
				$track=$track . '?sale=' . $mdSaleId;
				echo $track;
				die();
	      //$this->redirect($track);
	    }
	    else
	    {
	        $this->redirect('reservas/salePaypalError');
	    }
	  }

	  public function executeSalePaypalCancel(sfWebRequest $request)
	  {        
	    $this->redirect('@homepage');
	  }

	  public function executeSalePaypalError(sfWebRequest $request)
	  {        
			echo 'error';
			die();
	    $this->redirect('@homepage');
	  }




	public function executeProcess($request){
		$form = new mdReservaFrontendForm();
		$parameter = $request->getParameter($form->getName());
		$form->bind($parameter);
		if($form->isValid()){
			$values = $form->getValues();
			$this->getUser()->setAttribute('reserva_values', $values);
			return $this->renderText(mdBasicFunction::basic_json_response(true, array()));
		}else{
			$partial = $this->getPartial('bookit', array('form'=>$form));
    	return $this->renderText(mdBasicFunction::basic_json_response(false, array('body'=>$partial)));
		}
	}
	
	public function executeCalculatePrice($request){
		$deptoId = $request->getParameter('md_apartamento_id', false);
		$desde = $request->getParameter('desde', false);
		$hasta = $request->getParameter('hasta', false);

		if((!$deptoId) or (!$desde) or (!$hasta)){
			return $this->renderText(mdBasicFunction::basic_json_response(false, array()));
		}else{
			$total = 0;
			$mdApartamento = Doctrine::getTable('mdApartamento')->find($deptoId);
			foreach(mdBasicFunction::makeDayArray($desde, $hasta) as $dia){
				if($dia != $hasta)
					$total += $mdApartamento->getPrecio($dia);
			}
			return $this->renderText(mdBasicFunction::basic_json_response(true, array('total'=>$total)));			
		}
		
	}
	
}
