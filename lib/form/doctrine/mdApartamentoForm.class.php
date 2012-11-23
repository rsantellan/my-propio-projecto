<?php

/**
 * mdApartamento form.
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mdApartamentoForm extends BasemdApartamentoForm
{
  public function configure()
  {
		parent::configure();
		unset($this['created_at'],$this['updated_at']);
		

		if(sfContext::hasInstance()){
			$culture = sfContext::getInstance()->getUser()->getCulture();
		}else{
			$culture = 'es';
		}
		$this->embedI18n(array($culture));
		$this->widgetSchema->setLabel($culture, 'Info que se traduce');
		//format_language('en') no puedo usar esto porque cuando trato de meter el helper i18n me da error.
		
		
		if(!$detalle = $this->getObject()->getDetalle()){
			$detalle = new mdDetalle();
			$detalle->mdApartamento = $this->getObject();
		}
		
		$this->embedForm('detalle', new mdDetalleForm($detalle));
		//$this->embedRelation('mdDetalle');
		
		$ocupaciones='';
		if(!$this->isNew()){
			$ocupaciones = Doctrine::getTable('mdOcupacion')->getWidgetContentForId($this->getObject()->getId());
		}
		//armo el widget para la ocupacion
		$this->setWidget('ocupacion', new mdWidgetFormDatepickerMultiple(array('value'=>$ocupaciones)));
		$this->setValidator('ocupacion', new sfValidatorString(array('required'=>false)));
		$this->widgetSchema->moveField('ocupacion', 'after', 'detalle');

        $listado_contactos = array();
        if(!$this->isNew() || !is_null($this->getObject()->getMdUserId()))
        {
          $listado_contactos_aux = Doctrine::getTable('mdApartamento')->getMdUserContactNumbers($this->getObject()->getMdUserId());
          foreach($listado_contactos_aux as $aux_contacto)
          {
            array_push($listado_contactos, $aux_contacto["contacto"]);
          }
        }
        $this->widgetSchema['contacto'] = new sfWidgetFormInputAutocomplete(array('choices' => $listado_contactos));
        $this->validatorSchema['contacto']        = new sfValidatorString(array('max_length' => 20, 'required' => true));
        $this->widgetSchema['md_comodidad_list'] = new sfWidgetFormDoctrineChoice(array('multiple' => true, 'expanded' => true, 'model' => 'mdComodidad', 'label' => 'Comodidades'));
        $this->validatorSchema['md_comodidad_list'] = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'mdComodidad', 'required' => false));
		$this->widgetSchema->moveField('md_comodidad_list', 'after', 'detalle');
		
  }

	public function save($con = null){
		$object = parent::save($con);
		if($this->getValue('ocupacion')!=''){
			$ocupaciones = explode(',',$this->getValue('ocupacion'));
			//borro las ocupaciones
			Doctrine::getTable('mdOcupacion')->deleteByMdApartamentoId($object->getId());
			foreach($ocupaciones as $fecha){
				if($date = date_create_from_format('Y-m-d',$fecha)){
					$nueva = new mdOcupacion();
					$nueva->setMdApartamentoId($object->getId());
					$nueva->setDateTimeObject('fecha',$date);
					$nueva->save();
				}
			}
		}
		return $object;
		
	}

}
