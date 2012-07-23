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
}


