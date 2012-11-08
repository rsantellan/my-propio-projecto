<?php

/**
 * Formulario para buscar apartamento desde el frontend
 *
 * @package    rentNchill
 * @subpackage filter
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mdApartamentoFindFormFilter extends BasemdApartamentoSearchFormFilter
{
  public function configure()
  {
		parent::configure();
		$this->useFields(array('cantidad_personas','md_locacion_id','tipo_propiedad'));
				
		$locaciones = Doctrine::getTable('mdLocacion')->findAll();
		$choices = array();
		$v_choices = array();
		foreach($locaciones as $locacion){
			$choices[$locacion->getId()] = $locacion->getNombre();
			$v_choices[] = $locacion->getId();
		}
		
		$this->setWidget('md_locacion_id', new sfWidgetFormChoiceAutocompleteComboBox(array('choices'=>$choices)));
		$this->setValidator('md_locacion_id', new sfValidatorInteger(array('required' => true)));

		$this->setWidget('fecha', new sfWidgetFormDateRange(array(
		  'from_date' => new sfWidgetFormInput(),
		  'to_date'   => new sfWidgetFormInput(),
		)));
		$this->setValidator('fecha', new mdValidatorDateRange(
			array(
				'required' 	=> false,
				'from_date' => new sfValidatorString(array('required' => false)),
				'to_date' 	=> new sfValidatorString(array('required' => false))
			)
		));

		//filtros avanzados

		$this->setWidget('md_price_range', new sfWidgetFormInputText());
		$this->setValidator('md_price_range', new sfValidatorString(array('required' => false)));

		$this->setWidget('md_locacion_id', new sfWidgetFormChoiceAutocompleteComboBox(array('choices'=>$choices)));
		$this->setValidator('md_locacion_id', new sfValidatorInteger(array('required' => true)));

		$tipos_propiedad = array();
		foreach(explode(',',sfConfig::get('sf_tipo_propiedad')) as $tipo){
			$tipos_propiedad[$tipo] = 'Search_Filter Tipo Propiedad: ' . $tipo;
		}
    $this->setWidget('tipo_propiedad', new sfWidgetFormChoice(array(
				'choices' => $tipos_propiedad,
				'expanded' => true,
				'multiple' => true
				)));
		$this->setValidator('tipo_propiedad', new sfValidatorChoice(array(
				'required' => false, 
				'choices' => array_keys($tipos_propiedad), 
				'multiple' => true
				)));

			$orderBy = array(
				'price' => 'Search_Filter OrderBy: price',
				'cuartos' => 'Search_Filter OrderBy: rooms',
				'metraje' => 'Search_Filter OrderBy: mts'
				);
	    $this->setWidget('order_by', new sfWidgetFormChoice(array(
					'choices' => $orderBy,
					'expanded' => true
					)));
			$this->setValidator('order_by', new sfValidatorChoice(array(
					'required' => false, 
					'choices' => array_keys($orderBy)
					)));


		$this->disableLocalCSRFProtection();
        $this->widgetSchema->setNameFormat('m[%s]');
  }

  protected function addMdLocacionIdColumnQuery(Doctrine_Query $query, $field, $values){
		$query->addWhere($query->getRootAlias() . '.md_locacion_id=?', $values);
		return $query;
	}

  protected function addFechaColumnQuery(Doctrine_Query $query, $field, $values){
		if($values['from']!='')
			$from = date_create_from_format('Y-m-d',$values['from']);
		if($values['to']!='')
			$to = date_create_from_format('Y-m-d',$values['to']);

		$addFilter = false;

		if(isset($from) and isset($to)){
			$addFilter = true;
		}elseif(isset($from)){
			$addFilter = true;
			$to = $from;
			$to->add(date_interval_create_from_date_string('1 day'));
		}elseif(isset($to)){
			$addFilter = true;
			$from = $to;
			$from->sub(date_interval_create_from_date_string('10 day'));
		}
		if($addFilter){
          $query->addWhere($query->getRootAlias() . '.id NOT IN (select md_apartamento_id from md_ocupacion where fecha between ? and ?)', array($from->format('Y-m-d 00:00:00'),$to->format('Y-m-d 23:59:59')) );
          $day_list = mdBasicFunction::makeDayArray($from->format('Y-m-d 00:00:00'), $to->format('Y-m-d 23:59:59'));
          $query->addWhere($query->getRootAlias().".minimo_dias <= ?", array(count($day_list)));
        }
			

		return $query;
	}

  protected function addFechaHastaColumnQuery(Doctrine_Query $query, $field, $values){
		$date = date_create_from_format('Y-m-d',$values);
		if(!$query->hasAliasDeclaration('d'))
			$query->innerJoin($query->getRootAlias() . '.mdDisponibilidad d');
		$query->addWhere('d.fecha_desde <= ?',$date)->andWhere('d.fecha_hasta > ?',$date);

		return $query;	
	}

  protected function addMdPriceRangeColumnQuery(Doctrine_Query $query, $field, $values){
	
		//inicializo los parametros que necesito
		$rango = explode(' - ', $values);
        
        $field = $this->getPriceKind();

		if(mdCurrencyHandler::getCurrent()->getId()!=1){
			$rango[0] = mdCurrencyConvertion::convert(mdCurrencyHandler::getCurrentCode(), 'EUR', $rango[0]);
			$rango[1] = mdCurrencyConvertion::convert(mdCurrencyHandler::getCurrentCode(), 'EUR', $rango[1]);
		}
		
		$query->addWhere($query->getRootAlias() . '.' . $field . ' between ' . $rango[0] . ' and ' . $rango[1]);

		return $query;	
	}
  protected function addTipoPropiedadColumnQuery(Doctrine_Query $query, $field, $values){

		$query->addWhere($query->getRootAlias() . '.' . $field . ' in (\'' . implode("','", $values) . '\')');
		
		return $query;
	}

  protected function addOrderByColumnQuery(Doctrine_Query $query, $field, $values){
		
		switch($values){
			case 'cuartos':
			case 'metraje':
				$query->addOrderBy($values);
				break;
			case 'price':
			default:
				$query->addOrderBy($this->getPriceKind());
		}
				
		return $query;
	
	}

  protected function addCantidadPersonasColumnQuery(Doctrine_Query $query, $field, $values){
      if($values['text']>0)
			$query->addWhere($query->getRootAlias() . '.' . $field . ' >= ?', $values['text']);
				
		return $query;
	
	}


	private function getPriceKind(){
		
		$md_locacion_id = $this->getValue('md_locacion_id');
		$fecha = $this->getValue('fecha');
		
		// si no hay fecha seleccionada uso hoy
		if(!isset($fecha['from']) || $fecha['from']=='' || !isset($fecha['to']) || $fecha['to']=='')
        {
			$fecha = date('Y-m-d');
		}else{
			$fecha = $fecha['from'];
		}
		$resultadosDias = Doctrine::getTable('temporadaAnual')->retrieveSeasonRange($md_locacion_id, $fecha, $fecha);
        $field = 0;
        if(!is_array($resultadosDias) || count($resultadosDias) == 0)
        {
          $field = 'precio_baja';
        }
        else
        {
          $aux = $resultadosDias[0];
          switch ($aux["tipo"]) {
            case "A":
                $field = 'precio_alta';
              break;
            case "M":
                $field = 'precio_media';
              break;
            case "B":
                $field = 'precio_baja';
              break;
          }
        }
        return $field;
		if(Doctrine::getTable('mdLocacion')->find($md_locacion_id)->esTemporadaAlta($fecha)){
			$field = 'precio_alta';
		}else{
			$field = 'precio_baja';
		}
		
		return $field;
	}

}
