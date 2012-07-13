<?php

class apartamentosComponents extends sfComponents
{

    public function executeSearch(sfWebRequest $request){
		
			if(!isset($this->form)){
				if($this->getUser()->hasAttribute('search_values')){
      		$this->form = new mdApartamentoFindFormFilter($this->getUser()->getAttribute('search_values'));
				}else{
					$this->form = new mdApartamentoFindFormFilter();
				}
			}
		}

    public function executeFilters(sfWebRequest $request){
	
			$this->form = new mdApartamentoFindFormFilter();
			//inicializa los widgets de los filtros
			$this->rango = array('50','1000');
			//valores por defecto
			$this->rango_default = array('75','500');
	
			$params = $request->getParameter('md_narrow_search', false);
			if($params == false and $this->getUser()->hasAttribute('md_narrow_search')){
				$params = $this->getUser()->getAttribute('md_narrow_search');
			}
			if($params){
				$this->getUser()->setAttribute('md_narrow_search',$params);
				if(isset($params['price_range'])){
					$this->rango_default = explode('-', $params['price_range']);
				}
			}
		}

	  public function executeUpload($request)
	  {
	    sfContext::getInstance()->getConfiguration()->loadHelpers(array('Url'));

	    $this->image_url = '';
	    if(isset($this->mdApartamento))
	    {
	      $this->image_url = url_for('proyectUploader/uploaderImages?a=' . $this->mdApartamento->getId() . '&c=' . $this->mdApartamento->getObjectClass());
	    }
	  }
	
		public function executeBookit($request){
			$this->form = new mdReservaFrontendForm();
			if($this->getUser()->hasAttribute('search_values')){
				$search_values = $this->getUser()->getAttribute('search_values');
				$this->form->setDefault('fecha_desde', $search_values['fecha']['from']);
				$this->form->setDefault('fecha_hasta', $search_values['fecha']['to']);
			}
			$this->form->setDefault('md_apartamento_id', $this->mdApartamentoId);
		}
	
}