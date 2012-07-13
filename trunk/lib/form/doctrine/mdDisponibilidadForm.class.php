<?php

/**
 * mdDisponibilidad form.
 *
 * @package    rentNchill
 * @subpackage form
 * @author     maui
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mdDisponibilidadForm extends BasemdDisponibilidadForm
{
  public function configure()
  {
    parent::configure();
    
    $this->widgetSchema['fecha_desde']  = new sfWidgetFormDateTime(array('date' => array('can_be_empty' => false, 'format' => '%day%/%month%/%year%'), 'format' => '%date%'));
    $this->validatorSchema['fecha_desde'] = new sfValidatorDateTime();
    
    $this->widgetSchema['fecha_hasta']  = new sfWidgetFormDateTime(array('date' => array('can_be_empty' => false, 'format' => '%day%/%month%/%year%'), 'format' => '%date%'));
    $this->validatorSchema['fecha_hasta'] = new sfValidatorDateTime();    
  }
}
