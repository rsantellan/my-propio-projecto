<?php

/**
 * mdReserva filter form.
 *
 * @package    rentNchill
 * @subpackage filter
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mdReservaFormFilter extends BasemdReservaFormFilter
{
  public function configure()
  {
    $this->widgetSchema['lugar'] = new sfWidgetFormDoctrineChoice(array('model' => 'mdLocacion', 'add_empty' => true));
    $this->widgetSchema['status'] = new sfWidgetFormChoice(array('choices' => array(
              '' => '', 
              'pending' => 'Pendiente', 
              'confirm' => 'Confirmado', 
              'efective' => 'Efectiva', 
              'cancel' => 'Cancelada', 
              'cancelPayPal' => 'Cancelada en paypal', 
              'errorPayPal' => 'Error en paypal', 
              'prePayPal' => 'Pre paypal'
        )));
    $this->validatorSchema['lugar'] =  new sfValidatorDoctrineChoice(array('required' => false, 'model' => 'mdLocacion', 'column' => 'id'));
  }
  
  public function addLugarColumnQuery(Doctrine_Query $query, $field, $values){
      if($values != ''){
        $query->select($query->getRootAlias() . '.*')
                ->addFrom('mdApartamento mdA, mdLocacion mdL')
                ->addWhere($query->getRootAlias() . '.md_apartamento_id = mdA.id')
                ->addWhere('mdA.md_locacion_id = mdL.id')
                ->addWhere('mdL.id = ?', $values);
      }

  }
}
