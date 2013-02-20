<?php

class reservasComponents extends sfComponents
{


	
		public function executeBookit($request){
			$this->form = new mdReservaFrontendForm();
			if($this->getUser()->hasAttribute('search_values')){
				$search_values = $this->getUser()->getAttribute('search_values');
				$desde = $search_values['fecha']['from'];
				$hasta = $search_values['fecha']['to'];
                $personas = $search_values['cantidad_personas']['text'];
                $this->form->setDefault('fecha_desde', $desde);
				$this->form->setDefault('fecha_hasta', $hasta);
                $this->form->setDefault('cantidad_personas',$personas);
				if($desde!='' and $hasta!=''){
					$depto = Doctrine::getTable('mdApartamento')->find($this->mdApartamentoId);
					$total = 0;
                    $total = $depto->getPrecio($desde, $hasta);
                    /*
                    var_dump($desde);var_dump($hasta);die;
					foreach(mdBasicFunction::makeDayArray($desde, $hasta) as $dia){
						if($dia != $hasta)
							$total += $depto->getPrecio($dia);
					}
                    */
					$this->form->setDefault('total', $total);
				}
			}
			$this->form->setDefault('md_apartamento_id', $this->mdApartamentoId);
		}
	
}