<?php

/*
 */

/**
 * Description of mdReservaStatusForm
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class mdReservaStatusForm extends mdReservaForm {
  
  public function configure()
  {
    parent::configure();
    unset(
            $this['md_user_id'], 
            $this['md_apartamento_id'], 
            $this['fecha_desde'],
            $this['fecha_hasta'],
            $this['cantidad_personas'],
            $this['md_currency_id'],
            $this['total'],
            $this['created_at'],
            $this['updated_at']
          );
    sfContext::getInstance()->getConfiguration()->loadHelpers(array('I18N'));
    $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
          'choices' => array(
              'pending' => __('reserva_estado pending'), 
              'confirm' => __('reserva_estado confirm'), 
              'efective' => __('reserva_estado efective'), 
              'cancel' => __('reserva_estado cancel'), 
              'cancelPayPal' => __('reserva_estado cancelPayPal'), 
              'errorPayPal' => __('reserva_estado errorPayPal'), 
              'prePayPal' => __('reserva_estado prePayPal')
              )));
  }
  
}


