<?php

class reservasComponents extends sfComponents
{


	
		public function executeBookit($request){
			$this->form = new mdReservaFrontendForm();
			if($this->getUser()->hasAttribute('search_values')){
				$search_values = $this->getUser()->getAttribute('search_values');
				$desde = $search_values['fecha']['from'];
				$hasta = $search_values['fecha']['to'];
				$this->form->setDefault('fecha_desde', $desde);
				$this->form->setDefault('fecha_hasta', $hasta);
				if($desde!='' and $hasta!=''){
					$depto = Doctrine::getTable('mdApartamento')->find($this->mdApartamentoId);
					$total = 0;
					foreach(mdBasicFunction::makeDayArray($desde, $hasta) as $dia){
						if($dia != $hasta)
							$total += $depto->getPrecio($dia);
					}
					$this->form->setDefault('total', $total);
				}
			}
			$this->form->setDefault('md_apartamento_id', $this->mdApartamentoId);
		}
	
}