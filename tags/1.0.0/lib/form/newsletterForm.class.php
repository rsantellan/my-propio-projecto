<?php
class newsletterForm extends sfForm
{
  public function configure()
  {
	    sfContext::getInstance()->getConfiguration()->loadHelpers(array('I18N'));
    $this->setWidgets(array(
        'nombre'    => new sfWidgetFormInput(array('label' => __('Contacto_Nombre'))),
        'email'      => new sfWidgetFormInput(array('label' => __('Contacto_Email')))
    ));


    $error_message = array(
    'required'=>__('Contacto_Error Requerido'),
    'invalid' => __('Contacto_Error Invalido')
    );

    $this->setValidators(array(
        'nombre'    => new sfValidatorString(array('required' => true),$error_message),
        'email'      => new sfValidatorEmail(array('required' => true),$error_message)
    ));

    $this->widgetSchema->setNameFormat('newsletter[%s]');

  }
}