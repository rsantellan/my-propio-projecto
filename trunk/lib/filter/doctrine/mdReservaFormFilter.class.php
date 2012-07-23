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
  }
}
