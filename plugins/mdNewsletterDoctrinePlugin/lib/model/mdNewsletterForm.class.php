<?php
class mdNewsletterForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
        'mail'      => new sfWidgetFormInput(array(), array('label' => 'E-mail')),
        'name'      => new sfWidgetFormInput(array(), array('label' => 'Nombre'))
        ));

		$error_message = array(
			'required'=>'Requerido.',
			'invalid' => 'Email invalido.'
			);

    $this->setValidators(array(
        'mail'      => new sfValidatorEmail(array('required' => true),$error_message),
        'name'      => new sfValidatorString()
    ));

    $this->widgetSchema->setNameFormat('newsLetter[%s]');

  }
}