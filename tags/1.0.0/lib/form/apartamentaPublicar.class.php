<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of apartamentaPublicar
 *
 * @author Rodrigo Santellan
 */
class apartamentaPublicar extends mdApartamentoForm {
  
  public function configure()
  {
    parent::configure();
    unset($this['activo']);
    $this->widgetSchema['id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['tipo'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['md_user_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['md_currency_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['ocupacion'] = new sfWidgetFormInputHidden();
    $locaciones = Doctrine::getTable('mdLocacion')->findAll();
    $choices = array();
    $v_choices = array();
    foreach($locaciones as $locacion){
        $choices[$locacion->getId()] = $locacion->getNombre();
        $v_choices[] = $locacion->getId();
    }
    $this->widgetSchema['md_locacion_id']    = new sfWidgetFormChoiceAutocompleteComboBox(array('choices'=>$choices));
    
    $ocupaciones='';
    if(!$this->isNew()){
        $ocupaciones = Doctrine::getTable('mdOcupacion')->getWidgetContentForId($this->getObject()->getId());
    }
    //armo el widget para la ocupacion
    $this->setWidget('ocupacion', new mdWidgetFormDatepickerMultiple(array('value'=>$ocupaciones)));
    $this->setValidator('ocupacion', new sfValidatorString(array('required'=>false)));
    $this->widgetSchema->moveField('ocupacion', 'after', 'detalle');
    /*
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'tipo'              => new sfWidgetFormInputHidden(),
      'md_user_id'        => new sfWidgetFormInputHidden(),
      'md_currency_id'    => new sfWidgetFormInputHidden()
    ));
     * 
     */
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


